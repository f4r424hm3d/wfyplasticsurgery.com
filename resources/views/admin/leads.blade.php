@extends('admin.layouts.main')
@push('title')
  <title>{{ $page_title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
  <div class="page-content">
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $page_title }}</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{ aurl() }}">Home</a></li>
                <li class="breadcrumb-item active">{{ $page_title }}</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12">
          <!-- NOTIFICATION FIELD START -->
          <x-ResultNotificationField></x-ResultNotificationField>
          <!-- NOTIFICATION FIELD END -->
        </div>
      </div>
      <!-- end page title -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <label>
                Show
                <select name="limit_per_page" id="limit_per_page" class="">
                  <option value="10" <?php echo $limit_per_page == '10' ? 'Selected' : ''; ?>>10</option>
                  <option value="20" <?php echo $limit_per_page == '20' ? 'Selected' : ''; ?>>20</option>
                  <option value="50" <?php echo $limit_per_page == '50' ? 'Selected' : ''; ?>>50</option>
                  <option value="100" <?php echo $limit_per_page == '100' ? 'Selected' : ''; ?>>100</option>
                </select>
                entries
              </label>
              <div style="float:right;" class="mb-0">
                <input class="form-control" onkeyup="myNewF()" type="text" id="search" placeholder="Search">
              </div>
            </div>
            <div class="card-body">
              <table id="datatabl" class="table table-bordered dt-responsive  nowrap w-100">
                <thead>
                  <tr>
                    <th><input type="checkbox" name="check_all" id="check_all" value="" /></th>
                    <th>S.No.</th>
                    <th>Date</th>
                    <th>Contact</th>
                    <th>Treatment</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  @endphp
                  @foreach ($rows as $row)
                    <tr id="row{{ $row->id }}">
                      <td><input type="checkbox" name="selected_id[]" class="checkbox" value="{{ $row->id }}" /></td>
                      <td>{{ $i }}</td>
                      <td>{{ getFormattedDate($row->created_at, 'd M Y h:i A') }}</td>
                      <td id="contactTd{{ $row->id }}">
                        <i class="fas fa-user text-danger"></i> : {{ $row->name }} <br>
                        <i class="fas fa-mobile text-danger"></i> : {{ $row->mobile }} <br>
                        <i class="fas fa-mail-bulk text-danger"></i> : {{ $row->email }}
                      </td>
                      <td>
                        {{ $row->treatment_name }}
                      </td>
                    </tr>
                    @php
                      $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>

              {!! $rows->links('pagination::bootstrap-5') !!}
              {{-- <select name="c_pagenum" id="c_pagenum" onchange="myfunction(this.value)">
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>">
                  <?php echo $i; ?>
                </option>
                <?php } ?>
              </select> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#limit_per_page').change(function() {
        var sv = $('#limit_per_page').val();
        if (sv != '') {
          window.open("{{ url(Request::path()) }}" + "?lpp=" + sv, "_SELF");
        }
      });
    });

    function myfunction(id1) {
      if (id1 != '') {
        window.open("{{ aurl('leads/?page=') }}" + id1, "_SELF");
      }
    }

    $("#search").keyup(function() {
      var value = this.value.toLowerCase().trim();
      $("table tr").each(function(index) {
        if (!index) return;
        $(this).find("td").each(function() {
          var id = $(this).text().toLowerCase().trim();
          var not_found = (id.indexOf(value) == -1);
          $(this).closest('tr').toggle(!not_found);
          return not_found;
        });
      });
    });

    function onOffAjax(id, val) {
      //alert(id+' , '+val);
      var tbl = 'tbl_admin';
      var col = 'status';
      if (id != '') {
        $.ajax({
          url: "{{ aurl() }}Admin/onOffAjax",
          method: "POST",
          data: {
            id: id,
            tbl: tbl,
            col: col,
            val: val
          },
          success: function(data) {
            //location.reload(true);
            if (val == 0) {
              $('#hvperon' + id).hide();
              $('#hvperoff' + id).hide();
              $('#hvtempon' + id).hide();
              $('#hvtempoff' + id).show();
            }
            if (val == 1) {
              $('#hvperon' + id).hide();
              $('#hvperoff' + id).hide();
              $('#hvtempon' + id).show();
              $('#hvtempoff' + id).hide();
            }
          }
        });
      }
    }

    function ajaxBulkUpdate2(users_arr, col, val) {
      //alert(users_arr + ' , ' + col + ' , ' + val);
      var deleteConfirm = true;
      if (deleteConfirm == true) {
        var tbl = 'tbl_admin';
        $.ajax({
          url: '<?= aurl() ?>/Admin/ajaxBulkUpdate',
          type: 'post',
          data: {
            ids: users_arr,
            val: val,
            col: col,
            tbl: tbl
          },
          success: function(response) {
            location.reload(true);
          }
        });
      }
    }

    function showFormBtnDiv() {
      var name = $('#name').val();
      var father = $('#father').val();
      var email = $('#email').val();
      var mobile = $('#mobile').val();
      if (name != '' || father != '' || email != '' || mobile != '') {
        $('#formBtnDiv').show();
      } else {
        $('#formBtnDiv').hide();
      }
    }

    function showformtd(id, col) {
      $('#' + col + 'td' + id).hide();
      $('#' + col + 'formtd' + id).show();
    }

    function showtd(id, col) {
      $('#' + col + 'td' + id).show();
      $('#' + col + 'formtd' + id).hide();
    }

    function updateField(id, col) {
      //$("#loaderIcon").show();
      var id = id;
      var val = $('#' + col + 'f' + id).val();
      var tbl = 'tbl_admin';
      if (val != '' || col == 'c_code') {
        $.ajax({
          url: "{{ aurl() }}Common/updateField",
          method: "POST",
          data: {
            id: id,
            col: col,
            val: val,
            tbl: tbl
          },
          success: function(data) {
            $('#' + col + 'td' + id).text(val);
            $('#' + col + 'td' + id).show();
            $('#' + col + 'formtd' + id).hide();
            //location.reload(true);
          }
        });
      }
    }


    $(document).ready(function() {
      $('#limit_per_page').change(function() {
        var limit_per_page = $('#limit_per_page').val();
        $('#loader').show();
        if (limit_per_page != '') {
          $.ajax({
            url: "{{ aurl() }}Admin/setNumber",
            method: "POST",
            data: {
              limit_per_page: limit_per_page
            },
            success: function(data) {
              location.reload(true);
            }
          });
        }
      });
      $('#lead_oc').change(function() {
        var sv = $('#lead_oc').val();
        var sn = 'lead_oc';
        if (sv != '') {
          $.ajax({
            url: "{{ aurl() }}Common/setSession",
            method: "POST",
            data: {
              sn: sn,
              sv: sv,
            },
            success: function(data) {
              location.reload(true);
            }
          });
        }
      });
      $('#lead_ov').change(function() {
        var sv = $('#lead_ov').val();
        var sn = 'lead_ov';
        if (sv != '') {
          $.ajax({
            url: "{{ aurl() }}Common/setSession",
            method: "POST",
            data: {
              sn: sn,
              sv: sv,
            },
            success: function(data) {
              location.reload(true);
            }
          });
        }
      });
    });


    $(document).ready(function() {
      $('#filterBtn').on('click', function() {
        var myForm = $("#filterForm");
        if (myForm) {
          $(this).prop('disabled', true);
          $(myForm).submit();
        }
      });
    });

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
    $(document).ready(function() {
      $('#import_csv').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "{{ aurl() }}Admin/import",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            $('#import_csv_btn').html('Importing...');
          },
          success: function(data) {
            $('#import_csv')[0].reset();
            $('#import_csv_btn').attr('disabled', false);
            $('#import_csv_btn').html('Import Done');
            location.reload(true);
          }
        })
      });
    });

    function showCsvDiv() {
      $('.minus').show();
      $('.csvDiv').show();
      $('.manualDiv').hide();
      $('.plus').hide();
    }

    function showManualDiv() {
      $('.minus').hide();
      $('.csvDiv').hide();
      $('.manualDiv').show();
      $('.plus').show();
    }
  </script>
@endsection
