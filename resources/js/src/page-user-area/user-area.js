'use strict';

$( document ).ready(function () {

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

    // User edit input

    {
        let userBlock = $('.user-block');

        $.each(userBlock, function () {
            let editButton = $( this ).find('.user-block__edit');
            let inputs = $( this ).find('.user-block-info__value > *:not(span)');

            editButton.on('click', function (e) {
                e.preventDefault();
                let form = $( this ).parents('.user-block__wrap');
                if( $( this ).hasClass('active') ) {

                } else {
                    $( this ).addClass('active');
                    $( this ).find('span').text('Сохранить');

                    $( this ).replaceWith('<button type="submit" class="user-block__edit">' + $( this ).html() + '</button>');

                    $.each(inputs, function () {
                        let currentValue = $( this ).siblings('span');

                        if( $( this ).hasClass('user-block-info__value--no-change') ) {
                            return;
                        }

                        else if( $( this ).hasClass('user-block-info__value--password') ) {
                            currentValue.fadeOut(200);

                            setTimeout(() => {
                                let cloneInput = $( this )
                                    .clone()
                                    .attr({
                                        'name':'current-password',
                                        'placeholder':'Текущий пароль'
                                    })
                                    .insertBefore($( this ))
                                    .fadeIn(200);

                                $( this ).fadeIn(200);
                            }, 200)
                        }

                        else {
                            currentValue.fadeOut(200);

                            setTimeout(() => {
                                $( this ).fadeIn(200);
                            }, 200)
                        }
                    })
                }
            })
        })
    }

});