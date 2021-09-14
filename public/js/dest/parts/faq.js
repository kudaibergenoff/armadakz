$( document ).ready(function(){

    // FAQ dropdown

    {
        let items = $('.faq__item');

        $.each(items, function () {
            let trigger = $( this ).find('.faq__question');
            let content = $( this ).find('.faq__response');
            let expand = $( this ).find('.faq__expand');

            trigger.on('click', function () {
                $('.faq__response').slideUp(200);
                $('.faq__expand').removeClass('active');

                if(content.is(':visible')) {
                    content.slideUp(200);
                    expand.removeClass('active');
                } else {
                    content.slideDown(200);
                    expand.addClass('active');
                }
            })
        });

        $('.faq__question').eq(0).trigger('click');
    }

});