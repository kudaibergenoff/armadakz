'use strict';

$( document ).ready(function () {

    // Input masks

    {
        // Phone input mask
        let phoneInput = $('input[type=tel]');

        $.each(phoneInput, function () {
            $(this).mask('+0 (000) 000-00-00');
        });
    }

});