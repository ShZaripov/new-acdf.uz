@extends('layouts.site')
@section('title', $model->title)

@section('css')

@endsection
@section('content')
    @section('meta')
        <meta name="description" content="{{ strip_tags(mb_substr($model->content, 0,256)) }}">
        <meta name="keywords" content="{{ __('main.news') }},Культура,Маданият">
        <meta type="image/jpeg" name="link" href="{{ asset(getFull($model->image)) }}" rel="image_src">
        <meta property="og:title" content="{{ $model->title }}">
        <meta property="og:description" content="{{ strip_tags(mb_substr($model->content, 0,256)) }}">
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ route('site.news.show', $model->name) }}">
        <meta property="og:image" content="{{ asset(getFull($model->image)) }}">
        <meta property="og:site_name" content="acdf.uz">
        <meta property="article:published_time" content="{{ metaPublished($model->date) }}">
    @endsection

<div class="article-single" data-controller="slider">
    <div class="small-container">
        <h1 class="txt-0">{{ $model->title }}</h1>
    </div>

    <div class="small-container">
        <div class="article-single_image fs-image" data-action="click->main#fullscreenImage">
            <img  alt="{{ $model->name }}" data-lazy="{{ getFull($model->image) }}" src="{{ getFull($model->image) }}" class="done">
        </div>

        <div class="date">
            <div class="txt-5">{{ mDateFormat($model->date) }}</div>
        </div>
        <?php if($model->category):?>
            <span class="tag-black"><?=$model->category_title ?></span>
        <?php endif;?>
        <?php if($model->tag):?>
            @foreach($model->tag as $tag)
                <span class="tag-white"><?=$tag->title ?></span>
            @endforeach
        <?php endif;?>
        <div class="txt-5 f-bold mtb-2">
            {{ __('main.time_to_read') }}: {{ $timeToRead }} {{ __('main.minute') }}.
        </div>
        <div class="txt-4 f-italic">
            <?= $model->description ?>
        </div>
    </div>
    <div class="article-single_block">
        <div class="small-container">
            <div class="text-editor article-text">
                <?= $model->content ?>
            </div>
        </div>
    </div>

@if(isset($photos) && !empty($photos))
    <div class="article-single_block">
        <div class="gallery-slider">
            @foreach($photos as $item)
            <div class="slick-slide">
                <div>
                    <div class="gallery-slider_item" style="width: 100%; display: inline-block;">
                        <div class="gallery-slider_image" data-action="click->main#fullscreenImage">
{{--                            <img alt="{{ $model->albumSite->title }}" src="{{ getFull($item->image) }}">--}}
                            <img alt="{{ $model->albumSite->title }}" src="{{ getMedium($item->image) }}">
                        </div>
                        <div class="gallery-slider_caption">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endif
</div>

@include('layouts._subscribe_form')

@endsection
