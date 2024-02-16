<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfterCategory;
use App\Models\BeforeAfterGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeforeAfterPhotoC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $categories = BeforeAfterCategory::all();
    $rows = BeforeAfterGallery::get();
    if ($id != null) {
      $sd = BeforeAfterGallery::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/before-after-photos/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/before-after-photos');
      }
    } else {
      $ft = 'add';
      $url = url('admin/before-after-photos/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Before After";
    $page_route = "before-after-photos";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no', 'categories');
    return view('admin.before-after-photos')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = BeforeAfterGallery::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/before-after-photos/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->category->category_name . '</td>
      <td>
      <a target="_blank" href="' . url($row->photo_path) . '">
      <img src="' . asset($row->photo_path) . '" height="100" width="100">
      </a>
      </td>
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
  public function storeAjaxOld(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'category_id' => 'required',
      'before' => 'required|max:1000|mimes:jpg,jpeg,png,gif,webp',
      'after' => 'required|max:1000|mimes:jpg,jpeg,png,gif,webp',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new BeforeAfterGallery;
    if ($request->hasFile('before')) {
      $fileOriginalName = $request->file('before')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('before')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('before')->move('uploads/gallery/', $file_name);
      if ($move) {
        $field->before_name = $file_name;
        $field->before_path = 'uploads/gallery/' . $file_name;
      }
    }
    if ($request->hasFile('after')) {
      $fileOriginalName = $request->file('after')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('after')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('after')->move('uploads/gallery/', $file_name);
      if ($move) {
        $field->after_name = $file_name;
        $field->after_path = 'uploads/gallery/' . $file_name;
      }
    }
    $field->category_id = $request['category_id'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function storeAjax(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'category_id' => 'required',
        'photo.*' => 'required|max:5000|mimes:jpg,jpeg,png,gif,webp',
      ],
      [
        'photo.*.required' => 'Please upload an image',
        'photo.*.mimes' => 'Only jpg, jpeg, png and gif images are allowed',
        'photo.*.max' => 'Sorry! Maximum allowed size for an image is 5MB',
      ]
    );

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    if ($request->hasFile('photo')) {
      foreach ($request->file('photo') as $key => $file) {
        $field = new BeforeAfterGallery;
        $field->category_id = $request['category_id'];
        $fileOriginalName = $file->getClientOriginalName();
        $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
        $file_name_slug = slugify($fileNameWithoutExtention);
        $file_name = $file_name_slug . '-' . time() . '.' . $file->getClientOriginalExtension();
        $move = $file->move('uploads/gallery/', $file_name);
        if ($move) {
          $field->photo_name = $file_name;
          $field->photo_path = 'uploads/gallery/' . $file_name;
        } else {
          session()->flash('emsg', 'Images not uploaded.');
        }
        $field->save();
      }
    }

    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = BeforeAfterGallery::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'category_id' => 'required',
        'before' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp',
        'after' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp',
      ]
    );
    $field = BeforeAfterGallery::find($id);
    if ($request->hasFile('before')) {
      $fileOriginalName = $request->file('before')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('before')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('before')->move('uploads/gallery/', $file_name);
      if ($move) {
        $field->before_name = $file_name;
        $field->before_path = 'uploads/gallery/' . $file_name;
      }
    }
    if ($request->hasFile('after')) {
      $fileOriginalName = $request->file('after')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('after')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('after')->move('uploads/gallery/', $file_name);
      if ($move) {
        $field->after_name = $file_name;
        $field->after_path = 'uploads/gallery/' . $file_name;
      }
    }
    $field->category_id = $request['category_id'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/before-after-photos');
  }
}
