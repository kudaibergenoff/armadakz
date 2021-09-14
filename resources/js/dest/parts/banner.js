$( document ).ready(function(){

    // Banner slider

    {
        let itemsWrap = $('.banner__items');
        let arrowNext = $('.banner__arrow--next');
        let arrowPrev = $('.banner__arrow--prev');

        itemsWrap.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            nextArrow: arrowNext,
            prevArrow: arrowPrev,
            //autoplay: true,
            autoplaySpeed: 5000
        });

        let dots = itemsWrap.find('.slick-dots');

        dots.wrap('<div class="banner__dots"></div>');

        dots = $('.banner__dots').appendTo('.banner__controls');
    }

});