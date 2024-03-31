@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div class="bg_color_2">
      <div class="container margin_60_35">
        <div class="row">
          @if ($showName != '')
            <div class="col-md-4">
              <div class="box_list wow fadeIn animated animated">
                <figure style="height:auto"><img src="https://www.wfyplasticsurgery.com/front/img/Dr.%20Hitesh%20Gupta.jpg" class="img-fluid" alt=""></figure>
                <div class="wrapper text-center">
                  <h3 class="mb-0">Start Counselling with WFY Plastic Surgery</h3>
                </div>
              </div>
            </div>
          @endif
          <div class="col-md-8">
            <form method="post" action="{{ url('enquiry/get-free-quote') }}" id="bookin"
              enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="page_url" value="{{ url()->current() }}">
              <input type="hidden" name="doctor_id" value="{{ $doctor_id }}">
              <input type="hidden" name="hospital_id" value="{{ $hospital_id }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <select class="form-control form-select" name="treatment_name">
                      <option value="">Treatment</option>
                      @foreach ($treatments as $row)
                        <option value="{{ $row->treatment_name }}"
                          {{ old('treatment_name') == $row->treatment_name ? 'selected' : '' }}>{{ $row->treatment_name }}
                        </option>
                      @endforeach
                    </select>
                    @error('treatment_name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Patient Full Name*" name="name"
                      value="{{ old('name') }}">
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Age*" name="age"
                      value="{{ old('age') }}">
                    @error('age')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
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
                <div class="col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email Address*" name="nationality"
                      id="nationality" value="{{ old('nationality') ?? 'India' }}">
                    @error('nationality')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Address*" name="email"
                      id="email_booking" value="{{ old('email') }}">
                    @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Country Code*" name="country_code"
                      id="country_code" value="{{ old('country_code') ?? '91' }}">

                    @error('country_code')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-8">
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

                <div style="position:relative;"><input type="submit" class="btn_1 full-width"
                    value="Get Free Quotation">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>
@endsection
