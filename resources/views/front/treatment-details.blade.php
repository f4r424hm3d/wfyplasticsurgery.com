@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.dynamic_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('treatments') }}">Treatments</a></li>
          <li>{{ $treatment->treatment_name }}</li>
        </ul>
      </div>
    </div>

    <div class="container mt-5 mb-0">
      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <nav id="secondary_nav">
            <div class="container">
              <ul class="clearfix vertically-scrollbar">
                <li><a href="#section_1" class="active">Overview</a></li>
                <li><a href="#section_4">Facilities</a></li>
                <li><a href="#section_5">Gallery</a></li>
                <li><a href="#section_2">Treatments</a></li>
                <li><a href="#section_6">Testimonials</a></li>
                <li><a href="#section_7">Faqs</a></li>
              </ul>
            </div>
          </nav>

          <div id="section_1">
            <div class="box_general_3">
              <p><img alt="{{ $treatment->treatment_name }}" class="img-fluid" src="{{ asset($treatment->image_path) }}">
              </p>
              {{-- <div class="author pt-0 mb-4">
                <div class="img-div"><img src="{{ asset($treatment->author->profile_picture) }}" alt="Author"><i
                    class="fa fa-check-circle"></i>
                </div>
                <div class="cont-div"><a href="{{ url('author') }}">{{ $treatment->author->name }}</a><span>Updated on -
                    {{ getFormattedDate($treatment->updated_at, 'd M, Y') }}</span>
                </div>
              </div> --}}

              @if ($treatment->overviews->count() > 0)
                @foreach ($treatment->overviews as $row)
                  <h4>{{ $row->title }}</h4>
                  {!! $row->description !!}
                @endforeach
              @endif

            </div>
          </div>

          @if ($treatment->facilities->count() > 0)
            <div id="section_4">
              <div id="detail-title">
                <div class="container">Our Facilities</div>
              </div>
              <div class="box_general_3">
                <div class="">
                  <div class="row">
                    <div class="col-lg-6">
                      <ul class="bullets">
                        @foreach ($treatment->facilities as $row)
                          <li>{{ $row->facility->facility }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if ($treatment->photos->count() > 0 || $treatment->videos->count() > 0)
            <div id="section_5">
              <div id="detail-title">
                <div class="container">Photo & Videos Gallery</div>
              </div>
              <div class="box_general_3">
                <div class="">
                  <div class="row">
                    @if ($treatment->photos->count() > 0)
                      @foreach ($treatment->photos as $row)
                        <div class="col-lg-3 mb-3">
                          <a href="{{ asset($row->photo_path) }}" class="fancybox" data-fancybox="gallery"
                            data-caption="">
                            <img src="{{ asset($row->photo_path) }}" alt="Photo" class="img-fluid">
                          </a>
                        </div>
                      @endforeach
                    @endif

                    @if ($treatment->videos->count() > 0)
                      <h5 class="mt-2">Videos</h5>
                      @foreach ($treatment->videos as $row)
                        <div class="col-lg-6 mb-3">
                          <iframe width="100%" height="190" src="{{ $row->link }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          @endif
          
          @if ($treatment->siblings->count() > 0)
            <div id="section_2">
              <div id="detail-title">
                <div class="container">Related Treatments</div>
              </div>
              <div class="col-12">
                <div class="related-box">
                  <div class="text view-all-height">
                    @foreach ($treatment->siblings as $row)
                      <a href="{{ url('treatment/' . $row->treatment_slug) }}">{{ $row->treatment_name }}</a>
                    @endforeach
                  </div>
                  <div class="view-all">(View All)</div>
                </div>
              </div>
            </div>
          @endif

          @if ($treatment->testimonials->count() > 0)
            <div id="section_6">
              <div class="bg_color_1">
                <div id="detail-title">
                  <div class="container">Testimonials</div>
                </div>
                <div class="container">
                  <div class="row mt-3">
                    @foreach ($treatment->testimonials as $row)
                      <div class="col-md-12">
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
                  <p class="text-center"><a href="{{ url('testimonials') }}" class="btn_1 medium">View All
                      Feedbacks</a></p>
                  <br>
                </div>
              </div>
            </div>
          @endif

          @if ($treatment->faqs->count() > 0)
            <div id="section_7">
              <div id="detail-title">
                <div class="container">Faqs</div>
              </div>
              <div class="box_general_3 p-3">
                <div role="tablist" class="accordion" id="payment">
                  @foreach ($treatment->faqs as $row)
                    <div class="card">
                      <div class="card-header" role="tab">
                        <h5 class="mb-0"><a class="collapsed" data-bs-toggle="collapse"
                            href="#collapse{{ $row->id }}" aria-expanded="false"><i
                              class="indicator icon_plus_alt2"></i>Q: {{ $row->question }}</a>
                        </h5>
                      </div>
                      <div id="collapse{{ $row->id }}" class="collapse" role="tabpanel" data-bs-parent="#payment">
                        <div class="card-body">
                          <p><b>Ans:</b> {{ $row->answer }}</p>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>
              </div>
            </div>
          @endif

        </div>

        <aside class="col-xl-4 col-lg-4" id="sidebar">
          @include('front.form.sidebar-form')
        </aside>

      </div>
    </div>

    <hr>

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
            <a href="https://www.wfyplasticsurgery.com/get-free-quote" class="btn_1 medium mb-4">Schedule FREE Live Tele Consultations <i class="fs1"
                style="top:3px; position:relative" aria-hidden="true" data-icon="$"></i></a>
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

    <div class="bg_color_3">

      <div class="container margin_60_35">
        <div class="main_title">
          <h2>Latest <strong>Blog</strong></h2>
          <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
        </div>
        <div id="reccomended" class="owl-carousel owl-theme">

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-1.jpg" alt="">
            </a>
          </div>

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-2.jpg" alt="">
            </a>
          </div>

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-3.jpg" alt="">
            </a>
          </div>

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-4.jpg" alt="">
            </a>
          </div>

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-5.jpg" alt="">
            </a>
          </div>

          <div class="item mb-4">
            <a href="blog-details.html">
              <div class="views"><i class="icon-eye-7"></i>98</div>
              <div class="title">
                <h4>Blog Heading Type Here</h4>
              </div>
              <img src="{{ url('front') }}/img/blog-6.jpg" alt="">
            </a>
          </div>

        </div>
      </div>

    </div>

  </main>
@endsection
