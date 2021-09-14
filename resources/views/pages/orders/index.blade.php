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

    <section class="order page-order__order container">
    <!--<form action="{{ route('orderPost') }}" class="order__form" method="POST">-->
        @csrf

        <input type="hidden" name="products" class = 'ALL_ORDERS'>
        @auth
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        @endauth

        @include('pages.orders._modal')

        <div class="row">
            <div class="col-12 order__edit">
                <p class="h4 mb-4">Информация о покупателе</p>

                <div class="row mb-4">
                    <div class="col-12 mb-3">
                        <label for="fio">Введите Ф.И.О. *</label>
                        <input type="text" name="fio" id="fio" class="form-control" @auth value="{{ old('fio') ?? Auth::user()->fio() }}" @endauth placeholder="Ф.И.О. *" required>
                    </div>
                    <div class="col-12 mb-3 mb-lg-0 col-md">
                        <label for="phone">Введите Ваш Телефон</label>
                        <input type="tel" name="phone" id="phone" class="form-control" @auth value="{{ old('phone') ?? Auth::user()->phone() }}" @endauth placeholder="Телефон *" required>
                    </div>
                    <div class="col-12 mb-3 mb-lg-0 col-md">
                        <label for="email">Введите Ваш E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" @auth value="{{ old('email') ?? Auth::user()->email }}" @endauth placeholder="E-mail *" required>
                    </div>
                </div>

                <p class="h4 mb-4">Укажите адрес доставки</p>

                <div class="row mb-4">
                    <div class="col-12 mb-3 col-md">
                        <label>Страна доставки</label>
                        <p class="mt-2"><b>Казахстан</b></p>
                    </div>
                    <div class="col-12 mb-3 col-md">
                        <label>Введите город *</label>
                        <select name="city_id" class="form-control mt-0" searchable="Поиск..." id="city" required>
                            <option id='city_plug' value="" disabled selected>Сделайте выбор</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" @if(Auth::user()->city_id == $city->id) selected @endif>{{ $city->title_ru }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="address">Адрес для доставки товара</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Адрес (улица, дом, квартира)*" value="{{ old('address') ?? Auth::user()->address }}" required>
                    </div>
                    <div class="col-12">
                        <label for="comment">Ваш комментарий к заказу</label>
                        <textarea name="comment" class="form-control" id="comment" rows="6" placeholder="Укажите тут свои комментарии и пожелания по данному заказу"></textarea>
                    </div>
                </div>
                @if(Auth::check() and Auth::user()->vip == 0)
                    <div class="custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="vip" id="vip">
                        <label class="custom-control custom-control-label" for="vip">Соглашаюсь с участием в програме лояльности от МП Армада и получать дисконт с первой и последующих покупок</label>
                    </div>
                @endif
                <br>
            </div>
        </div>
        @forelse($stores as $store)
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="order-item-total details__block bg-light rounded p-4 mt-4" data-payType="1,2,3,4{{-- collect($store->pay_id) --}}" data-deliveryType="1,2,3,4{{-- collect($store->delivery_id) --}}" data-dopserviceType="1,2,3,4{{-- collect($store->dopservice_id) --}}" data-storeId="{{ $store->id }}" data-order-index="1">
                        <h4 class="seller__title mb-4">Заказ №{{ $loop->iteration }} (магазин <a href="{{ route('shop',$store->slug) }}" target="_blank">{{ $store->title }}</a>)</h4>
                        <ul class="seller__products row list-style-none mb-0 p-0">
                            @forelse($orders->where('store_id',$store->id) as $order)
                                <li class="col-12 seller__product order-total__item product-card product-card--vertical" data-productId="{{ $order->product_id }}">
                                    <article class="product-card__wrap product-card__wrap--no-hover">
                                            <span class="product-card__header">
{{--                                                <span class="product-card__stickers">--}}
{{--                                                    <span class="product-card__sticker product-card__sticker--sale">-8%</span>--}}
{{--                                                </span>--}}
                                            </span>
                                        <a href="{{ route('product',['id' => $order->product->id,'slug'=>$order->product->slug]) }}" class="product-card__link" target="_blank">
                                            <div class="product-card__image">
                                                <img src="{{ $order->getImage() }}" alt="Product image" />
                                            </div>
                                            <div class="product-card__content product-card__content--wp">
                                                <h4 class="product-card__title">{{ $order->title }}</h4>
                                                <span class="product-card__vendor">{{ $order->title }}</span>
                                                <div class="price product-card__price">
                                                    <span class="price__current">{{ $order->price }} <span class="price__currency">тг.</span></span>
                                                </div>
                                                <div class="product-card__count">Кол-во: <span>{{ $order->count }}</span> шт.</div>
                                            </div>
                                        </a>
                                    </article>
                                </li>
                            @empty
                                Данные отсутствуют!
                            @endforelse
                        </ul>
                        <p class="mt-4 d-flex align-items-center">
                            <span class="font-weight-bold text-uppercase mr-4">Детали заказа</span>
                            <span data-storeId-edit="{{ $store->id }}" class="edit-order medium font-weight-semibold color--accent d-flex align-items-center cursor-pointer" data-toggle="modal" data-target="#order-1">
                                    <span>Редактировать</span>
                                    <svg class="ml-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.85722 6.00032C9.62052 6.00032 9.42864 6.1922 9.42864 6.42891V10.7146C9.42864 10.9513 9.23676 11.1432 9.00005 11.1432H1.28573C1.04902 11.1432 0.857142 10.9513 0.857142 10.7146V2.14315C0.857142 1.90644 1.04902 1.71456 1.28573 1.71456H6.42863C6.66533 1.71456 6.85721 1.52268 6.85721 1.28598C6.85721 1.04928 6.66533 0.857422 6.42863 0.857422H1.28573C0.575638 0.857422 0 1.43306 0 2.14315V10.7146C0 11.4247 0.575638 12.0004 1.28573 12.0004H9.00008C9.71017 12.0004 10.2858 11.4247 10.2858 10.7146V6.42888C10.2858 6.1922 10.0939 6.00032 9.85722 6.00032Z" fill="#E0001A"/>
                                        <path d="M11.5195 0.480597C11.2118 0.172826 10.7944 -4.34432e-05 10.3592 6.78048e-06C9.92369 -0.00124881 9.50588 0.171922 9.19902 0.480873L3.5538 6.12561C3.50697 6.1728 3.47163 6.23015 3.45051 6.29318L2.59337 8.86464C2.51856 9.08921 2.63998 9.33189 2.86455 9.40667C2.90812 9.42119 2.95375 9.4286 2.99966 9.42865C3.04566 9.42857 3.09139 9.42119 3.13508 9.4068L5.70654 8.54966C5.76969 8.52856 5.82707 8.49306 5.87411 8.44595L11.5193 2.80075C12.16 2.1601 12.1601 1.12133 11.5195 0.480597ZM10.9133 2.19516L5.34181 7.76665L3.67722 8.3225L4.23137 6.66004L9.80499 1.08858C10.1114 0.782768 10.6077 0.78327 10.9136 1.08968C11.0596 1.23606 11.1419 1.43422 11.1426 1.64101C11.1431 1.84892 11.0606 2.0484 10.9133 2.19516Z" fill="#E0001A"/>
                                    </svg>
                                </span>
                        </p>
                        <ul class="order-item-total__details-items list-style-none pl-3">
                            <li class="order-item-total__details-item" data-seller-detail-type="delivery">
                                <p>
                                    <span>Способ доставки:</span>
                                    <b class="d-inline-flex align-items-center">
                                        <span data-input-id-in-base="{{ $store->delivery_id != null ? $typeDeliverys->where('id',$store->delivery_id[0])->first()->id : 1 }}" class="information">{{ $store->delivery_id != null ? $typeDeliverys->where('id',$store->delivery_id[0])->first()->title : $typeDeliverys->where('id',1)->first()->title ?? '' }}</span>
                                    </b>
                                </p>
                            </li>
                            <li class="order-item-total__details-item" data-seller-detail-type="payment">
                                <p>
                                    <span>Способ оплаты:</span>
                                    <b class="d-inline-flex align-items-center" >
                                        <span data-input-id-in-base="{{ $store->pay_id != null ? $typePays->where('id',$store->pay_id[0])->first()->id : 1 }}" class="information">{{ $store->pay_id != null ? $typePays->where('id',$store->pay_id[0])->first()->title : $typePays->where('id',1)->first()->title }}</span>
                                    </b>
                                </p>
                            </li>
                            <li class="order-item-total__details-item" data-seller-detail-type="recipient">
                                <p>
                                    <span>Получатель:</span>
                                    <b class="d-inline-flex align-items-center">
                                        <span class="information">Я</span>
                                    </b>
                                </p>
                            </li>
                            {{-- <li class="order-item-total__details-item" data-seller-detail-type="additional-services">
                                <p class="d-flex flex-column">
                                    <span>Дополнительные услуги:</span>
                                    <b class="d-inline-flex align-items-start">
                                        <span class="information">не выбраны</span>
                                    </b>
                                </p>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="order__details col-12 col-lg-5">
                    <div class="order__total bg-light rounded p-4 mt-lg-4 border-top">
                        <div class="seller__order-detail-total d-flex flex-column align-items-start justify-content-center">
                            <p class="h4 mb-4">Итого </p>
                            <div class="order-total__total mb-3">
                                <span>К оплате: </span>
                                <strike class="price__previous finally-price-without-discount"> <span class="number">1234567890</span>  <span class="currency">тг.</span></strike>
                                <span data-storeid="{{ $store->id }}" class="price price__current"><span class="finally-price-with-discount"></span> <span class="currency">тг</span></span>
                            </div>
                            <div data-storeid="{{ $store->id }}" class="points">
                                <span>У вас есть <span class="points__count-items"></span> бонусных баллов!</span>
                            </div>
                            <div class="custom-checkbox">
                                <input type="checkbox" class="custom-control-input checkbox-bonus" name="bonus" id="bonus-{{ $store->id }}">
                                <label class="custom-control custom-control-label" for="bonus-{{ $store->id }}">Оплатить бонусными баллами</label>
                            </div>
                            <br>
                            <button data-storeid="{{ $store->id }}" type="submit" class="order-total__submit button btn-primary rounded">Заказ подтверждаю</button>
                            <p class="medium mt-3 mb-0">Подтверждая заказ, я принимаю условия пользовательского соглашения.</p>
                            <div class="seller__order-detail-promocode">
                                <p class="font-weight-bold text-uppercase mt-4">Добавить промокод</p>
                                <p class="medium">Введите Ваш промокод ниже</p>
                                <div class="input-group mb-3 medium">
                                    <input type="text" name="promocode" class="form-control px-4" data-mask="0000-0000-0000-0000" placeholder="Промокод" aria-label="Введите промокод..." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-md btn-default m-0 px-4 font-weight-semibold py-2 z-depth-0 waves-effect text-uppercase text-white bg-dark py-3" type="button" id="button-addon2">Применить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>В корзине нет товаров</p>
    @endforelse
    <!--  </form> -->
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-order/order.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-order/order-min.js') }}"></script>

    @include('layouts._scripts.cloudpayments')
    @include('layouts._scripts.page_orders')
@endpush
