@php
  use App\Models\TreatmentCategory;
  $categories = TreatmentCategory::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  @stack('seo_meta_tag')

  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <!-- BASE CSS -->
  <link href="{{ url('front') }}/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('front') }}/css/style.css" rel="stylesheet">
  <link href="{{ url('front') }}/css/menu.css" rel="stylesheet">
  <link href="{{ url('front') }}/css/vendors.css" rel="stylesheet">
  <link href="{{ url('front') }}/css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
  <link href="{{ url('front') }}/css/blog.css" rel="stylesheet">

  <!-- Google Tag Manager -->
  <script>
    ! function(e, t, a, r, g) {
      e[r] = e[r] || [], e[r].push({
        "gtm.start": new Date().getTime(),
        event: "gtm.js"
      });
      var n = t.getElementsByTagName(a)[0],
        s = t.createElement(a);
      s.async = !0, s.src = "https://www.googletagmanager.com/gtm.js?id=" + g + ("dataLayer" != r ? "&l=" + r : ""), n
        .parentNode.insertBefore(s, n)
    }(window, document, "script", "dataLayer", "GTM-T4ZDHCD");
  </script>
  <!-- End Google Tag Manager -->
  <!-- organization schema code -->
  <script type="application/ld+json">
    { "@context": "https://schema.org", "@type": "Organization", "@id":"https://www.innayatmedical.com/#organization", "name": "Innayat Medical", "url": "https://www.innayatmedical.com/", "logo": "{{ asset('/front/') }}/img/logo.png", "address": { "@type": "PostalAddress", "streetAddress": "B-16 Ground Floor, Mayfield Garden, Sector 50", "addressLocality": "Gurugram", "addressRegion": "Haryana", "postalCode": "122002", "addressCountry": "India" }, "contactPoint": { "@type": "ContactPoint", "contactType": "contact", "telephone": "+91-9870406867", "email": "info@innayatmedical.com" }, "sameAs": [ "https://www.facebook.com/innayatmedicaltourism/", "https://twitter.com/", "https://in.pinterest.com/", "https://www.instagram.com/", ] }
  </script>
</head>

<body>

  <!--<div id="preloader" class="Fixed">-->
  <!--  <div data-loader="circle-side"></div>-->
  <!--</div>-->
  <!-- /Preload-->

  <div id="page">
    <header class="header_sticky">
      <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </a>
      <!-- /btn_mobile-->

      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-6">
            <div id="logo_home"><a href="{{ url('/') }}" title="Logo"><img src="{{ url('front') }}/img/logo.png"></a>
            </div>
          </div>
          <div class="col-lg-10 col-6">
            <ul id="top_access" class="d-flex align-items-center">
              <li class="d-lg-block d-md-block d-xl-block d-sm-none d-xs-none d-none"><a href="tel:+918287185897"
                  class="btn_1 text-center pt-2 newbttn" style="color:#fff!important;">Call Now</a></li>
            </ul>
            <nav id="menu" class="main-menu">
              <ul>
                <li><span><a href="{{ url('/') }}">Home</a></span></li>
                <li>
                  <span><a href="#">About<i class="icon-down-open-mini"></i></a></span>
                  <ul>
                    <li><a href="{{ url('about-us') }}">About Company</a></li>
                    <li><a href="{{ url('testimonials') }}">Testimonials</a></li>
                    <li><a href="{{ url('blog') }}">Blog</a></li>
                    <li><a href="{{ url('faqs') }}">FAQs</a></li>
                  </ul>
                </li>
                <li><span><a href="{{ url('before-after') }}">Before &amp; After</a></span></li>
                @foreach ($categories as $row)
                  <li>
                    <span><a href="#">{{ $row->category_name }}<i class="icon-down-open-mini"></i></a></span>
                    <ul>
                      @foreach ($row->treatmentsSubCatNull as $ct)
                        <li><a href="{{ url('treatment/' . $ct->treatment_slug) }}">{{ $ct->treatment_name }}</a></li>
                      @endforeach
                      @foreach ($row->subCategory as $sc)
                        <li>
                          <span><a href="#0">{{ $sc->sub_category_name }}</a></span>
                          <ul>
                            @foreach ($sc->treatments as $tr)
                              <li><a href="{{ url('treatment/' . $tr->treatment_slug) }}">{{ $tr->treatment_name }}
                                </a></li>
                            @endforeach
                          </ul>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                @endforeach
                <li><span><a href="{{ url('contact-us') }}">Contact</a></span></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
