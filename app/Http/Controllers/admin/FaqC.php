<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $faq_categories = FaqCategory::all();
    $rows = Faq::get();
    if ($id != null) {
      $sd = Faq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/faqs/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/faqs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/faqs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Faqs";
    $page_route = "faqs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no', 'faq_categories');
    return view('admin.faqs')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Faq::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/faqs/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Category</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->category->category_name . '</td>
      <td>' . $row->question . '</td>
      <td>';
      if ($row->answer != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#ShortnoteModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="ShortnoteModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="ShortnoteModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="ShortnoteModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->answer . '
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>';
      } else {
        $output .= 'Null';
      }

      $output .= '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/faqs/update/" . $row->id) . '"
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
      'question' => 'required',
      'answer' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Faq;

    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->category_id = $request['category_id'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Faq::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'category_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );
    $field = Faq::find($id);
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->category_id = $request['category_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/faqs');
  }
}
