<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TreatmentCategory;
use App\Models\TreatmentSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentSubCategoryC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $treatment_categories = TreatmentCategory::all();
    $rows = TreatmentSubCategory::get();
    if ($id != null) {
      $sd = TreatmentSubCategory::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatment-sub-categories/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatment-sub-categories');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatment-sub-categories/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatment Sub Categories";
    $page_route = "treatment-sub-categories";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no', 'treatment_categories');
    return view('admin.treatment-sub-categories')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = TreatmentSubCategory::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/treatment-sub-categories/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->category->category_name . '</td>
      <td>' . $row->sub_category_name . '</td>';


      $output .= '<td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/treatment-sub-categories/update/" . $row->id) . '"
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
    $validator = Validator::make($request->all(), [
      'category_id' => 'required',
      'sub_category_name' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new TreatmentSubCategory;
    $field->category_id = $request['category_id'];
    $field->sub_category_name = $request['sub_category_name'];
    $field->sub_category_slug = slugify($request['sub_category_name']);
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    echo $result = TreatmentSubCategory::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'category_id' => 'required',
        'sub_category_name' => 'required',
      ]
    );
    $field = TreatmentSubCategory::find($id);
    $field->category_id = $request['category_id'];
    $field->sub_category_name = $request['sub_category_name'];
    $field->sub_category_slug = slugify($request['sub_category_name']);
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatment-sub-categories');
  }
}
