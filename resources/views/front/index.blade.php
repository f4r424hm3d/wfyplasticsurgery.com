@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main>
    <div class="hero_home version_1">
      <div class="content">
        <h3>We For You - Plastic & Cosmetic Surgery in India</h3>
        <p>A centre of excellence for Aesthetic Surgeries </p>

      </div>
    </div>
    <!-- /Hero -->

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="row justify-content-between">
          <div class="col-lg-6">
            <figure class="add_bottom_30"><img src="{{ url('front') }}/img/Dr. Hitesh Gupta.jpg" class="img-fluid" alt="Dr. Hitesh Gupta.jpg" style="box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.3);
    border-radius: 10px;">
            </figure>
          </div>
          <div class="col-lg-6">
                      <div class="main_title">
          <h1>ABOUT <strong>WYF PLASTIC SURGERY</strong> INDIA</h1>
        </div>
            <p style="text-align: justify;">We for you Clinic is recognized as the Best Plastic surgery clinic in Delhi. Dr. Hitesh started this clinic with the aim of providing a wholesome Plastic Surgery experience and all aesthetics under one roof. We provide high quality, extremely sophisticated procedures that give our patients the bodies they aspire for.  </p>
             <p style="text-align: justify;"> We will take care of you with the highest level of professionalism and always provide you with the most incredible results. Just reach out to us and tell us about your dreams, and we’ll turn them into reality. Each and every equipment and material used by us conforms to international standards. </p>
            <h4 class="text-center"><em>Dr. Hitesh Gupta</em><br><span style="font-size:14px">MBBS, MS, MCh (Plastic Surgery), MRCS (England)</span></h4>
          </div>
        </div>
      </div>
    </div>

    <div class="bg_color_1">
      <div class="container margin_60_35">
        <div class="main_title">
          <h2>Discover <strong>online</strong> appointment!</h2>
          <p>Unlock the Convenience: Discover Online Appointment Booking!</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="box_feat" id="icon_1">
              <span></span>
              <h3>Find the Procedure</h3>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box_feat" id="icon_2">
              <span></span>
              <h3>View Details</h3>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="box_feat" id="icon_3">
              <h3>Book an Appointment</h3>
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
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Dental Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Breast Augmentation</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Plastic Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Chin Augmentation</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="box_cat_home">
            <img src="{{ url('front') }}/img/icon_cat_2.svg" width="60" height="60" alt="">
            <h3>Rhinoplasty Surgery</h3>
            <ul class="clearfix">
              <li><a href="#">View Detials</a></li>
              <li><a href="https://www.wfyplasticsurgery.com/get-free-quote">Book Now</a></li>
            </ul>
          </div>
        </div>
      </div>
      <p class="text-center"><a href="treatments.html" class="btn_1 medium newbttn">View All Treatments</a></p>
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
            <a href="#" class="btn_1 medium mb-4 newbttn">Schedule Your Appointment <i
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
    <div class="container margin_60_35">
<div class="main_title mb-4">
<h2>Our Work <strong> in Gallery</strong></h2>
</div>

<div class="row">
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Face Surgery</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Face Surgery</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Face Surgery</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Face Surgery</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Face Surgery</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Cheek Dimple</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Breast Reduction</h6></div>
</div>
</div>
<div class="col-md-3">
<div class="box_list wow fadeIn animated">
<figure class="h-auto"><img src="https://wfyplasticsurgery.com/uploads/gallery/untitled-761-x-678-px-1708756916.jpg" class="img-fluid" alt="face surgery gallery"></figure>
<div class="wrapper p-3" style="border-top: 1px solid #ededed;"><h6 class="mb-0 text-center">Smile Correction</h6></div>
</div>
</div>      <p class="text-center"><a href="treatments.html" class="btn_1 medium newbttn">View Full Gallery</a></p>

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
        <p class="text-center"><a href="{{ url('testimonials') }}" class="btn_1 medium newbttn">View All Feedbacks</a></p><br>
      </div>
    @endif
    
<div class="container margin_60_35">
  <div class="container margin_60_35">
<div class="row text-center">
<div class="col-lg-3 col-md-3 col-6">
<div class="counter customcard">
<img src="{{ url('front') }}/img/icons/our-treatments.png" alt="our services">
<h2 class="timer count-title count-number" data-to="50" data-speed="1500"></h2>
<p class="count-text">Our Services</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-6">
<div class="counter customcard">
<img src="{{ url('front') }}/img/icons/our-treatments.png" alt="our services">
<h2 class="timer count-title count-number" data-to="800" data-speed="1500"></h2>
<p class="count-text">Satisfied Patients</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-6">
<div class="counter customcard">
<img src="{{ url('front') }}/img/icons/our-treatments.png" alt="our services">
<h2 class="timer count-title count-number" data-to="8" data-speed="1500"></h2>
<p class="count-text">Clinical experience</p>
</div>
</div>
<div class="col-lg-3 col-md-3 col-6">
<div class="counter customcard">
<img src="{{ url('front') }}/img/icons/our-treatments.png" alt="our services">
<h2 class="timer count-title count-number" data-to="225" data-speed="1500"></h2>
<p class="count-text ">Cured Patients</p>
</div>
</div>
</div>
</div>
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
  </main>
@endsection
