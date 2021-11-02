@extends('_layout')

@section('title','ARMADA - торговый комплекс')

@section('breadcrumb')
{{--    @php--}}
{{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
{{--                            'title'=>$trans['home'] ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('user.index'),--}}
{{--                            'title'=>$trans['Personal Area']  ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('user.profile.index'),--}}
{{--                            'title'=>$trans['Profile parameters']  ];--}}
{{--    @endphp--}}
{{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
@endsection

@section('content')
    @php
        $likeIds = Auth::check() ? \App\Http\Services\Service::likeIds() : null;
    @endphp

    @include('pages.home._banner')
    @include('pages.home._categories')  <!-- Популярные разделы -->
    @include('pages.home._viewed')      <!-- Просмотренные товары -->
    @include('pages.home._recommended') <!-- Рекомендуемые товары -->
    @include('pages.home._stocks')      <!-- акции -->
    @include('pages.home._special')     <!-- Акционные предложения -->
    @include('pages.home._recent')      <!-- Новинки -->
    @include('pages.home._advantages')  <!-- Наши преимущества -->
    @include('pages.home._youtube')     <!-- Новые видео на нашем канале -->
    @include('pages.home._about')       <!-- О торговом комплексе -->
    @include('banners.popup_banner')    <!-- Попап баннер -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-home/home.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/dest/page-home/home-min.js') }}"></script>
    @if(isset($popupBanner) && count($popupBanner) > 0)
    <script>
        setTimeout(function() {
            $('#myModal').modal('show');
        }, 5000);
    </script>
    @endif
@endpush

