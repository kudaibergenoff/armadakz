'use strict';

$( document ).ready(function () {

    // Catalog range

    {
        $("#slider-range").slider({
            range: true,
            orientation: "horizontal",
            min: 0,
            max: 10000,
            values: [0, 10000],
            step: 100,

            slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]).trigger('change');
                $("#max_price").val(ui.values[1]).trigger('change');
            }
        });
    }

});