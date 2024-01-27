@extends('layouts.site')
@section('title', __('main.activities'))
@section('content')

{{--    Annual Activities--}}
    <?php $annualActivitiesSection = textBlock('annual_activities'); ?>
    <?php if ($annualActivitiesSection && isset($annualActivitiesSection->title) && !empty($annualActivitiesSection->title)): ?>
    <section class="activities-title pb-0">
        <div class="main-container title-bl">
            <div class="title-block">
                <div class="title-block_sq-big" data-animations-target="titleSqBig" style="transform: translate3d(0px, -32.4116px, 0px); opacity: 1;"></div>
                <div class="title-block_sq-small" data-animations-target="titleSqSmall" style="transform: translate3d(0px, -143.617px, 0px); opacity: 1;"></div>
                <h1 class="title-block_text" data-animations-target="titleText" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                    <?= $annualActivitiesSection->title ?>
                </h1>

            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="small-container">
            <center class="txt-4 f-light"><p><?= $annualActivitiesSection->content ?></p></center>
        </div>
    </section>
    <?php endif ?>

    <section>
        <div class="med-container">
            <div class="article-index activities">
                <div class="grid-equalHeight">
                    @foreach($model as $item)
                        <div class="col-6_sm-12 act-item">
                            <div class="article-index_item" id="{{ $item->title }}">

                                <div class="article-index_item_image">
                                    <img alt="{{ $item->title }}" src="{{ getFull($item->image) }}">
                                </div>
                                <div class="article-index_item_contents">
                                    <h2 class="article-index_item_contents_title">
                                        {{ $item->title }}
                                    </h2>
                                    <div class="text-editor">
                                        <?= $item->body ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{--   End Annual Activities--}}

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
                                            <img alt="arhitekturnye-proektybn"
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

    @include('layouts._subscribe_form')
@endsection
