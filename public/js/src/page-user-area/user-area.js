'use strict';

$( document ).ready(function () {

    // Mask
    {
        $('input[name="dob"]').mask('00.00.0000', {placeholder: "--.--.----"});
    }
    // Matherial select

    $('.mdb-select').materialSelect();

    // Forgot password

    {
        let remindButton = $('.login__forgot-button');
        let remindForm = $('.login__remind');
        let loginForm = $('.login__in');

        remindButton.on('click', function () {
            loginForm.hide();
            remindForm.show();
        });

        let rememberedButton = $('.login__remembered-button');

        rememberedButton.on('click', function () {
            loginForm.show();
            remindForm.hide();
        })
    }

    // Order - username crop

    {
        let username = $('.order-item__customer span');

        $.each(username, function () {
            let length = $(this).text().length;

            if (length > 15) {
                $(this).text($(this).text().substr(0, 15) + '...');
            }
        });
    }

    // Register validation

    {
        (function() {
            window.addEventListener('load', function() {
                let forms = document.getElementsByClassName('needs-validation');
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    }

});