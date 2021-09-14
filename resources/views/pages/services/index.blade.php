@extends('_layout')

@section('title','ARMADA - Услуги')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('services'),
                            'title'=>'Услуги'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('overlay')
    <div class="overlay">
        <div class="modal-image overflow-auto container">
            <div class="modal-image__close">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.53033 6.53033C6.82322 6.23744 6.82322 5.76256 6.53033 5.46967L1.75736 0.696699C1.46447 0.403806 0.989592 0.403806 0.696699 0.696699C0.403806 0.989592 0.403806 1.46447 0.696699 1.75736L4.93934 6L0.696699 10.2426C0.403806 10.5355 0.403806 11.0104 0.696699 11.3033C0.989592 11.5962 1.46447 11.5962 1.75736 11.3033L6.53033 6.53033ZM5 6.75H6V5.25H5V6.75Z" fill="black"/>
                    <path d="M5.46967 5.46967C5.17678 5.76256 5.17678 6.23744 5.46967 6.53033L10.2426 11.3033C10.5355 11.5962 11.0104 11.5962 11.3033 11.3033C11.5962 11.0104 11.5962 10.5355 11.3033 10.2426L7.06066 6L11.3033 1.75736C11.5962 1.46447 11.5962 0.989592 11.3033 0.696699C11.0104 0.403806 10.5355 0.403806 10.2426 0.696699L5.46967 5.46967ZM7 5.25H6V6.75H7V5.25Z" fill="black"/>
                </svg>
            </div>
            <div class="modal-image__wrap">
                <img src="img/interior/1.jpg" alt="">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="why-register page-info__why-register container">
        <h3 class="text-center mb-5">ARMADA</h3>

        <div class="row align-items-start">
            <div class="offset-lg-1 col-lg-5">
                <p><b>Клиентам:</b></p>
                <ul class="custom-ul">
                    <li>Огромный выбор товаров для дома и ремонта</li>
                    <li>Продавца можно выбрать, опираясь на реальные отзывы и рейтинги</li>
                    <li>Выбирайте удобные способы оплаты и доставки именно для Вас</li>
                </ul>
                <div class="text-center d-block d-lg-none mb-4">
                    <button class="button btn-primary">
                        <a href="{{ route('register') }}">Зарегистрироваться как покупатель</a>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <p><b>Продавцам:</b></p>
                <ul class="custom-ul">
                    <li>Быстрый запуск магазина на нашей площадке</li>
                    <li>Площадка для размещения товаров за которыми следует поток клиентов</li>
                    <li>Можно расширить географию продаж</li>
                </ul>
                <div class="text-center d-block d-lg-none">
                    <button class="button btn-primary">
                        <a href="{{ route('sellerRegister') }}">Зарегистрироваться как продавец</a>
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-lg-1 col-lg-5 text-center d-none d-lg-block">
                <button class="button btn-primary">
                    <a href="{{ route('register') }}">Зарегистрироваться как покупатель</a>
                </button>
            </div>
            <div class="col-12 col-lg-5 text-center d-none d-lg-block">
                <button class="button btn-primary">
                    <a href="{{ route('sellerRegister') }}">Зарегистрироваться как продавец</a>
                </button>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-info/info-min.js') }}"></script>
@endpush


