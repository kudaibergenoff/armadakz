<section class="section stocks page-home__stocks">
    <div class="container">
        <div class="section__content stocks__content">
            <ul class="stocks__items row">
                @isset($bannerTops)
                    @foreach($bannerTops as $bannerTop)
                        <li class="stocks-item stocks__item col-12 col-xl-6">
                            <a href="{{ route('banner',['link'=>$bannerTop->link]) }}" target="_blank" class="stocks-item__wrap" style="color: #FFF; justify-content: flex-start">
                                <picture>
                                    <source srcset="{{ $bannerTop->getImage('images_1920x550') }}" media="(min-width: 1580px)">
                                    <source srcset="{{ $bannerTop->getImage('images_1580x550') }}" media="(min-width: 1280px)">
                                    <source srcset="{{ $bannerTop->getImage('images_1280x450') }}" media="(min-width: 1024px)">
                                    <source srcset="{{ $bannerTop->getImage('images_1024x450') }}" media="(min-width: 768px)">
                                    <source srcset="{{ $bannerTop->getImage('images_768x495') }}" media="(min-width: 576px)">
                                    <img src="{{ $bannerTop->getImage('images_576x350') }}" alt="Banner alt" class="stocks-item__bg">

{{--                                    <source srcset="{{ asset('/img/banners/stocks/1/625x400.png') }}" media="(min-width: 1440px)">--}}
{{--                                    <source srcset="{{ asset('/img/banners/stocks/1/555x350.png') }}" media="(min-width: 1280px)">--}}
{{--                                    <source srcset="{{ asset('/img/banners/stocks/1/925x350.png') }}" media="(min-width: 1024px)">--}}
{{--                                    <source srcset="{{ asset('/img/banners/stocks/1/685x300.png') }}" media="(min-width: 768px)">--}}
{{--                                    <source srcset="{{ asset('/img/banners/stocks/2/505x215.png') }}" media="(min-width: 576px)">--}}
{{--                                    <img src="{{ asset('/img/banners/stocks/1/340x215.png') }}" alt="Banner bg" class="stocks-item__bg">--}}
                                </picture>
{{--                                <h3 class="stocks-item__title">В нашем магазине скидка <br> 30% на все диваны!</h3>--}}
{{--                                <p class="stocks-item__terms">Акция действует до <br> конца сентября.</p>--}}
{{--                                <a href="#" class="stocks-item__button button button--accent">В магазин</a>--}}
                            </a>
                        </li>
                    @endforeach
                @endif

                @isset($bannerBottom)
                    @foreach($bannerBottom as $bottom)
                        <li class="stocks-item stocks__item col-12">
                            <a href="{{ route('banner',['link'=>$bottom->link]) }}" target="_blank" class="stocks-item__wrap">
                                <picture>
                                    <source srcset="{{ $bottom->getImage('images_1920x550') }}" media="(min-width: 1580px)">
                                    <source srcset="{{ $bottom->getImage('images_1580x550') }}" media="(min-width: 1280px)">
                                    <source srcset="{{ $bottom->getImage('images_1280x450') }}" media="(min-width: 1024px)">
                                    <source srcset="{{ $bottom->getImage('images_1024x450') }}" media="(min-width: 768px)">
                                    <source srcset="{{ $bottom->getImage('images_768x495') }}" media="(min-width: 576px)">
                                    <img src="{{ $bottom->getImage('images_576x350') }}" alt="Banner alt" class="stocks-item__bg">
    {{--                                <source srcset="{{ asset('/img/banners/stocks/2/625x400.png') }}" media="(min-width: 1440px)">--}}
    {{--                                <source srcset="{{ asset('/img/banners/stocks/2/555x350.png') }}" media="(min-width: 1280px)">--}}
    {{--                                <source srcset="{{ asset('/img/banners/stocks/2/925x350.png') }}" media="(min-width: 1024px)">--}}
    {{--                                <source srcset="{{ asset('/img/banners/stocks/2/685x300.png') }}" media="(min-width: 768px)">--}}
    {{--                                <source srcset="{{ asset('/img/banners/stocks/2/505x215.png') }}" media="(min-width: 576px)">--}}
    {{--                                <img src="{{ asset('/img/banners/stocks/2/340x215.png') }}" alt="Banner bg" class="stocks-item__bg">--}}
                                </picture>
        {{--                        <h3 class="stocks-item__title">Стол "Вердана" <br> со скидкой 15%</h3>--}}
        {{--                        <p class="stocks-item__terms">Акция действует до <br> конца сентября.</p>--}}
        {{--                        <a href="#" class="stocks-item__button button button--accent">В магазин</a>--}}
                            </a>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</section>
