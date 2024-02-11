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
                    <a download href="{{ asset('format/procedures.xlsx') }}" style="margin-top:28px"
                      class="btn btn-sm btn-primary">Formate</a>
                  </div>
                </div>
              </form>
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Department</label>
                      <select name="department_id" id="department_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($departments as $row)
                          <option value="{{ $row->id }}"
                            {{ $ft == 'edit' && $sd->department_id == $row->id ? 'selected' : '' }}>
                            {{ $row->department_name }}</option>
                        @endforeach
                      </select>
                      <span class="text-danger">
                        @error('department_id')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Procedure Name</label>
                      <input name="procedure_name" type="text" class="form-control" placeholder="Procedure Name"
                        value="{{ $ft == 'edit' ? $sd->procedure_name : old('procedure_name') }}">
                      <span class="text-danger">
                        @error('procedure_name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Shortnote</label>
                      <input name="shortnote" type="text" class="form-control" placeholder="Shortnote"
                        value="{{ $ft == 'edit' ? $sd->shortnote : old('shortnote') }}">
                      <span class="text-danger">
                        @error('shortnote')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3 hide-this">
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
                  <div class="col-md-12 col-sm-12 mb-3">
                    <x-TextareaField label="Enter introduction" name="introduction" id="introduction" :ft="$ft"
                      :sd="$sd">
                    </x-TextareaField>
                    <span id="introduction-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3">
                    <x-TextareaField label="Enter treatment_cost" name="treatment_cost" id="treatment_cost"
                      :ft="$ft" :sd="$sd">
                    </x-TextareaField>
                    <span id="treatment_cost-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3">
                    <x-TextareaField label="Enter top_cities" name="top_cities" id="top_cities" :ft="$ft"
                      :sd="$sd">
                    </x-TextareaField>
                    <span id="top_cities-err" class="text-danger errSpan"></span>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3">
                    <x-TextareaField label="Enter more_info" name="more_info" id="more_info" :ft="$ft"
                      :sd="$sd">
                    </x-TextareaField>
                    <span id="more_info-err" class="text-danger errSpan"></span>
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
            <div class="card-header">
              <h4 class="card-title">
                <span style="float:right;">
                  <a href="{{ aurl($page_route . '/export/') }}" class="btn btn-xs btn-success">Export</a>
                </span>
              </h4>
            </div>
            <div class="card-body">
              <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Department</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Introduction</th>
                    <th>treatment cost</th>
                    <th>Top Cities</th>
                    <th>More Info</th>
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
                      <td>{{ $row->getDepartment->department_name }}</td>
                      <td>{{ $row->procedure_name }}</td>
                      <td>{{ $row->shortnote }}</td>
                      <td>
                        @if ($row->introduction != null)
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
                                    introduction
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->introduction !!}
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
                        @if ($row->treatment_cost != null)
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
                                    treatment_cost
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->treatment_cost !!}
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
                        @if ($row->top_cities != null)
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
                                    top_cities
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->top_cities !!}
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
                        @if ($row->more_info != null)
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
                                    more_info
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->more_info !!}
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
                        <a href="{{ url('admin/procedure-faqs/' . $row->id) }}"
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
    CKEDITOR.replace("introduction");
    CKEDITOR.replace("treatment_cost");
    CKEDITOR.replace("top_cities");
    CKEDITOR.replace("more_info");

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
