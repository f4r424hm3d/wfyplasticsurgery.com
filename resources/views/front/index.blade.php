@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main>
    <div class="hero_home version_1">
      <div class="content">
        <h3>We For You - Plastic & Cosmetic Surgery in India</h3>
        <p>Your Trusted Partner for Medical Tourism in India</p>

      </div>
    </div>
    <!-- /Hero -->

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="main_title">
          <h1>ABOUT <strong>WYF PLASTIC SURGERY</strong> INDIA</h1>
          <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <figure class="add_bottom_30"><img src="{{ url('front') }}/img/about_1.jpg" class="img-fluid" alt="">
            </figure>
          </div>
          <div class="col-lg-6">
            <p style="text-align: justify;">Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos scaevola
              probatus. Nam atqui intellegat ei, sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas
              nonumes contentiones, nihil voluptaria pro id. Has graeci deterruisset ad, est no primis detracto
              pertinax, at cum malis vitae facilisis. Dicam diceret ut ius, no epicuri dissentiet philosophia vix. Id
              usu zril tacimates neglegentur. Eam id legimus torquatos cotidieque, usu decore percipitur definitiones
              ex, nihil utinam recusabo mel no. Dolores reprehendunt no sit, quo cu viris theophrastus. Sit unum
              efficiendi cu.
              Lorem ipsum dolor sit amet, homero erroribus in cum. Cu eos scaevola probatus. Nam atqui intellegat ei,
              sed ex graece essent delectus. Autem consul eum ea. Duo cu fabulas nonumes contentiones, nihil
              voluptaria pro id. Has graeci deterruisset ad, est no primis detracto pertinax, at cum malis vitae
              facilisis.</p>
            <h4><em>Dr. Hitesh Gupta</em></h4>
          </div>
        </div>
      </div>
    </div>

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="main_title">
          <h2>Discover the <strong>online</strong> appointment!</h2>
          <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed
            ad debet scaevola, ne mel.</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
              <span></span>
              <h3>Find the Procedure</h3>
              <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
              <span></span>
              <h3>View Details</h3>
              <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
              <h3>Book a visit</h3>
              <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container margin_60_35">
      <div class="main_title">
        <h2>Our Services & Specialties.</h2>
        <p>We can assist you with anything for medical tourism in India, including but not limited to the following
          medical procedures:</p>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Dental Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Breast Augmentation</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Plastic Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Chin Augmentation</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <i class="icon-info-4"></i>
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="procedure.html">View Detials</a></li>
              <li><a href="get-free-quote.html">Book Now</a></li>
            </ul>
          </div>
        </div>
      </div>
      <p class="text-center"><a href="treatments.html" class="btn_1 medium">View All Treatments</a></p>
    </div>

    <div id="hero_register">
      <div class="container margin_60_35">
        <div class="row">
          <div class="col-lg-5">
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
            <a href="get-free-quote.html" class="btn_1 medium mb-4">Schedule FREE Live Tele Consultations <i
                class="fs1" style="top:3px; position:relative" aria-hidden="true" data-icon="$"></i></a>
          </div>

          <div class="col-lg-7">
            <iframe width="100%" height="100" src="https://www.youtube.com/embed/hIrFHPDVIj0"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
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
        <h2>Why <strong>Choose WYF</strong> Plastic Surgery</h2>
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

    @if ($blogs->count() > 0)
      <div class="bg_color_1">
        <div class="container margin_60_35">
          <div class="main_title">
            <h2>Latest <strong>Blog</strong></h2>
            <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
          </div>
          <div id="reccomended" class="owl-carousel owl-theme">
            @foreach ($blogs as $row)
              <div class="item mb-4">
                <a href="{{ url('blog/' . $row->category->category_slug . '/' . $row->slug) }}">
                  <div class="views">{{ $row->category->category_name }}</div>
                  <div class="title">
                    <h4>{{ $row->title }}</h4>
                  </div>
                  <img src="{{ asset($row->thumbnail_path) }}" alt="blog">
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif

    <div id="app_section">
      <div class="container">
        <div class="row justify-content-around">
          <div class="col-md-5">
            <p><img src="{{ url('front') }}/img/app_img.svg" alt="" class="img-fluid" width="500"
                height="433"></p>
          </div>
          <div class="col-md-6">
            <small>Application</small>
            <h3>Download <strong>Findoctor App</strong> Now!</h3>
            <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum
              no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque
              consequuntur cu.</p>
            <div class="app_buttons wow" data-wow-offset="100">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow"
                  d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1"
                  d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2"
                  d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
              </svg>
              <a href="javascript:void()" class="fadeIn"><img src="{{ url('front') }}/img/apple_app.png"
                  alt="" width="150" height="50" data-retina="true"></a>
              <a href="javascript:void()" class="fadeIn"><img src="{{ url('front') }}/img/google_play_app.png"
                  alt="" width="150" height="50" data-retina="true"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
