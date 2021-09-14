'use strict';


$( document ).ready(function () {

    // Material select
    $('.mdb-select').materialSelect();

    // Service show contacts

    {
        let serviceItem = $('.service');

        $.each(serviceItem, function () {
            let button = $( this ).find('.service__contacts-wrap > span:first-child');
            let contacts = $( this ).find('.service__contacts');

            button.on('click', function () {
                button.hide();
                contacts.show();
            })
        });
    }

    // Scheme popup

    let schemeBlock = $('.scheme .svg polygon');

    $.each(schemeBlock, function (e) {
        $( this ).on('click', function () {
            let popup = $('.popup');
            let popupWidth = popup.width();
            let popupHeight = popup.height();
            let arrow = popup.find('.popup__arrow');
            let close = $('.popup__close');

            close.on('click', function(){
                popup.removeAttr('style').removeClass('active');
            });

            $( document ).mouseup(function (e) {
                if (!popup.is(e.target) && popup.has(e.target).length === 0)
                {
                    popup.removeAttr('style').removeClass('active');
                }
            });

            $('.scheme').on('scroll', function () {
                popup.removeAttr('style').removeClass('active');
            });

            let blockId = $( this ).attr('id');

            let scrollTop = $( window ).scrollTop();
            let blockOffsetLeft = $( this ).offset().left;
            let blockOffsetTop = $( this ).offset().top;
            let blockWidth = $( this )[0].getBoundingClientRect().width;
            let blockHeight = $( this )[0].getBoundingClientRect().height;
            let documentWidth = $( window ).width();
            let documentHeight = $( window ).height();
            let windowHeight = $( window ).height();

            schemeBlock.removeClass('active');
            $( this ).addClass('active');

            if((documentWidth - blockOffsetLeft) > popupWidth && ((blockOffsetTop - $(window).scrollTop()) > popupHeight)) {
                popup.css({
                        'top' : blockOffsetTop - 15,
                        'left' : blockOffsetLeft,
                        'transform' : 'translateY(-100%)'
                    });
                arrow.css({
                    'top' : '100%',
                    'left' : blockWidth / 2 - 7.5,
                    'border-top' : '15px solid #F5F5F5',
                    'border-right' : '15px solid transparent',
                    'border-left' : '15px solid transparent',
                })
            } else if((documentWidth - blockOffsetLeft) > popupWidth && (blockOffsetTop - $(window).scrollTop()) < popupHeight) {
                popup.css({
                    'top' : blockOffsetTop,
                    'left' : blockOffsetLeft + blockWidth + 15,
                    //'transform' : 'translateX(-100%)'
                });
                arrow.removeAttr('style');
                arrow.css({
                    'top' : blockHeight / 2 - 7.5,
                    'right' : '100%',
                    'left' : 'auto',
                    'border-top' : '15px solid transparent',
                    'border-left' : 'none',
                    'border-right' : '15px solid #F5F5F5',
                    'border-bottom' : '15px solid transparent'
                })
            } else if((documentWidth - blockOffsetLeft) < popupWidth && (blockOffsetTop - $(window).scrollTop()) < popupHeight) {
                popup.css({
                    'top' : blockOffsetTop,
                    'left' : blockOffsetLeft - 15,
                    'transform' : 'translateX(-100%)'
                });
                arrow.removeAttr('style');
                arrow.css({
                    'top' : blockHeight / 2 - 7.5,
                    'left' : '100%',
                    'right' : 'auto',
                    'border-top' : '15px solid transparent',
                    'border-right' : 'none',
                    'border-left' : '15px solid #F5F5F5',
                    'border-bottom' : '15px solid transparent'
                })
            } else if((blockOffsetTop + popupHeight) > windowHeight) {
                popup.css({
                    'top' : blockOffsetTop - popupHeight - 17,
                    'left' : blockOffsetLeft + blockWidth,
                    'transform' : 'translateX(-100%)'
                });
                arrow.css({
                    'top' : '100%',
                    'right' : blockWidth / 2 - 7.5,
                    'left' : 'auto',
                    'border-top' : '15px solid #F5F5F5',
                    'border-left' : '15px solid transparent',
                    'border-right' : '15px solid transparent',
                    'border-bottom' : 'none'
                })
            } else {
                popup.css({
                    'top' : blockOffsetTop,
                    'left' : blockOffsetLeft - 15,
                    'transform' : 'translateY(-50%) translateX(-100%)'
                });
                arrow.removeAttr('style');
            }

            popup.addClass('active');
        })
    })

});