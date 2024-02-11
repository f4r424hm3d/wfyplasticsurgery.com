<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentPhotoC extends Controller
{
  public function index($treatment_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $treatment = Treatment::find($treatment_id);
    $rows = TreatmentPhoto::where('treatment_id', $treatment_id)->get();
    if ($id != null) {
      $sd = TreatmentPhoto::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatment/photos/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatment/photos');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatment/photos/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatment's Photos";
    $page_route = "treatment/photos";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'treatment', 'page_no');
    return view('admin.treatment-photos')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = TreatmentPhoto::find($id)->delete();
  }
  public function update($treatment_id, $id, Request $request)
  {
    $request->validate(
      [
        'treatment_id' => 'required',
        'doctor_id' => 'required',
      ]
    );
    $field = TreatmentPhoto::find($id);
    $field->treatment_id = $request['treatment_id'];
    $field->doctor_id = $request['doctor_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatment/photos');
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = TreatmentPhoto::where('id', '!=', '0');
    if ($request->has('treatment_id') && $request->treatment_id != '') {
      $rows = $rows->where('treatment_id', $request->treatment_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/treatment/photos/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Treatment</th>
        <th>Title</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->treatment->treatment_name . '</td>
      <td>' . $row->title . '</td>
      <td><a target="_blank" href="' . url($row->photo_path) . '"><img src="' . asset($row->photo_path) . '" height="40" width="40"></a></td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
      </td>
    </tr>';
      $i++;
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    //return $request->toArray();
    $validator = Validator::make(
      $request->all(),
      [
        'treatment_id' => 'required',
        'title' => 'required',
        'photo.*' => 'required|max:1000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $rowsInserted = 0;
    $totalRows = 0;
    if ($request->hasFile('photo')) {
      foreach ($request->file('photo') as $key => $file) {
        $totalRows++;
        $field = new TreatmentPhoto;
        $field->treatment_id = $request['treatment_id'];
        $field->title = $request['title'];
        $fileOriginalName = $file->getClientOriginalName();
        $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
        $file_name_slug = slugify($fileNameWithoutExtention);
        $file_name = $file_name_slug . '-' . time() . '.' . $file->getClientOriginalExtension();
        $move = $file->move('uploads/treatment/photos/', $file_name);
        if ($move) {
          $field->photo_name = $file_name;
          $field->photo_path = 'uploads/treatment/photos/' . $file_name;
        } else {
          session()->flash('emsg', 'Images not uploaded.');
        }
        $done = $field->save();
        if ($done) {
          $rowsInserted++;
        }
      }
    }
    if ($rowsInserted > 0) {
      return response()->json(['success' => $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.']);
    } else {
      return response()->json(['failed' => 'Data not inserted. Duplicate rows found.']);
    }
  }
}
