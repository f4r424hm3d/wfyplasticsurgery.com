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
          <li>Faqs</li>
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
                      class="icon_document_alt"></i>{{ $row->category_name }}</a></li>
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
            <h4 class="nomargin_top">{{ $row->category_name }}</h4>
            <div role="tablist" class="add_bottom_45 accordion" id="{{ $row->category_slug }}">
              @foreach ($row->faqs as $faq)
                <div class="card">
                  <div class="card-header" role="tab">
                    <h5 class="mb-0">
                      <a class="collapsed" data-bs-toggle="collapse" href="#collapse{{ $faq->id }}"
                        aria-expanded="false">
                        <i class="indicator icon_plus_alt2"></i>{{ $faq->question }}
                      </a>
                    </h5>
                  </div>
                  <div id="collapse{{ $faq->id }}" class="collapse" role="tabpanel" data-bs-parent="#payment">
                    <div class="card-body">
                      {{ $faq->answer }}
                    </div>
                  </div>
                </div>
              @endforeach
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
