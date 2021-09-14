<!DOCTYPE html>
<html lang="ru">
<head>
    @include('layouts.metas')
    @stack('metas')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    @include('layouts.links')
    @stack('styles')
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
</head>
<body>
    <div class="overlay"></div>
    @php
        $likesCount = Auth::check() ? \App\Http\Services\Service::likesCount() : null;
        $userBasket = Auth::check() ? \App\Http\Services\Service::userBasket() : null;
    @endphp
{{--    @dd($likeIds)--}}

    @if(!Route::is('seller.*','admin.*'))
        @include('layouts.header')
    @endif

    @include('layouts.modals')
    @include('layouts.loader')
    @yield('modals')


    @yield('overlay')
{{--    // Проверить во всех видах--}}


{{--    @if(Route::is('home','catalog','orders','user.*','register','news.*')) <div class="overlay"></div> @endif--}}

    <main class="main-content
        @if(Route::is('home')) page-home
        @elseif(Route::is('product')) page-product
        @elseif(Route::is('login','register')) page-login
        @elseif(Route::is('sellerLogin','sellerRegister')) page-login page-vendor-register
        @elseif(Route::is('user.index','user.analytics')) page-vendor-area page-vendor-area--analytics
        @elseif(Route::is('catalog')) page-catalog
        @elseif(Route::is('orders')) page-order
        @elseif(Route::is('user.*')) page-user-area
        @elseif(Route::is('shops','shop')) page-shops
        @elseif(Route::is('seller.*','admin.*')) page-vendor-area pt-0
        @elseif(Route::is('seller.analytics')) page-vendor-area--analytics
        @elseif(Route::is('news.*')) page-news
        @else page-info
{{--        Route::is('payment','projects','advertisers','scheme','services','sitemap') --}}
        @endif"

{{--        @if(Route::is('register','login')) style="background: url({{ asset('img/sections-bg/register-bg.jpg') }})" @endif--}}
{{--        @if(Route::is('sellerLogin','sellerRegister')) style="background: url({{ asset('img/sections-bg/vendor-login-bg.jpg') }})" @endif--}}
    >

{{--        @if(!Route::is('seller.*','admin.*' && !Route::is('login','register')))--}}
{{--            @include('layouts.messages')--}}
{{--        @endif--}}

        @if(Route::is('shop'))
            @include('pages.shops._filter')
        @endif

        @yield('breadcrumb')

        @yield('content')

        @if(!Route::is('seller.*','admin.*'))
            @include('layouts._subscribe')           <!-- Подписаться на рассылку -->
        @endif


    </main>

    @if(!Route::is('seller.*','admin.*'))
        @include('layouts.footer')
    @endif

    @include('layouts.messages')

    @guest
        @include('layouts.modals.login')
    @endguest
    {{--        @include('layouts.modals')--}}
    @include('layouts.scripts')
    @stack('scripts')
</body>
</html>
