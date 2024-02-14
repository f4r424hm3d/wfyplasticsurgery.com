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
          <li><a href="{{ url('/blog/') }}">Blog</a></li>
          <li><a href="{{ url('/blog/' . $blog->category->category_slug) }}">{{ $blog->category->category_name }}</a>
          </li>
          <li>{{ $blog->title }}</li>
        </ul>
      </div>
    </div>

    <div class="container margin_60">
      <div class="row">
        <div class="col-lg-9">
          <div class="bloglist singlepost">
            <p><img alt="{{ $blog->title }}" class="img-fluid" src="{{ asset($blog->thumbnail_path) }}"></p>
            <h1>{{ $blog->title }}</h1>
            <div class="postmeta">
              <ul>
                <li><i class="icon_clock_alt"></i> {{ getFormattedDate($blog->created_at, 'd/m/Y') }}</li>
                <li><a href="{{ url('/author/' . $blog->author->author_slug) }}"><i class="icon_pencil-edit"></i>
                    {{ $blog->author->author_name }}</a></li>
              </ul>
            </div>
            <div class="post-content">
              <div class="dropcaps">
                {!! $blog->description !!}
              </div>
            </div>
          </div>

        </div>

        <aside class="col-lg-3">

          <div class="widget">
            <div class="widget-title">
              <h4>Recent Posts</h4>
            </div>
            <ul class="comments-list">

              @foreach ($blogs as $recent)
                <li>
                  <div class="alignleft">
                    <a href="javascript:void()"><img src="{{ asset($recent->thumbnail_path) }}"
                        alt="{{ $recent->title }}"></a>
                  </div>
                  <small>{{ getFormattedDate($recent->created_at, 'd/m/Y') }}</small>
                  <h3><a href="{{ url('blog/' . $recent->category->category_slug . '/' . $recent->slug) }}"
                      title="{{ $recent->title }}">{{ $recent->title }}</a></h3>
                </li>
              @endforeach

            </ul>
          </div>

          <div class="widget">
            <div class="widget-title">
              <h4>Blog Categories</h4>
            </div>
            <ul class="cats">
              @foreach ($categories as $cat)
                <li><a href="{{ url('blog/' . $cat->category->category_slug) }}">{{ $cat->category->category_name }}</a>
                </li>
              @endforeach
            </ul>
          </div>

        </aside>
      </div>
    </div>

  </main>
@endsection
