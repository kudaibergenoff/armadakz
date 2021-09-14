@extends('_layout')

@section('title','ARMADA - Создать кабинет на ARMADA.KZ')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('forSeller'),
                            'title'=>'Создать кабинет на ARMADA.KZ'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')

    <div class="container">
        <h2 class="page-title mb-4">Инструкция для продавца</h2>

        <div class="care row my-5">
            <div class="col-lg-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-care-1-list" data-toggle="list" href="#list-care-1" role="tab" aria-controls="care-">1. Вход в панель продавца</a>
                    <a class="list-group-item list-group-item-action" id="list-care-3-list" data-toggle="list" href="#list-care-3" role="tab" aria-controls="care-">2. Создание и редактирование магазина</a>
                    <a class="list-group-item list-group-item-action" id="list-care-4-list" data-toggle="list" href="#list-care-4" role="tab" aria-controls="care-">3. Создание и редакитрование товара</a>
                    <a class="list-group-item list-group-item-action" id="list-care-5-list" data-toggle="list" href="#list-care-5" role="tab" aria-controls="care-">4. Заказы</a>
                    <a class="list-group-item list-group-item-action" id="list-care-6-list" data-toggle="list" href="#list-care-6" role="tab" aria-controls="care-">5. Отзывы</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-care-1" role="tabpanel" aria-labelledby="list-care-1">
                        <p>Для того, чтобы войти как продавец нужно перейти по ссылке: <a href="http://wp10.webpr.biz.ua/login">wp10.webpr.biz.ua/login</a>, и кликнуть на <b>«Войти как продавец»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/1.png') }}" alt="Стандартная страница входа" class="img-responsive border my-4">
                        <p>Далее нужно пройти <b>«Регистрацию продавца»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/2.png') }}" alt="Страница входа для продавца" class="img-responsive border my-4">
                        <p>Заполняем поля с контактными данными и нажимаем <b>«Зарегистрироваться»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/3.png') }}" alt="Страница регистрации продавца" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-3" role="tabpanel" aria-labelledby="list-care-3">
                        <p>
                            Для того, чтобы добавить товар для начала нужно создать свой магазин.<br>
                            Для этого нужно кликнуть на кнопку <b>«Магазины»</b> в левом крайнем блоке <b>«Магазины»</b>.
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/4.png') }}" alt="Создание магазина" class="img-responsive border my-4">
                        <p>Чтобы создать новый магазин нужно нажать <b>«Добавить»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/5.png') }}" alt="Создание магазина" class="img-responsive border my-4">
                        <p>
                            Далее нужно ввести <b>информацию о магазине</b>.<br>
                            В блоках выделенных на картинке нужно добавить фото магазина, а так же нужно заполнить необходимую информацию о нем.
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/6.png') }}" alt="Создание магазина" class="img-responsive border my-4">
                        <p>
                            В следующих выделенных блоках нужно ввести описание магазина, а также <b>контактный телефон</b> (минимум один).<br>
                            <small>(рекомендуем вводить все активные номера для способов связи покупателя с продавцом)</small><br>
                            Обязательным полем есть <b>«Электронный адрес»</b>. Поля «Адрес сайта» и ссылки на социальные сети заполняются по мере необходимости.<br>
                            <small>(рекомендуем вводить все активные ссылки на соц.сети, так вы внушаете больше доверия покупателям ).</small>
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/7.png') }}" alt="Создание магазина" class="img-responsive border my-4">
                        <p>Далее нужно заполнить время работы магазина, адрес продавца (по желанию), Whatsapp (по желанию). В поле <b>«Дополнительно»</b> можно ввести любую дополнительную информацию. </p>
                        <p><b>Мета описание</b> - это один из <b>SEO</b> параметров страницы, который влияет на ее представление в поисковой выдаче. Также в конце можно отметить есть ли у магазина доставка. Чтобы магазин сохранился жмем <b>«Сохранить»</b>.</p>
                        <p>В разделе <b>«Все магазины»</b> будут отображаться все созданные магазины.</p>
                        <img src="{{ asset('img/instructions/for-seller/8.png') }}" alt="Создание магазина" class="img-responsive border my-4">
                        <p>Созданный магазин можно <b>«Редактировать»</b> или <b>«Удалить»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/9.png') }}" alt="Редактирование магазина" class="img-responsive border my-4">
                        <p>После нажатия на иконку <b>«Редактировать»</b>, появится окно в котором можно изменить ключевые параметры магазина, или перейти на страницу <b>полного редактирования</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/10.png') }}" alt="Редактирование магазина" class="img-responsive border my-4">
                        <p>Также можно полностью удалить магазин, <b class="color-accent">НО будьте осторожны</b>, так как при удалении магазина, удалятся все привязанные к нему товары.</p>
                        <img src="{{ asset('img/instructions/for-seller/11.png') }}" alt="Редактирование магазина" class="img-responsive border my-4">
                        <p>При помощи <b>экспорта</b> можно скачать списки магазинов с настройками и описанием в разных форматах.</p>
                        <img src="{{ asset('img/instructions/for-seller/12.png') }}" alt="Редактирование магазина" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-4" role="tabpanel" aria-labelledby="list-care-4">
                        <p>Для того, чтобы добавить товар необходимо в панели управления или в всплывающем левом меню перейти по ссылке <b>«Товары»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/13.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>Не забываем, для того чтобы добавлять товары, у вас обязательно должен быть <b>создан магазин</b>.</p>
                        <p>
                            Чтобы добавить товар нужно кликнуть <b>«Добавить»</b>.<br>
                            В первом блоке нужно добавить <b>фото товара</b>. Затем указать имеется ли в <b>наличии</b> данный товар, далее указать <b>способы доставки</b> товара (для этого отметить галочками варианты доставки).
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/14.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>
                            Далее нужно указать <b>название, цену, артикул товара</b>.<br>
                            Также нужно указать <b>магазин</b> в котором будет продаваться данный товар и <b>выбрать раздел</b> в каталоге к которому принадлежит товар.<br>
                            Затем в поле <b>«Описание»</b> просим написать подробно о товаре, подробное описание поможет покупателю хорошо ознакомиться с товаром.
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/15.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>
                            В следующих блоках нужно указать: <b>материал из которого изготовлен товар, страну производителя, цену и параметры товара (см.)</b>.<br>
                            После заполнить поля <b>«Заголовок», «Описание» и «Ключевые слова»</b> товара, это важно для поиска в каталоге.<br>
                            Далее нажимаем <b>«Сохранить»</b> и сохраняем товар.
                        </p>
                        <img src="{{ asset('img/instructions/for-seller/16.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>Товары также можно <b>«Удалять» и «Редактировать»</b>.</p>
                        <img src="{{ asset('img/instructions/for-seller/17.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>Также имеется возможность <b>«Экспорта»</b> товаров в разных форматах.</p>
                        <img src="{{ asset('img/instructions/for-seller/18.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                        <p>Благодаря функции <b>«Фильтр»</b> можно быстро найти нужный товар.</p>
                        <img src="{{ asset('img/instructions/for-seller/19.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-5" role="tabpanel" aria-labelledby="list-care-5">
                        <p>В разделе <b>«Заказы»</b> будут отображаться товары, которые хотят заказать покупатели у продавца.</p>
                        <img src="{{ asset('img/instructions/for-seller/20.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
                    </div>
                    <div class="tab-pane fade" id="list-care-6" role="tabpanel" aria-labelledby="list-care-6">
                        <p>В разделе <b>«Отзывы»</b> будут показаны отзывы покупателей о продавце и его товарах.</p>
                        <img src="{{ asset('img/instructions/for-seller/21.png') }}" alt="Редактирование товара" class="img-responsive border my-4">
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
