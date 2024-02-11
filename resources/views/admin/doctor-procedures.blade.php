@extends('admin.layouts.main')
@push('title')
<title>{{ $page_title }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">
            {{ $page_title }} <span class="text-danger">[ {{ $doctor->name
              }} ]
          </h4>
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="{{ url('/admin/') }}"><i class="mdi mdi-home-outline"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    @include('admin.doctor-profile-header')
    <div class="row">
      <div class="col-xl-12">
        <!-- NOTIFICATION FIELD START -->
        <x-ResultNotificationField></x-ResultNotificationField>
        <!-- NOTIFICATION FIELD END -->
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
            <form id="dataForm" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->id }}">

                <div class="col-md-4 col-sm-12 mb-3">
                  <x-SelectField label="Select Department" name="department_id" id="department_id" :ft="$ft" :sd="$sd"
                    :list="$departments" showv="department_name" savev="id"></x-SelectField>
                </div>
                <div class="col-md-4 col-sm-12 mb-3">
                  <div class="form-group" id="procedure_id_data">
                    <label>Select Procedures</label>
                    <select name="procedure_id[]" id="procedure_id" class="form-control js-example-basic-multiple"
                      required multiple data-trigge>
                      <option value="">Select</option>
                    </select>
                  </div>
                  <span id="procedure_id-err" class="text-danger errSpan">
                    @error('procedure_id')
                    {{ $message }}
                    @enderror
                  </span>
                </div>
              </div>
              @if ($ft == 'add')
              <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i> Reset</button>
              @endif
              @if ($ft == 'edit')
              <a href="{{ aurl($page_route) }}" class="btn btn-sm btn-info "><i class="ti-trash"></i> Cancel</a>
              @endif
              <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            </form>
          </div>
        </div>
        <!-- end card -->
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" id="trdata">



          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  $(document).ready(function() {
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      getData(page);
    });

    $('#dataForm').on('submit', function(event) {
      event.preventDefault();
      $(".errSpan").text('');
      $.ajax({
        url: "{{ aurl($page_route.'/store-ajax/') }}",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          //alert(data);
          if($.isEmptyObject(data.error)){
            //alert(data.success);
            if(data.hasOwnProperty('success')){
              var h = 'Success';
              var msg = data.success;
              var type = 'success';
              getData();
            }else{
              var h = 'Failed';
              var msg = data.failed;
              var type = 'danger';
            }
            $('#dataForm')[0].reset();
            $('#procedure_id').html("");
          }else{
            //alert(data.error);
            printErrorMsg(data.error);
            var h = 'Failed';
            var msg = 'Some error occured.';
            var type = 'danger';
          }
          showToastr(h, msg, type);
        }
      })
    });

    $('#department_id').on('change', function(event) {
      var department_id = $("#department_id").val();
      //alert(department_id);
      $.ajax({
        url: "{{ aurl('procedures/get-procedures-by-department') }}",
        method: "GET",
        data: {
          department_id: department_id,
        },
        success: function(data) {
          //alert(data);
          $("#procedure_id").html(data);
        }
      });
    });
  });

  function printErrorMsg (msg) {
    $.each( msg, function( key, value ) {
      $("#"+key+"-err").text(value);
    });
  }

  getData();

  function getData(page){
    if(page){
      page = page;
    }else{
      var page = '{{ $page_no }}';
    }
    var doctor_id = '{{ $doctor->id }}';
    return new Promise(function(resolve,reject) {
      //$("#migrateBtn").text('Migrating...');
      setTimeout(() => {
        $.ajax({
        url: "{{ aurl($page_route .'/get-data') }}",
        method: "GET",
        data: {
          page: page,
          doctor_id: doctor_id,
        },
        success: function(data) {
          //alert(data);
          $("#trdata").html(data);
        }
      }).fail(err => {
          // $("#migrateBtn").attr('class','btn btn-danger');
          // $("#migrateBtn").text('Migration Failed');
        });
      });
    });
  }

  function DeleteAjax(id) {
    //alert(id);
    var cd = confirm("Are you sure ?");
    if (cd == true) {
      $.ajax({
        url: "{{ url('admin/'.$page_route.'/delete') }}" + "/" + id,
        success: function(data) {
          if (data == '1') {
            getData();
            var h = 'Success';
            var msg = 'Record deleted successfully';
            var type = 'success';
            //$('#row' + id).remove();
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
