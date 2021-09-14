'use strict';

$( document ).ready(function () {

    // Catalog range

    {

        let range = $("#slider-range");
        let minPriceInput = $("#min_price");
        let maxPriceInput = $("#max_price");

        let minPrice = parseFloat(range.attr('data-min'));
        let maxPrice = parseFloat(range.attr('data-max'));

        let selectedMinPrice = parseFloat(range.attr('data-selected-min'));
        let selectedMaxPrice = parseFloat(range.attr('data-selected-max'));

        minPriceInput.val(selectedMinPrice).trigger('change');
        maxPriceInput.val(selectedMaxPrice).trigger('change');

        range.slider({
            range: true,
            orientation: "horizontal",
            min: minPrice,
            max: maxPrice,
            values: [selectedMinPrice, selectedMaxPrice],
            step: 10,

            slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]).trigger('change');
                $("#max_price").val(ui.values[1]).trigger('change');
            }
        });

        minPriceInput.change(function() {
            range.slider('values',0,$(this).val());
        });

        maxPriceInput.change(function() {
            range.slider('values',1,$(this).val());
        });
    }

});