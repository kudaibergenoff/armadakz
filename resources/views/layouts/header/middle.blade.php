<div class="header__middle container">
    <div class="header__middle-wrap">
        <div class="bars bars--dark header__bars d-block d-xl-none">
            <div class="bars__bar"></div>
            <div class="bars__bar"></div>
            <div class="bars__bar"></div>
            <span class="bars__title">Меню</span>
        </div>
        <div class="header__logo">
            <a href="{{ route('home') }}">
                <picture>
                    <source srcset="{{ asset('img/logo.webp') }}" type="image/webp">
                    <source srcset="{{ asset('img/logo.png') }}" type="image/png">
                    <img src="{{ asset('img/logo.png') }}" alt="Armada">
                </picture>
            </a>
        </div>
        <div class="header__search">
            <form action="{{ route('search') }}" class="search">
                <input type="text" name="q" id="search" placeholder="Поиск товаров..." value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                <button type="submit">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.60568 0C2.96341 0 0 2.96341 0 6.60568C0 10.2482 2.96341 13.2114 6.60568 13.2114C10.2482 13.2114 13.2114 10.2482 13.2114 6.60568C13.2114 2.96341 10.2482 0 6.60568 0ZM6.60568 11.9919C3.63577 11.9919 1.21951 9.57563 1.21951 6.60571C1.21951 3.6358 3.63577 1.21951 6.60568 1.21951C9.5756 1.21951 11.9919 3.63577 11.9919 6.60568C11.9919 9.5756 9.5756 11.9919 6.60568 11.9919Z" fill="#8B8B8B"/>
                        <path d="M14.8215 13.9593L11.3255 10.4633C11.0873 10.2251 10.7015 10.2251 10.4633 10.4633C10.2251 10.7013 10.2251 11.0875 10.4633 11.3255L13.9593 14.8215C14.0784 14.9406 14.2343 15.0001 14.3904 15.0001C14.5463 15.0001 14.7024 14.9406 14.8215 14.8215C15.0597 14.5835 15.0597 14.1973 14.8215 13.9593Z" fill="#8B8B8B"/>
                    </svg>
                    <span>Найти</span>
                </button>
            </form>
            <div class="autosearch header__search-autosearch">
                <div class="autosearch__wrap custom-scrollbar">
                    <div class="autosearch__column autosearch__CATEGORIES">
                        <span class="autosearch__column-title">Категории </span>
                        <div class="autosearch__column-wrap custom-scrollbar">
                            <ul>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
{{--                        @if(Auth::check() and Auth::user()->role_id == \App\Models\UserRole::ADMIN)--}}
{{--                            <div class="autosearch__SHOPS">--}}
{{--                                <span class="autosearch__column-title">Магазины </span>--}}
{{--                                <div class="autosearch__column-wrap" style="height:150px;overflow-y:scroll;"><!-- custom-scrollbar -->--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="#" target="_blank"></a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    </div>

                    <div class="autosearch__column">
                        <div class="autosearch__PRODUCTS">
                            <span class="autosearch__column-title">Товары </span>
                            <div class="autosearch__column-wrap "><!-- custom-scrollbar -->
                                <ul>
                                    <li class="product-card product-card--vertical" style="display: none">
                                        <article class="product-card__wrap">
                                            <a href="#" class="product-card__link">
                                                <div class="product-card__image">
                                                    <img class="lazy" src="" alt="Advantage image">
    {{--                                                <picture>--}}
    {{--                                                    <source srcset="img/products/1.webp" type="image/webp">--}}
    {{--                                                    <source srcset="img/products/1.png" type="image/png">--}}
    {{--                                                    <img class="lazy" src="" data-src="img/products/1.png" alt="Advantage image">--}}
    {{--                                                </picture>--}}
                                                </div>
                                                <div class="product-card__content product-card__content--wp">
                                                    <h4 class="product-card__title"></h4>
                                                    <span class="product-card__vendor"></span>
                                                    <div class="price product-card__price">
                                                        <strike class="price__previous"><span></span> <span class="price__currency"></span></strike>
                                                        <span class="price__special"><span></span> <span class="price__currency"></span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="contact header__contact">
            <span class="contact__arrow dropdown" data-dropdown="contact__secondary-phones"><img src="{{ asset('img/svg/arrow.png') }}" alt="Arrow"></span>
            <div>
                <div class="contact__main-phone dropdown" data-dropdown="contact__secondary-phones">
                    <a href="tel:+77273279027">+7 (727) 327-90-27</a>
                    <ul class="contact__secondary-phones">
                        <li><a href="tel:+77273279027">+7 (727) 327-90-27</a></li>
                        <li><a href="tel:+77272601805">+7 (727) 260-18-05</a></li>
                    </ul>
                </div>
                <button type="button" class="contact__callback callback bg-transparent border-0 cursor-pointer" data-toggle="modal" data-target="#callback">Вам перезвонить?</button>
            </div>
        </div>
        <div class="header__user">
            @auth
                @if(Route::is('user.*'))
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="header__cabinet d-flex" role="button">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.125 27.35H14.125C12.346 27.35 10.9 25.9027 10.9 24.125V17.875C10.9 17.4748 11.2248 17.15 11.625 17.15C12.0252 17.15 12.35 17.4748 12.35 17.875V24.125C12.35 25.1035 13.1465 25.9 14.125 25.9H19.125C19.5252 25.9 19.85 26.2248 19.85 26.625C19.85 27.0252 19.5252 27.35 19.125 27.35Z" fill="#282C34" stroke="#282C34" stroke-width="0.2"/>
                            <path d="M14.125 14.85H1.62501C1.22478 14.85 0.900009 14.5252 0.900009 14.125C0.900009 13.7248 1.22478 13.4 1.62501 13.4H14.125C14.5252 13.4 14.85 13.7248 14.85 14.125C14.85 14.5252 14.5252 14.85 14.125 14.85Z" fill="#282C34" stroke="#282C34" stroke-width="0.2"/>
                            <path d="M21.3565 29.5882L21.3584 29.5876L28.8582 27.0877C29.3332 26.9286 29.65 26.4912 29.65 26V3.5C29.65 2.86641 29.1347 2.35 28.5 2.35C28.3816 2.35 28.2618 2.37047 28.1438 2.41286L28.1438 2.41289L28.1416 2.41362L20.6416 4.91362L20.6413 4.91371C20.1669 5.07034 19.85 5.50739 19.85 6V28.5C19.85 29.2547 20.6075 29.8543 21.3565 29.5882ZM21.8309 30.958C21.8306 30.9581 21.8303 30.9582 21.83 30.9583C21.5657 31.052 21.2859 31.1 21 31.1C19.566 31.1 18.4 29.934 18.4 28.5V6C18.4 4.88163 19.1179 3.89107 20.1835 3.53759L27.6684 1.04305C27.9307 0.947949 28.2119 0.9 28.5 0.9C29.934 0.9 31.1 2.06602 31.1 3.5V26C31.1 27.1172 30.3821 28.1076 29.3166 28.4624L21.8309 30.958Z" fill="#282C34" stroke="#282C34" stroke-width="0.2"/>
                            <path d="M12.35 10.375C12.35 10.7752 12.0252 11.1 11.625 11.1C11.2248 11.1 10.9 10.7752 10.9 10.375V4.125C10.9 2.3473 12.346 0.9 14.125 0.9H28.5C28.9002 0.9 29.225 1.22477 29.225 1.625C29.225 2.02523 28.9002 2.35 28.5 2.35H14.125C13.1465 2.35 12.35 3.14648 12.35 4.125V10.375Z" fill="#282C34" stroke="#282C34" stroke-width="0.2"/>
                            <path d="M7.13827 19.6382L7.1379 19.6386C6.9961 19.7789 6.81057 19.85 6.62505 19.85C6.43969 19.85 6.25412 19.779 6.11346 19.6398L6.11309 19.6394L1.11309 14.6394C0.830286 14.3566 0.830286 13.8971 1.11309 13.6143L6.11309 8.61427C6.39589 8.33147 6.85546 8.33147 7.13826 8.61427C7.42107 8.89707 7.42107 9.35664 7.13826 9.63944L2.65147 14.1262L7.13826 18.613C7.42107 18.8958 7.42107 19.3554 7.13827 19.6382Z" fill="#282C34" stroke="#282C34" stroke-width="0.2"/>
                        </svg>
                        <span>Выход</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    
                    <a href="@if(auth()->user()->role_id === 1) {{ route('user.home') }} @elseif(auth()->user()->role_id === 2) {{ route('seller.home') }} @else {{ route('admin.home') }} @endif" class="header__cabinet d-flex">
                        <svg width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 0C9.02069 0 6.19019 2.83056 6.19019 6.30971C6.19019 9.78897 9.02075 12.6195 12.5 12.6195C15.9792 12.6195 18.8096 9.78897 18.8096 6.30977C18.8097 2.83056 15.9792 0 12.5 0ZM12.5 10.9203C9.95764 10.9203 7.8894 8.85197 7.8894 6.30971C7.8894 3.76751 9.95769 1.69922 12.5 1.69922C15.0422 1.69922 17.1104 3.76751 17.1104 6.30971C17.1104 8.85197 15.0421 10.9203 12.5 10.9203Z" fill="#282C34"/>
                            <path d="M12.5 16.3804C6.00996 16.3804 0.72998 21.6604 0.72998 28.1503C0.72998 28.6195 1.11038 28.9999 1.57959 28.9999H23.4202C23.8894 28.9999 24.2698 28.6195 24.2698 28.1503C24.2698 21.6604 18.9899 16.3804 12.5 16.3804ZM2.46471 27.3007C2.89745 22.1437 7.233 18.0796 12.5 18.0796C17.7669 18.0796 22.1024 22.1437 22.5351 27.3007H2.46471Z" fill="#282C34"/>
                        </svg>
                        <span>Личный кабинет</span>
                    </a>
                    
                @endif
            @else
                <a href="{{ route('login') }}" class="header__cabinet d-flex">
                    <svg width="25" height="29" viewBox="0 0 25 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 0C9.02069 0 6.19019 2.83056 6.19019 6.30971C6.19019 9.78897 9.02075 12.6195 12.5 12.6195C15.9792 12.6195 18.8096 9.78897 18.8096 6.30977C18.8097 2.83056 15.9792 0 12.5 0ZM12.5 10.9203C9.95764 10.9203 7.8894 8.85197 7.8894 6.30971C7.8894 3.76751 9.95769 1.69922 12.5 1.69922C15.0422 1.69922 17.1104 3.76751 17.1104 6.30971C17.1104 8.85197 15.0421 10.9203 12.5 10.9203Z" fill="#282C34"/>
                        <path d="M12.5 16.3804C6.00996 16.3804 0.72998 21.6604 0.72998 28.1503C0.72998 28.6195 1.11038 28.9999 1.57959 28.9999H23.4202C23.8894 28.9999 24.2698 28.6195 24.2698 28.1503C24.2698 21.6604 18.9899 16.3804 12.5 16.3804ZM2.46471 27.3007C2.89745 22.1437 7.233 18.0796 12.5 18.0796C17.7669 18.0796 22.1024 22.1437 22.5351 27.3007H2.46471Z" fill="#282C34"/>
                    </svg>
                    <span>Вход</span>
                </a>
            @endauth

            <a class="header__favorite d-flex" @auth href="{{ route('user.likes') }}" @else data-toggle="modal" data-target="#login" @endauth>
                @auth
                    <span class="header__count">{{ $likesCount ?? 0 }}</span>
                @endauth
                <svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.6712 0.487305C21.1792 0.487305 19.7532 0.829342 18.4329 1.50398C17.5341 1.96313 16.7084 2.57318 16 3.29697C15.2915 2.57318 14.4659 1.96313 13.5671 1.50398C12.2468 0.829342 10.8208 0.487305 9.32869 0.487305C4.18487 0.487305 0 4.67218 0 9.81607C0 13.4594 1.92416 17.3289 5.71896 21.3172C8.88742 24.6472 12.7666 27.4231 15.4629 29.1654L16 29.5126L16.5371 29.1654C19.2334 27.4232 23.1126 24.6472 26.2811 21.3172C30.0759 17.3289 32 13.4594 32 9.81607C32 4.67218 27.8151 0.487305 22.6712 0.487305ZM24.8471 19.9527C22.0154 22.9288 18.5661 25.4589 16 27.1522C13.4339 25.4588 9.98459 22.9288 7.15296 19.9527C3.71998 16.3449 1.97938 12.9344 1.97938 9.81607C1.97938 5.76361 5.27631 2.46669 9.32876 2.46669C11.6619 2.46669 13.8051 3.53839 15.2087 5.40693L16 6.46029L16.7913 5.40693C18.1949 3.53839 20.3381 2.46669 22.6712 2.46669C26.7237 2.46669 30.0206 5.76361 30.0206 9.81607C30.0206 12.9344 28.28 16.3449 24.8471 19.9527Z" fill="#282C34"/>
                </svg>
            </a>

            <!-- !!!! class="header__cart BASKET" -->
            <button type="button" class="header__cart d-flex BASKET" @auth data-toggle="modal" data-target="#cardModal" @else data-toggle="modal" data-target="#login" @endauth>
                <!-- !!!! class="header__count BASKET BASKET_count" -->
                @auth
                    <span class="header__count BASKET BASKET_count">0</span>
                @endauth
                <!-- !!!! class="BASKET" -->
                <svg class="BASKET" width="34" height="32" viewBox="0 0 34 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.2563 25.75C12.6075 25.75 11.2661 27.0914 11.2661 28.7402C11.2661 30.389 12.6075 31.7304 14.2563 31.7304C15.9051 31.7304 17.2465 30.389 17.2465 28.7402C17.2465 27.0914 15.9051 25.75 14.2563 25.75ZM14.2563 30.0607C13.5281 30.0607 12.9357 29.4682 12.9357 28.7401C12.9357 28.0119 13.5282 27.4195 14.2563 27.4195C14.9845 27.4195 15.577 28.0119 15.577 28.7401C15.577 29.4684 14.9845 30.0607 14.2563 30.0607Z" fill="#282C34"/>
                    <path d="M24.7449 25.75C23.096 25.75 21.7546 27.0914 21.7546 28.7402C21.7546 30.389 23.096 31.7304 24.7449 31.7304C26.3937 31.7304 27.7351 30.389 27.7351 28.7402C27.735 27.0914 26.3936 25.75 24.7449 25.75ZM24.7449 30.0607C24.0166 30.0607 23.4242 29.4682 23.4242 28.7401C23.4242 28.0119 24.0167 27.4195 24.7449 27.4195C25.4731 27.4195 26.0655 28.0119 26.0655 28.7401C26.0655 29.4684 25.473 30.0607 24.7449 30.0607Z" fill="#282C34"/>
                    <path d="M25.4812 10.0073H13.5181C13.0571 10.0073 12.6833 10.3811 12.6833 10.8421C12.6833 11.3032 13.0572 11.6769 13.5181 11.6769H25.4812C25.9422 11.6769 26.316 11.3032 26.316 10.8421C26.316 10.381 25.9422 10.0073 25.4812 10.0073Z" fill="#282C34"/>
                    <path d="M24.8303 14.3418H14.1695C13.7085 14.3418 13.3347 14.7155 13.3347 15.1766C13.3347 15.6377 13.7085 16.0114 14.1695 16.0114H24.8302C25.2913 16.0114 25.665 15.6377 25.665 15.1766C25.665 14.7156 25.2913 14.3418 24.8303 14.3418Z" fill="#282C34"/>
                    <path d="M33.6243 6.28746C33.3059 5.89672 32.8342 5.67267 32.3301 5.67267H6.32709L5.80195 3.12339C5.69231 2.59161 5.3296 2.14509 4.83149 1.92881L1.16739 0.338373C0.744379 0.154626 0.252772 0.348732 0.0692917 0.771608C-0.114388 1.19462 0.0797175 1.68629 0.502527 1.86977L4.1667 3.46027L8.20593 23.0675C8.36504 23.8397 9.05274 24.4001 9.84118 24.4001H29.8405C30.3016 24.4001 30.6753 24.0264 30.6753 23.5653C30.6753 23.1043 30.3016 22.7305 29.8405 22.7305H9.84125L9.34991 20.3455H29.9951C30.7835 20.3455 31.4713 19.785 31.6303 19.0128L33.9653 7.67893C34.067 7.1854 33.9427 6.67812 33.6243 6.28746ZM29.9951 18.676H9.00599L6.67108 7.34219L32.33 7.34225L29.9951 18.676Z" fill="#282C34"/>
                </svg>
            </button>
        </div>
    </div>
</div>
