<section class="posts">
    <div class="container">
        <ul class="posts__list basic-flex">

            @foreach($specialPosts as $item)
                <li class="posts__item">
                    <a href="{{ route('singlePost', $item->id) }}">
                        <img src="/images/posts/{{ $item['img'] }}" alt="Image" class="posts__img">
                        <h2 class="posts__title">{{ $item['title_'.\App::getLocale()] }}</h2>
                        <span class="posts__date">{{ $item->created_at->format('H:i') }} / {{ $item->created_at->format('d.m.Y') }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</section>
