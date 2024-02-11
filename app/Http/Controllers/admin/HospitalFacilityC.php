<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Hospital;
use App\Models\HospitalFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalFacilityC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $facilities = Facility::all();
    $rows = HospitalFacility::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalFacility::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/facilities/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/facilities');
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/facilities/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's facilities";
    $page_route = "hospital/facilities";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'facilities', 'page_no');
    return view('admin.hospital-facilities')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = HospitalFacility::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/facilities/' . $request->hospital_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Hospital</th>
        <th>Facility</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->hospital->hospital_name . '</td>
      <td>' . $row->facility->facility . '</td>
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
      'facility_id.*' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $facility_ids = $request['facility_id'];
    $rowsInserted = 0;
    $totalRows = 0;
    for ($i = 0; $i < count($facility_ids); $i++) {
      $totalRows++;
      $chk = HospitalFacility::where(['hospital_id' => $request['hospital_id'], 'facility_id' => $facility_ids[$i]])->count();
      if ($chk == 0) {
        $field = new HospitalFacility;
        $field->hospital_id = $request['hospital_id'];
        $field->facility_id = $facility_ids[$i];
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
  public function delete($id)
  {
    echo $result = HospitalFacility::find($id)->delete();
  }
}
