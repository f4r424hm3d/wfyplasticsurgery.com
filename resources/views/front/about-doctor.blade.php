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
          <li><a href="#">About</a></li>
          <li>About us</li>
        </ul>
      </div>
    </div>

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="main_title">
          <h1>About <strong>WYF PLASTIC SURGERY</strong> INDIA</h1>
          <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <figure class="add_bottom_30"><img src="{{ url('front') }}/img/about_1.jpg" class="img-fluid" alt="">
            </figure>
          </div>
          <div class="col-lg-6">
            <p>Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos <strong>scaevola probatus</strong>. Nam
              atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes
              contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto pertinax, at
              cum malis vitae facilisis.</p>
            <p>Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id usu zril tacimates neglegentur. Eam id
              legimus torquatos cotidieque, usu decore <strong>percipitur definitiones</strong> ex, nihil utinam
              recusabo mel no. Dolores reprehendunt no sit, quo cu viris theophrastus. Sit unum efficiendi cu.</p>
            <p>Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos <strong>scaevola probatus</strong>. Nam
              atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes
              contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto pertinax, at
              cum malis vitae facilisis.</p>
            <p><em>CEO Marc Schumaker</em></p>
          </div>
        </div>
      </div>
    </div>

    <div id="hero_register">
      <div class="container margin_60_35">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="white-text">How Tele Consultation works</h3>

            <div class="box_feat_2 mt-3">
              <i class="pe-7s-id"></i>
              <h3>Submit an inquiry</h3>
              <p>tell us what is troubling you, attach any reports.</p>
            </div>
            <div class="box_feat_2">
              <i class="pe-7s-user"></i>
              <h3>A representative</h3>
              <p>A representative from the medical team will reach out to coordinate a suitable time between you and
                the specialist.</p>
            </div>
            <div class="box_feat_2">
              <i class="pe-7s-phone"></i>
              <h3>Instantly via Mobile</h3>
              <p>You will receive a phone call or video link to join for your appointment with the doctor.</p>
            </div>
            <div class="box_feat_2">
              <i class="pe-7s-headphones"></i>
              <h3>Proper Consultation</h3>
              <p>Join the meeting and a proper consultation is conducted by the doctor during your assigned time slot.
                Doctor will provide a diagnosis and treatment plan for your condition.</p>
            </div>
            <a href="#" class="btn_1 medium mb-4 newbttn">Schedule Your Appointment <i class="fs1"
                style="top:3px; position:relative" aria-hidden="true" data-icon="$"></i></a>
          </div>

          <div class="col-lg-6">
            <iframe width="100%" height="100" src="https://www.youtube.com/embed/hIrFHPDVIj0"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="container margin_60_35">
      <div class="main_title">
        <h2>WHY <strong>CHOOSE WYF PLASTIC SURGERY</strong> INDIA</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-id"></i>
            <h3>+ 5575 Doctors</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-help2"></i>
            <h3>H24 Support</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris. </p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-date"></i>
            <h3>Instant Booking</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-headphones"></i>
            <h3>Help Direct Line</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris. </p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-credit"></i>
            <h3>Secure Payments</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-chat"></i>
            <h3>Support via Chat</h3>
            <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii
              option, cu sit mazim libris. </p>
          </a>
        </div>
      </div>
    </div>

    @if ($testimonials->count() > 0)
      <div class="bg_color_1">
        <div class="container margin_60_35">
          <div class="main_title">
            <h2>What <strong>user says</strong> about us</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
          </div>
          <div class="row">
            @foreach ($testimonials as $row)
              <div class="col-md-4">
                <div class="about-review">
                  <div class="rating">
                    @for ($i = 0; $i < $row->rating; $i++)
                      <i class="icon_star voted"></i>
                    @endfor
                    <strong>{{ $row->review_title }}</strong>
                  </div>
                  <p>"{{ $row->review }}"</p>
                  <div class="user_review">
                    <figure><img src="{{ asset($row->photo_path) }}"></figure>
                    <h4>{{ $row->user_name }}<span>Patient of {{ $row->treatment->treatment_name }}</span></h4>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <p class="text-center"><a href="{{ url('testimonials') }}" class="btn_1 medium">View All Feedbacks</a></p><br>
      </div>
    @endif

    <div class="container margin_60_35">
      <div class="main_title">
        <h2>Our <strong>Team</strong></h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
      </div>
      <div id="staff" class="owl-carousel owl-theme">
        <div class="item m-3">
          <a href="javascript:void()">
            <div class="title">
              <h4>Julia Holmes<em>CEO</em></h4>
            </div><img src="{{ url('front') }}/img/1_carousel.jpg" alt="">
          </a>
        </div>
        <div class="item m-3">
          <a href="javascript:void()">
            <div class="title">
              <h4>Lucas Smith<em>Marketing</em></h4>
            </div><img src="{{ url('front') }}/img/2_carousel.jpg" alt="">
          </a>
        </div>
        <div class="item m-3">
          <a href="javascript:void()">
            <div class="title">
              <h4>Paul Stephens<em>Business strategist</em></h4>
            </div><img src="{{ url('front') }}/img/3_carousel.jpg" alt="">
          </a>
        </div>
        <div class="item m-3">
          <a href="javascript:void()">
            <div class="title">
              <h4>Pablo Himenez<em>Customer Service</em></h4>
            </div><img src="{{ url('front') }}/img/4_carousel.jpg" alt="">
          </a>
        </div>
        <div class="item m-3">
          <a href="javascript:void()">
            <div class="title">
              <h4>Andrew Stuttgart<em>Admissions</em></h4>
            </div><img src="{{ url('front') }}/img/5_carousel.jpg" alt="">
          </a>
        </div>
      </div>
    </div>

  </main>
@endsection
