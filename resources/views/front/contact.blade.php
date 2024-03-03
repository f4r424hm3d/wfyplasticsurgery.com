@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="index">Home</a></li>
          <li><a href="#">Category</a></li>
          <li>Page active</li>
        </ul>
      </div>
    </div>

    <div class="bg_color_3">
      <div class="container margin_60_35">
        <div class="row">
          <aside class="col-lg-3 col-md-4 box_general">
            <div id="contact_info">
              <h3>Contacts info & Details</h3>
              <p>We at Innayat Medical have not only been taking care of patients but also understand their needs and
                finances. We consult the patients as well as their family to take the right decision for a bright and
                happy future</p>
              <ul>
                <li><strong>Working hours:</strong>
                  10 am – 6 pm on weekdays</li>
                <li><strong>General questions:</strong> <a href="+918287185897">+91-8287 185 897</a><br>
                  <a href="mailto:info@example.com">info@example.com</a>
                </li>
                <li><strong>Location:</strong>
                  <p>453 ground floor, Malubu Town, Sector 47, Gurugram</p>
                </li>
              </ul>

              <h4>Get directions</h4>
              <a href="https://goo.gl/maps/jPTxAmwZGfdkRsA" target="_blank" class="btn_1 add_bottom_45">View in
                Google map</a>
            </div>
          </aside>

          <div class=" col-lg-8 col-md-8 ml-auto">
            @error('g-recaptcha-response')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="box_general">
              <h3>Get In Touch</h3>
              <p>Fill In the Form for information or a meeting!</p>
              <div>
                <div id="message-contact"></div>
                {{-- <form method="post" action="" id="contactform">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="name_contact" name="name_contact"
                          placeholder="Name">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="lastname_contact" name="lastname_contact"
                          placeholder="Last name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="email" id="email_contact" name="email_contact" class="form-control"
                          placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" id="phone_contact" name="phone_contact" class="form-control"
                          placeholder="Phone number">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea rows="5" id="message_contact" name="message_contact" class="form-control" style="height:80px;"
                          placeholder="Hello world!"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" id="verify_contact" class=" form-control" placeholder=" 3 + 1 =">
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact">
                </form> --}}
                <form method="post" action="{{ url('en/contact-us') }}" id="contactForm" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  <input type="text" name="honeypot" style="display:none;">
                  <input type="hidden" name="page_url" value="{{ url()->current() }}
                  ">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Full Name*" name="name"
                          value="{{ old('name') }}">
                        @error('name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address*" name="email"
                          id="email_booking" value="{{ old('email') }}">
                        @error('email')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile No.*" name="mobile"
                          value="{{ old('mobile') }}">
                        @error('mobile')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea rows="5" name="message" class="form-control" style="height:80px;"
                          placeholder="Medical Concerns/Questions*">{{ old('message') }}</textarea>
                        @error('message')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ gr_site_key() }}', {
          action: 'contact_us'
        })
        .then(function(token) {
          // Set the reCAPTCHA token in the hidden input field
          document.getElementById('g-recaptcha-response').value = token;
        });
    });
  </script>
@endsection
