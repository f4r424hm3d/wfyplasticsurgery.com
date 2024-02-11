<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentFaqC extends Controller
{
  public function index($department_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $department = Department::find($department_id);
    $rows = DepartmentFaq::where('department_id', $department_id)->get();
    if ($id != null) {
      $sd = DepartmentFaq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/department-faqs/' . $department_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/department-faqs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/department-faqs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Department's Faqs";
    $page_route = "department-faqs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'department', 'page_no');
    return view('admin.department-faqs')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = DepartmentFaq::find($id)->delete();
  }
  public function update($department_id, $id, Request $request)
  {
    $request->validate(
      [
        'department_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );
    $field = DepartmentFaq::find($id);
    $field->department_id = $request['department_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/department-faqs/' . $department_id);
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = DepartmentFaq::where('id', '!=', '0');
    if ($request->has('department_id') && $request->department_id != '') {
      $rows = $rows->where('department_id', $request->department_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/department-faqs/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Department</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getDepartment->department_name . '</td>
      <td>' . $row->question . '</td>
      <td>' . $row->answer . '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/department-faqs/" . $row->department_id . "/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info">
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
        'department_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );

    if ($validator->fails()) {

      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new DepartmentFaq;
    $field->department_id = $request['department_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    return response()->json(['success' => 'Record has been inserted succesfully.']);
  }
}
