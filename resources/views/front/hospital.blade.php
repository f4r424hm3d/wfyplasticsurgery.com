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

    <div class="container margin_60_35">
      <div class="main_title text-start mb-4">
        <h2 class="text-start">Recommended <strong>Hospitals</strong> for you</h2>
        <p class="p-0">Choose from <strong>171</strong> best hospitals in All Destinations</p>
      </div>

      <div class="row">

        <aside class="col-lg-3">
          <div class="box_general_3 p-3 d-lg-block d-md-block d-xl-block d-sm-none d-xs-none d-none">

            <div class="fiter-title-inside">Country <button type="button" class="ref-btn resetfilter"
                title="Reset all procedures" name="reset_procedures"><i class="icon-arrows-cw"></i></button></div>
            <div class="">
              <label class="check-filter" data-bs-toggle="collapse" href="#collapse1" role="button">India <input
                  type="checkbox" name="size_range" value="3"><span class="checkmark"></span> <i
                  class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse1">
                <label class="check-filter">Gurgaon <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">New Delhi <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Chennai <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Mumbai <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Kochi <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Bangalore <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Nagpur <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Delhi <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Noida <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
              </div>

              <label class="check-filter" data-bs-toggle="collapse" href="#collapse2" role="button">United Arab
                Emirates <input type="checkbox" name="size_range" value="3"><span class="checkmark"></span>
                <i class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse2">
                <label class="check-filter">Dubai <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Sharjah <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Abu Dhabi <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
              </div>

              <label class="check-filter" data-bs-toggle="collapse" href="#collapse3" role="button">Malaysia
                <input type="checkbox" name="size_range" value="3"><span class="checkmark"></span> <i
                  class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse3">
                <label class="check-filter">Petaling Jaya <input type="checkbox" name="size_range"
                    value="3"><span class="checkmark"></span></label>
              </div>

              <label class="check-filter" data-bs-toggle="collapse" href="#collapse4" role="button">Turkey <input
                  type="checkbox" name="size_range" value="3"><span class="checkmark"></span> <i
                  class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse4">
                <label class="check-filter">Istanbul <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Ankara <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
                <label class="check-filter">Bursa <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
              </div>

              <label class="check-filter" data-bs-toggle="collapse" href="#collapse5" role="button">Ukraine
                <input type="checkbox" name="size_range" value="3"><span class="checkmark"></span> <i
                  class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse5">
                <label class="check-filter">Kiev <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
              </div>

              <label class="check-filter" data-bs-toggle="collapse" href="#collapse6" role="button">Spain <input
                  type="checkbox" name="size_range" value="3"><span class="checkmark"></span> <i
                  class="icon-down-open-1"></i></label>
              <div class="collapse dd" id="collapse6">
                <label class="check-filter">Barcelona <input type="checkbox" name="size_range" value="3"><span
                    class="checkmark"></span></label>
              </div>

            </div>

            <hr style="margin:20px -16px">

            <div class="fiter-title-inside">Procedures / Speciality <button type="button" class="ref-btn resetfilter"
                title="Reset all procedures" name="reset_procedures"><i class="icon-arrows-cw"></i></button></div>
            <div class="ps-scrl-bar">
              <label class="check-filter">Bariatric Surgery <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Cardiology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Colorectal medicine <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Dentistry <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Ear Nose & Throat <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Endocrinology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Gastroenterology <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">General Inquiry <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">General Medicine <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">General Surgery <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Hair restoration <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Hematology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Maxillofacial Surgery <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Nephrology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Neurology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Neurosurgery <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Nuclear Medicine <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Obstetrics & Gynecology <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Oncology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Ophthalmology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Orthopedics <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Pediatric Cardiology <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Plastic Surgery <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Pulmonology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Radiation Therapy <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Radiology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Reproductive medicine <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Respiratory medicine <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Spinal Surgery <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Stem Cell Therapy <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
              <label class="check-filter">Urology <input type="checkbox" name="size_range" value="3"><span
                  class="checkmark"></span></label>
              <label class="check-filter">Vascular surgery <input type="checkbox" name="size_range"
                  value="3"><span class="checkmark"></span></label>
            </div>

            <hr style="margin:20px -16px">

            <div class="fiter-title-inside">Top Hospitals</div>
            <ol class="tdh-list">
              <li>Medanta The Medicity</li>
              <li>Artemis Hospital</li>
              <li>Indraprastha Apollo Hospitals</li>
              <li>BLK Super Speciality Hospital</li>
              <li>Max Super Specialty Hospital Saket</li>
              <li>Fortis Memorial Research Institute</li>
              <li>Al Zahra Hospital</li>
              <li>Canadian Specialist Hospital, Dubai</li>
              <li>Saudi German Hospital</li>
              <li>Zulekha Hospital Dubai</li>
            </ol>

          </div>
        </aside>

        <div class="col-lg-9">
          <div class="strip_list wow fadeIn">
            <div class="row">
              <div class="col-md-4"><img src="{{ url('front') }}/img/h1.jpg" alt="" class="img-fluid"></div>
              <div class="col-md-8">
                <a href="javascript:void()" class="wish_bt"></a>
                <h3 class="mt-2"><a href="hospital-detail-page.html">Hospital Name Here</a></h3>
                <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                      class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                    <b>(145)</b></span></p>
                <p><i class="icon-location-outline"></i> 26 July Street, Touristic Zone, October City, Giza 12568
                  Egypt</p>
                <p><i class="icon-building"></i> Established in : 2017</p>
                <p><i class="icon-bag"></i> Number of Beds : 30</p>
                <p class="mb-2"><i class="icon-sun-2"></i> Super specialty</p>
                <p class="mb-3">Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti
                  cuodo. Id placerat tacimates definitionem sea, prima quidam vim. Id placerat tacimates definitionem
                  sea, prima quidam vim no. Duo nobis persecuti cuodo. Id placerat tacimates definitionem sea, prima
                  quidam vim.</p>
                <ul>
                  <li class="btn"><a href="get-free-quote.html">Contact Hospital</a></li>
                  <li class="btn-bdr"><a href="hospital-detail-page.html">Read More</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="strip_list wow fadeIn">
            <div class="row">
              <div class="col-md-4"><img src="{{ url('front') }}/img/h1.jpg" alt="" class="img-fluid"></div>
              <div class="col-md-8">
                <a href="javascript:void()" class="wish_bt"></a>
                <h3 class="mt-2"><a href="hospital-detail-page.html">Hospital Name Here</a></h3>
                <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                      class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                    <b>(145)</b></span></p>
                <p><i class="icon-location-outline"></i> 26 July Street, Touristic Zone, October City, Giza 12568
                  Egypt</p>
                <p><i class="icon-building"></i> Established in : 2017</p>
                <p><i class="icon-bag"></i> Number of Beds : 30</p>
                <p class="mb-2"><i class="icon-sun-2"></i> Super specialty</p>
                <p class="mb-3">Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti
                  cuodo. Id placerat tacimates definitionem sea, prima quidam vim. Id placerat tacimates definitionem
                  sea, prima quidam vim no. Duo nobis persecuti cuodo. Id placerat tacimates definitionem sea, prima
                  quidam vim.</p>
                <ul>
                  <li class="btn"><a href="get-free-quote.html">Contact Hospital</a></li>
                  <li class="btn-bdr"><a href="hospital-detail-page.html">Read More</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="strip_list wow fadeIn">
            <div class="row">
              <div class="col-md-4"><img src="{{ url('front') }}/img/h1.jpg" alt="" class="img-fluid"></div>
              <div class="col-md-8">
                <a href="javascript:void()" class="wish_bt"></a>
                <h3 class="mt-2"><a href="hospital-detail-page.html">Hospital Name Here</a></h3>
                <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                      class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                    <b>(145)</b></span></p>
                <p><i class="icon-location-outline"></i> 26 July Street, Touristic Zone, October City, Giza 12568
                  Egypt</p>
                <p><i class="icon-building"></i> Established in : 2017</p>
                <p><i class="icon-bag"></i> Number of Beds : 30</p>
                <p class="mb-2"><i class="icon-sun-2"></i> Super specialty</p>
                <p class="mb-3">Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti
                  cuodo. Id placerat tacimates definitionem sea, prima quidam vim. Id placerat tacimates definitionem
                  sea, prima quidam vim no. Duo nobis persecuti cuodo. Id placerat tacimates definitionem sea, prima
                  quidam vim.</p>
                <ul>
                  <li class="btn"><a href="get-free-quote.html">Contact Hospital</a></li>
                  <li class="btn-bdr"><a href="hospital-detail-page.html">Read More</a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="strip_list wow fadeIn">
            <div class="row">
              <div class="col-md-4"><img src="{{ url('front') }}/img/h1.jpg" alt="" class="img-fluid"></div>
              <div class="col-md-8">
                <a href="javascript:void()" class="wish_bt"></a>
                <h3 class="mt-2"><a href="hospital-detail-page.html">Hospital Name Here</a></h3>
                <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                      class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                    <b>(145)</b></span></p>
                <p><i class="icon-location-outline"></i> 26 July Street, Touristic Zone, October City, Giza 12568
                  Egypt</p>
                <p><i class="icon-building"></i> Established in : 2017</p>
                <p><i class="icon-bag"></i> Number of Beds : 30</p>
                <p class="mb-2"><i class="icon-sun-2"></i> Super specialty</p>
                <p class="mb-3">Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti
                  cuodo. Id placerat tacimates definitionem sea, prima quidam vim. Id placerat tacimates definitionem
                  sea, prima quidam vim no. Duo nobis persecuti cuodo. Id placerat tacimates definitionem sea, prima
                  quidam vim.</p>
                <ul>
                  <li class="btn"><a href="get-free-quote.html">Contact Hospital</a></li>
                  <li class="btn-bdr"><a href="hospital-detail-page.html">Read More</a></li>
                </ul>
              </div>
            </div>
          </div>

          <nav aria-label="" class="add_top_20">
            <ul class="pagination pagination-sm">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>

      </div>

      <hr>

      <div class="container pb-5">
        <div class="row mt-4">
          <div class="col-12">
            <div class="main_title mb-2 text-start">
              <h4><strong>Top Doctors in India</strong></h4>
            </div>
          </div>

          <div id="doctor" class="owl-carousel owl-theme">

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Cardiologist (F)</a></p>
                </div>
              </div>
            </div>

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Neurologist (F)</a></p>
                </div>
              </div>
            </div>

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Nephrologist (F)</a></p>
                </div>
              </div>
            </div>

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Childspecialist (F)</a></p>
                </div>
              </div>
            </div>

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Cardiologist (F)</a></p>
                </div>
              </div>
            </div>

            <div class="item p-3">
              <div class="box_list mb-0">
                <figure class="h-auto"><img src="{{ url('front') }}/img/doc.jpg" class="img-fluid" alt="">
                </figure>
                <div class="wrapper p-3">
                  <h6 class="mb-1"><a href="doctor-detail-page.html">Dr name here (D)</a></h6>
                  <p class="m-0"><a href="doctor.html" class="text-black-100">Opthalmologist (F)</a></p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </main>
@endsection
