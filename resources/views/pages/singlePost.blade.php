@extends('layouts.layout')

@section('title', 'Yangilik')

@section('content')

<section class="article">
    <div class="container">
      <div class="news__wrapper basic-flex">
        <div class="article__wrapper">
          <h2 class="article__title">{{ $post['title_'.\App::getLocale()] }}
          </h2>
          <span class="article__date basic-flex">{{ $post->created_at->format('H:i / d.m.Y') }}</span>
          <img src="/images/posts/{{ $post->img }}" alt="Шавкат Мирзиёев строго предупредил хокимов всех уровней
          ">
          {!! $post['body_'.\App::getLocale()] !!}

          <div class="hashtags basic-flex">
            @foreach ($post->tags as $item)
                <a href="#">#{{ $item['name_'.\App::getLocale()] }}</a>
            @endforeach
          </div>
        </div>
        @include('sections.popular')
        <div class="related-news">
          <h3 class="related-news__title">@lang('words.sp')
          </h3>
          <div class="related-posts basic-flex">
            @foreach ($otherPosts as $item)
                <div class="posts__item">
                    <a href="{{ route('singlePost', $item->id) }}">
                    <img src="/images/posts/{{ $item->img }}" alt="Image" class="posts__img">
                    <h2 class="posts__title">{{ $item['title_'.\App::getLocale()] }}</h2>
                    <span class="posts__date">{{ $item->created_at->format('H.i / d.m.Y') }}</span>
                    </a>
                </div>
            @endforeach


          </div>
        </div>
      </div>
    </div>
</section>

@endsection
