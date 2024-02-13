<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentTestimonialC extends Controller
{
  public function index($treatment_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $treatment = Treatment::find($treatment_id);
    $rows = TreatmentTestimonial::where('treatment_id', $treatment_id)->get();
    if ($id != null) {
      $sd = TreatmentTestimonial::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatment/testimonials/' . $treatment_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatment/testimonials');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatment/testimonials/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatment's Testimonials";
    $page_route = "treatment/testimonials";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'treatment', 'page_no');
    return view('admin.treatment-testimonials')->with($data);
  }
  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = TreatmentTestimonial::where('id', '!=', '0');
    if ($request->has('treatment_id') && $request->treatment_id != '') {
      $rows = $rows->where('treatment_id', $request->treatment_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/treatment/testimonials/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Treatment</th>
        <th>Photo</th>
        <th>User</th>
        <th>Reviews</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->treatment->treatment_name . '</td>
      <td><a target="_blank" href="' . url($row->photo_path) . '"><img src="' . asset($row->photo_path) . '" height="40" width="40"></a></td>
      <td>' . $row->user_name . '</td>
      <td>
        Rating : <b>' . $row->rating . '</b> <br>
        Title : <b>' . $row->review_title . '</b> <br>
        Review : <b>' . $row->review . '</b> <br>
      </td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/treatment/testimonials/" . $row->treatment_id . "/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
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
        'user_name' => 'required',
        'review_title' => 'required',
        'rating' => 'required',
        'review' => 'required',
        'photo' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new TreatmentTestimonial();
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/photo/', $file_name);
      if ($move) {
        $field->photo_name = $file_name;
        $field->photo_path = 'uploads/photo/' . $file_name;
      }
    }
    $field->user_name = $request['user_name'];
    $field->rating = $request['rating'];
    $field->review_title = $request['review_title'];
    $field->review = $request['review'];
    $field->treatment_id = $request['treatment_id'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function update($treatment_id, $id, Request $request)
  {
    $request->validate(
      [
        'treatment_id' => 'required',
        'user_name' => 'required',
        'review_title' => 'required',
        'rating' => 'required',
        'review' => 'required',
        'photo' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );
    $field = TreatmentTestimonial::find($id);
    if ($request->hasFile('photo')) {
      $fileOriginalName = $request->file('photo')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('photo')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('photo')->move('uploads/photo/', $file_name);
      if ($move) {
        $field->photo_name = $file_name;
        $field->photo_path = 'uploads/photo/' . $file_name;
      }
    }
    $field->user_name = $request['user_name'];
    $field->rating = $request['rating'];
    $field->review_title = $request['review_title'];
    $field->review = $request['review'];
    $field->treatment_id = $request['treatment_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatment/testimonials/' . $request->treatment_id);
  }
  public function delete($id)
  {
    echo $result = TreatmentTestimonial::find($id)->delete();
  }
}
