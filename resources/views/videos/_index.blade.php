@extends('layouts.site')

@section('content')
<div class="section">
  <div class="mainContainer">
    <div class="sectionTitle">
      <h2>{{ __('main.video_gallery') }}</h2>
    </div>
    <div class="itemsList">
      <ul>
        <?php foreach ($model as $video): ?>
        <li>
          <div class="itemBox">
            <a href="{{ route('site.videos.show', $video->id) }}" class="itemImage videoImage">
              <div style="background-image:url({{ getMedium($video->image) }});" class="imgBox"></div>
            </a>
            <div class="itemTitle"><a href="{{ route('site.videos.show', $video->id) }}">{{ $video->title }}</a></div>
            <div class="itemDate">{{ mDateFormat($video->date) }}</div>
          </div>
        </li>
        <?php endforeach ?>
      </ul>
    </div>
    {{ $model->links('pagination.site', ['model' => $model]) }}
  </div>
</div>
@endsection
