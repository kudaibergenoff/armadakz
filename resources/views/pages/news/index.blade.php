@extends('_layout')

@section('title','ARMADA - Блог')

@section('breadcrumb')
        @php
            $breadcrumbs[] = [  'route'=>route('home'),
                                'title'=>'Главная' ];
            $breadcrumbs[] = [  'route'=>route('news.index'),
                                'title'=>'Новости' ];
        @endphp
        @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="news page-news__news container">
        <h2 class="page-title">Наши новости и статьи</h2>
        <div class="row align-items-start">
            <ul class="news__tabs nav nav-tabs order-2 order-lg-1 col-12 col-lg-8" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Все</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="news-tab" data-toggle="tab" href="#news" role="tab" aria-controls="news" aria-selected="false">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="article-tab" data-toggle="tab" href="#article" role="tab" aria-controls="article" aria-selected="false">События</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Видео</a>
                </li>
            </ul>
            <div class="news__content col-12 order-3 order-lg-2 col-lg-9">
                <div class="news__panes tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <ul class="row mb-0 p-0 list-style-none">
                            @foreach($all as $new)
                                <li class="@if($new->type_id == \App\Models\NewType::VIDEO) video youtube__item @else news-card news__news-card @endif col-12 @if($loop->first) news-card--lg col-xl-8 @else news-card--md col-md-6 col-xl-4 @endif">
                                    @if($new->type_id == \App\Models\NewType::VIDEO)
                                        <a href="{{ $new->url }}" class="video__preview">
                                            <img src="{{ $new->videoImage() }}" alt="Video preview">
                                            <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                            </svg>
                                        </a>
                                        <a href="{{ $new->url }}" class="video__title">{{ $new->title }}</a>
                                        <time class="video__date">{{ $new->created_at->format('d.m.Y') }}</time>
                                    @else
                                        <article class="news-card__wrap">
                                            <a href="{{ route('news.show',['slug'=>$new->slug]) }}" class="news-card__image">
                                                <img src="{{ $new->getImage('images') }}" alt="News image">
                                                <div class="news-card__date">{{ $new->created_at->format('d.m.Y') }}</div>
                                            </a>
                                            <footer class="news-card__content">
                                                <div>
                                                    <a class="d-inline-block" href="{{ route('news.show',['slug'=>$new->slug]) }}">
                                                        <h4 class="news-card__title">{{ $new->title }}</h4>
                                                    </a>
                                                    <p class="news-card__short-desc">{{ $new->description }}</p>
                                                </div>
                                                <ul class="news-card__categories">
                                                    @foreach($new->items as $item)
                                                        <li class="news-card__category">{{ $item->title }}</li>
                                                    @endforeach
                                                </ul>
                                            </footer>
                                        </article>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                        @include('layouts._paginate',['pagination'=>$all])
                    </div>

                    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                        <ul class="row mb-0 p-0 list-style-none">
                            @foreach($news as $new)
                                <li class="col-12 news-card news__news-card @if($loop->first) news-card--lg col-xl-8 @else news-card--md col-md-6 col-xl-4 @endif">
                                    <article class="news-card__wrap">
                                        <header class="news-card__image">
                                            <a href="{{ route('news.show',['slug'=>$new->slug]) }}">
                                                <img src="{{ $new->getImage('images') }}" alt="News image">
                                                <div class="news-card__date">{{ $new->created_at->format('d.m.Y') }}</div>
                                            </a>
                                        </header>
                                        <footer class="news-card__content">
                                            <div>
                                                <a href="{{ route('news.show',['slug'=>$new->slug]) }}">
                                                    <h4 class="news-card__title">{{ $new->title }}</h4>
                                                </a>
                                                <p class="news-card__short-desc">{{ $new->description }}</p>
                                            </div>
                                            <ul class="news-card__categories">
                                                @foreach($new->items as $item)
                                                    <li class="news-card__category">{{ $item->title }}</li>
                                                @endforeach
                                            </ul>
                                        </footer>
                                    </article>
                                </li>
                            @endforeach
                        </ul>

                        @include('layouts._paginate',['pagination'=>$news])
                    </div>

                    <div class="tab-pane fade" id="article" role="tabpanel" aria-labelledby="article-tab">
                        <ul class="row mb-0 p-0 list-style-none">
                            @foreach($articles as $article)
                                <li class="col-12 news-card news__news-card @if($loop->first) news-card--lg col-xl-8 @else news-card--md col-md-6 col-xl-4 @endif">
                                    <article class="news-card__wrap">
                                        <header class="news-card__image">
                                            <a href="{{ route('news.show',['slug'=>$article->slug]) }}">
                                                <img src="{{ $article->getImage('images') }}" alt="News image">
                                                <div class="news-card__date">{{ $article->created_at->format('d.m.Y') }}</div>
                                            </a>
                                        </header>
                                        <footer class="news-card__content">
                                            <div>
                                                <a href="{{ route('news.show',['slug'=>$article->slug]) }}">
                                                    <h4 class="news-card__title">{{ $article->title }}</h4>
                                                </a>
                                                <p class="news-card__short-desc">{{ $article->description }}</p>
                                            </div>
                                            <ul class="news-card__categories">
                                                @foreach($article->items as $item)
                                                    <li class="news-card__category">{{ $item->title }}</li>
                                                @endforeach
                                            </ul>
                                        </footer>
                                    </article>
                                </li>
                            @endforeach
                        </ul>

                        @include('layouts._paginate',['pagination'=>$articles])
                    </div>

                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                        <ul class="row mb-0 p-0 list-style-none">
                            @foreach($videos as $video)
                                <li class="video youtube__item mb-4 col-12 col-md-6 col-xl-4">
                                    <a href="{{ $video->url }}" class="video__preview">
                                        <img src="{{ $video->videoImage() }}" alt="Video preview">
                                        <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                        </svg>
                                    </a>
                                    <a href="{{ $video->url }}" class="video__title">{{ $video->title }}</a>
                                    <time class="video__date">{{ $video->created_at->format('d.m.Y') }}</time>
                                </li>
                            @endforeach
                        </ul>

                        @include('layouts._paginate',['pagination'=>$videos])
                    </div>
                </div>
            </div>

            @if($tops->count() > 0)
                <aside class="news__sidebar col-12 order-1 order-lg-3 mt-4 mb-lg-0 col-lg-3 bg-light rounded">
                    <h3 class="news__sidebar-title mt-4 mb-4 mx-3">Популярное</h3>
                    <ul class="row mb-0 px-3 list-style-none">
                        @foreach($tops as $top)
                            @if($top->type_id == \App\Models\NewType::ARTICLE)
                                <li class="video youtube__item mb-4 col-12 col-md-6 col-lg-12">
                                    <article class="news-card__wrap">
                                        <header class="news-card__image">
                                            <img src="{{ $top->getImage('images') }}" alt="News image">
                                        </header>
                                        <footer class="news-card__content">
                                            <a href="{{ $top->url }}" class="video__title">{{ $top->title }}</a>
                                            <time class="video__date">{{ $top->created_at->format('d.m.Y') }}</time>
                                        </footer>
                                    </article>
                                </li>
                            @elseif($top->type_id == \App\Models\NewType::VIDEO)
                                <li class="video youtube__item mb-4 col-12 col-md-6 col-lg-12">
                                    <a href="{{ $top->url }}" class="video__preview">
                                        <img src="{{ $top->videoImage() }}" alt="Video preview">
                                        <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                        </svg>
                                    </a>
                                    <a href="{{ $top->url }}" class="video__title">{{ $top->title }}</a>
                                    <time class="video__date">{{ $top->created_at->format('d.m.Y') }}</time>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </aside>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-news/news.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-news/news-min.js') }}"></script>
@endpush


