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
                    <a download href="{{ asset('format/hospitals.xlsx') }}" style="margin-top:28px"
                      class="btn btn-sm btn-primary">Formate</a>
                  </div>
                </div>
              </form>
              <form action="{{ $url }}" class="needs-validation" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-4 col-sm-12 mb-3">
                    <x-SelectField name="parent_hospital_id" id="parent_hospital_id" label="Select Head Hospital"
                      :ft="$ft" :sd="$sd" :list="$headHospitals" showv="hospital_name"
                      savev="id"></x-SelectField>
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Hospital Name</label>
                      <input name="hospital_name" type="text" class="form-control" placeholder="Hospital Name"
                        value="{{ $ft == 'edit' ? $sd->hospital_name : old('hospital_name') }}" required>
                      <span class="text-danger">
                        @error('hospital_name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Address</label>
                      <input name="address" type="text" class="form-control" placeholder="Address"
                        value="{{ $ft == 'edit' ? $sd->address : old('address') }}">
                      <span class="text-danger">
                        @error('address')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>City</label>
                      <input name="city" type="text" class="form-control" placeholder="City"
                        value="{{ $ft == 'edit' ? $sd->city : old('city') }}" required>
                      <span class="text-danger">
                        @error('city')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>State</label>
                      <input name="state" type="text" class="form-control" placeholder="State"
                        value="{{ $ft == 'edit' ? $sd->state : old('state') }}" required>
                      <span class="text-danger">
                        @error('state')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Country</label>
                      <select name="country" id="country" class="form-control">
                        <option value="">Select</option>
                        @foreach ($countries as $row)
                          <option value="{{ $row->name }}"
                            {{ $ft == 'edit' && $sd->country == $row->name ? 'selected' : '' }}>{{ $row->name }}
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
                    <div class="form-group">
                      <label>Pincode</label>
                      <input name="pincode" type="text" class="form-control" placeholder="Pincode"
                        value="{{ $ft == 'edit' ? $sd->pincode : old('pincode') }}">
                      <span class="text-danger">
                        @error('pincode')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField name="established_in" id="established_in" type="number" label="Established In"
                      :ft="$ft" :sd="$sd" required="required"></x-InputField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField name="number_of_bed" id="number_of_bed" type="number" label="Number of Beds"
                      :ft="$ft" :sd="$sd" required="required"></x-InputField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SelectField name="hospital_type_id" id="hospital_type_id" label="Select Hospital type"
                      :ft="$ft" :sd="$sd" :list="$types" showv="hospital_type"
                      savev="id"></x-SelectField>
                  </div>

                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <x-InputField name="thumbnail" id="thumbnail" type="file" label="Upload Thumbnail"
                        :ft="$ft" :sd="$sd"></x-InputField>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Logo</label>
                      <input name="logo" id="logo" type="file" class="form-control" placeholder="Logo"
                        value="{{ $ft == 'edit' ? $sd->logo : old('logo') }}">
                      <span class="text-danger">
                        @error('logo')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Banner</label>
                      <input name="banner" id="banner" type="file" class="form-control" placeholder="Banner"
                        value="{{ $ft == 'edit' ? $sd->banner : old('banner') }}">
                      <span class="text-danger">
                        @error('banner')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Shortnote</label>
                      <textarea name="shortnote" id="shortnote" type="text" class="form-control" placeholder="Shortnote">{{ $ft == 'edit' ? $sd->shortnote : old('shortnote') }}</textarea>
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
                  <div class="col-md-12 col-sm-12 mb-3 hide-this">
                    <div class="form-group">
                      <label>Facilities</label>
                      <textarea name="facilities" id="facilities" type="text" class="form-control" placeholder="Facilities">{{ $ft == 'edit' ? $sd->facilities : old('facilities') }}</textarea>
                      <span class="text-danger">
                        @error('facilities')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                </div>
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
              <table id="datatable" class="table table-bordered dt-responsiv nowra w-100">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Head Hospital</th>
                    <th>Address</th>
                    <th>Thumbnail</th>
                    <th>Logo</th>
                    <th>Banner</th>
                    <th>Other Info</th>
                    <th>Status</th>
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
                      <td>
                        {{ $row->hospital_name }} <br>
                        Estb. : {{ $row->established_in }} <br>
                        No of Bed : {{ $row->number_of_bed }} <br>
                        Type : {{ $row->getType->hospital_type ?? 'N/A' }} <br>
                      </td>
                      <td>{{ $row->headHospital->hospital_name ?? 'N/A' }}</td>
                      <td>
                        {{ $row->address }} <br>
                        {{ $row->city }} <br>
                        {{ $row->state }} <br>
                        {{ $row->pincode }} <br>
                        {{ $row->country }} <br>
                      </td>
                      <td>
                        <img src="{{ hospitalPic($row->thumbnail) }}" alt="" height="40" width="40">
                      </td>
                      <td>
                        @if ($row->logo_path != null)
                          <img src="{{ asset($row->logo_path) }}" alt="" height="80" width="80">
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        @if ($row->banner_path != null)
                          <img src="{{ asset($row->banner_path) }}" alt="" height="80" width="80">
                        @else
                          N/A
                        @endif
                      </td>
                      <td>
                        @if ($row->shortnote != null)
                          <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#shortnote{{ $row->id }}">Shortnote</button>
                          <div class="modal fade" id="shortnote{{ $row->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="shortnoteModalScrollableTitle{{ $row->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="shortnoteModalScrollableTitle{{ $row->id }}">
                                    Description
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  {!! $row->shortnote !!}
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      </td>
                      <td id="statustd{{ $row->id }}">
                        <span id="asts{{ $row->id }}"
                          class="badge bg-success {{ $row->status == 1 ? '' : 'hide-this' }}"
                          onclick="changeStatus('{{ $row->id }}','0')">Active</span>
                        <span id="ists{{ $row->id }}"
                          class="badge bg-danger {{ $row->status == 0 ? '' : 'hide-this' }}"
                          onclick="changeStatus('{{ $row->id }}','1')">Inactive</span>
                      </td>
                      <td>
                        <a target="_blank" title="Profile" href="{{ aurl('hospital/profile/' . $row->id) }}"
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function changeStatus(id, val) {
      //alert(id);
      var tbl = 'hospitals';
      $.ajax({
        url: "{{ url('common/change-status') }}",
        method: "GET",
        data: {
          id: id,
          tbl: tbl,
          val: val
        },
        success: function(data) {
          if (data == '1') {
            //alert('status changed of ' + id + ' to ' + val);
            if (val == '1') {
              $('#asts' + id).toggle();
              $('#ists' + id).toggle();
            }
            if (val == '0') {
              $('#asts' + id).toggle();
              $('#ists' + id).toggle();
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


    CKEDITOR.replace("shortnot");
    CKEDITOR.replace("description");
    CKEDITOR.replace("facilities");
  </script>
@endsection
