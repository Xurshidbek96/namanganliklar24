

<section class="news">
    <div class="container">
        <div class="news__wrapper basic-flex">
            <div class="column-news">
                <h2 class="news__title">@lang('words.lPost1')</h2>
                <ul class="news__list basic-flex">

                    @foreach ($latestPosts as $item)
                        <li class="news__item">
                            <a href="{{ route('singlePost', $item->id) }}" class="basic-flex news__link">
                                <div class="news-image-wrapper"><img src="/images/posts/{{ $item->img }}" alt="Bottom Img"></div>
                                <div class="news-box basic-flex">
                                    <h4 class="news__title">{{ $item['title_'.\App::getLocale()] }}
                                    </h4>
                                    <p class="news__description">{!! \Str::limit($item['body_'.\App::getLocale()],100) !!}
                                    </p>
                                    <span class="news__date basic-flex">{{ $item->created_at->format('H:i / d.m.Y') }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach


                </ul>
                <button type="button" class="btn load-more-btn">@lang('words.lPost2')</button>
            </div>
            @include('sections.popular')
        </div>
    </div>
</section>
