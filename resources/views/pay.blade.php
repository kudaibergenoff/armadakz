@extends('_layout')

@section('title',"ARMADA - торговый комплекс" )

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('orders'),
                            'title'=>'Оформление заказа' ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <h2 class="page-order__title container page-title pt-4">Оформление заказа</h2>

    <div id="list_section">
        <div class="message">
            <h5>Здесь будет сообщение о статусе заказа</h5>
        </div>
        <form id="newItemForm">
            <div>
                <p>Вы оформляете заказ на <b> Апельсины </b> </p>
            </div>
            <input type="text" id="price" placeholder="Item" value="100" disabled>
            <button type="submit" class="btn btn-success" id="add" value="add" />Оплатить</button>
            <select id="currency">
                <option>UAH</option>
                <option>RUB</option>
            </select>
        </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-order/order.min.css') }}">

@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-order/order-min.js') }}"></script>

    <script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
    <script>
        $(function() {

            $('#add').on('click',function(e){
                e.preventDefault();
                var sumPrice = $('#price').val();
                var currency = $('#currency').val();

                var widget = new cp.CloudPayments();

                widget.charge({ // options
                        publicId: 'test_api_00000000000000000000001',
                        //publicId из личного кабинета
                        description: 'Введите данные карты', //назначение
                        amount: parseInt(sumPrice), //общая сумма,
                        invoiceId: '1234567', //номер заказа необязательно
                        currency: currency, //валюта
                        skin: "classic", //дизайн виджета
                        data: {
                            myProp: 'myProp value' //произвольный набор параметров
                        }
                    },
                    function (options) { // success
                        donDone(options);
                        //console.log(options);
                    },
                    function (reason, options) { // fail
                        //действие при неуспешной оплате
                        donError(reason, options);
                        //console.log(reason, options);
                    });

                function donDone(data)
                {
                    var box = $('div.message');
                    box.removeClass('message-error');
                    box.addClass('message-ok');
                    var text = 'Вы совершили оплату на сумму '+ sumPrice + ' '+ currency;
                    box.html(text);
                    box.show();
                }

                function donError(reason, data)
                {
                    var box = $('div.message');
                    box.removeClass('message-ok');
                    box.addClass('message-error');
                    box.html('<b>Ошибка оплаты</b>: ' + reason);
                    box.show();
                }

            });

        });
    </script>
@endpush


