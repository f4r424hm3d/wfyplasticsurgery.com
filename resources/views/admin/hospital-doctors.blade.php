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
            {{ $page_title }} <span class="text-danger">[ {{ $hospital->hospital_name
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
    @include('admin.hospital-profile-header')
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
            <form id="dataForm" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <input type="hidden" name="hospital_id" id="hospital_id" value="{{ $hospital->id }}">
                {{-- <div class="col-md-4 col-sm-12 mb-3">
                  <x-SelectField label="Select Hospital" name="hospital_id" id="hospital_id" :ft="$ft" :sd="$sd"
                    :list="$hospitals" showv="hospital_name" savev="id" required="required"></x-SelectField>
                  <span id="hospital_id-err" class="text-danger errSpan"></span>
                </div> --}}
                <div class="col-md-4 col-sm-12 mb-3">
                  <x-MultipleSelectField label="Select Doctor" name="doctor_id" id="doctor_id" :ft="$ft" :sd="$sd"
                    :list="$doctors" showv="name" savev="id" :list="$doctors"></x-MultipleSelectField>
                  <span id="doctor_id-err" class="text-danger errSpan"></span>
                </div>
              </div>
              @if ($ft == 'add')
              <button type="reset" class="btn btn-sm btn-warning  mr-1"><i class="ti-trash"></i> Reset</button>
              @endif
              @if ($ft == 'edit')
              <a href="{{ aurl($page_route.'/'.$hospital->id) }}" class="btn btn-sm btn-info "><i class="ti-trash"></i>
                Cancel</a>
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
  function clearFilter(){
    var h = 'Success';
    var msg = 'Filter cleared';
    var type = 'success';
    showToastr(h, msg, type);
    getData();
  }
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

    $('#filterForm').on('submit', function(event) {
      event.preventDefault();
      $("#filterSubmitBtn").text('Filtering...');
      setTimeout(() => {
        $(".errSpan").text('');
        var hospital_id = $("#f_hospital_id").val();
        //alert(hospital_id);
        getData('1',hospital_id);
        $("#filterSubmitBtn").text('Submit');
      },1000);
    });
  });

  function printErrorMsg (msg) {
    // $(".print-error-msg").find("ul").html('');
    // $(".print-error-msg").css('display','block');
    // $.each( msg, function( key, value ) {
    //   $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    // });
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
    var hospital_id = '{{ $hospital->id }}';
    //alert(page+hospital_id);
    return new Promise(function(resolve,reject) {
      //$("#migrateBtn").text('Migrating...');
      setTimeout(() => {
        $.ajax({
        url: "{{ aurl($page_route.'/get-data') }}",
        method: "GET",
        data: {
          page: page,
          hospital_id: hospital_id,
        },
        success: function(data) {
          $("#trdata").html(data);
        }
      }).fail(err => {
          // $("#migrateBtn").attr('class','btn btn-danger');
          // $("#migrateBtn").text('Migration Failed');
        });
      });
    });
  }

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