@php
  $menuArr = ['overview', 'photos', 'videos', 'faqs', 'testimonials', 'facilities'];
  $hospital_id = Request::segment(4);
  $curMenu = Request::segment(3);
@endphp
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <span style="float:left;">
          @foreach ($menuArr as $item)
            <a href="{{ aurl('treatment/' . $item . '/' . $hospital_id) }}"
              class="btn btn-xs btn{{ $curMenu == $item ? '' : '-outline' }}-primary">{{ ucwords($item) }}</a>
          @endforeach
        </span>
      </div>
    </div>
  </div>
</div>
