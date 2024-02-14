@php
  use App\Models\Country;
  $countries = Country::orderBy('name')->get();
  $codes = Country::orderBy('phonecode')->get();
@endphp
<div class="box_general_3 booking">
  <div class="title">
    <h3>Get a Free Quote</h3>
    <!--small>Monday to Friday 09.00am-06.00pm</small-->
  </div>
  <form method="post" action="{{ url('enquiry/sidebar-enquiry') }}" id="bookin" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="page_url" value="{{ url()->current() }}
    ">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Treatment Name*" name="treatment_name"
            value="{{ old('treatment_name') }}">
          @error('treatment_name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Patient Full Name*" name="name"
            value="{{ old('name') }}">
          @error('name')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Age*" name="age" value="{{ old('age') }}">
          @error('age')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <select class="form-control form-select" name="gender">
            <option value="">Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
          </select>
          @error('gender')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email Address*" name="email" id="email_booking"
            value="{{ old('email') }}">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <select class="form-control form-select" name="nationality" required="required">
            <option value="">Nationality (Passport) *</option>
            @foreach ($countries as $row)
              <option value="{{ $row->name }}" {{ old('nationality') == $row->name ? 'selected' : '' }}>
                {{ $row->name }}</option>
            @endforeach
          </select>
          @error('nationality')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-3">
        <div class="form-group">
          <select class="form-control form-select" name="country_code">
            @foreach ($codes as $row)
              <option value="{{ $row->phonecode }}"
                {{ old('country_code') == $row->phonecode || $row->phonecode == '91' ? 'selected' : '' }}>
                {{ $row->name }} (+{{ $row->phonecode }})</option>
            @endforeach
          </select>
          @error('country_code')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-9">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mobile No.*" name="mobile"
            value="{{ old('mobile') }}">
          @error('mobile')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <textarea rows="5" name="message" class="form-control" style="height:80px;"
            placeholder="Medical Concerns/Questions*">{{ old('message') }}</textarea>
          @error('message')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="col-lg-12">
        <div class="form-group">
          <label>Upload Medical Records (jpeg, jpg, pdf)</label>
          <div class="fileupload"><input type="file" name="medical_report"></div>
          @error('medical_report')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div style="position:relative;"><input type="submit" class="btn_1 full-width" value="Get Free Quotation">
      </div>
  </form>
</div>
