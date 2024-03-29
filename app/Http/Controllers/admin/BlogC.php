<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogC extends Controller
{
  public function index($id = null)
  {
    $page_no = $_GET['page'] ?? 1;
    $blog_categories = BlogCategory::all();
    $authors = User::author()->get();
    $rows = Blog::get();
    if ($id != null) {
      $sd = Blog::find($id);
      if (!is_null($sd)) {
        $ft = 'edit';
        $url = url('admin/blogs/update/' . $id);
        $title = 'Update';
      } else {
        return redirect('admin/blogs');
      }
    } else {
      $ft = 'add';
      $url = url('admin/blogs/store');
      $title = 'Add New';
      $sd = '';
    }
    $page_title = "Blogs";
    $page_route = "blogs";
    $data = compact('rows', 'sd', 'ft', 'url', 'title', 'page_title', 'page_route', 'page_no', 'blog_categories', 'authors');
    return view('admin.blogs')->with($data);
  }
  public function getData(Request $request)
  {
    $rows = Blog::where('id', '!=', '0');
    $rows = $rows->paginate(10)->withPath('/admin/blogs/');
    $i = 1;
    $output = '<table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
    <thead>
      <tr>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Shortnote</th>
        <th>Description</th>
        <th>Thumnbnail</th>
        <th>SEO</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($rows as $row) {
      $output .= '<tr id="row' . $row->id . '">
      <td>' . $i . '</td>
      <td>' . $row->title . '</td>
      <td>' . $row->category->category_name . '</td>
      <td>' . $row->author->name . '</td>
      <td>';
      if ($row->shortnote != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
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
                            ' . $row->shortnote . '
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
      <td>';
      if ($row->description != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#descModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="descModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="DescModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="DescModalScrollableTitle' . $row->id . '">
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
      <td>';
      if ($row->thumbnail_path != null) {
        $output .= '<img src="' . asset($row->thumbnail_path) . '" alt="" height="80" width="80">';
      } else {
        $output .= 'N/A';
      }
      $output .= '</td>
      <td>';
      if ($row->meta_title != null) {
        $output .= '<button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                      data-bs-toggle="modal" data-bs-target="#SeoModalScrollable' . $row->id . '">View</button>
                    <div class="modal fade" id="SeoModalScrollable' . $row->id . '" tabindex="-1" role="dialog"
                      aria-labelledby="SeoModalScrollableTitle' . $row->id . '" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="SeoModalScrollableTitle' . $row->id . '">
                              SEO
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ' . $row->meta_title . '<br>
                            ' . $row->meta_keyword . ' <br>
                            ' . $row->meta_description . ' <br>
                            ' . $row->page_content . ' <br>
                            ' . $row->seo_rating . '
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
        <a href="' . url("admin/blogs/update/" . $row->id) . '"
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
      'title' => 'required|unique:blogs,title',
      'category_id' => 'required',
      'author_id' => 'required',
      'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'error' => $validator->errors(),
      ]);
    }

    $field = new Blog;
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/blogs/', $file_name);
      if ($move) {
        $field->thumbnail_name = $file_name;
        $field->thumbnail_path = 'uploads/blogs/' . $file_name;
      }
    }
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->category_id = $request['category_id'];
    $field->author_id = $request['author_id'];
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    return response()->json(['success' => 'Record hase been added succesfully.']);
  }
  public function delete($id)
  {
    //echo $id;
    echo $result = Blog::find($id)->delete();
  }
  public function update($id, Request $request)
  {
    $request->validate(
      [
        'title' => 'required|unique:blogs,title,' . $id,
        'category_id' => 'required',
        'author_id' => 'required',
        'thumbnail' => 'nullable|max:5000|mimes:jpg,jpeg,png,gif',
      ]
    );
    $field = Blog::find($id);
    if ($request->hasFile('thumbnail')) {
      $fileOriginalName = $request->file('thumbnail')->getClientOriginalName();
      $fileNameWithoutExtention = pathinfo($fileOriginalName, PATHINFO_FILENAME);
      $file_name_slug = slugify($fileNameWithoutExtention);
      $fileExtention = $request->file('thumbnail')->getClientOriginalExtension();
      $file_name = $file_name_slug . '_' . time() . '.' . $fileExtention;
      $move = $request->file('thumbnail')->move('uploads/blogs/', $file_name);
      if ($move) {
        $field->thumbnail_name = $file_name;
        $field->thumbnail_path = 'uploads/blogs/' . $file_name;
      }
    }
    $field->title = $request['title'];
    $field->slug = slugify($request['title']);
    $field->category_id = $request['category_id'];
    $field->author_id = $request['author_id'];
    $field->shortnote = $request['shortnote'];
    $field->description = $request['description'];
    $field->meta_title = $request['meta_title'];
    $field->meta_keyword = $request['meta_keyword'];
    $field->meta_description = $request['meta_description'];
    $field->page_content = $request['page_content'];
    $field->seo_rating = $request['seo_rating'];
    $field->save();
    session()->flash('smsg', 'Record has been updated successfully.');
    return redirect('admin/blogs');
  }
}
