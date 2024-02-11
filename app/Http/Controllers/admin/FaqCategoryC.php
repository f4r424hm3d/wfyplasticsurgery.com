<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqCategoryC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = FaqCategory::get();
    if ($id != null) {
      $sd = FaqCategory::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/faq-categories/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/faq-categories');
      }
    } else {
      $ft = 'add';
      $url = url('admin/faq-categories/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Faq Categories";
    $page_route = "faq-categories";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.faq-categories')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = FaqCategory::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/faq-categories/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    if ($rows->count() > 0) {
      foreach ($rows as $row) {
        $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->category_name . '</td>';
        $output .= '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/faq-categories/update/" . $row->id) . '"
                      class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
      </td>
    </tr>';
        $i++;
      }
    } else {
      $output .= '<tr><td colspan="4"><center>No data found</center></td></tr>';
    }
    $output .= '</tbody></table>';
    $output .= '<div>' . $rows->links('pagination::bootstrap-5') . '</div>';
    return $output;
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'category_name' => 'required|unique:faq_categories,category_name',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new FaqCategory;
    $field->category_name = $request['category_name'];
    $field->category_slug = slugify($request['category_name']);
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    echo $result = FaqCategory::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'category_name' => 'required|unique:faq_categories,category_name,' . $id,
      ]
    );
    $field = FaqCategory::find($id);
    $field->category_name = $request['category_name'];
    $field->category_slug = slugify($request['category_name']);
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/faq-categories');
  }
}
