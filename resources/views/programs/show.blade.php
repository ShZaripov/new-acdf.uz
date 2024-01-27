@extends('layouts.site')
@section('title', $model->title)
@section('content')

<div class="article-single" data-controller="slider">
    <div class="small-container">
        <h1 class="txt-0">{{ $model->title }}</h1>
    </div>

    <div class="small-container">
        <div class="article-single_image fs-image" data-action="click->main#fullscreenImage">
            <img alt="{{ $model->title }}" data-lazy="{{ getFull($model->image) }}" src="{{ getFull($model->image) }}" class="done">
        </div>
    </div>

    <div class="article-single_block">
        <div class="small-container">

            <div class="text-editor article-text">
                <?= $model->content ?>
            </div>
        </div>
    </div>
</div>

    @include('layouts._subscribe_form')
@endsection
