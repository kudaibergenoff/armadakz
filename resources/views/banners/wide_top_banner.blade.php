@isset($wideTopBanners)
<section id="banner wide_top_banner">
    <div class="banner__content">
        @foreach ($wideTopBanners as $wideTopBanner)
        <a href="{{$wideTopBanner->link}}">
            <picture>
                <source srcset="{{ $wideTopBanner->getImage('images_1580x550') }}" media="(min-width: 1580px)">
                <source srcset="{{ $wideTopBanner->getImage('images_1280x450') }}" media="(min-width: 1280px)">
                <source srcset="{{ $wideTopBanner->getImage('images_1024x450') }}" media="(min-width: 1024px)">
                <source srcset="{{ $wideTopBanner->getImage('images_768x495') }}" media="(min-width: 768px)">
                <source srcset="{{ $wideTopBanner->getImage('images_576x350') }}" media="(min-width: 320px)">
                <img src="{{ $wideTopBanner->getImage('images_1920x550') }}" alt="{{ $wideTopBanner->title ?? '' }}" class="banner-item__image" style="width: 100%; object-fit: cover;">
            </picture>
        </a>
        @endforeach
    </div>
</section>
@endisset
