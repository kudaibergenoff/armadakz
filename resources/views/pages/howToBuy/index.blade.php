@extends('_layout')

@section('title','ARMADA - Как покупать на ARMADA.KZ')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('howToBuy'),
                            'title'=>'Как покупать на ARMADA.KZ'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')

    <div class="container">
        <h2 class="page-title mb-4">Инструкция для покупателя</h2>

        <div class="care row my-5">
            <div class="col-lg-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-care-1-list" data-toggle="list" href="#list-care-1" role="tab" aria-controls="care-">1. Создание акканута</a>
                    <a class="list-group-item list-group-item-action" id="list-care-3-list" data-toggle="list" href="#list-care-3" role="tab" aria-controls="care-">2. Поиск необходимого товара</a>
                    <a class="list-group-item list-group-item-action" id="list-care-4-list" data-toggle="list" href="#list-care-4" role="tab" aria-controls="care-">3. Покупка товара</a>
                    <a class="list-group-item list-group-item-action" id="list-care-5-list" data-toggle="list" href="#list-care-5" role="tab" aria-controls="care-">4. Оформление заказа</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-care-1" role="tabpanel" aria-labelledby="list-care-1">
                        <p>Для создания аккаунта нужно на главной странице нажать на <b>«Вход»</b> или в подвале сайта нажать на <b>«Вход в кабинет для покупателя»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/1.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Далее нужно нажать <b>«Регистрация»</b></p>
                        <img src="{{ asset('img/instructions/for-buyer/2.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Затем заполните контактные данные, придумайте пароль и после этого нажать <b>«Зарегистрироваться»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/3.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>После регистрации, в вашем личном кабинете появится возможность <b>«Добавлять»</b> и <b>«Редактировать»</b> личные данные.</p>
                        <p>Для того чтобы изменить данные в определенном блоке, необходимо нажать <b>«Редактировать»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/4.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Далее поля станут активными для заполнения, вносите туда такую информацию как «Персональные данные», «Контакты», «Адрес доставки» итд.</p>
                        <img src="{{ asset('img/instructions/for-buyer/5.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Заполнив все нужные поля, нажмите <b>«Сохранить»</b>.</p>
                        <p>В левом меню, Вы сможете найти полезные ссылки для <b>просмотра ваших заказов, список избранного, просмотренные товары и тд</b>.</p>
                    </div>
                    <div class="tab-pane fade" id="list-care-3" role="tabpanel" aria-labelledby="list-care-3">
                        <p>Если Вы знаете какой товар искать, то можете воспользоваться <b>«Поиском»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/7.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Если нет, то на главной странице для Вас есть множество информационных блоков, с помощью которых Вы сможете найти интересующий товар.</p>
                        <p>В верхнем меню Вы можете перейти на <b>«Каталог»</b> и просмотреть товары по списку <b>«Категорий»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/8.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Нажав на интересующую <b>«Категорию»</b> Вас перенаправит на страницу содержащую все товары этой категории.</p>
                        <img src="{{ asset('img/instructions/for-buyer/12.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Так же на <a href="{{ route('home') }}"><b>Главной странице</b></a> есть слайдеры с <b>«Популярными», «Рекомендуемыми», «Акционными» и «Новыми товарами»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/9.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <img src="{{ asset('img/instructions/for-buyer/10.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <img src="{{ asset('img/instructions/for-buyer/11.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-4" role="tabpanel" aria-labelledby="list-care-4">
                        <p>Добавить товар в корзину можно двумя способами</p>
                        <ul class="custom-ul">
                            <li>Нажав на кнопку <b>«В корзину»</b> на странице товара</li>
                            <li>Или наведя на <b>«Карточку товара»</b></li>
                        </ul>
                        <img src="{{ asset('img/instructions/for-buyer/13.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <img src="{{ asset('img/instructions/for-buyer/14.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>После того как Вы добавили необходимые товары в корзину, Вы сможете проверить заказ нажав на иконку корзины в шапке сайта:</p>
                        <img src="{{ asset('img/instructions/for-buyer/15.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Чтобы перейти к оформлению заказа нажмите <b>«Оформить заказ»</b>.</p>
                        <img src="{{ asset('img/instructions/for-buyer/16.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-5" role="tabpanel" aria-labelledby="list-care-5">
                        <p>Для оформления заказа сперва необходимо заполнить информацию о покупателе.</p>
                        <img src="{{ asset('img/instructions/for-buyer/17.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Если у Вас в корзине находятся товары от разных продацов, то будет сформировано соответствующее количество заказов.</p>
                        <img src="{{ asset('img/instructions/for-buyer/18.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <img src="{{ asset('img/instructions/for-buyer/19.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Для каждого заказа, при необходимости, Вы можете изменить детали. Выбрать способ доставки, оплаты, указать получателя или указать дополнительные услуги представляемые продавцом.</p>
                        <p>Для этого нужно нажать на "Редактировать"</p>
                        <img src="{{ asset('img/instructions/for-buyer/20.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>После чего появится модальное окно с делатями заказа.</p>
                        <img src="{{ asset('img/instructions/for-buyer/21.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Далее, после проверки заказа нужно подтвердить заказ, нажав на кнопку "Заказ подтверждаю".</p>
                        <img src="{{ asset('img/instructions/for-buyer/22.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-info/info-min.js') }}"></script>
@endpush
