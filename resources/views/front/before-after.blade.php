@extends('front.layouts.main')
@push('seo_meta_tag')
  @include('front.layouts.static_page_meta_tag')
@endpush
@section('main-section')
  <main>
    <div id="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Before & After</li>
        </ul>
      </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
      <div class="row">
        <aside class="col-lg-3" id="sidebar">
          <div class="box_style_cat" id="faq_box">
            <ul id="cat_nav">
              @php
                $i = 1;
              @endphp
              @foreach ($categories as $row)
                <li><a href="#{{ $row->category_slug }}" class="{{ $i == 1 ? 'active' : '' }}"><i
                      class="icon_images"></i>{{ $row->category_name }}</a></li>
                @php
                  $i++;
                @endphp
              @endforeach
            </ul>
          </div>
          <!--/sticky -->
        </aside>
        <!--/aside -->

        <div class="col-lg-9" id="faq">
          @foreach ($categories as $row)
            <div id="{{ $row->category_slug }}">
              <div id="detail-title">
                <div class="container">{{ $row->category_name }}</div>
              </div>
              <div class="box_general_3">
                <div class="">
                  <div class="row">
                    @foreach ($row->photos as $photo)
                      <div class="col-lg-3 mb-3">
                        <a href="{{ asset($photo->photo_path) }}" class="fancybox" data-fancybox="gallery"
                          data-caption="">
                          <img src="{{ asset($photo->photo_path) }}" alt="Before After Photo" class="img-fluid"></a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- /col -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </main>
@endsection
