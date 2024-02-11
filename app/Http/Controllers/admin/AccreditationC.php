<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccreditationC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = Accreditation::get();
    if ($id != null) {
      $sd = Accreditation::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/accreditations/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/accreditations');
      }
    } else {
      $ft = 'add';
      $url = url('admin/accreditations/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Accreditation";
    $page_route = "accreditations";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.accreditations')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Accreditation::where('id', '!=', '0');
    $rows = $rows->paginate(10);
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    //$i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->title . '</td>
      <td><a href="' . asset($row->file_path) . '" target="_blank"><img src="' . asset($row->file_path) . '" width="30" height="30" /></a></td>
      <td>';
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
      $output .= '</td>
      <td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/accreditations/update/" . $row->id) . '" class="waves-effect waves-light btn btn-xs btn-outline btn-info"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
      'title' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Accreditation;
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->file_name = $file_name;
        $field->file_path = 'uploads/hospital/' . $file_name;
      }
    }
    $field->title = $request['title'];
    $field->description = $request['description'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    echo $result = Accreditation::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'title' => 'required',
      ]
    );
    $field = Accreditation::find($id);
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/hospital/', $file_name);
      if ($move) {
        $field->file_name = $file_name;
        $field->file_path = 'uploads/hospital/' . $file_name;
      }
    }
    $field->title = $request['title'];
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/accreditations');
  }
}
