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
                    <a download href="{{ asset('format/doctors.xlsx') }}" style="margin-top:28px"
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
                      <label>Doctor Name</label>
                      <input name="name" type="text" class="form-control" placeholder="Doctor Name"
                        value="{{ $ft == 'edit' ? $sd->name : old('name') }}">
                      <span class="text-danger">
                        @error('name')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Qualification</label>
                      <input name="qualification" type="text" class="form-control" placeholder="Qualification"
                        value="{{ $ft == 'edit' ? $sd->qualification : old('qualification') }}">
                      <span class="text-danger">
                        @error('qualification')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-SelectField label="Specialization" name="specialization_id" id="specialization_id"
                      :ft="$ft" :sd="$sd" :list="$specializations" showv="specialization_name" savev="id">
                    </x-SelectField>
                  </div>

                  <div class="col-md-3 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Designation</label>
                      <input name="designation" type="text" class="form-control" placeholder="Designation"
                        value="{{ $ft == 'edit' ? $sd->designation : old('designation') }}">
                      <span class="text-danger">
                        @error('designation')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
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
                      <label>City</label>
                      <input name="city" type="text" class="form-control" placeholder="City"
                        value="{{ $ft == 'edit' ? $sd->city : old('city') }}">
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
                        value="{{ $ft == 'edit' ? $sd->state : old('state') }}">
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
                    <x-InputField label="Experience" type="text" name="experience" id="experience"
                      :ft="$ft" :sd="$sd">
                    </x-InputField>
                  </div>
                  <div class="col-md-3 col-sm-12 mb-3">
                    <x-InputField label="Upload Photo" type="file" name="photo" id="photo" :ft="$ft"
                      :sd="$sd">
                    </x-InputField>
                  </div>
                  <div class="col-md-12 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Overview</label>
                      <textarea name="overview" id="overview" type="text" class="form-control" placeholder="Overview">{{ $ft == 'edit' ? $sd->overview : old('overview') }}</textarea>
                      <span class="text-danger">
                        @error('overview')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div>
                  {{-- <div class="col-md-12 col-sm-12 mb-3">
                    <div class="form-group">
                      <label>Experience</label>
                      <textarea name="experience" id="experience" type="text" class="form-control" placeholder="Experience">{{ $ft == 'edit' ? $sd->experience : old('experience') }}</textarea>
                      <span class="text-danger">
                        @error('experience')
                          {{ $message }}
                        @enderror
                      </span>
                    </div>
                  </div> --}}
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
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Specialization</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Location</th>
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
                        @if ($row->photo_path != '')
                          <img src="{{ doctorPic($row->photo_path) }}" alt="{{ $row->name }}" height="40"
                            width="40">
                        @else
                          N/A
                        @endif
                      </td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->qualification }}</td>
                      <td>{{ $row->getSpc->specialization_name ?? '' }}</td>
                      <td>{{ $row->getDepartment->department_name }}</td>
                      <td>{{ $row->designation }}</td>
                      <td>
                        {{ $row->city }} <br>
                        {{ $row->state }} <br>
                        {{ $row->country }}
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
                        <a target="_blank" title="Profile" href="{{ aurl('doctor/profile/' . $row->id) }}"
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
    CKEDITOR.replace("overview");
    //CKEDITOR.replace("experience");

    function changeStatus(id, val) {
      //alert(id);
      var tbl = 'doctors';
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
  </script>
@endsection
