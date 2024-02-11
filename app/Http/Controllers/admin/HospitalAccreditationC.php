<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use App\Models\Department;
use App\Models\Hospital;
use App\Models\HospitalAccreditation;
use App\Models\Procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalAccreditationC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $departments = Department::all();
    $accreditations = Accreditation::all();
    $rows = HospitalAccreditation::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalAccreditation::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/accreditations/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/accreditations');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/accreditations/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's accreditations";
    $page_route = "hospital/accreditations";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'accreditations', 'page_no', 'departments');
    return view('admin.hospital-accreditations')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = HospitalAccreditation::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/accreditations/' . $request->hospital_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Accreditation</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->getHospital->hospital_name . '</td>
      <td>' . $row->getAccreditation->title . '</td>
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
    $validator = Validator::make($request->all(), [
      'hospital_id' => 'required',
      'accreditation_id.*' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $accreditation_ids = $request['accreditation_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($accreditation_ids); $i++) {
      $totalRows++;
      $chk = HospitalAccreditation::where(['hospital_id' => $request['hospital_id'], 'accreditation_id' => $accreditation_ids[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalAccreditation;
        $field->hospital_id = $request['hospital_id'];
        $field->accreditation_id = $accreditation_ids[$i];
        $field->save();
        $rowsInserted++;
      }
    }
    if ($rowsInserted > 0) {
      return response()->json(['success' => $rowsInserted . ' out of ' . $totalRows . ' records have been inserted succesfully.']);
    } else {
      return response()->json(['failed' => 'Data not inserted. Duplicate rows found.']);
    }
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'accreditation_id' => 'required',
      ]
    );
    $field = HospitalAccreditation::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->accreditation_id = $request['accreditation_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/accreditation');
  }
  public function delete($id)
  {
    echo $result = HospitalAccreditation::find($id)->delete();
  }
}
