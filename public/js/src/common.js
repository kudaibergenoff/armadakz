'use strict';

$( document ).ready(function () {

    // Lazy Load

    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
        // ... more custom settings?
    });

    // Input masks

    {
        // Phone input mask
        let phoneInput = $('input[type=tel]');

        $('[data-mask]').mask();

        $.each(phoneInput, function () {
            $(this).mask('+0 (000) 000-00-00', {placeholder: "+0 (123) 456 78 90"});
        });
    }

    // Text crop

    {
        let block = $('.text-crop');

        $.each(block, function() {
            let cropSize = $( this ).attr('data-crop-size');
            let length = $(this).text().length;

            if (length > cropSize) {
                $(this).text($(this).text().substr(0, cropSize) + '...');
            }
        })
    }

});