@extends('layouts.site')
@section('title', __('main.publications_about_us'))
@section('content')
<div class="section">
  <div class="mainContainer">
    <div class="sectionTitle">
      <h2>{{ __('main.publications_about_us') }}</h2>
    </div>
    <div class="itemsList">
      <ul>
        <?php foreach ($model as $item): ?>
        <li>
          <div class="itemBox">
            <a href="{{ route('site.publications.show', $item->id) }}" class="itemImage">
              <div style="background-image:url({{ getMedium($item->image) }});" class="imgBox"></div>
            </a>
            <div class="itemTitle"><a href="{{ route('site.publications.show', $item->id) }}">{{ $item->title }}</a></div>
            <div class="itemDate">{{ mDateFormat($item->date) }}</div>
          </div>
        </li>
        <?php endforeach ?>
      </ul>
    </div>
    {{ $model->links('pagination.site', ['model' => $model]) }}
  </div>
</div>
@endsection
