'use strict';

$( document ).ready(function () {

    // Video popup
    {
        let popupButton = $('.video__preview, .video__title');

        $.each(popupButton, function () {
            $( this ).YouTubePopUp();
        });
    }

    // Seo text expand

    {
        let seoSection = $('.seo-text');
        let seoText = seoSection.find('.seo-text__text');
        let seoExpandButton = seoSection.find('.expand');
        let seoExpandArrow = seoExpandButton.find('svg');

        if(seoText.height() >= 250) {
            seoText.addClass('hidden');
            seoExpandButton.addClass('active');

            seoExpandButton.on('click', function () {
                seoText.toggleClass('active');
                seoExpandButton.toggleClass('expanded');
                seoExpandArrow.toggleClass('active');
            })
        }
    }

});