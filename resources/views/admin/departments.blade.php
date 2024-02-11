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
            <div class="card-body" id="tblCDiv">
              <form method="post" action="{{ url('admin/' . $page_route . '/import') }}" id="import_csv"
                enctype="multipart/form-data">
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
                    <a download href="{{ asset('format/departments.xlsx') }}" style="margin-top:28px"
                      class="btn btn-sm btn-primary">Formate</a>
                  </div>
                </div>
              </form>
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Enter Name</label>
                      <input name="department_name" type="text" class="form-control" placeholder="Enter Name"
                        value="{{ $ft == 'edit' ? $sd->department_name : old('department_name') }}">
                      <span class="text-danger">
                        @error('department_name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-8 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>About Department</label>
                      <input name="about" type="text" class="form-control" placeholder="About Department"
                        value="{{ $ft == 'edit' ? $sd->about : old('about') }}">
                      <span class="text-danger">
                        @error('about')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" type="text" class="form-control" placeholder="Description">{{ $ft == 'edit' ? $sd->description : old('description') }}</textarea>
                      <span class="text-danger">
                        @error('description')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <x-SelectField type="text" label="Select Author" name="author_id" id="author_id" :ft="$ft"
                      :sd="$sd" :list="$authors" savev="id" showv="author_name">
                    </x-SelectField>
                    <span id="author_id-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Upload SVG Icon</label>
                      <input name="svg_icon" type="file" class="form-control">
                      <span class="text-danger">
                        @error('svg_icon')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
                <hr>
                <!--  SEO INPUT FILED COMPONENT  -->
                <x-SeoField :ft="$ft" :sd="$sd"></x-SeoField>
                <!--  SEO INPUT FILED COMPONENT END  -->
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-info" type="reset">Reset</button>
              </form>
            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatable" class="table table-bordered dt-responsiv nowrap w-100">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Id</th>
                    <th>Icon</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>SEO</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach ($rows as $row)
                    <tr id="row{{ $row->id }}">
                      <td>{{ $i }}</td>
                      <td>{{ $row->id }}</td>
                      <td>
                        @if ($row->svg_icon != null)
                          <img src="{{ asset($row->svg_icon) }}" alt="icon">
                        @else
                          N/A
                        @endif
                      </td>
                      <td>{{ $row->department_name }}</td>
                      <td>
                        @if ($row->about != null)
                          <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#ABOUTModalScrollable{{ $row->id }}">View</button>
                          <div class="modal fade" id="ABOUTModalScrollable{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="aboutModalScrollableTitle{{ $row->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="aboutModalScrollableTitle{{ $row->id }}">
                                    About
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->about !!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          Null
                        @endif
                      </td>
                      <td>
                        @if ($row->description != null)
                          <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModalScrollable{{ $row->id }}">View</button>
                          <div class="modal fade" id="exampleModalScrollable{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalScrollableTitle{{ $row->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalScrollableTitle{{ $row->id }}">
                                    Description
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->description !!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          Null
                        @endif
                      </td>
                      <td>
                        {{ $row->author_id != null ? $row->getAuthor->author_name : 'N/A' }}
                      </td>
                      <td>
                        @if ($row->meta_title != null)
                          <button type="button" class="btn btn-xs btn-outline-info waves-effect waves-light"
                            data-bs-toggle="modal"
                            data-bs-target="#SeoModalScrollable{{ $row->id }}">View</button>
                          <div class="modal fade" id="SeoModalScrollable{{ $row->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="SeoModalScrollableTitle{{ $row->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="SeoModalScrollableTitle{{ $row->id }}">
                                    SEO
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {{ $row->meta_title }}<br>
                                  {{ $row->meta_keyword }} <br>
                                  {{ $row->meta_description }} <br>
                                  {{ $row->page_content }} <br>
                                  {{ $row->seo_rating }}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        <a href="javascript:void()" onclick="DeleteAjax('{{ $row->id }}')"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-danger">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('admin/' . $page_route . '/update/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-info">
                          <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="{{ url('admin/department-faqs/' . $row->id) }}"
                          class="waves-effect waves-light btn btn-xs btn-outline btn-warning">
                          FAQ
                        </a>
                      </td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    CKEDITOR.replace("description");

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
