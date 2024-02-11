@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          @if (session()->has('smsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session()->get('smsg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (session()->has('emsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session()->get('emsg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                {{ $title }} Record
                <span style="float:right;">
                  <button class="btn btn-xs btn-info tglBtn">+</button>
                  <button class="btn btn-xs btn-info tglBtn hide-this">-</button>
                </span>
              </h4>
            </div>
            <div class="card-body {{ $ft == 'edit' ? '' : 'hide-this' }}" id="tblCDiv">
              <form method="post" action="{{ url('admin/' . $page_route . '/import') }}" id="import_csv"
                enctype="multipart/form-data" class="hide-this">
                @csrf
                <div class="row">
                  <div class="form-group col-md-8 mb-3">
                    <label>Select CSV File</label>
                    <input type="file" name="file" id="file" required class="form-control mb-2 mr-sm-2" />
                  </div>
                  <div class="form-group col-md-4 mb-3">
                    <label>&nbsp;&nbsp;</label>
                    <button style="margin-top:28px" type="submit" name="import_csv" class="btn btn-sm btn-info"
                      id="import_csv_btn">Import</button>
                    <a download href="{{ asset('format/hospitals.xlsx') }}" style="margin-top:28px"
                      class="btn btn-sm btn-primary">Formate</a>
                  </div>
                </div>
              </form>
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SelectField type="text" label="Select Author" name="author_id" id="author_id" :ft="$ft"
                      :sd="$sd" :list="$authors" savev="id" showv="name">
                    </x-SelectField>
                    <span id="author_id-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SelectField type="text" label="Select Category" name="category_id" id="category_id"
                      :ft="$ft" :sd="$sd" :list="$treatment_categories" savev="id" showv="category_name">
                    </x-SelectField>
                    <span id="category_id-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>State</label>
                      <select name="sub_category_id" id="sub_category_id" class="form-control js-example-basic-singl">
                        <option value="">Select Sub Category</option>
                        @foreach ($treatment_sub_categories as $row)
                          <option value="{{ $row->id }}"
                            {{ $ft == 'edit' && $sd->sub_category_id == $row->id ? 'selected' : '' }}>
                            {{ $row->sub_category_name }}
                          </option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('country')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField type="text" label="Enter Treatment" name="treatment_name" id="treatment_name"
                      :ft="$ft" :sd="$sd">
                    </x-InputField>
                    <span id="treatment_name-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <x-InputField type="file" label="Upload Thumbnail" name="thumbnail" id="thumbnail"
                      :ft="$ft" :sd="$sd">
                    </x-InputField>
                    <span id="thumbnail-err" class="text-danger errSpan"></span>
                  </div>
                </div>
                <!--  SEO INPUT FILED COMPONENT  -->
                <x-SeoField :ft="$ft" :sd="$sd"></x-SeoField>
                <!--  SEO INPUT FILED COMPONENT END  -->
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-info" type="reset">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body" id="tblCDiv">
              <form class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
                <div class="row">
                  <div class="col-md-6 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Search Treatment</label>
                      <input name="search" id="search" type="text" class="form-control"
                        placeholder="Search Treatment" value="{{ $_GET['search'] ?? '' }}" required>
                      <span class="text-danger" id="search-err">
                        @error('search')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <button class="btn btn-sm btn-primary setBtn" type="submit">Search</button>
                    <a href="{{ aurl('hospitals') }}" class="btn btn-sm btn-warning setBtn"><i class="ti-trash"></i>
                      Reset</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info setBtn" id="advSearchBtn">
                      <i class="ti-trash"></i> Advance Search
                    </a>
                  </div>
                </div>
              </form>
              <div class="{{ $filterApplied == true ? '' : 'hide-this' }}" id="advSearchForm">
                <hr>
                <form class="needs-validation" method="get" enctype="multipart/form-data" novalidate>
                  <div class="row">
                    <div class="col-md-3 col-sm-12 mb-3">
                      <div class="form-group">
                        <label>Category</label>
                        <select name="category" id="f_category" class="form-control js-example-basic-singl">
                          <option value="">Select</option>
                          @foreach ($treatment_categories as $row)
                            <option value="{{ $row->id }}"
                              {{ isset($_GET['category']) && $_GET['category'] == $row->id ? 'selected' : '' }}>
                              {{ $row->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <div class="form-group">
                        <label>Sub Category</label>
                        <select name="sub_category" id="f_sub_category" class="form-control js-example-basic-singl">
                          <option value="">Select</option>
                          @foreach ($treatment_categories as $row)
                            <option value="{{ $row->id }}"
                              {{ isset($_GET['sub_category']) && $_GET['sub_category'] == $row->id ? 'selected' : '' }}>
                              {{ $row->sub_category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 mb-3">
                      <button class="btn btn-sm btn-primary setBtn advSearchBtn" type="submit">Search</button>
                      <a href="{{ aurl('hospitals') }}" class="btn btn-sm btn-warning setBtn"><i class="ti-trash"></i>
                        Reset</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div style="float:left;">
                <label>
                  Show
                  <select name="limit_per_page" id="limit_per_page" class="">
                    @foreach ($lpp as $lpp)
                      <option value="{{ $lpp }}" {{ $limit_per_page == $lpp ? 'selected' : '' }}>
                        {{ $lpp }}</option>
                    @endforeach
                  </select>
                  entries
                </label>
                <select name="order_by" id="order_by">
                  @foreach ($orderColumns as $key => $value)
                    <option value="{{ $value }}" <?php echo $order_by == $value ? 'selected' : ''; ?>>{{ $key }}</option>
                  @endforeach
                </select>
                <select name="order_in" id="order_in">
                  <option value="ASC" {{ $order_in == 'ASC' ? 'selected' : '' }}>ASC</option>
                  <option value="DESC" {{ $order_in == 'DESC' ? 'selected' : '' }}>DESC</option>
                </select>
              </div>
              <div style="float:right;">
                <a href="{{ aurl($page_route . '/export/') }}" class="btn btn-xs btn-success">Export</a>
              </div>
            </div>
            <div class="card-body">
              <table id="datatabl" class="table table-bordered dt-responsiv nowra w-100">
                <thead>
                  <tr>
                    <th>
                      <input type="checkbox" name="check_all" id="check_all" value=""
                        class="check-all-chkbox filled-in chk-col-primary" />
                    </th>
                    <th>Sr. No.</th>
                    <th><b>Treatment Id</b></th>
                    <th>Treatment Name</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Thumbnail</th>
                    <th>SEO</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rows as $row)
                    <tr id="row{{ $row->id }}">
                      <td>
                        <input type="checkbox" name="selected_id[]" id="chk{{ $row->id }}"
                          class="checkbox check-chkbox filled-in chk-col-info" value="{{ $row->id }}" />
                        <label for="chk{{ $row->id }}">&nbsp;</label>
                      </td>
                      <td>{{ $i }}</td>
                      <td>{{ $row->id }}</td>
                      <td>
                        {{ $row->treatment_name }}
                      </td>
                      <td>
                        Category : <b>{{ $row->category->category_name ?? 'N/A' }}</b> <br>
                        Sub Category : <b>{{ $row->subCategory->sub_category_name ?? 'N/A' }}</b>
                      </td>
                      <td>{{ $row->author->name ?? 'N/A' }}</td>
                      <td>
                        <img src="{{ asset($row->image_path) }}" alt="" height="40" width="40">
                      </td>
                      <td>
                        @if ($row->meta_title != null)
                          <button type="button" class="btn btn-xs btn-primary waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#shortnote{{ $row->id }}">View</button>
                          <div class="modal fade" id="shortnote{{ $row->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="shortnoteModalScrollableTitle{{ $row->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="shortnoteModalScrollableTitle{{ $row->id }}">
                                    SEO
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <h5>Title</h5>
                                  <p>{!! $row->meta_title !!}</p>
                                  <h5>keyword</h5>
                                  <p>{!! $row->meta_keyword !!}</p>
                                  <h5>Description</h5>
                                  <p>{!! $row->meta_description !!}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      </td>
                      <td>
                        <a target="_blank" title="Profile" href="{{ aurl('treatment/profile/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-success">
                          <i class="fa fa-file" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void()" onclick="DeleteAjax('{{ $row->id }}')"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('admin/' . $page_route . '/update/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
              {!! $rows->links('pagination::bootstrap-5') !!}
            </div>
            <hr>
            <div class="card-body">
              <div class="hide-this w100 float-left sbmtBtndiv" id="submitBtn">
                {{-- <a onclick="bulkDelete()" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outlin btn-primary" value="delete" title="Click to delete">Delete</a> --}}

                <a onclick="bulkUpdate('status','1')" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outline btn-success" title="Active">
                  Active
                </a>

                <a onclick="bulkUpdate('status','0')" href="javascript:void()" data-toggle="tooltip"
                  class="btn btn-sm btn-outline btn-danger" title="Inactive">
                  Inactive
                </a>
                </span>
              </div>
            </div>
          </div>
          <div class="card hide-this">
            <div class="card-body" id="tblCDiv">
              <form method="post" action="{{ url('admin/' . $page_route . '/bulk-update-import') }}" id="import_csv"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="form-group col-md-4 mb-3">
                    <label>Select Excel File</label>
                    <input type="file" name="file" id="file" required class="form-control mb-2 mr-sm-2" />
                  </div>
                  <div class="form-group col-md-4 mb-3">
                    <label>&nbsp;&nbsp;</label>
                    <button style="margin-top:28px" type="submit" name="import_csv" class="btn btn-sm btn-info"
                      id="import_csv_btn">Import</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('.advSearchBtn').click(function() {
        // Remove empty fields before form submission
        $('select').each(function() {
          if ($(this).val() == '') {
            $(this).prop('disabled', true);
          }
        });
      });
    });

    // ORDER BY, LIMIT PER PAGE
    $(document).ready(function() {
      $('#limit_per_page').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'limit_per_page' query parameter
        searchParams.set('limit_per_page', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#order_by').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'order_by' query parameter
        searchParams.set('order_by', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#order_in').change(function() {
        var selectedValue = $(this).val(); // Get the selected value
        var currentUrl = new URL(window.location.href); // Get the current URL
        var searchParams = currentUrl.searchParams;
        // Update or set the 'order_in' query parameter
        searchParams.set('order_in', selectedValue);
        // Update the URL by replacing the existing query string
        currentUrl.search = searchParams.toString();
        // Reload the page with the updated URL
        window.location.href = currentUrl.href;
      });
      $('#advSearchBtn').click(function() {
        $('#advSearchForm').toggle();
      });
    });

    // CHECK ALL CHECKBOX
    $(document).ready(function() {
      $('#check_all').on('click', function() {
        if (this.checked) {
          $('.checkbox').each(function() {
            this.checked = true;
            $(this).closest('tr').addClass('selectedRow');
          });
        } else {
          $('.checkbox').each(function() {
            this.checked = false;
            $(this).closest('tr').removeClass('selectedRow');
          });
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length == $('.checkbox').length) {
          $('#check_all').prop('checked', true);
        } else {
          $('#check_all').prop('checked', false);
        }
      });
      $('.checkbox').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('#check_all').on('click', function() {
        if ($('.checkbox:checked').length > 0) {
          $('#submitBtn').show();
        } else {
          $('#submitBtn').hide();
        }
      });
      $('.checkbox').click(function() {
        if ($(this).is(':checked')) {
          $(this).closest('tr').addClass('selectedRow');
        } else {
          $(this).closest('tr').removeClass('selectedRow');
        }
      });
    });

    // UPDATE BULK FIELD (STATUS)
    function bulkUpdate(col, val) {
      var tbl = 'treatments';
      var users_arr = [];
      $(".checkbox:checked").each(function() {
        var userid = $(this).val();
        users_arr.push(userid);
      });
      $.ajax({
        url: "{{ url('common/update-bulk-field') }}",
        type: 'get',
        data: {
          ids: users_arr,
          val: val,
          col: col,
          tbl: tbl
        },
        success: function(response) {
          //alert(response.affected_rows);
          if (response.affected_rows > '0') {
            var h = 'Success';
            var msg = response.affected_rows + ' rows updated successfully';
            var type = 'success';
          } else {
            var h = 'Danger';
            var msg = 'Not any record updated';
            var type = 'danger';
          }
          showToastr(h, msg, type);
          if (col == 'status' && val == 1) {
            $('tr.selectedRow span.active_status').show();
            $('tr.selectedRow span.inactive_status').hide();
          } else if (col == 'status' && val == 0) {
            $('tr.selectedRow span.active_status').hide();
            $('tr.selectedRow span.inactive_status').show();
          }
        }
      });

    }

    // DELETE BULK
    function bulkDelete() {
      var deleteConfirm = confirm("Are you sure?");
      if (deleteConfirm == true) {
        var tbl = 'treatments';
        var users_arr = [];
        $(".checkbox:checked").each(function() {
          var userid = $(this).val();
          users_arr.push(userid);
        });
        $.ajax({
          url: "{{ url('common/bulk-delete') }}",
          type: 'get',
          data: {
            ids: users_arr,
            tbl: tbl
          },
          success: function(response) {
            location.reload(true);
          }
        });
      }
    }

    $(document).ready(function() {
      $('#category_id').on('change', function(event) {
        var category_id = $('#category_id').val();
        //alert(category_id);
        $.ajax({
          url: "{{ aurl('get-sub-category-by-category') }}",
          method: "GET",
          data: {
            category_id: category_id
          },
          success: function(result) {
            //alert(result);
            $('#sub_category_id').html(result);
          }
        })
      });
      $('#f_category').on('change', function(event) {
        var category_id = $('#f_category').val();
        //alert(category_id);
        $.ajax({
          url: "{{ aurl('get-sub-category-by-category') }}",
          method: "GET",
          data: {
            category_id: category_id
          },
          success: function(result) {
            //alert(result);
            $('#f_sub_category').html(result);
          }
        })
      });
    });


    function changeStatus(id, col, val) {
      //alert(id);
      var tbl = 'treatments';
      $.ajax({
        url: "{{ url('common/update-field') }}",
        method: "GET",
        data: {
          id: id,
          tbl: tbl,
          col: col,
          val: val
        },
        success: function(data) {
          if (data == '1') {
            //alert('status changed of ' + id + ' to ' + val);
            if (val == '1') {
              $('#a' + col + id).toggle();
              $('#i' + col + id).toggle();
            }
            if (val == '0') {
              $('#a' + col + id).toggle();
              $('#i' + col + id).toggle();
            }
          }
        }
      });
    }

    function DeleteAjax(id) {
      //alert(id);
      var cd = confirm("Are you sure ?");
      if (cd == true) {
        $.ajax({
          url: "{{ url('admin/' . $page_route . '/delete') }}" + "/" + id,
          success: function(data) {
            if (data == '1') {
              var h = 'Success';
              var msg = 'Record deleted successfully';
              var type = 'success';
              $('#row' + id).remove();
              $('#toastMsg').text(msg);
              $('#liveToast').show();
              showToastr(h, msg, type);
            }
          }
        });
      }
    }
  </script>
@endsection
