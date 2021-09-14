// Validation forms
$(document).ready(function() {
    $('select[required]').each(function(){
        if(!$(this).find('option[selected]:not([disabled])').length) {
            $(this).closest('.select-wrapper').find('input.select-dropdown').addClass('not-filled');
        }
    });

    $('select').on('change',function(){
        if($(this).val() != '') {
            $(this).closest('.select-wrapper').find('input.select-dropdown').removeClass('not-filled');
        }
    });

    $('select[required]').on('change',function(){
        if($(this).val() == '') {
            $(this).closest('.select-wrapper').find('input.select-dropdown').addClass('not-filled');
        }
    });
});
