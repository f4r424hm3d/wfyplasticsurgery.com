<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Procedure;
use App\Models\ProcedureFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcedureFaqC extends Controller
{
  public function index($procedure_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $procedure = Procedure::find($procedure_id);
    $rows = ProcedureFaq::where('procedure_id', $procedure_id)->get();
    if ($id != null) {
      $sd = ProcedureFaq::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/procedure-faqs/' . $procedure_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/procedure-faqs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/procedure-faqs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Procedure's Faqs";
    $page_route = "procedure-faqs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'procedure', 'page_no');
    return view('admin.procedure-faqs')->with($data);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = ProcedureFaq::find($id)->delete();
  }
  public function update($procedure_id, $id, Request $request)
  {
    $request->validate(
      [
        'procedure_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );
    $field = ProcedureFaq::find($id);
    $field->procedure_id = $request['procedure_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/procedure-faqs/' . $procedure_id);
  }

  public function getData(Request $request)
  {
    // return $request;
    // die;
    $rows = ProcedureFaq::where('id', '!=', '0');
    if ($request->has('procedure_id') && $request->procedure_id != '') {
      $rows = $rows->where('procedure_id', $request->procedure_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/procedure-faqs/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Procedure</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getProcedure->procedure_name . '</td>
      <td>' . $row->question . '</td>
      <td>' . $row->answer . '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/procedure-faqs/" . $row->procedure_id . "/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info">
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
        'procedure_id' => 'required',
        'question' => 'required',
        'answer' => 'required',
      ]
    );

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new ProcedureFaq;
    $field->procedure_id = $request['procedure_id'];
    $field->question = $request['question'];
    $field->answer = $request['answer'];
    $field->save();
    return response()->json(['success' => 'Record has been inserted succesfully.']);
  }
}
