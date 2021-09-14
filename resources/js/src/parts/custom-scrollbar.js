$( document ).ready(function(){

    // Custom scrollbar

    {
        let content = $('.catalog__categories-list, .custom-scrollbar, .filters');

        $.each(content, function () {
            if($( this ).attr('data-scrollbar-axis') === 'x') {
                $( this ).mCustomScrollbar({
                    axis: 'x'
                });
            } else {
                $( this ).mCustomScrollbar();
            }
        });

    }

});