@extends('layouts.site')

@section('content')
  <div class="section">
    <div class="mainContainer">
      <div class="sectionTitle textCenter">
        <h2>{{ $model->title }}</h2>
        <div class="itemDate5">{{ mDateFormat($model->date) }}</div>
      </div>
      <div class="videoBox"><?= $model->content ?></div>
    </div>
  </div>

@endsection
