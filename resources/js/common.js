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
            $(this).mask('+0 (000) 000-00-00', {placeholder: "+7 (---) --- -- --"});
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

    // Custom placeholder

    {
        let customPlaceholderWrap = $('.custom-placeholder');

        $.each(customPlaceholderWrap, function() {
          let placeholder = $( this ).find('.custom-placeholder__placeholder');
          let input = $( this ).find('.custom-placeholder__input');

            placeholder.on('click', function() {
                input.focus();
            });

            if (input.val()) {
                placeholder.hide();
            }

            input.on('blur', function() {
                if (!input.val()) {
                    placeholder.show();
                }
            });

            input.on('focus', function() {
                if (!input.val()) {
                    placeholder.hide();
                }
            });

            input.on('input', function() {
                if (input.val()) {
                    placeholder.hide();
                }
            });
        })
    }

    let cursorFocus = function(elem) {
        let x = window.scrollX, y = window.scrollY;
        elem.focus();
        window.scrollTo(x, y);
    };

    let searchInput = $('.header #search');

    $('.section__header-text--search').on('click', function () {
        cursorFocus(searchInput);
        searchInput.addClass('active');

        setTimeout(function () {
            searchInput.removeClass('active');
        }, 1000)
    });

});