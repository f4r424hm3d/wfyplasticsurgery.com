@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div id="list-breadcrumb">
      <div class="container">
        <div class="row mb-3">
          <div class="col-md-12">
            <h4><strong>Best Hospitals in the world</strong> of 140 results</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 mb-2"><input type="text" class="form-control" placeholder="Search Doctors"></div>
          <div class="col-md-2 mb-2">
            <select name="orderby" class="form-select">
              <option selected="" value="">All Specialties</option>
              <option value="">Specialty Name Here</option>
              <option value="">Specialty Name Here</option>
              <option value="">Specialty Name Here</option>
              <option value="">Specialty Name Here</option>
              <option value="">Specialty Name Here</option>
              <option value="">Specialty Name Here</option>
            </select>
          </div>
          <div class="col-md-2 mb-2">
            <select name="orderby" class="form-select">
              <option selected="" value="">All Countries</option>
              <option value="">Country Name Here</option>
              <option value="">Country Name Here</option>
              <option value="">Country Name Here</option>
              <option value="">Country Name Here</option>
              <option value="">Country Name Here</option>
              <option value="">Country Name Here</option>
            </select>
          </div>
          <div class="col-md-2 mb-2">
            <select name="orderby" class="form-select">
              <option selected="" value="">All Cities</option>
              <option value="">City Name Here</option>
              <option value="">City Name Here</option>
              <option value="">City Name Here</option>
              <option value="">City Name Here</option>
              <option value="">City Name Here</option>
              <option value="">City Name Here</option>
            </select>
          </div>
          <div class="col-md-2 mb-2">
            <select name="orderby" class="form-select">
              <option selected="" value="">All Hospitals</option>
              <option value="">Hospital Name Here</option>
              <option value="">Hospital Name Here</option>
              <option value="">Hospital Name Here</option>
              <option value="">Hospital Name Here</option>
              <option value="">Hospital Name Here</option>
              <option value="">Hospital Name Here</option>
            </select>
          </div>
          <div class="col-md-2"><button type="submit" class="filter-btn"><i class="icon-search"></i>
              Search</button></div>
        </div>
      </div>
    </div>

    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="index">Home</a></li>
          <li><a href="#">Category</a></li>
          <li>Page active</li>
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
                <li><a href="#section_2">Treatments</a></li>
                <li><a href="#section_3">Doctors</a></li>
                <li><a href="#section_4">Facilities</a></li>
                <li><a href="#section_5">Reviews</a></li>
                <li><a href="#section_6">Gallery</a></li>
                <li><a href="#section_7">Faqs</a></li>
              </ul>
            </div>
          </nav>

          <div id="section_1">
            <div class="hospital_cover_box"
              style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .1), rgba(0, 0, 0, 0.9)), url(img/hb.jpg)">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                  <figure><img src="{{ url('front') }}/img/fortis-logo.webp" alt=""
                      class="rounded-circle img-thumbnail">
                  </figure>
                </div>
                <div class="col-lg-10 col-md-10 col-12">
                  <h1 class="mt-2 mb-1">Fortis Memorial Research Institute</h1>
                  <span class="rating mb-1">
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star voted"></i>
                    <i class="icon_star"></i>
                    <small>(145)</small> - (29 Reviews)</span>
                  <p class="mb-1"><i class="icon-location-outline"></i> Sector - 44, Opposite HUDA City Centre,
                    Gurgaon, HR, India, 122002</p>
                  <p class="mb-1"><i class="icon-building"></i> Established in : 2017</p>
                  <p class="mb-1"><i class="icon-thumbs-up-2"></i> 242 recommendation(s)</p>
                </div>
              </div>
            </div>

            <div class="box_general_3">
              <div class="indent_title_in">
                <i class="icon-building"></i>
                <h3>About Hospital</h3>
              </div>
              <div class="wrapper_indent">
                <p class="mb-2">Fortis Memorial Research Institute is an outstanding multi-specialty quaternary
                  care hospital, having the top-notch infrastructure, advanced equipment, highly qualified and
                  experienced medical professionals and super sub-specialists.</p>
                <p class="mb-2">Accredited by NABH and ISO, FMRI is 1000 bedded medical facility endowed with a
                  dedicated team of 200 world-renowned doctors, covering a number of specialties, who aim to provide
                  the best quality medical care to all the patients, national as well as international.</p>
                <p>This hospital is well set up with the latest technologies and equipment throughout all the
                  specialties and research labs, which are accredited by NABL. This ensures that the patients at FMRI
                  receive diagnostic results and treatment with high accuracy and in minimum time.</p>

                <h6>Infrastructure</h6>
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="bullets">
                      <li>MRI is a world-class hospital with state-of-art infrastructure, providing impeccable
                        healthcare services, making it a sound choice for overseas patients looking for getting the
                        best medical treatment in India.</li>
                      <li>Have in-house Coordinator-cum-interpreters who provide translation in various languages, so
                        that the international patient and attendant always remain updated on the treatment plan and
                        procedure with absolute clarity.</li>
                      <li>This hospital also has a Lounge for International Patients where patients from abroad can be
                        assisted by relevant professionals from the start to the end of their journey. It also
                        facilitates as a one-stop desk for admission, billing, and discharge or for getting
                        information.</li>
                    </ul>
                  </div>
                </div>

                <h6 class="mt-4">Services for International patients</h6>
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="bullets">
                      <li>FMRI is a world-class hospital with state-of-art infrastructure, providing impeccable
                        healthcare services, making it a sound choice for overseas patients looking for getting the
                        best medical treatment in India.</li>
                      <li>Have in-house Coordinator-cum-interpreters who provide translation in various languages, so
                        that the international patient and attendant always remain updated on the treatment plan and
                        procedure with absolute clarity.</li>
                      <li>This hospital also has a Lounge for International Patients where patients from abroad can be
                        assisted by relevant professionals from the start to the end of their journey. It also
                        facilitates as a one-stop desk for admission, billing, and discharge or for getting
                        information.</li>
                    </ul>
                  </div>
                </div>

                <h6 class="mt-4">Awards and recognition</h6>
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="bullets">
                      <li>“Certificate of Merit” at DL SHAH Awards (QCI) for Quality Improvement Project – ‘Improving
                        Compliance to Surgical Safety Checklist’.</li>
                      <li>Received award for ‘Green Hospital’ for 2014 from Association of Healthcare Providers India
                        (AHPI)</li>
                      <li>Awarded at Frost and Sullivan Awards 2015 under Project Evaluation & Recognition Program,
                        for two projects :</li>
                      <li>Safety - "Improving Compliance to the Surgical Safety Check list (SSCL) at a quaternary care
                        Private Healthcare.</li>
                      <li>Process Innovation - Indigenously Developed Technique for Total Body Irradiation</li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div id="section_2">
            <div id="detail-title">
              <div class="container">Treatments</div>
            </div>
            <div class="box_general_3">
              <div class="">
                <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc
                  tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit.</p>

                <div class="row">
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>Alternative Treatments</li>
                      <li>Minimally Invasive Surgery</li>
                      <li>Gastroenterology Treatment</li>
                      <li>Urology Treatments</li>
                      <li>Bariatric Treatment</li>
                      <li>Cancer Treatment</li>
                      <li>Ophthalmology</li>
                      <li>Infertility Treatment</li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>Multi Organ Transplant</li>
                      <li>Oncology Treatment</li>
                      <li>ENT Treatment</li>
                      <li>Cardiology Treatments</li>
                      <li>Cosmetic Surgery</li>
                      <li>Dental Treatments</li>
                      <li>Neuro and Spine Surgery</li>
                      <li>Orthopedics Surgery</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="section_3">
            <div id="detail-title">
              <div class="container">Doctors</div>
            </div>
            <div class="box_general_3 p-3">
              <div class="strip_list wow fadeIn animated animated">
                <div class="row">
                  <div class="col-md-3"><img src="{{ url('front') }}/img/doctor_listing_1.jpg" alt=""
                      class="img-fluid rounded-circle"></div>
                  <div class="col-md-9">
                    <small>Ophthalmologist | Director & Head Of Department</small>
                    <h3 class="mt-2">Doctor Name Here</h3>
                    <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                          class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                        <b>(145)</b></span></p>
                    <p><i class="icon-graduation-cap-1"></i> MBBS, MD (AIIMS), DNB, FRCS</p>
                    <p><i class="icon-location-outline"></i> Noida City, India</p>
                    <ul>
                      <li class="btn"><a href="get-free-quote.html">Contact Doctor</a></li>
                      <li class="btn-bdr"><a href="doctor-detail-page.html">View Detailed Profile</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="strip_list wow fadeIn animated animated">
                <div class="row">
                  <div class="col-md-3"><img src="{{ url('front') }}/img/doctor_listing_2.jpg" alt=""
                      class="img-fluid rounded-circle"></div>
                  <div class="col-md-9">
                    <small>Ophthalmologist | Director & Head Of Department</small>
                    <h3 class="mt-2">Doctor Name Here</h3>
                    <p><span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                          class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i>
                        <b>(145)</b></span></p>
                    <p><i class="icon-location-outline"></i> Noida City, India</p>
                    <p><i class="icon-graduation-cap-1"></i> MBBS, MD (AIIMS), DNB, FRCS</p>
                    <ul>
                      <li class="btn"><a href="get-free-quote.html">Contact Doctor</a></li>
                      <li class="btn-bdr"><a href="doctor-detail-page.html">View Detailed Profile</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div align="center"><a href="doctor.html" class="btn_1 text-center pt-2">View all</a></div>
            </div>
          </div>

          <div id="section_4">
            <div id="detail-title">
              <div class="container">Facilities</div>
            </div>
            <div class="box_general_3">
              <div class="">
                <div class="row">
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>24 Hr Pharmacy</li>
                      <li>Airport Pick-n-Drop</li>
                      <li>Ambulance Services</li>
                      <li>Blood Bank</li>
                      <li>Car Parking</li>
                      <li>Dry Cleaning</li>
                      <li>Emergency & Trauma Centre</li>
                      <li>Family Accommodation</li>
                      <li>Fitness Centre</li>
                      <li>Flight Booking</li>
                      <li>Hotel Booking</li>
                      <li>Intensive Care Unit</li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="bullets">
                      <li>International Patients Lounge</li>
                      <li>Mobility Accessible Rooms</li>
                      <li>Nursery / Nanny Services</li>
                      <li>Online report facility</li>
                      <li>Pathology Lab</li>
                      <li>Private Rooms</li>
                      <li>Radiology Lab</li>
                      <li>Rehabilitation</li>
                      <li>Religious Facilities</li>
                      <li>Special Dietary Requests</li>
                      <li>Translation services</li>
                      <li>Travel Booking assistance</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="section_5">
            <div class="tabs_styled_2">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-bs-toggle="tab" href="#reviews"
                    role="tab" aria-controls="reviews">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general"
                    role="tab" aria-controls="general" aria-expanded="true">Write a review</a></li>
              </ul>

              <div class="tab-content">

                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <div class="reviews-container">
                    <div class="row">
                      <div class="col-lg-3">
                        <div id="review_summary">
                          <strong>4.7</strong>
                          <div class="rating">
                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                              class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                          </div>
                          <small>Based on 4 reviews</small>
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="row">
                          <div class="col-lg-10 col-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10 col-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10 col-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10 col-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10 col-9">
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                        </div>
                      </div>
                    </div>

                    <hr class="mt-2">

                    <div class="review-box clearfix">
                      <div class="rev-content">
                        <div class="rating">
                          <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                            class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <div class="rev-info">Admin – April 03, 2016:</div>
                        <div class="rev-text">
                          <p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                            sociis natoque penatibus et magnis dis</p>
                        </div>
                      </div>
                    </div>

                    <div class="review-box clearfix">
                      <div class="rev-content">
                        <div class="rating">
                          <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                            class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <div class="rev-info">Ahsan – April 01, 2016</div>
                        <div class="rev-text">
                          <p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                            sociis natoque penatibus et magnis dis</p>
                        </div>
                      </div>
                    </div>

                    <div class="review-box clearfix">
                      <div class="rev-content">
                        <div class="rating"><i class="icon-star voted"></i><i class="icon_star voted"></i><i
                            class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                        </div>
                        <div class="rev-info">Sara – March 31, 2016</div>
                        <div class="rev-text">
                          <p>Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum
                            sociis natoque penatibus et magnis dis</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade p-4" id="general" role="tabpanel" aria-labelledby="general-tab">
                  <div class="write_review row">

                    <div class="col-md-12 mb-0">
                      <h5 class="mb-2">Reviews</h5>
                      <div class="review-stars">
                        <p><i class="icon_star active"></i><i class="icon_star active"></i><i
                            class="icon_star active"></i><i class="icon_star active"></i><i
                            class="icon_star active"></i> Communication responsiveness</p>
                        <p><i class="icon_star active"></i><i class="icon_star active"></i><i
                            class="icon_star active"></i><i class="icon_star active"></i><i class="icon_star"></i>
                          Environment, Cleanliness, Amenities</p>
                        <p><i class="icon_star active"></i><i class="icon_star active"></i><i
                            class="icon_star active"></i><i class="icon_star"></i><i class="icon_star"></i>
                          Hospital Stay/Room comfort</p>
                        <p><i class="icon_star active"></i><i class="icon_star active"></i><i class="icon_star"></i><i
                            class="icon_star"></i><i class="icon_star"></i> Staff
                          Professionalism & Friendliness</p>
                        <p><i class="icon_star active"></i><i class="icon_star"></i><i class="icon_star"></i><i
                            class="icon_star"></i><i class="icon_star"></i> International Patient Services</p>
                      </div>
                    </div>

                    <hr class="mb-4 mt-2">

                    <div class="col-md-12 mb-0">
                      <h5>Share your Feedback</h5>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-2">Communication responsiveness</div>
                    <div class="col-lg-2 col-md-2 mb-2">
                      <div class="star-rating-new">
                        <div class="star-rating-new-wrap">
                          <input class="star-rating-new-input" id="1" type="radio" name="rating"
                            value="1">
                          <label class="star-rating-new-ico icon_star_alt" for="1"></label>
                          <input class="star-rating-new-input" id="2" type="radio" name="rating"
                            value="2">
                          <label class="star-rating-new-ico icon_star_alt" for="2"></label>
                          <input class="star-rating-new-input" id="3" type="radio" name="rating"
                            value="3">
                          <label class="star-rating-new-ico icon_star_alt" for="3"></label>
                          <input class="star-rating-new-input" id="4" type="radio" name="rating"
                            value="4">
                          <label class="star-rating-new-ico icon_star_alt" for="4"></label>
                          <input class="star-rating-new-input" id="5" type="radio" name="rating"
                            value="5">
                          <label class="star-rating-new-ico icon_star_alt" for="5"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-2">Environment, Cleanliness, Amenities</div>
                    <div class="col-lg-2 col-md-2 mb-2">
                      <div class="star-rating-new">
                        <div class="star-rating-new-wrap">
                          <input class="star-rating-new-input" id="6" type="radio" name="rating2"
                            value="1">
                          <label class="star-rating-new-ico icon_star_alt" for="6"></label>
                          <input class="star-rating-new-input" id="7" type="radio" name="rating2"
                            value="2">
                          <label class="star-rating-new-ico icon_star_alt" for="7"></label>
                          <input class="star-rating-new-input" id="8" type="radio" name="rating2"
                            value="3">
                          <label class="star-rating-new-ico icon_star_alt" for="8"></label>
                          <input class="star-rating-new-input" id="9" type="radio" name="rating2"
                            value="4">
                          <label class="star-rating-new-ico icon_star_alt" for="9"></label>
                          <input class="star-rating-new-input" id="10" type="radio" name="rating2"
                            value="5">
                          <label class="star-rating-new-ico icon_star_alt" for="10"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-2">Hospital Stay/Room comfort</div>
                    <div class="col-lg-2 col-md-2 mb-2">
                      <div class="star-rating-new">
                        <div class="star-rating-new-wrap">
                          <input class="star-rating-new-input" id="11" type="radio" name="rating3"
                            value="1">
                          <label class="star-rating-new-ico icon_star_alt" for="11"></label>
                          <input class="star-rating-new-input" id="12" type="radio" name="rating3"
                            value="2">
                          <label class="star-rating-new-ico icon_star_alt" for="12"></label>
                          <input class="star-rating-new-input" id="13" type="radio" name="rating3"
                            value="3">
                          <label class="star-rating-new-ico icon_star_alt" for="13"></label>
                          <input class="star-rating-new-input" id="14" type="radio" name="rating3"
                            value="4">
                          <label class="star-rating-new-ico icon_star_alt" for="14"></label>
                          <input class="star-rating-new-input" id="15" type="radio" name="rating3"
                            value="5">
                          <label class="star-rating-new-ico icon_star_alt" for="15"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-2">Staff Professionalism & Friendliness</div>
                    <div class="col-lg-2 col-md-2 mb-2">
                      <div class="star-rating-new">
                        <div class="star-rating-new-wrap">
                          <input class="star-rating-new-input" id="16" type="radio" name="rating4"
                            value="1">
                          <label class="star-rating-new-ico icon_star_alt" for="16"></label>
                          <input class="star-rating-new-input" id="17" type="radio" name="rating4"
                            value="2">
                          <label class="star-rating-new-ico icon_star_alt" for="17"></label>
                          <input class="star-rating-new-input" id="18" type="radio" name="rating4"
                            value="3">
                          <label class="star-rating-new-ico icon_star_alt" for="18"></label>
                          <input class="star-rating-new-input" id="19" type="radio" name="rating4"
                            value="4">
                          <label class="star-rating-new-ico icon_star_alt" for="19"></label>
                          <input class="star-rating-new-input" id="20" type="radio" name="rating4"
                            value="5">
                          <label class="star-rating-new-ico icon_star_alt" for="20"></label>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 mb-2">International Patient Services</div>
                    <div class="col-lg-2 col-md-2 mb-2">
                      <div class="star-rating-new">
                        <div class="star-rating-new-wrap">
                          <input class="star-rating-new-input" id="21" type="radio" name="rating5"
                            value="1">
                          <label class="star-rating-new-ico icon_star_alt" for="21"></label>
                          <input class="star-rating-new-input" id="22" type="radio" name="rating5"
                            value="2">
                          <label class="star-rating-new-ico icon_star_alt" for="22"></label>
                          <input class="star-rating-new-input" id="23" type="radio" name="rating5"
                            value="3">
                          <label class="star-rating-new-ico icon_star_alt" for="23"></label>
                          <input class="star-rating-new-input" id="24" type="radio" name="rating5"
                            value="4">
                          <label class="star-rating-new-ico icon_star_alt" for="24"></label>
                          <input class="star-rating-new-input" id="25" type="radio" name="rating5"
                            value="5">
                          <label class="star-rating-new-ico icon_star_alt" for="25"></label>
                        </div>
                      </div>
                    </div>

                    <div class="w-100 p-2"></div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" placeholder="Your Name">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="Your Email">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Treatment</label>
                        <input class="form-control" placeholder="Treatment">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tell us about your experience</label>
                        <textarea class="form-control" style="height:100px;" placeholder="Tell us about your experience (Required)"></textarea>
                      </div>
                    </div>

                    <div class="col-md-3"><a href="" class="btn_1 text-center pt-2">Submit review</a></div>

                  </div>
                </div>

              </div>
            </div>
          </div>

          <div id="section_6">
            <div id="detail-title">
              <div class="container">Gallery</div>
            </div>
            <div class="box_general_3">
              <div class="">
                <div class="row">
                  <div class="col-lg-4 mb-3"><a href="img/doctor_listing_1.jpg" class="fancybox"
                      data-fancybox="gallery" data-caption=""><img src="{{ url('front') }}/img/doctor_listing_1.jpg"
                        alt="" class="img-fluid"></a></div>
                  <div class="col-lg-4 mb-3"><a href="img/doctor_listing_2.jpg" class="fancybox"
                      data-fancybox="gallery" data-caption=""><img src="{{ url('front') }}/img/doctor_listing_2.jpg"
                        alt="" class="img-fluid"></a></div>
                  <div class="col-lg-4 mb-3"><a href="img/doctor_listing_3.jpg" class="fancybox"
                      data-fancybox="gallery" data-caption=""><img src="{{ url('front') }}/img/doctor_listing_3.jpg"
                        alt="" class="img-fluid"></a></div>

                  <h5 class="mt-2">Videos</h5>
                  <div class="col-lg-4 mb-3"><iframe width="100%" height="190"
                      src="https://www.youtube.com/embed/uCi6i2CEhwM" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe></div>
                  <div class="col-lg-4 mb-3"><iframe width="100%" height="190"
                      src="https://www.youtube.com/embed/uCi6i2CEhwM" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe></div>
                  <div class="col-lg-4 mb-3"><iframe width="100%" height="190"
                      src="https://www.youtube.com/embed/uCi6i2CEhwM" title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe></div>
                </div>
              </div>
            </div>
          </div>

          <div id="section_7">
            <div id="detail-title">
              <div class="container">Faqs</div>
            </div>
            <div class="box_general_3 p-3">
              <div role="tablist" class="accordion" id="payment">
                <div class="card">
                  <div class="card-header" role="tab">
                    <h5 class="mb-0"><a data-bs-toggle="collapse" href="#collapseOne_payment"
                        aria-expanded="true"><i class="indicator icon_minus_alt2"></i>Introdocution</a></h5>
                  </div>
                  <div id="collapseOne_payment" class="collapse show" role="tabpanel" data-bs-parent="#payment">
                    <div class="card-body">
                      <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                        proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                        raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                        sustainable VHS.</p>
                      <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" role="tab">
                    <h5 class="mb-0"><a class="collapsed" data-bs-toggle="collapse" href="#collapseTwo_payment"
                        aria-expanded="false"><i class="indicator icon_plus_alt2"></i>Generative Modeling Review</a>
                    </h5>
                  </div>
                  <div id="collapseTwo_payment" class="collapse" role="tabpanel" data-bs-parent="#payment">
                    <div class="card-body">
                      <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                        proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                        raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                        sustainable VHS.</p>
                      <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header" role="tab">
                    <h5 class="mb-0"><a class="collapsed" data-bs-toggle="collapse" href="#collapseThree_payment"
                        aria-expanded="false"><i class="indicator icon_plus_alt2"></i>Variational Autoencoders</a></h5>
                  </div>
                  <div id="collapseThree_payment" class="collapse" role="tabpanel" data-bs-parent="#payment">
                    <div class="card-body">
                      <p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                        proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                        raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                        sustainable VHS.</p>
                      <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                        squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                        nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                        single-origin coffee nulla assumenda shoreditch et.</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>

        <aside class="col-xl-4 col-lg-4" id="sidebar">
          <div class="box_general_3 booking">
            <div class="title">
              <h3>Get a Free Quote</h3>
              <!--small>Monday to Friday 09.00am-06.00pm</small-->
            </div>
            <form method="post" action="assets/booking.php" id="booking">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Treatment Name*" name="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Patient Full Name*" name="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Age*" name="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <select class="form-control form-select">
                      <option value="">Gender</option>
                      <option value="">Male</option>
                      <option value="">Female</option>
                      <option value="">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Address*" name="email_booking"
                      id="email_booking">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <select class="form-control form-select" name="nationality" required="required">
                      <option value="">Nationality (Passport) *</option>
                      <option value="Afghan">Afghan</option>
                      <option value="Albanian">Albanian</option>
                      <option value="Algerian">Algerian</option>
                      <option value="American">American</option>
                      <option value="Andorran">Andorran</option>
                      <option value="Angolan">Angolan</option>
                      <option value="Antiguans">Antiguans</option>
                      <option value="Argentinean">Argentinean</option>
                      <option value="Armenian">Armenian</option>
                      <option value="Australian">Australian</option>
                      <option value="Austrian">Austrian</option>
                      <option value="Azerbaijani">Azerbaijani</option>
                      <option value="Bahamian">Bahamian</option>
                      <option value="Bahraini">Bahraini</option>
                      <option value="Bangladeshi">Bangladeshi</option>
                      <option value="Barbadian">Barbadian</option>
                      <option value="Barbudans">Barbudans</option>
                      <option value="Batswana">Batswana</option>
                      <option value="Belarusian">Belarusian</option>
                      <option value="Belgian">Belgian</option>
                      <option value="Belizean">Belizean</option>
                      <option value="Beninese">Beninese</option>
                      <option value="Bhutanese">Bhutanese</option>
                      <option value="Bolivian">Bolivian</option>
                      <option value="Bosnian">Bosnian</option>
                      <option value="Brazilian">Brazilian</option>
                      <option value="British">British</option>
                      <option value="Bruneian">Bruneian</option>
                      <option value="Bulgarian">Bulgarian</option>
                      <option value="Burkinabe">Burkinabe</option>
                      <option value="Burmese">Burmese</option>
                      <option value="Burundian">Burundian</option>
                      <option value="Cambodian">Cambodian</option>
                      <option value="Cameroonian">Cameroonian</option>
                      <option value="Canadian">Canadian</option>
                      <option value="Cape Verdean">Cape Verdean</option>
                      <option value="Central African">Central African</option>
                      <option value="Chadian">Chadian</option>
                      <option value="Chilean">Chilean</option>
                      <option value="Chinese">Chinese</option>
                      <option value="Colombian">Colombian</option>
                      <option value="Comoran">Comoran</option>
                      <option value="Congolese">Congolese</option>
                      <option value="Costa Rican">Costa Rican</option>
                      <option value="Croatian">Croatian</option>
                      <option value="Cuban">Cuban</option>
                      <option value="Cypriot">Cypriot</option>
                      <option value="Czech">Czech</option>
                      <option value="Danish">Danish</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominican">Dominican</option>
                      <option value="Dutch">Dutch</option>
                      <option value="East Timorese">East Timorese</option>
                      <option value="Ecuadorean">Ecuadorean</option>
                      <option value="Egyptian">Egyptian</option>
                      <option value="Emirian">Emirian</option>
                      <option value="Equatorial Guinean">Equatorial Guinean</option>
                      <option value="Eritrean">Eritrean</option>
                      <option value="Estonian">Estonian</option>
                      <option value="Ethiopian">Ethiopian</option>
                      <option value="Fijian">Fijian</option>
                      <option value="Filipino">Filipino</option>
                      <option value="Finnish">Finnish</option>
                      <option value="French">French</option>
                      <option value="Gabonese">Gabonese</option>
                      <option value="Gambian">Gambian</option>
                      <option value="Georgian">Georgian</option>
                      <option value="German">German</option>
                      <option value="Ghanaian">Ghanaian</option>
                      <option value="Greek">Greek</option>
                      <option value="Grenadian">Grenadian</option>
                      <option value="Guatemalan">Guatemalan</option>
                      <option value="Guinea-Bissauan">Guinea-Bissauan</option>
                      <option value="Guinean">Guinean</option>
                      <option value="Guyanese">Guyanese</option>
                      <option value="Haitian">Haitian</option>
                      <option value="Herzegovinian">Herzegovinian</option>
                      <option value="Honduran">Honduran</option>
                      <option value="Hungarian">Hungarian</option>
                      <option value="I-Kiribati">I-Kiribati</option>
                      <option value="Icelander">Icelander</option>
                      <option value="Indian">Indian</option>
                      <option value="Indonesian">Indonesian</option>
                      <option value="Iranian">Iranian</option>
                      <option value="Iraqi">Iraqi</option>
                      <option value="Irish">Irish</option>
                      <option value="Israeli">Israeli</option>
                      <option value="Italian">Italian</option>
                      <option value="Ivorian">Ivorian</option>
                      <option value="Jamaican">Jamaican</option>
                      <option value="Japanese">Japanese</option>
                      <option value="Jordanian">Jordanian</option>
                      <option value="Kazakhstani">Kazakhstani</option>
                      <option value="Kenyan">Kenyan</option>
                      <option value="Kittian and Nevisian">Kittian and Nevisian</option>
                      <option value="Kuwaiti">Kuwaiti</option>
                      <option value="Kyrgyz">Kyrgyz</option>
                      <option value="Laotian">Laotian</option>
                      <option value="Latvian">Latvian</option>
                      <option value="Lebanese">Lebanese</option>
                      <option value="Liberian">Liberian</option>
                      <option value="Libyan">Libyan</option>
                      <option value="Liechtensteiner">Liechtensteiner</option>
                      <option value="Lithuanian">Lithuanian</option>
                      <option value="Luxembourger">Luxembourger</option>
                      <option value="Macedonian">Macedonian</option>
                      <option value="Malagasy">Malagasy</option>
                      <option value="Malawian">Malawian</option>
                      <option value="Malaysian">Malaysian</option>
                      <option value="Maldivan">Maldivan</option>
                      <option value="Malian">Malian</option>
                      <option value="Maltese">Maltese</option>
                      <option value="Marshallese">Marshallese</option>
                      <option value="Mauritanian">Mauritanian</option>
                      <option value="Mauritian">Mauritian</option>
                      <option value="Mexican">Mexican</option>
                      <option value="Micronesian">Micronesian</option>
                      <option value="Moldovan">Moldovan</option>
                      <option value="Monacan">Monacan</option>
                      <option value="Mongolian">Mongolian</option>
                      <option value="Moroccan">Moroccan</option>
                      <option value="Mosotho">Mosotho</option>
                      <option value="Motswana">Motswana</option>
                      <option value="Mozambican">Mozambican</option>
                      <option value="Namibian">Namibian</option>
                      <option value="Nauruan">Nauruan</option>
                      <option value="Nepalese">Nepalese</option>
                      <option value="New Zealander">New Zealander</option>
                      <option value="Nicaraguan">Nicaraguan</option>
                      <option value="Nigerian">Nigerian</option>
                      <option value="Nigerien">Nigerien</option>
                      <option value="North Korean">North Korean</option>
                      <option value="Northern Irish">Northern Irish</option>
                      <option value="Norwegian">Norwegian</option>
                      <option value="Omani">Omani</option>
                      <option value="Pakistani">Pakistani</option>
                      <option value="Palauan">Palauan</option>
                      <option value="Palestinian">Palestinian</option>
                      <option value="Panamanian">Panamanian</option>
                      <option value="Papua New Guinean">Papua New Guinean</option>
                      <option value="Paraguayan">Paraguayan</option>
                      <option value="Peruvian">Peruvian</option>
                      <option value="Polish">Polish</option>
                      <option value="Portuguese">Portuguese</option>
                      <option value="Qatari">Qatari</option>
                      <option value="Romanian">Romanian</option>
                      <option value="Russian">Russian</option>
                      <option value="Rwandan">Rwandan</option>
                      <option value="Saint Lucian">Saint Lucian</option>
                      <option value="Salvadoran">Salvadoran</option>
                      <option value="Samoan">Samoan</option>
                      <option value="San Marinese">San Marinese</option>
                      <option value="Sao Tomean">Sao Tomean</option>
                      <option value="Saudi">Saudi</option>
                      <option value="Scottish">Scottish</option>
                      <option value="Senegalese">Senegalese</option>
                      <option value="Serbian">Serbian</option>
                      <option value="Seychellois">Seychellois</option>
                      <option value="Sierra Leonean">Sierra Leonean</option>
                      <option value="Singaporean">Singaporean</option>
                      <option value="Slovakian">Slovakian</option>
                      <option value="Slovenian">Slovenian</option>
                      <option value="Solomon Islander">Solomon Islander</option>
                      <option value="Somali">Somali</option>
                      <option value="South African">South African</option>
                      <option value="South Korean">South Korean</option>
                      <option value="Spanish">Spanish</option>
                      <option value="Sri Lankan">Sri Lankan</option>
                      <option value="Sudanese">Sudanese</option>
                      <option value="Surinamer">Surinamer</option>
                      <option value="Swazi">Swazi</option>
                      <option value="Swedish">Swedish</option>
                      <option value="Swiss">Swiss</option>
                      <option value="Syrian">Syrian</option>
                      <option value="Taiwanese">Taiwanese</option>
                      <option value="Tajik">Tajik</option>
                      <option value="Tanzanian">Tanzanian</option>
                      <option value="Thai">Thai</option>
                      <option value="Togolese">Togolese</option>
                      <option value="Tongan">Tongan</option>
                      <option value="Trinidadian/Tobagonian">Trinidadian/Tobagonian</option>
                      <option value="Tunisian">Tunisian</option>
                      <option value="Turkish">Turkish</option>
                      <option value="Tuvaluan">Tuvaluan</option>
                      <option value="Ugandan">Ugandan</option>
                      <option value="Ukrainian">Ukrainian</option>
                      <option value="Uruguayan">Uruguayan</option>
                      <option value="Uzbekistani">Uzbekistani</option>
                      <option value="Venezuelan">Venezuelan</option>
                      <option value="Vietnamese">Vietnamese</option>
                      <option value="Welsh">Welsh</option>
                      <option value="Yemenite">Yemenite</option>
                      <option value="Zambian">Zambian</option>
                      <option value="Zimbabwean">Zimbabwean</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                    <select class="form-control form-select">
                      <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                      <option data-countryCode="US" value="1">USA (+1)</option>
                      <optgroup label="Other countries">
                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                        <option data-countryCode="CN" value="86">China (+86)</option>
                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                        <option data-countryCode="FR" value="33">France (+33)</option>
                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
                        <option data-countryCode="IN" value="91">India (+91)</option>
                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                      </optgroup>
                    </select>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile No.*" name="">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea rows="5" name="booking_message" class="form-control" style="height:80px;"
                      placeholder="Medical Concerns/Questions*"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Upload Medical Records (jpeg, jpg, doc, docx, pdf)</label>
                    <div class="fileupload"><input type="file" name="fileupload" accept="image/*"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" id="verify_booking" class="form-control"
                      placeholder="Human verify: 3 + 1 =?">
                  </div>
                </div>
                <div style="position:relative;"><input type="submit" class="btn_1 full-width"
                    value="Get Free Quotation"></div>
            </form>
          </div>
        </aside>

      </div>
    </div>

    <hr>

    <div class="container pb-5">

      <div class="row mt-4">
        <div class="main_title mb-2 text-start">
          <h4><strong>Related HOSPITALS</strong></h4>
        </div>

        <div id="hospital" class="owl-carousel owl-theme">

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/fortis-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">Frotis Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">Gurugram, India (F)</a></p>
              </div>
            </div>
          </div>

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/apollo-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">AIMS Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">New Delhi, India (F)</a></p>
              </div>
            </div>
          </div>

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/max-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">Max Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">Nodia, India (F)</a></p>
              </div>
            </div>
          </div>

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/narayan-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">Naraya Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">Ghaziabad, India (F)</a></p>
              </div>
            </div>
          </div>

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/apollo-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">AIMS Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">New Delhi, India (F)</a></p>
              </div>
            </div>
          </div>

          <div class="item p-3">
            <div class="box_list mb-0">
              <figure class="h-auto border-bottom pb-2"><img src="{{ url('front') }}/img/fortis-logo.png"
                  class="img-fluid" alt=""></figure>
              <div class="wrapper p-3">
                <h6 class="mb-1"><a href="hospital-detail-page.html">Frotis Hospital (D)</a></h6>
                <p class="m-0"><a href="hospital.html" class="text-black-100">Gurugram, India (F)</a></p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

    <hr>

    <div class="container">
      <div class="row mt-4">
        <div class="col-12">
          <div class="main_title mb-2 text-start">
            <h4><strong>Top Doctors of the Apollo Hospital India</strong></h4>
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

  </main>
@endsection
