<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentCategory;
use App\Models\TreatmentSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TreatmentC extends Controller
{
  public function index(Request $request, $id = null)
  {
    $limit_per_page = $request->limit_per_page ?? 10;
    $order_by = $request->order_by ?? 'treatment_name';
    $order_in = $request->order_in ?? 'ASC';
    $filterApplied = false;
    $rows = Treatment::orderBy($order_by, $order_in);
    if ($request->has('search') && $request->search != '') {
      $rows = $rows->where('treatment_name', 'like', '%' . $request->search . '%');
    } else {
      if ($request->has('category') && $request->category != '') {
        $rows = $rows->Where('category_id', $request->category);
        $filterApplied = true;
      }
      if ($request->has('sub_category') && $request->sub_category != '') {
        $rows = $rows->Where('sub_category_id', $request->sub_category);
        $filterApplied = true;
      }
    }
    $rows = $rows->paginate($limit_per_page)->withQueryString();

    $cp = $rows->currentPage();
    $pp = $rows->perPage();
    $i = ($cp - 1) * $pp + 1;

    $lpp = ['10', '20', '50'];
    $orderColumns = ['Name' => 'treatment_name', 'Date' => 'created_at'];

    $treatment_categories = TreatmentCategory::all();
    $treatment_sub_categories = TreatmentSubCategory::all();
    $authors = User::author()->get();

    if ($id != null) {
      $sd = Treatment::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/treatments/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/treatments');
      }
    } else {
      $ft = 'add';
      $url = url('admin/treatments/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Treatments";
    $page_route = "treatments";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'treatment_categories', 'treatment_sub_categories', 'authors', 'i', 'filterApplied', 'limit_per_page', 'order_by', 'order_in', 'lpp', 'orderColumns');
    return view('admin.treatments')->with($data);
  }
  public function store(Request $request)
  {
    $request->validate(
      [
        'author_id' => 'required',
        'category_id' => 'required',
        'treatment_name' => 'required',
        'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp'
      ]
    );
    $field = new Treatment;
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/treatment/', $file_name);
      if ($move) {
        $field->image_name = $file_name;
        $field->image_path = 'uploads/treatment/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->author_id = $request['author_id'];
    $field->category_id = $request['category_id'];
    $field->sub_category_id = $request['sub_category_id'];
    $field->treatment_name = $request['treatment_name'];
    $field->treatment_slug = slugify($request['treatment_name']);
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatments');
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'author_id' => 'required',
        'category_id' => 'required',
        'treatment_name' => 'required',
        'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif,webp'
      ]
    );
    $field = Treatment::find($id);
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/treatment/', $file_name);
      if ($move) {
        $field->image_name = $file_name;
        $field->image_path = 'uploads/treatment/' . $file_name;
      } else {
        session()->flash('emsg', 'Some problem occured. File not uploaded.');
      }
    }
    $field->author_id = $request['author_id'];
    $field->category_id = $request['category_id'];
    $field->sub_category_id = $request['sub_category_id'];
    $field->treatment_name = $request['treatment_name'];
    $field->treatment_slug = slugify($request['treatment_name']);
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/treatments');
  }
  public function delete($id)
  {
    echo $result = Treatment::find($id)->delete();
  }

  public function getSubCatByCat(Request $request)
  {
    //echo $id;
    $field = TreatmentSubCategory::where('category_id', $request->category_id)->get();
    $output = '<option value="">Select</option>';
    foreach ($field as $row) {
      $output .= '<option value="' . $row->id . '">' . $row->sub_category_name . '</option>';
    }
    echo $output;
  }

  public function profile($treatment_id)
  {
    $treatment = Treatment::find($treatment_id);
    $page_title = "Treatment Profile";
    $page_route = "treatment/profile/" . $treatment_id;
    $data = compact('treatment', 'page_title', 'page_route');
    return view('admin.treatment-profile')->with($data);
  }
}
