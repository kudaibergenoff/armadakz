$( document ).ready(function(){

    // FAQ dropdown

    {
        let items = $('.faq__item');

        $.each(items, function () {
            let trigger = $( this ).find('.faq__question');
            let content = $( this ).find('.faq__response');

            trigger.on('click', function () {
                $( this ).find('.faq__expand').toggleClass('active');
                content.slideToggle(200);
            })
        });

        $('.faq__question').eq(0).trigger('click');
    }

});