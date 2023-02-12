@extends('layouts.layout')

@section('content')

    @include('sections.mainPosts')
    <div class="container">
        <div class="notification basic-flex">
            <div class="notification__text basic-flex">
                <h3>@lang('words.w1')
                </h3>
            </div>
            <button type="button" class="notification__button btn">
                @lang('words.w2')
            </button>
        </div>
    </div>
    @include('sections.latestPosts')

    <div class="apps-block container basic-flex">
        <div class="apps-block__image"></div>
        <div class="apps-block__content">
            <h4>@lang('words.w3')</h4>
            <p>@lang('words.w4')</p>
        </div>
        <div class="apps-block__links basic-flex">
            <div class="links__item">
                <a href="#"><img src="/assets/img/googleplay.png" alt="googleplay"></a>
            </div>
            <div class="links__item">
                <a href="#"><img src="/assets/img/appstore.png" alt="googleplay"></a>
            </div>
        </div>
    </div>
@endsection
