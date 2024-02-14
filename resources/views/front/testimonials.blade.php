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
          <li>Testimonials</li>
        </ul>
      </div>
    </div>

    <div class="bg_color_3">
      <div class="container margin_60_35">
        <div class="main_title">
          <h2>What <strong>user says</strong> about us</h2>
          <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row box_general">
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
        {!! $testimonials->links('pagination::bootstrap-5') !!}

  </main>
@endsection
