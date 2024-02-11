<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyAddressC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $rows = Address::get();
    if ($id != null) {
      $sd = Address::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/company-addresses/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/company-addresses');
      }
    } else {
      $ft = 'add';
      $url = url('admin/company-addresses/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Specializations";
    $page_route = "company-addresses";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no');
    return view('admin.addressess')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Address::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/company-addresses/');
    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;
    //$i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Country</th>
        <th>Address</th>
        <th>Phones</th>
        <th>Emails</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->country . '</td>
      <td>
      Address : ' . $row->address . ' <br>
      City : ' . $row->city . ' <br>
      </td>
      <td>
      Phone1 : ' . $row->phone1 . ' <br>
      Phone2 : ' . $row->phone2 . ' <br>
      </td>
      <td>
      Email1 : ' . $row->email1 . ' <br>
      Email2 : ' . $row->email2 . ' <br>
      </td>';
      $output .= '<td>
        <a href="javascript:void()" onclick="DeleteAjax(' . $row->id . ')"
          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
        <a href="' . url("admin/company-addresses/update/" . $row->id) . '"
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
      'address' => 'required',
      'city' => 'required',
      'country' => 'required',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Address;
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->pincode = $request['pincode'];
    $field->phone1 = $request['phone1'];
    $field->phone2 = $request['phone2'];
    $field->email1 = $request['email1'];
    $field->email2 = $request['email2'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    echo $result = Address::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'address' => 'required',
        'city' => 'required',
        'country' => 'required',
      ]
    );
    $field = Address::find($id);
    $field->address = $request['address'];
    $field->city = $request['city'];
    $field->state = $request['state'];
    $field->country = $request['country'];
    $field->pincode = $request['pincode'];
    $field->phone1 = $request['phone1'];
    $field->phone2 = $request['phone2'];
    $field->email1 = $request['email1'];
    $field->email2 = $request['email2'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/company-addresses');
  }
}
