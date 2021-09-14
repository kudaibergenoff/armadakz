$( document ).ready(function(){

    // Together slider

    {
        let together = $('.together__wrap');

        $.each(together, function () {
            let items = $( this ).find('.together__items');
            let nextArrow = $( this ).find('.together__arrow--next');
            let prevArrow = $( this ).find('.together__arrow--prev');

            $('.header__cart').on('click', function () {
                items.slick('slickGoTo', 1);
            });

            items.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                nextArrow: nextArrow,
                prevArrow: prevArrow,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            dots: true
                        }
                    }
                ]
            });

            let dots = $( this ).find('.slick-dots');

            if(window.matchMedia('(max-width: 1024px)').matches){
                dots.append(nextArrow);
                dots.prepend(prevArrow);
            } else {

            }
        });


    }

});