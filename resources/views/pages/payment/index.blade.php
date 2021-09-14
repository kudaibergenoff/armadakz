@extends('_layout')

@section('title','ARMADA - Оплата')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('payment'),
                            'title'=>'Оплата' ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="page-info__payment container">
        <h2 class="page-title text-uppercase mb-4">Как оплатить</h2>
        <div class="row">
            <div class="col-12">
                {!! $page->body !!}
            </div>
{{--            <div class="col-12 col-xl-7">--}}
{{--                <ul class="payments">--}}
{{--                    @foreach([4,5] as $item)--}}
{{--                        <li><img src="{{ asset("img/payments/$item.png") }}" alt="Payment"></li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                <h4 class="mt-4">Алматы и Алматинская область</h4>--}}
{{--                <p>Оплатить заказ вы сможете одним из способов, предложенных продавцом.</p>--}}
{{--                <p>Продавцы предлагают следующие способы оплаты:</p>--}}
{{--                <ul class="custom-ul">--}}
{{--                    <li>оплата наличными при получении;</li>--}}
{{--                    <li>наложенный платеж;</li>--}}
{{--                    <li>оплата банковской картой;</li>--}}
{{--                    <li>безналичный расчет.</li>--}}
{{--                </ul>--}}
{{--                <p>Рекомендуем перед выбором товара и осуществлением оплаты, внимательно ознакомиться с продавцом.</p>--}}
{{--                <br>--}}
{{--                <p><b>Важно! Никогда не передавайте третьим лицам такие персональные данные:</b></p>--}}
{{--                <ul class="custom-ul">--}}
{{--                    <li>PIN и CVV2-код вашей карты</li>--}}
{{--                    <li>Пароли и коды, которые приходят на ваш телефон</li>--}}
{{--                    <li>Данные паспорта, прописки, других документов</li>--}}
{{--                    <li>Секретные коды, номера ваших личных счетов</li>--}}
{{--                    <li>Ваш логин или пароль в кабинет покупателя/компании</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-info/info-min.js') }}"></script>
@endpush


