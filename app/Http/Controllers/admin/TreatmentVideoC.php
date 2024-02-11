<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentVideoC extends Controller
{
  public function index($treatment_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $treatment = Treatment::find($treatment_id);
    $rows = TreatmentVideo::where('treatment_id', $treatment_id)->get();
    if ($id != null) {
      $sd = TreatmentVideo::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatment/videos/' . $treatment_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatment/videos');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatment/videos/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatment's Videos";
    $page_route = "treatment/videos";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'treatment', 'page_no');
    return view('admin.treatment-videos')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = TreatmentVideo::find($id)->delete();
  }
  public function update($treatment_id, $id, Request $request)
  {
    $request->validate(
      [
        'treatment_id' => 'required',
        'title' => 'required',
        'link' => 'required',
      ]
    );
    $field = TreatmentVideo::find($id);
    $field->treatment_id = $request['treatment_id'];
    $field->title = $request['title'];
    $field->link = $request['link'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatment/videos/' . $treatment_id);
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = TreatmentVideo::where('id', '!=', '0');
    if ($request->has('treatment_id') && $request->treatment_id != '') {
      $rows = $rows->where('treatment_id', $request->treatment_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/treatment/videos/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Treatment</th>
        <th>Title</th>
        <th>Link</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->treatment->treatment_name . '</td>
      <td>' . $row->title . '</td>
      <td>' . $row->link . '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/treatment/videos/" . $row->treatment_id . "/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info">
        <i class="fa fa-edit" aria-hidden="true"></i>
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
        'link' => 'required',
      ]
    );

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new TreatmentVideo;
    $field->treatment_id = $request['treatment_id'];
    $field->title = $request['title'];
    $field->link = $request['link'];
    $field->save();
    return response()->json(['success' => 'Record has been inserted succesfully.']);
  }
}
