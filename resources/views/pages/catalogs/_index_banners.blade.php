@if(isset($banners) and $banners->count() > 0)
    <section class="banner banner--category page-catalog__banner container">
        <ul class="banner__items">
            @foreach($banners as $banner)
                <li class="banner-item banner__item">
                    <picture>
                        @if($banner->images_1580x550 != null)<source srcset="{{ '/storage/'.$banner->images_1580x550 }}" media="(min-width: 1440px)">@endif
                        @if($banner->images_1280x450 != null)<source srcset="{{ '/storage/'.$banner->images_1280x450 }}" media="(min-width: 1280px)">@endif
                        @if($banner->images_1024x450 != null)<source srcset="{{ '/storage/'.$banner->images_1024x450 }}" media="(min-width: 1024px)">@endif
                        @if($banner->images_768x495 != null)<source srcset="{{ '/storage/'.$banner->images_768x495 }}" media="(min-width: 768px)">@endif
                        @if($banner->images_576x350 != null)<source srcset="{{ '/storage/'.$banner->images_576x350 }}" media="(min-width: 576px)">@endif
                        <img src="{{ $banner->images_1920x550 != null
                                        ? '/storage/'.$banner->images_1920x550
                                        : ($banner->images_1580x550 != null
                                            ? '/storage/'.$banner->images_1580x550
                                            : ($banner->images_1280x450 != null
                                                ? '/storage/'.$banner->images_1280x450
                                                : ($banner->images_1024x450 != null
                                                    ? '/storage/'.$banner->images_1024x450
                                                    : ($banner->images_768x495 != null
                                                        ? '/storage/'.$banner->images_768x495
                                                        : '/storage/'.$banner->images_576x350
                                                    )
                                                )
                                            )
                                        )
                                    }}" alt="Banner alt" class="banner-item__image">
                    </picture>
                </li>
            @endforeach
{{--            <li class="banner-item banner__item">--}}
{{--                <picture>--}}
{{--                    <source srcset="{{ asset('/img/banners/main-banner/1/bannermain.png') }}" media="(min-width: 1440px)">--}}
{{--                    <source srcset="{{ asset('/img/banners/main-banner/1/bannermain1140x450.png') }}" media="(min-width: 1280px)">--}}
{{--                    <source srcset="{{ asset('/img/banners/main-banner/1/bannermain930x450.png') }}" media="(min-width: 1024px)">--}}
{{--                    <source srcset="{{ asset('/img/banners/main-banner/1/bannermain690x450.png') }}" media="(min-width: 768px)">--}}
{{--                    <source srcset="{{ asset('/img/banners/main-banner/1/bannermain510x495.png') }}" media="(min-width: 576px)">--}}
{{--                    <img src="{{ asset('/img/banners/main-banner/1/bannermain345x350.png') }}" alt="Banner alt" class="banner-item__image">--}}
{{--                </picture>--}}
{{--            </li>--}}
        </ul>
        <div class="banner__controls">
            <div class="banner__arrows">
                <div class="banner__arrow banner__arrow--prev">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>
                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                    </svg>
                </div>
                <div class="banner__arrow banner__arrow--next">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>
                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>
@endif
