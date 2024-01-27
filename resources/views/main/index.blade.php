@extends('layouts.site')
@section('title', __('main.home'))

@section('content')

    <!-- hero section -->
    <section class="home-hero ptb-0">
        <video class="home-hero_video" poster="{{ asset('/acdf-new/images/video.mp4') }}" autoplay="autoplay" loop="loop" playsinline="playsinline"
               type="video/mp4" muted="muted" autobuffer="true" src="{{ asset('/acdf-new/images/video.mp4') }}"></video>
        <div class="gradient-black"></div>
    </section>
    <!-- End hero section -->

    {{--  About section  --}}

    <?php $aboutSection = textBlock('about_section'); ?>
    <?php if ($aboutSection && isset($aboutSection->title) && !empty($aboutSection->title)): ?>
    <section class="small-title">
        <div class="main-container title-bl">
            <div class="title-block">
                <div class="title-block_sq-big" data-animations-target="titleSqBig"></div>
                <div class="title-block_sq-small" data-animations-target="titleSqSmall"></div>
                <h1 class="title-block_text" data-animations-target="titleText">
                    <?= $aboutSection->content ?>
                </h1>
            </div>
        </div>
    </section>
    <?php endif ?>

    {{--    End Ebout Section--}}

    <!-- Resent news -->
    @if(count($news) > 0)
    <section class="pt-0">
        <div class="med-container">
            <h2 class="txt-1 f-serif-light mb-2">
                {{ __('main.recent_news') }}
            </h2>

            <div class="article-list big">
                @foreach($news as $item)
                <a href="{{ route('site.news.show', $item->name) }}" class="article-list_item" data-turbo-track="reload">
                    <div class="grid">
                        <div class="col-4_xs-12">
                            <div class="article-list_item_image">
                                <img alt="{{ $item->title }}" data-lazy="{{ getMedium($item->image) }}" src="{{ getMedium($item->image) }}" />
                            </div>
                        </div>
                        <div class="col-8_xs-12">
                            <div class="article-list_item_contents">
                                <?php if($item->category):?>
                                    <span class="tag-black"><?=$item->category_title ?></span>
                                <?php endif;?>
                                <span class="date">
                                    <div class='txt-6'>{{ mDateFormat($item->date) }}</div>
                                </span>
                                <h3 class="article-list_item_contents_title">{{ $item->title }}</h3>
                                <div class="article-list_item_contents_cta std-link">{{ __('main.read_more') }}</div>
                            </div>

                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="cta-center">
                <a href="{{ route('site.news') }}" class="btn-blue">
                    {{ __('main.all_news') }}
                </a>
            </div>
        </div>
    </section>
    @endif
    <!-- End Resent news -->

    <!-- Programms -->
    <?php $programsSection = textBlock('about_our_programs'); ?>
    <?php if ($programsSection && isset($programsSection->title) && !empty($programsSection->title) && isset($programs) && count($programs)): ?>
    <section>
        <div class="prog">
            <div class="prog_bg" data-animations-target="cusp">
                <img alt="cusp" src="{{ asset('/acdf-new/images/cusp.svg') }}" />
                <div class="bg-salmon"></div>
            </div>
            <div class="prog_inner">

                <div class="prog-intro" data-animations-target="programsTitle">
                    <div class="title-section" data-animations-target="programsTitle">
                        <div class="msm-container">
                            <h2 class="txt-0 f-serif mb-12"><?= $programsSection->title ?></h2>
                            <div class="text-editor f-light">
                                <p><?= $programsSection->content ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-container">
                    <div class="prog-list">
                        @foreach($programs as $program)
                        <div class="prog-list_item">
                            <div class="prog-list_item_inner">
                                <h2 class="prog-list_item_contents_title show-sm">
                                    {{ $program->title }}
                                </h2>
                                <a href="{{ route('site.programs.show', $program->id) }}" class="prog-list_item_image">
                                    <div class="image-bn">
                                        <img alt="{{ $program->title }}"
                                             data-lazy="{{ getMedium($program->image) }}"
                                             src="{{ getMedium($program->image) }}" />
                                    </div>
                                    <div class="prog-list_item_contents">
                                        <h2 class="prog-list_item_contents_title hide-sm"> {{ $program->title }} </h2>
                                        <div class="prog-list_item_contents_body text-editor">
                                            <p></p>
                                            <p>{{ $program->description }}</p>
                                            <p></p>
                                            <a href="{{ route('site.programs.show', $program->id) }}" class="prog-list_item_contents_cta std-link"> {{ __('main.read_more') }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif ?>
    <!-- End Programms -->

    <!-- Subscribe  -->
    @include('layouts/_subscribe_form_full')
    <!-- End Subscribe  -->

@endsection
