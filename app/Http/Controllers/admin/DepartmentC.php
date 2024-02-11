<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Imports\DepartmentImport;
use App\Models\Author;
use App\Models\Department;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentC extends Controller
{
  public function index($id = null)
  {
    $authors = Author::all();
    $rows = Department::get();
    if ($id != null) {
      $sd = Department::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/departments/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/departments');
      }
    } else {
      $ft = 'add';
      $url = url('admin/departments/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Departments";
    $page_route = "departments";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'authors');
    return view('admin.departments')->with($data);
  }
  public function store(Request $request)
  {
    // printArray($request->all());
    // die;
    $request->validate(
      [
        'department_name' => 'required|unique:departments,department_name',
        'svg_icon' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp,svg',
        'author_id' => 'required',
      ]
    );
    $field = new Department;
    if ($request->hasFile('svg_icon')) {
      $fileOriginalName = $request->file('svg_icon')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('svg_icon')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('svg_icon')->move('uploads/departments/', $file_name);
      if ($move) {
        $field->svg_icon = 'uploads/departments/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->department_name = $request['department_name'];
    $field->department_slug = slugify($request['department_name']);
    $field->about = $request['about'];
    $field->description = $request['description'];
    $field->author_id = $request['author_id'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'New record has been added successfully.');
    return redirect('admin/departments');
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Department::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'department_name' => 'required|unique:departments,department_name,' . $id,
        'svg_icon' => 'nullable|max:1000|mimes:jpg,jpeg,png,gif,webp,svg',
      ]
    );

    $field = Department::find($id);
    if ($request->hasFile('svg_icon')) {
      $fileOriginalName = $request->file('svg_icon')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('svg_icon')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('svg_icon')->move('uploads/departments/', $file_name);
      if ($move) {
        $field->svg_icon = 'uploads/departments/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->department_name = $request['department_name'];
    $field->author_id = $request['author_id'];
    $field->department_slug = slugify($request['department_name']);
    $field->about = $request['about'];
    $field->description = $request['description'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/departments');
  }
  public function Import(Request $request)
  {
    // printArray($data->all());
    // die;
    $request->validate([
      'file' => 'required|mimes:xlsx,csv,xls'
    ]);
    $file = $request->file;
    if ($file) {
      try {
        $result = Excel::import(new DepartmentImport, $file);
        // session()->flash('smsg', 'Data has been imported succesfully.');
        return redirect('admin/departments');
      } catch (\Exception $ex) {
        dd($ex);
      }
    }
  }
}
