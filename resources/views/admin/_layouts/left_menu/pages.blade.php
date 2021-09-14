<a href="#" class="vendor-menu__row vendor-menu__row--has-children">
    <div class="vendor-menu__icon">
        <svg width="21" height="18" viewBox="0 0 21 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.1543 0.621094H6.76758C5.74957 0.621094 4.92188 1.48863 4.92188 2.55469C4.92188 3.62117 5.74957 4.48828 6.76758 4.48828H19.1543C20.1719 4.48828 21 3.62117 21 2.55469C21 1.48863 20.1719 0.621094 19.1543 0.621094Z" fill="white"/>
            <path d="M19.1543 7.06641H6.76758C5.74957 7.06641 4.92188 7.93395 4.92188 9C4.92188 10.0665 5.74957 10.9336 6.76758 10.9336H19.1543C20.1719 10.9336 21 10.0665 21 9C21 7.93395 20.1719 7.06641 19.1543 7.06641Z" fill="white"/>
            <path d="M19.1543 13.5117H6.76758C5.74957 13.5117 4.92188 14.3793 4.92188 15.4453C4.92188 16.5118 5.74957 17.3789 6.76758 17.3789H19.1543C20.1719 17.3789 21 16.5118 21 15.4453C21 14.3793 20.1719 13.5117 19.1543 13.5117Z" fill="white"/>
            <path d="M1.8457 0.621094C0.827695 0.621094 0 1.48863 0 2.55469C0 3.62117 0.827695 4.48828 1.8457 4.48828C2.8633 4.48828 3.69141 3.62117 3.69141 2.55469C3.69141 1.48863 2.8633 0.621094 1.8457 0.621094Z" fill="white"/>
            <path d="M1.8457 7.06641C0.827695 7.06641 0 7.93395 0 9C0 10.0665 0.827695 10.9336 1.8457 10.9336C2.8633 10.9336 3.69141 10.0665 3.69141 9C3.69141 7.93395 2.8633 7.06641 1.8457 7.06641Z" fill="white"/>
            <path d="M1.8457 13.5117C0.827695 13.5117 0 14.3793 0 15.4453C0 16.5118 0.827695 17.3789 1.8457 17.3789C2.8633 17.3789 3.69141 16.5118 3.69141 15.4453C3.69141 14.3793 2.8633 13.5117 1.8457 13.5117Z" fill="white"/>
        </svg>
    </div>
    <span class="vendor-menu__row-title">Страницы</span>
    <span class="vendor-menu__row-dropdown-arrow">
        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.53033 6.53033C6.82322 6.23744 6.82322 5.76256 6.53033 5.46967L1.75736 0.696701C1.46446 0.403808 0.98959 0.403808 0.696697 0.696701C0.403804 0.989595 0.403804 1.46447 0.696697 1.75736L4.93934 6L0.696701 10.2426C0.403808 10.5355 0.403808 11.0104 0.696702 11.3033C0.989595 11.5962 1.46447 11.5962 1.75736 11.3033L6.53033 6.53033ZM5 6.75L6 6.75L6 5.25L5 5.25L5 6.75Z" fill="white"/>
        </svg>
    </span>
    <div class="vendor-menu__dropdown">
        <a href="{{ route('admin.pages.index') }}" class="vendor-menu__row @if(Route::is('*.pages.*')) vendor-menu__row--active @endif">
            <div class="vendor-menu__icon">
                <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>
                </svg>
            </div>
            <span class="vendor-menu__row-title">Статические страницы</span>
        </a>
            <a href="{{ route('admin.projects.index') }}" class="vendor-menu__row @if(Route::is('*.projects.*')) vendor-menu__row--active @endif">
                <div class="vendor-menu__icon">
                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>
                    </svg>
                </div>
                <span class="vendor-menu__row-title">Наши проекты</span>
            </a>
            <a href="{{ route('admin.news.index') }}" class="vendor-menu__row @if(Route::is('*.news.*')) vendor-menu__row--active @endif">
                <div class="vendor-menu__icon">
                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>
                    </svg>
                </div>
                <span class="vendor-menu__row-title">Новости</span>
            </a>
{{--            <a href="#" class="vendor-menu__row">--}}
{{--                <div class="vendor-menu__icon">--}}
{{--                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="vendor-menu__row-title">! Рекламодателям</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="vendor-menu__row">--}}
{{--                <div class="vendor-menu__icon">--}}
{{--                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="vendor-menu__row-title">! Реклама в торговом комплексе</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="vendor-menu__row">--}}
{{--                <div class="vendor-menu__icon">--}}
{{--                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="vendor-menu__row-title">! Комерческое предложение</span>--}}
{{--            </a>--}}
{{--            <a href="#" class="vendor-menu__row">--}}
{{--                <div class="vendor-menu__icon">--}}
{{--                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M2.20002 5.20032C3.41505 5.20032 4.40003 4.21534 4.40003 3.00031C4.40003 1.78527 3.41505 0.800293 2.20002 0.800293C0.984981 0.800293 0 1.78527 0 3.00031C0 4.21534 0.984981 5.20032 2.20002 5.20032Z" fill="white"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="vendor-menu__row-title">! Аудио-Видео реклама</span>--}}
{{--            </a>--}}
    </div>
</a>
