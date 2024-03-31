@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="https://www.wfyplasticsurgery.com/">Home</a></li>
          <li>About Doctor</li>
        </ul>
      </div>
    </div>

    <div class="container margin_60">
      <div class="row">
        <aside class="col-xl-3 col-lg-4" id="sidebar">
          <div class="box_profile">
            <figure>
              <img src="https://www.wfyplasticsurgery.com/front/img/Dr.%20Hitesh%20Gupta.jpg" alt="Dr. Hitesh Gupta" class="img-fluid">
            </figure>
            <small>Plastic Surgeon</small>
            <h1>DR. HITESH GUPTA</h1>
            <span class="rating">
              <i class="icon_star voted"></i>
              <i class="icon_star voted"></i>
              <i class="icon_star voted"></i>
              <i class="icon_star voted"></i>
              <i class="icon_star voted"></i>
            </span>
            <ul class="statistic">
              <li>MBBS, MS, MCh, MRCS (England)</li>
            </ul>
            <ul class="contacts">
              <li><h6>Phone No.</h6><a href="tel:+918287185897">+91-8287 185 897</a></li>
              <li><h6>Address</h6>B-5/238, Pocket 17, Sector 7, Rohini, Delhi, 110085</li>
            </ul>
            <div class="text-center"><a href="https://maps.app.goo.gl/y5gPj9vgk5PXLPEc6" class="btn_1 outline" target="_blank"><i class="icon_pin"></i> View on Google Map</a></div>
          </div>
        </aside>
        <!-- /asdide -->
        
        <div class="col-xl-9 col-lg-8">
          
          <div class="tabs_styled_2">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true">About Doctor Overview</a>
              </li>
            </ul>
            <!--/nav-tabs -->

            <div class="tab-content">
              <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <div class="indent_title_in">
                  <i class="pe-7s-user"></i>
                  <h3>Professional statement</h3>
                </div>
                <div class="wrapper_indent">
                  <p>Dr. Hitesh Gupta is a renowned experienced Plastic and Cosmetic Surgeon in Delhi. He earned his MBBS and Masters in General Surgery at the University College of Medical Sciences and GTB Hospital in Delhi. He further completed his super-specialty training (MCh) in Plastic and Reconstructive surgery from AIIMS Delhi, being the top most premier institute in India. To hone his skills in cosmetic surgery, Dr. Hitesh underwent fellowship training in Chennai. He later completed his Member of Royal College of Surgeons (MRCS) from England in 2024. Dr. Gupta has a 13 year of clinical experience and presently working as a Consultant in Plastic Surgery at Max hospital Shalimar Bagh Delhi, providing expert care and solutions to patients.</p>
                <hr>  
              <div class="indent_title_in">
              <i class="icon-group"></i>
              <h3>Professional Membership</h3>
            </div><br>
                  <div class="row">
                  <div class="col-lg-6 col-md-6">
                  <a href="javascript:void()" class="box_cat_home">
                    <img src="https://www.sbaestheticsclinic.com/assets/images/membership/membership04.png" width="60" height="60" alt="">
                    <h3>ISAPS</h3>
                  </a>
                </div>
                    <div class="col-lg-6 col-md-6">
                  <a href="javascript:void()" class="box_cat_home">
                    <img src="https://www.sbaestheticsclinic.com/assets/images/membership/membership05.png" width="60" height="60" alt="">
                    <h3>IAAPS</h3>
                  </a>
                </div>
                    <div class="col-lg-6 col-md-6">
                  <a href="javascript:void()" class="box_cat_home">
                    <img src="https://www.sbaestheticsclinic.com/assets/images/membership/membership02.png" width="60" height="60" alt="">
                    <h3>Delhi medical council (DMC)</h3>
                  </a>
                </div>
                    <div class="col-lg-6 col-md-6">
                  <a href="javascript:void()" class="box_cat_home">
                    <img src="https://yt3.googleusercontent.com/ytc/AIdro_nBOwlY_G850DfU9EkXQopsJrGZU0EhsFKjs6JC=s900-c-k-c0x00ffffff-no-rj" width="60" height="60" alt="">
                    <h3>Royal college of surgeon (London)</h3>
                  </a>
                </div>
                  </div>
                  <!-- /row-->
                </div>
                <!-- /wrapper indent -->
                
                <hr>
                
                <div class="indent_title_in">
                  <i class="pe-7s-news-paper"></i>
                  <h3>Education and Training</h3>
                  <p>MBBS, MS, MCh (Plastic Surgery), MRCS (England)</p>
                </div>
                <div class="wrapper_indent">
                  <p>Dr Gupta started his own practice in 2023 with a “we for you” plastic surgery , a renowned facility with world class facilities, with a goal to stand out with every result and bring a natural results in every patient . Dr. Gupta strives to offer the best remedies and cosmetic procedures outfitted with the latest technology to the aspirants in India and across the globe. With his dedication and hard work, he has established himself as one of the leading Plastic Surgeons in the country who is looked upon by peers and colleagues for his extraordinary results.</p>
                  <h6>Curriculum</h6>
                  <ul class="list_edu">
                    <li><strong>New York Medical College</strong> - Doctor of Medicine</li>
                    <li><strong>Montefiore Medical Center</strong> - Residency in Internal Medicine</li>
                    <li><strong>New York Medical College</strong> - Master Internal Medicine</li>
                  </ul>
                </div>
                <!--  End wrapper indent -->
                
                <hr>

                <div class="indent_title_in">
                  <i class="icon-plus-squared-small"></i>
                  <h3>Skills &amp; Specialities</h3>
                </div>
                <div class="wrapper_indent">
                  <p>He has been practicing for almost 13 year and has performed over 5000 + surgeries. His specialties include:</p>
                <ul class="bullets">
                <li>Gynecomastia (male breast reduction)</li>
                <li>Breast Augmentation using Implants or/and Fat Grafting</li>
                <li>Breast Lift</li>
                <li>Breast Reduction</li>
                <li>Facial Aesthetic Surgery</li>
                <li>Rhinoplasty</li>
                <li>Facelift</li>
                <li>Blepharoplasty (Eye surgery)</li>
                <li>Hair Transplant</li>
                <li>Body Contouring &ndash;Liposuction and Liposculpting</li>
                <li>Six Pack Surgery using Vaser Technology</li>
                <li>Abdominoplasty (Tummy tuck)</li>
                <li>Mommy Makeover</li>
                <li>Fillers and Botox</li>
                <li>Brazilian Butt Lift</li>
                <li>Reconstructive Surgery</li>
                    </ul>
                </div>
                <!--  End wrapper_indent -->

              </div>
              <!-- /tab_2 -->

              <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              </div>
              <!-- /tab_3 -->
            </div>
            <!-- /tab-content -->
          </div>
          <!-- /tabs_styled -->
        </div>
        <!-- /col -->
      </div>
      <!-- /row -->
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
            <a href="https://www.wfyplasticsurgery.com/get-free-quote" class="btn_1 medium mb-4 newbttn">Schedule Your Appointment <i class="fs1"
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
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-id"></i>
            <h3>Globally Certified</h3>
            <p>A team of internationally trained plastic surgeons & medical doctors.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-help2"></i>
            <h3>Priority: Patients First</h3>
            <p>Patient’s comfort, safety and confidentiality are our utmost priority.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-date"></i>
            <h3>Strategic Planning</h3>
            <p>Planning is given equal importance as the procedure itself to align with patient goals.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-headphones"></i>
            <h3>Full Medical Care</h3>
            <p>Comprehensive medical support during and after the surgery.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-credit"></i>
            <h3>Modern Facility</h3>
            <p>Convenient location, state-of-the-art facility with modern infrastructure.</p>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a class="box_feat_about" href="javascript:void()">
            <i class="pe-7s-chat"></i>
            <h3>Premium Comfort</h3>
            <p>Excellent amenities, guest rooms and hygienic surroundings.</p>
          </a>
        </div>
      </div>
    </div>

    @if ($testimonials->count() > 0)
      <div class="bg_color_1">
        <div class="container margin_60_35">
          <div class="main_title" id="#reviews">
            <h2>What <strong>People Say</strong> About us</h2>
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

  </main>
@endsection
