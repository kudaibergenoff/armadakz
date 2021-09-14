$( document ).ready(function(){

    // Reviews

    {
        let addButton = $('.reviews__add-button');
        let form = $('.reviews__add');

        addButton.on('click', function(){
            form.slideToggle(200);
        })
    }

});