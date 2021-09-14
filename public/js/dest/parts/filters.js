$( document ).ready(function(){

    // Filters responsive

    {
        let filters = $('.filters');
        let open = $('.filters__open, .products__filter');
        let close = $('.filters__close, .overlay, .header__overlay');
        let overlay = $('.overlay, .header__overlay');

        close.on('click', function () {
            if( filters.hasClass('active') ) {
                $('.filter-apply').fadeOut(100);
            }
            filters.removeClass('active');
            overlay.fadeOut(200);
        });

        $.each(open, function () {
            $( this ).on('click', function () {
                if( filters.hasClass('active') ) {
                    $('.filter-apply').fadeOut(100);
                }
                overlay.fadeIn(200);
                filters.toggleClass('active');
            })
        })
    }

    // Filter apply

    {
        let button = $('.filter-apply');
        let filters = $('.filters');
        let triggers = $('.filters input, .filters select, .filters textarea');

        let close = $('.filter-apply__close');
        let apply = $('.filter-apply__apply');

        close.on('click', function () {
            button.fadeOut(100);
        });

        setTimeout(function () {
            $.each(triggers, function() {
                $( this ).on('change', function(){
                    let form = $( this ).parents('form');

                    let inputOffset = $( this ).offset();
                    let filtersOffset = filters.offset();
                    let offsetTop = inputOffset.top;
                    let offsetLeft = filtersOffset.left;
                    let filtersWidth = filters.width();

                    button.css({
                        'top' : offsetTop + 'px',
                        'left' : offsetLeft + filtersWidth + 25 + 'px',
                        'display' : 'block'
                    });

                    apply.on('click', function () {
                        form.submit();
                    })
                })
            })
        }, 1500)
    }

});