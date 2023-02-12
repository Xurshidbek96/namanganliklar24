@extends('layouts.layout')



@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" /> --}}
@endsection

@section('content')

<section class="contact-details">
    @if ($message = Session::get('success'))
                <div class="alert alert-success">

                    <p>{{ $message }}</p>
                </div>
            @endif
    <div class="container">
      <div class="contact-details__wrapper basic-flex">
        <div class="form__wrapper">
          <h3 class="form__wrapper-title">@lang('words.contact1')
          </h3>
          <form method="POST" action="{{ route('sendMail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form__top">
              <label><input type="text" placeholder="@lang('words.contact2')" name="name" required></label>
              <label><input type="email" placeholder="@lang('words.contact3')" name="email" ></label>
              <label><input type="text" placeholder="@lang('words.contact4')" name="phone" ></label>
              <textarea class="contact-tetxarea" placeholder="@lang('words.contact5')" name="message" ></textarea>
            </div>
            <div class="form-group">
                <strong>ReCaptcha:</strong>
                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                @endif
            </div>
            <div class="form__bottom">

              <input type="file" name="file" id="file" class="inputfile">
              <label for="file" class="basic-flex">@lang('words.contact6')</label>

              <button type="submit" class="btn send-btn">@lang('words.contact7')</button>
            </div>
          </form>
        </div>
        <div class="business__card">
          <h3 class="card__title">NAMANGANLIKLAR24</h3>
          <div class="card__item basic-flex">
            <span card__item-title>@lang('words.contact3')</span>
            <a class="email__link" href="mailto:info@namanganliklar24.uz">info@namanganliklar24.uz</a>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title>@lang('words.contact8')</span>
            <div class="card__social-items basic-flex">
              <a href="#" class="social__item"></a>
              <a href="#" class="social__item"></a>
              <a href="#" class="social__item"></a>
            </div>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title>@lang('words.contact9')</span>
            <a class="card-join-telegram basic-flex" href="#">@lang('words.contact10')</a>
          </div>
          <div class="card__item basic-flex">
            <span card__item-title>@lang('words.contact11')</span>
            <div class="card__apps-wrapper basic-flex">
              <a href="#"><img src="/assets/img/googleplay-wh.png" alt="GooglePlay"></a>
              <a href="#"><img src="/assets/img/appstore-white.png" alt="AppStore"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
