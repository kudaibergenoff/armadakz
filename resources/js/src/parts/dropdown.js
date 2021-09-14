$( document ).ready(function(){

    // Dropdown
    {
        let button = $('.dropdown');

        $.each(button, function(){
            let closeIfOutsideClick = $( this ).attr('data-dropdown-outside-close');
            let dropdown = $('.' + $( this ).attr('data-dropdown'));

            $( this ).on('click', function () {
                if(dropdown.is(":visible")) {
                    dropdown.slideUp(200);
                } else {
                    dropdown.slideDown(200);
                }
            });

            if(closeIfOutsideClick) {
                $(document).mouseup(function(e)
                {
                    var container = dropdown;

                    // if the target of the click isn't the container nor a descendant of the container
                    if (!container.is(e.target) && container.has(e.target).length === 0)
                    {
                        container.slideUp(200);
                    }
                });
            }
        });
    }

});