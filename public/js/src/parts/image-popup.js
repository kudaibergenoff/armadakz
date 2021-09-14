$( document ).ready(function(){

    // Image popup

    {
        let image = $('.image-popup');
        let overlay = $('.overlay, .modal-image');
        let modalImage = $('.modal-image__wrap');
        let closeButton = $('.modal-image__close');

        let triggersToClose = [overlay, closeButton];

        $.each(image, function () {
            $( this ).click(function () {
                overlay.fadeIn(200);
                modalImage.html($( this ).html());
                modalImage.fadeIn(200);
            });
        });

        $.each(triggersToClose, function () {
            $( this ).on('click', function () {
                overlay.fadeOut(200);
                modalImage.fadeOut(200);
            })
        })
    }

});