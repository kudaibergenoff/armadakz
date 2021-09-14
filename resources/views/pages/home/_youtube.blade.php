<section class="section slideshow section--slideshow youtube page-home__youtube" data-slides-to-show="4" data-slides-to-show-xs="1" data-unslick-xs="false">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title section__title--dark">Новые видео на нашем канале</h2>
            <div class="d-flex align-items-center">
                <div class="section__header-text section__header-text--youtube">
                    <a href="https://www.youtube.com/channel/UCZjR1tZnuz1fgZm01PKzOSQ" target="_blank">
                        <svg width="29" height="20" viewBox="0 0 29 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.6736 3.30109C27.3574 2.10011 26.4257 1.15426 25.2427 0.833273C23.0984 0.25 14.5 0.25 14.5 0.25C14.5 0.25 5.9017 0.25 3.75736 0.833273C2.57435 1.15431 1.64263 2.10011 1.32639 3.30109C0.751831 5.47793 0.751831 10.0197 0.751831 10.0197C0.751831 10.0197 0.751831 14.5615 1.32639 16.7383C1.64263 17.9393 2.57435 18.8457 3.75736 19.1667C5.9017 19.75 14.5 19.75 14.5 19.75C14.5 19.75 23.0983 19.75 25.2427 19.1667C26.4257 18.8457 27.3574 17.9393 27.6736 16.7383C28.2482 14.5615 28.2482 10.0197 28.2482 10.0197C28.2482 10.0197 28.2482 5.47793 27.6736 3.30109V3.30109ZM11.6879 14.1433V5.89611L18.8744 10.0198L11.6879 14.1433V14.1433Z" fill="white"/>
                        </svg>
                        <span>Подробнее</span>
                    </a>
                </div>
                <div class="section__arrows ml-5 d-none d-md-flex">
                    <div class="section__arrow section__arrow--prev slideshow__arrow--prev">
                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>
                            <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="section__arrow section__arrow--next slideshow__arrow--next">
                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>
                            <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__content youtube__content">
            <h4 class="youtube__chanel-name">Мастерская уюта</h4>
            <ul class="slideshow__items youtube__items d-flex">
                @foreach($videos as $video)
                    <li class="video youtube__item col-12 col-md-6 col-xl-3">
                        <a href="{{ $video->url }}" class="video__preview">
                            <img src="{{ 'https://img.youtube.com/vi/'. $video->img .'/0.jpg' }}" alt="Video preview">
                            <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/watch?v=ixVrAT-1CvA" class="video__title">{{ $video->title }}</a>
                        <time class="video__date">{{ $video->created_at->format('d.m.Y') }}</time>
                    </li>
                @endforeach
            </ul>
            <div class="section__arrows d-flex mt-4 justify-content-center d-md-none">
                <div class="section__arrow section__arrow--prev slideshow__arrow--prev">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18.5" cy="18.5" r="18.5" fill="#e1e1e1"/>
                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                    </svg>
                </div>
                <div class="section__arrow section__arrow--next slideshow__arrow--next">
                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18.5" cy="18.5" r="18.5" fill="#e1e1e1"/>
                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
