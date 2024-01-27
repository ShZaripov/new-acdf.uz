@extends('layouts.site')
@section('title', __('main.search_result'))
@section('content')
<div class="section">
  <div class="mainContainer">
    <div class="sectionTitle textCenter">
      <h2>{{ __('main.search_result') }}</h2>
    </div>
    <h5>{{ __('main.search_result') }}: {{ $paginator->getTotal() }}</h5>
    <hr>

    <?php if (count($results) > 0): ?>
      <ul class="search-result">
        <?php foreach ($results as $result): ?>
          <?php 
            if ($result->object == 'pages') {
              $url = route('site.'.$result->object.'.show', ['name' => $result->name]);
            }else{
              $url = route('site.'.$result->object.'.show', $result->id);
            }
          ?>
          <li>
            <strong>{{ __('main.'.$result->object) }}</strong>
            <p>
              <a href="{{ $url }}">{{ $result->title }}</a>
            </p>
          </li>
        <?php endforeach ?>
      </ul>
    <?php endif ?>
    {!!  $paginator->links() !!}
  </div>
</div>
@endsection