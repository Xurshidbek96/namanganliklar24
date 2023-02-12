<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title') - NAMANGANLIKLAR 24</title> --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    @meta_tags
    @yield('css')
</head>

<body>

    {{-- <div class="layer">
    <div class="modal-box basic-flex">
      <button type="button" class="btn hide-modal-btn">x</button>
      <h4>Подписывайтесь на наш канал в Telegram и будьте всегда в курсе самых последних новостей:</h4>
      <div class="telegram-join  basic-flex">
        <a href="#"><img src="/assets/img/tg.png" alt="Telegram">Подписатся</a>
      </div>
    </div>
    </div> --}}
    <div class="menu-mask"></div>
    <main>
        <header class="main-header">
            <div class="container">
                <div class="basic-flex header__top">
                    <a href="/" class="logo">
                        <img src="/assets/img/logo.png" alt="NAMANGANLIKLAR24">
                    </a>
                    <div class="currencies basic-flex">
                        <div class="currency"><span>$</span><span>10137.2 </span></div>
                        <div class="currency"><span>P</span><span>138.26</span></div>
                        <div class="currency"><span>E</span><span>10988.72</span></div>
                    </div>
                    <div class="header__actions basic-flex">
                        <form method="GET" action="{{ route('search') }}" class="search-form basic-flex">
                            <input type="search" name="key" class="search-input">
                            <button type="submit" class="btn search-btn"></button>
                        </form>
                        <div class="languages">

                            @if (\App::getLocale() == 'ru')
                                <a href="/lang/ru" class="btn language__option language__option--ru">РУ</a>
                                <div class="languages__list">
                                    <a href="/lang/uz" class="btn language__option language__option--uz">UZ</a>
                                </div>
                            @else
                                <a href="/lang/uz" class="btn language__option language__option--uz">UZ</a>
                                <div class="languages__list">
                                    <a href="/lang/ru" class="btn language__option language__option--ru">РУ</a>
                                </div>
                            @endif
                        </div>
                        <div class="telegram-join basic-flex">
                            <a href="#"><img src="/assets/img/tg.png" alt="Telegram">@lang('words.l1')</a>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-menu"><span class="hamburger"></span></button>
                <nav class="navbar">
                    <div class="currencies-responsive basic-flex">
                        <div class="currency"><span>$</span><span>10137.2 </span></div>
                        <div class="currency"><span>P</span><span>138.26</span></div>
                        <div class="currency"><span>E</span><span>10988.72</span></div>
                    </div>
                    @include('layouts.navbar')
                </nav>
                <div class="advertisement-box">
                    <h4>PLACEHOLDER FOR ADVERTISEMENT</h1>
                </div>
            </div>
        </header>
        @include('layouts.covid')

        @yield('content')

    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__top basic-flex">
                <a href="#" class="footer_logo"><img src="/assets/img/logo-blue.png" alt="NAMANGANLIKLAR24"></a>
                <div class="join-telegram-wrapper basic-flex">
                    <p>@lang('words.l2'):</p>
                    <a href="#" class="join-telegram">@lang('words.l1')</a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="about-site">
                    <h4>@lang('words.l3')</h4>
                    <p>@lang('words.l4').
                    </p>
                </div>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l5')</a>
                    </li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l6')</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l7')</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l8')</a></li>
                </ul>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l9')
                        </a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l10')</a></li>
                    <li class="footer-menu__item"><a href="#" class="footer-menu__link">@lang('words.l11')</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>
