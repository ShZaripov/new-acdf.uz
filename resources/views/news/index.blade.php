@extends('layouts.site')
@section('title', __('main.news'))
@section('content')

    <section>
        <div class="main-container title-bl">
            <div class="title-block">
                <div class="title-block_sq-big" data-animations-target="titleSqBig" style="transform: translate3d(0px, -28.913px, 0px); opacity: 1;"></div>
                <div class="title-block_sq-small" data-animations-target="titleSqSmall" style="transform: translate3d(0px, -168.369px, 0px); opacity: 1;"></div>
                <h1 class="title-block_text" data-animations-target="titleText" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                    {{__('main.latest_news')}}
                </h1>

            </div>
        </div>
    </section>

    <section class="pt-4">
        <div class="main-container">
            <turbo-frame id="article_index" src="https://www.acdf.uz/articles" complete="">
{{--                <form data-controller="debounce" data-debounce-target="form" data-turbo-frame="article_index" class="article_search" id="article_search" action="/articles" accept-charset="UTF-8" method="get">--}}
{{--                    <div class="grid">--}}
{{--                        <div class="col-4_sm-12" data-push-left="off-8_sm-0">--}}
{{--                            <div class="article-index_search">--}}
{{--                                <input placeholder="Search" autocomplete="off" data-action="input->debounce#search" aria-label="search" type="search" name="q[title_en_or_intro_en_cont]" id="q_title_en_or_intro_en_cont">--}}
{{--                                <button type="submit">→</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="grid-equalHeight">
                        @foreach($model as $item)
                            <div class="col-4_sm-12">
                                <a href="{{ route('site.news.show', $item->name) }}" class="article-index_item" data-turbo-track="reload">
                                    <div class="article-index_item_image">
                                        <img alt="{{ $item->name }}" data-lazy="{{ getMedium($item->image) }}" src="{{ getMedium($item->image) }}">
                                    </div>
                                    <div class="article-index_item_contents">
                                        <?php if($item->category):?>
                                        <span class="tag-black"><?=$item->category_title ?></span>
                                        <?php endif;?>
                                        <span class="date"><div class="txt-6">{{ mDateFormat($item->date) }}</div></span>
                                        <h2 class="article-index_item_contents_title">{{ $item->title }}</h2>
                                        <span class="underline txt-6">{{ __('main.read_more') }}</span>
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>
{{--                </form>--}}
            </turbo-frame>
        </div>
        {{  $model->links('pagination.site', ['model' => $model]) }}
    </section>

@endsection
