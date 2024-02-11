<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacilityC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = Facility::get();
    if ($id != null) {
      $sd = Facility::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/facilities/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/facilities');
      }
    } else {
      $ft = 'add';
      $url = url('admin/facilities/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "facilities";
    $page_route = "facilities";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.facilities')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Facility::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/facilities/');
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    //$i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Id</th>
        <th>Facility</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->id . '</td>
      <td>' . $row->facility . '</td>';
      $output .= '<td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/facilities/update/" . $row->id) . '"
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
      'facility' => 'required|unique:facilities,facility'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Facility;
    $field->facility = $request['facility'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Facility::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'facility' => 'required|unique:facilities,facility,' . $id,
      ]
    );
    $field = Facility::find($id);
    $field->facility = $request['facility'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/facilities');
  }
}
