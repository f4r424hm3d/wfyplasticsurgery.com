<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Treatment;
use App\Models\TreatmentFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentFacilityC extends Controller
{
  public function index($treatment_id, $id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $treatment = Treatment::find($treatment_id);
    $facilities = Facility::all();
    $rows = TreatmentFacility::where('treatment_id', $treatment_id)->get();
    if ($id != null) {
      $sd = TreatmentFacility::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatment/facilities/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatment/facilities');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatment/facilities/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatment's facilities";
    $page_route = "treatment/facilities";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'treatment', 'facilities', 'page_no');
    return view('admin.treatment-facilities')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = TreatmentFacility::where('id', '!=', '0');
    if ($request->has('treatment_id') && $request->treatment_id != '') {
      $rows = $rows->where('treatment_id', $request->treatment_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/treatment/facilities/' . $request->treatment_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Treatment</th>
        <th>Facility</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->treatment->treatment_name . '</td>
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
      'treatment_id' => 'required',
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
      $chk = TreatmentFacility::where(['treatment_id' => $request['treatment_id'], 'facility_id' => $facility_ids[$i]])->count();
      if ($chk == 0) {
        $field = new TreatmentFacility;
        $field->treatment_id = $request['treatment_id'];
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
    echo $result = TreatmentFacility::find($id)->delete();
  }
}
