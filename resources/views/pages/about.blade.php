@extends('layouts.site')
@section('title', __('main.about_page-title') )
@section('content')

{{--    About page title--}}
    <section>
        <div class="main-container title-bl">
            <div class="title-block">
                <div class="title-block_sq-big" data-animations-target="titleSqBig" style="transform: translate3d(0px, -28.913px, 0px); opacity: 1;"></div>
                <div class="title-block_sq-small" data-animations-target="titleSqSmall" style="transform: translate3d(0px, -168.369px, 0px); opacity: 1;"></div>
                <h1 class="title-block_text" data-animations-target="titleText" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                    {{ __('main.about_page-title') }}
                </h1>

            </div>
        </div>
    </section>
{{--    About page title--}}

{{--    Our long-term commitment --}}
<section class="pt-0">
    <div class="prog">
        <div class="prog_bg" data-animations-target="cusp" style="transform: translate(0px, -60px);">
            <img alt="cusp" src="{{ asset('/acdf-new/images/cusp.svg') }}">
            <div class="bg-salmon"></div>
        </div>
        <div class="prog_inner">
            <?php $long_term_commitment = textBlock('about_page_long_term_commitment'); ?>
            <?php if ($long_term_commitment && isset($long_term_commitment->title) && !empty($long_term_commitment->title)): ?>
                <div class="prog-intro" data-animations-target="programsTitle" style="transform: translate(0px, 230.75px);">
                    <div class="prog-intro_title" data-animations-target="programsTitle">
                        <center class="title-section">
                            <div class="small-container">
                                <h2 class="txt-0 f-serif mb-8">
                                    <?= $long_term_commitment->title ?>
                                </h2>
                            </div>
                            <div class="msm-container">
                                <div class="text-editor f-light">
                                    <?= $long_term_commitment->content ?>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
             <?php endif ?>
            <?php $about_page_list_item = textBlockAll('about_page_list_item'); ?>
            <?php if ($about_page_list_item): ?>
            <div class="small-container">
                <div class="about-list">
                    @foreach($about_page_list_item as $al)
                    <div class="about-list_item">
                        <div class="about-list_item_sq" style="transform: translate3d(0px, -78.7744px, 0px);"></div>
                        <div class="about-list_item_text">
                            <div class="txt-1 f-serif mb-4">
                                <?= $al->title ?>
                            </div>
                            <?= $al->content ?>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</section>
{{--    Our long-term commitment --}}

{{--    Find out more about our international exhibition projects --}}
<section>
    <div class="small-container">
        <?php $about_page_exhibition = textBlock('about_page_exhibition'); ?>
        <?php if ($about_page_exhibition && isset($about_page_exhibition->title) && !empty($about_page_exhibition->title)): ?>
        <center class="title-section">
            <h2 class="txt-0 f-serif mb-8"><?= $about_page_exhibition->title ?></h2>
            <div class="text-editor">
                <?= $about_page_exhibition->content ?>
            </div>
        </center>
        <?php endif;?>
    </div>
    <div class="med-container">
        <div class="exhibitions">
            <?php $about_page_exhibition_items = textBlockAll('about_page_exhibition_item'); ?>
            <?php if (count($about_page_exhibition_items) > 0): ?>
            @foreach($about_page_exhibition_items as $i)
                <div class="exhibitions_item">
                    <div class="grid">
                        <div class="col-4_sm-12">
                            <h2 class="exhibitions_item_title">
                                <?= $i->title ?>
                            </h2>
                        </div>
                        <div class="col-8_sm-12">
                            <div class="text-editor">
                                <?= $i->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <?php endif ?>
        </div>
    </div>
</section>
{{--    Find out more about our international exhibition projects --}}

{{--Reconstruction of Cultural Institutions in Tashkent--}}
<section>
    <?php $about_page_reconstruction = textBlock('about_page_reconstruction'); ?>
    <?php if ($about_page_reconstruction && isset($about_page_reconstruction->title) && !empty($about_page_reconstruction->title)): ?>
        <div class="small-container">
            <center class="title-section">
                <h2 class="txt-0 f-serif mb-8"><?= $about_page_reconstruction->title ?></h2>
                <div class="text-editor">
                    <?= $about_page_reconstruction->content ?>
                </div>
            </center>
        </div>
    <?php endif;?>

    <div class="med-container">
        <div class="exhibitions">
            <?php $about_page_reconstruction_items = textBlockAll('about_page_reconstruction_item'); ?>
            <?php if (count($about_page_reconstruction_items) > 0): ?>
            @foreach($about_page_reconstruction_items as $a)
                <div class="exhibitions_item">
                    <div class="grid">
                        <div class="col-4_sm-12">
                            <h2 class="exhibitions_item_title">
                                <?= $a->title ?>
                            </h2>
                        </div>
                        <div class="col-8_sm-12">
                            <div class="text-editor">
                                <?= $a->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <?php endif ?>
        </div>
    </div>
</section>
{{--Reconstruction of Cultural Institutions in Tashkent--}}

{{--CCA Tashkent--}}
<section>
    <?php $about_page_cca = textBlock('about_page_cca'); ?>
    <?php if ($about_page_cca && isset($about_page_cca->title) && !empty($about_page_cca->title)): ?>
    <div class="small-container">
        <center class="title-section">
            <h2 class="txt-0 f-serif mb-8"><?= $about_page_cca->title ?></h2>
            <div class="text-editor">
                <?= $about_page_cca->content ?>
            </div>
        </center>
    </div>
    <?php endif;?>

    <div class="med-container">
        <div class="exhibitions">
            <?php $about_page_cca_items = textBlockAll('about_page_cca_item'); ?>
            <?php if (count($about_page_cca_items) > 0): ?>
            @foreach($about_page_cca_items as $b)
                <div class="exhibitions_item">
                    <div class="grid">
                        <div class="col-4_sm-12">
                            <h2 class="exhibitions_item_title">
                                <?= $b->title ?>
                            </h2>
                        </div>
                        <div class="col-8_sm-12">
                            <div class="text-editor">
                                <?= $b->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <?php endif ?>
        </div>
    </div>
</section>
{{--CCA Tashkent--}}

    @include('layouts._subscribe_form')
@endsection
