@extends('layouts.site')
@section('title', $model->title)
@section('content')

  <?php if ($model->image): ?>
  <div style="background-image:url({{ getFull($model->image) }});" class="mainBanner">
    <div class="mainContainer">
      <?php /* ?>
      <div class="bannerText">
        <div class="bannerTitle">{{ $model->title }}</div>
      </div>
      <?php */ ?>
    </div>
  </div>
  <?php endif ?>
  <div class="section">
    <div class="mainContainer">
      <div class="sectionTitle">
        <h2>{{ $model->title }}</h2>
      </div>
      <div class="postContent"><?= $model->content ?></div>
    </div>
  </div>

@endsection
