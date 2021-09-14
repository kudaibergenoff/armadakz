'use strict';

$( document ).ready(function () {

    // Shops page item footer

    {
        let item = $('.catalog__shop');
        $.each(item, function () {
            let itemFooter = $( this ).find('.shop-card__footer');
            let itemContentHeight = $( this ).find('.shop-card__content > div:first-child').height();

            if(itemContentHeight >= 220) {
                itemFooter.addClass('shop-card__footer--row')
            }
        });
    }

});