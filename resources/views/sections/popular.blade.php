<div class="popular-news">
    <div class="popular-news-wrapper">
        <h4 class="popular-news__title">@lang('words.pop')</h4>
        <ul class="popular-news__list">
            @foreach ($popularPosts as $item)
                <li class="popular-news__item">
                    <a href="{{ route('singlePost', $item->id) }}">
                        <p class="popular-news__description">{{ $item['title_'.\App::getLocale()] }}</p>
                        <span class="popular-news__date">{{ $item->created_at->format('H:i / d.m.Y') }}</span>
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
    <div class="ads-placeholder">
        <h4>ADS PLACEHOLDER</h4>
    </div>
</div>
