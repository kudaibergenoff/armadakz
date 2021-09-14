@extends('_layout')

@section('title',"ARMADA - личный кабинет пользователя" )

{{--@section('breadcrumb')--}}
{{--    @php--}}
{{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
{{--                            'title'=>'Главная' ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',$product->catalog->slug),--}}
{{--                            'title'=>$product->catalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',['catalog_slug'=>$product->catalog->slug,'subcatalog_slug'=>$product->subcatalog->slug]),--}}
{{--                            'title'=>$product->subcatalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('product',$product->slug),--}}
{{--                            'title'=>$product->title ?? 'Информация о продукте' ];--}}
{{--    @endphp--}}
{{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
{{--@endsection--}}

@section('content')
    <section class="container page-user-area__orders">
        <div class="row">
            @include('users.include.left_menu')
            @include('users.loyalty._filters')
            <div class="orders col-12 col-lg-9">
                <div class="orders loyalty vendor__orders">
                    <h3 class="mb-3">Магазины</h3>
                    <ul class="loyalty__shops row list-style-none mb-4 pl-0">
                        @if($storeIds != null and $storeIds->count() > 0)
                            @foreach($storeIds as $store)
                                <li class="loyalty__shop-wrap col-12 col-lg-6">
                                    <div class="loyalty-shop loyalty__shop d-flex rounded bg-light p-3">
                                        <div class="loyalty-shop__image rounded">
                                            <img src="{{ $loyalties->where('store_id',$store->store_id)->first()->store->getImages() }}" alt="Shop logotype">
                                        </div>
                                        <div class="loyalty-shop__content ml-3">
                                            <div>
                                                <span>Магазин: </span><a href="{{ route('shop',$loyalties->where('store_id',$store->store_id)->first()->store->slug) }}" class="color--accent">{{ $loyalties->where('store_id',$store->store_id)->first()->store->title }}</a><br>
                                                <span>Бонусы: </span><span class="color--accent">{{ $loyalties->where('store_id',$store->store_id)->sum('amt') }}</span><br>
                                                <div class="mb-2">Отправить бонусы другу:</div>
                                                <form action="#" class="d-flex align-items-center flex-wrap flex-xl-nowrap">
                                                    <input type="email" id="email" class="form-control mr-2 mb-2" placeholder="E-mail" required>
                                                    <button type="submit" class="btn btn-md p-2 btn-primary shadow-none m-0 mb-2 font-weight-semibold" style="height: 38px; min-width:100px; box-shadow: none">Отправить</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="orders__sort d-block d-md-none">
                        <div class="orders__sort-title filters__open">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.465 0H0.536692C0.24082 0 0.000976562 0.239843 0.000976562 0.535715V3.21423C0.00100795 3.36603 0.0654495 3.5107 0.178293 3.61227L5.35804 8.27397V14.464C5.35791 14.7599 5.59763 14.9998 5.8935 15C5.97671 15 6.05879 14.9807 6.13322 14.9435L9.34745 13.3364C9.52906 13.2456 9.64379 13.06 9.64369 12.8569V8.27397L14.8234 3.61334C14.9366 3.51155 15.001 3.36643 15.0008 3.21423V0.535715C15.0007 0.239843 14.7609 0 14.465 0ZM13.9293 2.97583L8.74958 7.63646C8.63646 7.73826 8.57201 7.88337 8.57227 8.03557V12.5259L6.42944 13.5973V8.03557C6.4294 7.88378 6.36496 7.73911 6.25212 7.63756L1.07238 2.97583V1.0714H13.9293V2.97583Z" fill="#121313"/>
                            </svg>
                            <span>Фильтр</span>
                        </div>
                        <select class="browser-default custom-select" onchange="window.location.href=this.options[this.selectedIndex].value">
                            @php $status = (isset($_GET['status']) and $_GET['status'] == 'down') ? 'up' : 'down'; @endphp
                            <option value="{{ route('user.orders',['status'=>$status]) }}" selected>Статус</option>
                            {{--                            <option value="2">! Способ доставки</option>--}}
                            @php $date = (isset($_GET['date']) and $_GET['date'] == 'down') ? 'up' : 'down'; @endphp
                            <option value="{{ route('user.orders',['date'=>$date]) }}">Дата</option>
                            {{--                            <option value="4">!Покупатель</option>--}}
                            {{--                            <option value="5">!Город</option>--}}
                            {{--                            <option value="6">!Телефон</option>--}}
                            @php $price = (isset($_GET['price']) and $_GET['price'] == 'down') ? 'up' : 'down'; @endphp
                            <option value="{{ route('user.orders',['price'=>$price]) }}">Сумма</option>
                            {{--                            <option value="8">! Товар</option>--}}
                        </select>
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-between">
                        <h3>Операции</h3>
                        <button class="d-none d-md-block button btn-light filters__open">Фильтр</button>
                    </div>
                    <div class="orders__column-titles d-none d-xxl-flex align-items-center justify-content-between">
                        <div class="orders__column orders__column--title"># ID</div>
                        <div class="orders__column orders__column--title">Дата</div>
                        <div class="orders__column orders__column--title">Продавец</div>
                        <div class="orders__column orders__column--title">Баллы</div>
                        <div class="orders__column orders__column--title">Комментарий</div>
                        <div class="orders__column orders__column--title">Дата списания</div>
                    </div>
                    <ul class="orders__items row" id="myList">
                        @forelse($loyalties as $loyalty)
                            @include('users.loyalty._card',['item'=>$loyalty])
                        @empty
                        @endforelse
                    </ul>
                </div>
                <div class="pagination page-user-area__pagination">
                    {{--                    <button class="show-more pagination__more btn btn-outline-primary">Показать ещё 10 заказов</button>--}}
{{--                    @include('layouts._paginate',['pagination'=>$loyalties])--}}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-user-area/user-area-min.js') }}"></script>
@endpush


