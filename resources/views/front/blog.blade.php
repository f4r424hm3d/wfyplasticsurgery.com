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
          <li>Blog</li>
        </ul>
      </div>
    </div>

    <div class="container margin_60">
      <div class="main_title">
        <h1>Blog</h1>
      </div>

      <div class="row">
        <div class="col-lg-9">
          @foreach ($blogs as $row)
            <article class="blog wow fadeIn">
              <div class="row g-0">
                <div class="col-lg-4">
                  <figure>
                    <a href="{{ url('blog/' . $row->category->category_slug . '/' . $row->slug) }}"><img
                        src="{{ asset($row->thumbnail_path) }}" alt="{{ $row->title }}">
                      <div class="preview"><span>Read more</span></div>
                    </a>
                  </figure>
                </div>
                <div class="col-lg-8">
                  <div class="post_info">
                    <small>{{ getFormattedDate($row->created_at, 'd M, Y') }}</small>
                    <h3><a
                        href="{{ url('blog/' . $row->category->category_slug . '/' . $row->slug) }}">{{ $row->title }}</a>
                    </h3>
                    <p>{{ $row->shortnote }}</p>
                    <ul>
                      <li>
                        <div class="thumb">
                          <img src="{{ profilePic($row->author->profile_pic_path) }}"
                            alt="{{ $row->author->author_name }}">
                        </div> {{ $row->author->author_name }}
                      </li>
                      <li>
                        {{-- <i class="icon_comment_alt"></i> --}}
                        &nbsp;</li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
          @endforeach
          <nav aria-label="...">
            {!! $blogs->links('pagination::bootstrap-4') !!}
            {{-- <ul class="pagination pagination-sm">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul> --}}
          </nav>
        </div>

        <aside class="col-lg-3">
          <div class="widget">
            <div class="widget-title">
              <h4>Blog Categories</h4>
            </div>
            <ul class="cats">

              @foreach ($blogCategories as $bc)
                <li><a href="{{ url('blog/' . $bc->category->category_slug) }}">{{ $bc->category->category_name }}</a>
                </li>
              @endforeach

            </ul>
          </div>

        </aside>
      </div>
    </div>

  </main>
@endsection
