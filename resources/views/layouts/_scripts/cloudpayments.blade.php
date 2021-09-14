<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>

<script>
    const onlinePay = (target) => {
        return new Promise((resolve, reject) => {
            //e.preventDefault();
            var sumPrice = document.querySelector(`span[data-storeid$="${target.getAttribute('data-storeid')}"] .finally-price-with-discount`).textContent;
            var currency = 'KZT';

            console.log(sumPrice);

            var widget = new cp.CloudPayments();

            widget.charge({ // options
                    publicId: 'test_api_00000000000000000000001',
                    //publicId из личного кабинета
                    description: 'Введите данные карты', //назначение
                    amount: parseInt(sumPrice.split(' ').join('')), //общая сумма,
                    invoiceId: '1234567', //номер заказа необязательно
                    currency: currency, //валюта
                    skin: "classic", //дизайн виджета
                    data: {
                        myProp: 'myProp value' //произвольный набор параметров
                    }
                },
                function(options) { // success
                    console.log(options);
                    resolve(options)
                    donDone(options);


                },
                function(reason, options) { // fail
                    //действие при неуспешной оплате
                    console.log(reason, options);
                    reject(reason, options)
                    donError(reason, options)
                });

            function donDone(data) {
                var box = $('div.message');
                box.removeClass('message-error');
                box.addClass('message-ok');
                var text = 'Вы совершили оплату на сумму ' + sumPrice + ' ' + currency;
                box.html(text);
                box.show();
            }

            function donError(reason, data) {
                var box = $('div.message');
                box.removeClass('message-ok');
                box.addClass('message-error');
                box.html('<b>Ошибка оплаты</b>: ' + reason);
                box.show();
            }
        });
    }
</script>
