@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main class="theia-exception">
    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Thank You</li>
        </ul>
      </div>
    </div>

    <div class="container margin_60">
      <div class="row">
        <div class="col-lg-12">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <center>
              <h1 class="text-success">Thank You for contacting us. We will contact you soon.</h1>
            </center>
          </div>
          </nav>
        </div>
      </div>
    </div>

  </main>
@endsection
