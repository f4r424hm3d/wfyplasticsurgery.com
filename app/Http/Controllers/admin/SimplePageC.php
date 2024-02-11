<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SimplePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimplePageC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = SimplePage::get();
    if ($id != null) {
      $sd = SimplePage::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/simple-pages/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/simple-pages');
      }
    } else {
      $ft = 'add';
      $url = url('admin/simple-pages/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Simple Pages";
    $page_route = "simple-pages";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.simple-pages')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = SimplePage::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/simple-pages/');
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    //$i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Page Name</th>
        <th>URL</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->page_name . '</td>
      <td><a href="' . url($row->page_url) . '" target="_blank">' . $row->page_url . '</a></td>
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
        <a href="' . url("admin/simple-pages/update/" . $row->id) . '"
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
      'page_name' => 'required',
      'page_url' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new SimplePage;
    $field->page_name = $request['page_name'];
    $field->page_url = slugify($request['page_url']);
    $field->description = $request['description'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    echo $result = SimplePage::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'page_name' => 'required',
        'page_url' => 'required',
      ]
    );
    $field = SimplePage::find($id);
    $field->page_name = $request['page_name'];
    $field->page_url = slugify($request['page_url']);
    $field->description = $request['description'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/simple-pages');
  }
}
