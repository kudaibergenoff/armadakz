// maskForm
$(document).ready(function() {
    $('input[name*="birth"]').inputmask('99.99.9999',{ "placeholder": "дд.мм.гггг" });
    $('input[name*="phone"]').inputmask('+38 (099) 999-99-99',{ "placeholder": "x" });
});
