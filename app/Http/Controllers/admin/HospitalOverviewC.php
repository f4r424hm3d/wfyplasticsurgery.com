<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use App\Models\HospitalOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HospitalOverviewC extends Controller
{
  public function index($hospital_id, $id = null)
  {
    $titles = HospitalOverview::select('title')->groupBy('title')->get();
    $page_no = $_GET['page'] ?? 1;
    $hospital = Hospital::find($hospital_id);
    $rows = HospitalOverview::where('hospital_id', $hospital_id)->get();
    if ($id != null) {
      $sd = HospitalOverview::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/hospital/overview/' . $hospital_id . '/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/hospital/overview/' . $hospital_id);
      }
    } else {
      $ft = 'add';
      $url = url('admin/hospital/overview/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Hospital's overview";
    $page_route = "hospital/overview";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'hospital', 'page_no', 'titles');
    return view('admin.hospital-overview')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = HospitalOverview::where('id', '!=', '0');
    if ($request->has('hospital_id') && $request->hospital_id != '') {
      $rows = $rows->where('hospital_id', $request->hospital_id);
    }
    $rows = $rows->paginate(10)->withPath('/admin/hospital/overview/' . $request->hospital_id);
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->title . '</td><td>';
      if ($row->description != null) {
        $output .= '<button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
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
                            ' . $row->description . '
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
      $output .= '</td><td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/hospital/overview/" . $row->hospital_id . "/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info">
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
      'hospital_id' => 'required',
      'description' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new HospitalOverview;
    $field->hospital_id = $request['hospital_id'];
    $field->title = $request['title'];
    $field->description = $request['description'];
    $field->save();
    return response()->json(['success' => 'Record has been inserted succesfully.']);
  }
  public function update($hospital_id, $id, Request $request)
  {
    $request->validate(
      [
        'hospital_id' => 'required',
        'description' => 'required',
      ]
    );
    $field = HospitalOverview::find($id);
    $field->hospital_id = $request['hospital_id'];
    $field->title = $request['title'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/hospital/overview/' . $hospital_id);
  }
  public function delete($id)
  {
    echo $result = HospitalOverview::find($id)->delete();
  }
}
