@extends('layouts.site')
@section('title', __('main.contacts'))
@section('content')

    <section>
        <div class="main-container title-bl">
            <div class="title-block">
                <div class="title-block_sq-big" data-animations-target="titleSqBig" style="transform: translate3d(0px, -82.1995px, 0px); opacity: 1;"></div>
                <div class="title-block_sq-small" data-animations-target="titleSqSmall" style="transform: translate3d(0px, -248.299px, 0px); opacity: 1;"></div>
                <h1 class="title-block_text" data-animations-target="titleText" style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                    {{__('main.any_questions')}}
                </h1>

            </div>
        </div>
    </section>
    <section>
        <div class="main-container">
            <div class="grid">
                <div class="col-6_sm-12">
                    <h2 class="txt-0">
                        {{__('main.contacts')}}
                    </h2>
                </div>
                <div class="col-6_sm-12">
                    <div class="text-editor mt-5">
                        <p>
                            <strong>{{__('main.phone')}}</strong>
                            <br>
                            <a href="tel:{{ isset($contacts['telNumber']) ? $contacts['telNumber'] : '' }}" style="text-decoration: none">
                                {{ isset($contacts['telNumber']) ? $contacts['telNumber'] : "" }}
                            </a>
                        </p>
                        <p>
                            <strong>{{__('main.email')}}</strong>
                            <br>
                            <a href="mailto:{{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : '' }}" style="text-decoration: none">
                                {{ isset($contacts['adminEmail']) ? $contacts['adminEmail'] : "" }}
                            </a>
                        </p>
                        <p>
                            <strong>{{__('main.address')}}</strong>
                            <br>
                            {!! isset($contacts['address']) ? $contacts['address'] : "" !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="main-container">
            <h2 class="txt-0">
                {{ __('main.departments') }}
            </h2>
            <div class="text-editor departments">
                <ul>
                    @foreach($model as $item)
                        @if(!empty($item->title) && !empty($item->content))
                        <li>
                            <p><strong>{{ $item->title }}</strong></p>
                            <p><?= $item->content ?></p>
                        </li>
                        @endif
                    @endforeach
                    <li></li>
                </ul>
            </div>
        </div>
    </section>

    @include('layouts._contact_form')
    @include('layouts._subscribe_form')

    
    
@endsection
