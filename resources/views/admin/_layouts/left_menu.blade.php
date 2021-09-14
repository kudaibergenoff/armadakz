<nav class="vendor-menu vendor__menu">
    <div class="vendor-menu__bg" style="background: rgba(0, 0, 0, .7);"></div>
    {{-- background-image: url({{ asset('img/sections-bg/header-area-bg.jpg') }}) --}}
    <a href="{{ route('home') }}" class="vendor-menu__row vendor-menu__logo">
        <img src="{{ asset('img/favicon.png') }}" alt="Армада" class="img-responsive">
        <span class="vendor-menu__row-title text-uppercase font-weight-bold">Армада</span>
    </a>
    <a href="{{ route('admin.home') }}" class="vendor-menu__row vendor-menu__user">
        <span class="vendor-menu__user-logo" style="background-image: url({{ Auth::user()->getImage('avatar','/img/logo_default.png') }})"></span>
        <span class="vendor-menu__row-title">{{ Auth::user()->name ?? Auth::user()->email }}</span>
    </a>

    @isCan('browse_panel')
    @include('admin._layouts.left_menu.control_panel')
    @endisCan
    @isCan('browse_admins')
    @include('admin._layouts.left_menu.admins')
    @endisCan
    @isCan('browse_users')
    @include('admin._layouts.left_menu.users')
    @endisCan
    @isCan('browse_sellers')
    @include('admin._layouts.left_menu.sellers')
    @endisCan
    @isCan('browse_stores')
    @include('admin._layouts.left_menu.stores')
    @endisCan
    @isCan('browse_products')
    @include('admin._layouts.left_menu.products')
    @endisCan
    @isCan('browse_orders')
    @include('admin._layouts.left_menu.orders')
    @endisCan
    @isCan('browse_catalogs')
    @include('admin._layouts.left_menu.catalogs') <!-- Каталог -->
    @endisCan
    @isCan('browse_pages')
    @include('admin._layouts.left_menu.pages')
    @endisCan
    @isCan('browse_banners')
    @include('admin._layouts.left_menu.banners')
    @endisCan
    @isCan('browse_faqs')
    @include('admin._layouts.left_menu.faqs')
    @endisCan
    @isCan('browse_news')
    @include('admin._layouts.left_menu.news')
    @endisCan
    {{-- @isCan('browse_blogs')
    @include('admin._layouts.left_menu.blogs')
    @endisCan --}}
    @isCan('browse_subscriptions')
    @include('admin._layouts.left_menu.subscriptions')
    @endisCan
    @isCan('browse_maps')
    @include('admin._layouts.left_menu.maps') <!-- Карта -->
    @endisCan
    @include('admin._layouts.left_menu.entities') <!-- Сущности -->
    @isCan('browse_video')
    @include('admin._layouts.left_menu.video') <!-- Видео -->
    @endisCan
    {{-- @isCan('browse_journals')
    @include('admin._layouts.left_menu.journals')
    @endisCan --}}
    {{-- @isCan('browse_media')
    @include('admin._layouts.left_menu.media')
    @endisCan --}}
    @isCan('browse_publications')
    @include('admin._layouts.left_menu.publications')
    @endisCan
    @isCan('browse_applications')
    @include('admin._layouts.left_menu.applications') <!-- Заявки реклама + аренда-->
    @endisCan
    @isCan('browse_reviews')
    @include('admin._layouts.left_menu.reviews')
    @endisCan
    @isCan('browse_rates')
    @include('admin._layouts.left_menu.rates') <!-- тарифы -->
    @endisCan
    @isCan('browse_analytics')
    @include('admin._layouts.left_menu.analytics')
    @endisCan
    @isCan('browse_messages')
    @include('admin._layouts.left_menu.messages') <!--  -->
    @endisCan
    {{-- @isCan('browse_settings')
    @include('admin._layouts.left_menu.settings') <!-- Настройки -->
    @endisCan --}}
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="vendor-menu__row" style="position: relative; bottom: 0; left: 0; right: 0; color: #fff;">
        <div class="vendor-menu__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                <path d="M7.5 1v7h1V1h-1z"/>
                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
              </svg>
        </div>
        <span class="vendor-menu__row-title">Выход</span>
    </a>
</nav>
