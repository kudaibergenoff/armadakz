$( document ).ready(function(){

    // Slideshow

    {
        let slideshowSection = $('.section--slideshow');

        $.each(slideshowSection, function () {
            let items = $( this ).find('.slideshow__items');
            let itemsLength = items.find('.slideshow__item').length;
            let nextArrow = $( this ).find('.slideshow__arrow--next');
            let prevArrow = $( this ).find('.slideshow__arrow--prev');

            let slidesToShow;
            let slidesToShowXs;
            let unslickXs;

            if($( this ).attr('data-slides-to-show-xs')) {
                slidesToShowXs = parseInt($( this ).attr('data-slides-to-show-xs'));
            }  else {
                slidesToShowXs = 2;
            }

            if($( this ).attr('data-slides-to-show')) {
                slidesToShow = parseInt($( this ).attr('data-slides-to-show'));
            } else if(itemsLength <= 5) {
                slidesToShow = itemsLength;
            } else {
                slidesToShow = 5;
            }

            if($( this ).attr('data-unslick-xs') === 'false') {
                unslickXs = false;
            } else {
                unslickXs = true
            }

            items.on('setPosition', function () {
                $(this).find('.slick-slide').height('auto');
                let slickTrack = $(this).find('.slick-track');
                let slickTrackHeight = $(slickTrack).height();
                $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
            });

            items.slick({
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                //autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                nextArrow: nextArrow,
                prevArrow: prevArrow,
                responsive: [
                    {
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: slidesToShow-1
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: slidesToShow-2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: slidesToShowXs,
                            unslickXs
                        }
                    }
                ]
            })
        })
    }

});