@extends('_layout')

@section('title','ARMADA - Каталог продавцов')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('shops'),
                            'title'=>'Каталог продавцов'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="catalog page-shops__catalog container">
        <h2 class="page-title">Магазины</h2>
        <div class="catalog__wrap row">
            <aside class="filters catalog__filters col-12 col-md-3">
                <form action="{{ route('shops') }}" method="GET">
                    <div class="filters__header p-4 d-flex d-lg-none border-bottom align-items-center justify-content-between">
                        <b>Фильтр</b>
                        <div class="filters__close">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.50776 5.50008L10.7909 1.21668C11.0697 0.938066 11.0697 0.48758 10.7909 0.208963C10.5123 -0.0696543 10.0619 -0.0696543 9.78324 0.208963L5.49993 4.49236L1.21676 0.208963C0.938014 -0.0696543 0.487668 -0.0696543 0.209056 0.208963C-0.0696855 0.48758 -0.0696855 0.938066 0.209056 1.21668L4.49224 5.50008L0.209056 9.78348C-0.0696855 10.0621 -0.0696855 10.5126 0.209056 10.7912C0.347906 10.9302 0.530471 11 0.712906 11C0.895341 11 1.07778 10.9302 1.21676 10.7912L5.49993 6.5078L9.78324 10.7912C9.92222 10.9302 10.1047 11 10.2871 11C10.4695 11 10.652 10.9302 10.7909 10.7912C11.0697 10.5126 11.0697 10.0621 10.7909 9.78348L6.50776 5.50008Z" fill="#1C2021"/>
                            </svg>
                        </div>
                    </div>
                    <div class="filters__search border-bottom mb-4 pb-4">
                        <p class="font-weight-semibold">Поиск</p>
                        <div id="alphabet" class="search search--alphabet mt-2">
                            <input type="text" name="q" placeholder="Поиск" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                        </div>
                    </div>
                    <div class="filters__checkbox-group catalog__categories mb-0">
                        <b>По категориям</b>
                        <ul class="catalog__categories-list default-skin">
                            <li class="catalog__category @if(!isset($_GET['category'])) font-weight-bold @endif"><a href="{{ route('shops',['q'=>($_GET['q'] ?? null),'credit'=>($_GET['credit'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}">Все категории</a></li>
                            @foreach($catalogs as $catalog)
                                <li class="catalog__category @if(isset($_GET['category']) and $_GET['category'] == $catalog->slug) font-weight-bold @endif"><a href="{{ route('shops',['category'=>$catalog->slug,'q'=>($_GET['q'] ?? null),'credit'=>($_GET['credit'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}">{{ $catalog->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filters__checkbox-group mb-4 border-bottom py-4">
                        <p class="font-weight-semibold">Кредитование</p>
                        <div class="custom-scrollbar default-skin" style="max-height: 340px">
                            <ul class="list-style-none mb-b p-0">
                                <li class="custom-control custom-checkbox mb-2"><!-- filter-apply  -->
                                    <input type="checkbox" name="credit" value="yes" onclick="location.href = '@if(isset($_GET['credit']) and $_GET['credit'] == 'yes'){{ route('shops',['category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}@else{{ route('shops',['credit'=>'yes','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}@endif'" id="vendor-is_credit" class="custom-control-input" @if(isset($_GET['credit']) and $_GET['credit'] == 'yes') checked @endif>
                                    <label for="vendor-is_credit" class="custom-control-label">
                                        <a href="@if(isset($_GET['credit']) and $_GET['credit'] == 'yes'){{ route('shops') }}@else{{ route('shops',['credit'=>'yes']) }}@endif">Да</a>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filters__checkbox-group mb-4 border-bottom py-4">
                        <p class="font-weight-semibold">Магазины ARMADA <img src="{{ asset('img/shops/armada-i.png') }}" alt="Магазин из Armada" width="15" height="15"></p>
                        <div class="custom-scrollbar default-skin" style="max-height: 340px">
                            <ul class="list-style-none mb-b p-0">
                                <li class="custom-control custom-checkbox mb-2"><!-- filter-apply  -->
                                    <input type="checkbox" name="is_Armada" value="yes" onclick="location.href = '@if(isset($_GET['is_Armada']) and $_GET['is_Armada'] == 'yes'){{ route('shops',['category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}@else{{ route('shops',['is_Armada'=>'yes','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'title'=>($_GET['title'] ?? null)]) }}@endif'" id="vendor-is_Armada" class="custom-control-input" @if(isset($_GET['is_Armada']) and $_GET['is_Armada'] == 'yes') checked @endif>
                                    <label for="vendor-is_Armada" class="custom-control-label">
                                        <a href="@if(isset($_GET['is_Armada']) and $_GET['is_Armada'] == 'yes'){{ route('shops') }}@else{{ route('shops',['is_Armada'=>'yes']) }}@endif">Да</a>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="filters__checkbox-group catalog__abc mt-3">
                        <b class="mb-3 d-block">По алфавиту</b>
                        <div class="abc abc--en">
                            @foreach($enLetters as $enLetter)
                                <a href="{{ route('shops',['letter'=>$enLetter,'q'=>($_GET['q'] ?? null),'credit'=>($_GET['credit'] ?? null),'category'=>($_GET['category'] ?? null),'title'=>($_GET['title'] ?? null)]) }}" class="@if(isset($_GET['letter']) and $_GET['letter'] == $enLetter) font-weight-bold @endif">{{ $enLetter }}</a>
                            @endforeach
                        </div>
                        <div class="abc abc--ru">
                            @foreach($ruLetters as $ruLetter)
                                <a href="{{ route('shops',['letter'=>$ruLetter,'q'=>($_GET['q'] ?? null),'credit'=>($_GET['credit'] ?? null),'category'=>($_GET['category'] ?? null),'title'=>($_GET['title'] ?? null)]) }}" class="@if(isset($_GET['letter']) and $_GET['letter'] == $ruLetter) font-weight-bold @endif">{{ $ruLetter }}</a>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="button btn-primary d-lg-none my-4 mr-4 float-right">Применить</button>
                </form>
            </aside>
            <div class="catalog__content col-12 col-lg-9">
                <div class="catalog__header d-none d-lg-flex align-items-center justify-content-end">
                    <label for="select_filter" class="select_label mb-0 mr-4">Сортировка:</label>
                    <select class="form-control w-auto bg-light border-0" id="select_filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                        <option value="{{ route('shops',['category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(!isset($_GET['title'])) selected @endif>Без сортировки</option>
                        <option value="{{ route('shops',['title'=>'az','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(isset($_GET['title']) and $_GET['title'] == 'az') selected @endif>A-Z</option>
                        <option value="{{ route('shops',['title'=>'za','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(isset($_GET['title']) and $_GET['title'] == 'za') selected @endif>Z-A</option>
                    </select>
                </div>
                <div class="orders__sort d-block d-lg-none col-12">
                    <div class="orders__sort-title filters__open">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.465 0H0.536692C0.24082 0 0.000976562 0.239843 0.000976562 0.535715V3.21423C0.00100795 3.36603 0.0654495 3.5107 0.178293 3.61227L5.35804 8.27397V14.464C5.35791 14.7599 5.59763 14.9998 5.8935 15C5.97671 15 6.05879 14.9807 6.13322 14.9435L9.34745 13.3364C9.52906 13.2456 9.64379 13.06 9.64369 12.8569V8.27397L14.8234 3.61334C14.9366 3.51155 15.001 3.36643 15.0008 3.21423V0.535715C15.0007 0.239843 14.7609 0 14.465 0ZM13.9293 2.97583L8.74958 7.63646C8.63646 7.73826 8.57201 7.88337 8.57227 8.03557V12.5259L6.42944 13.5973V8.03557C6.4294 7.88378 6.36496 7.73911 6.25212 7.63756L1.07238 2.97583V1.0714H13.9293V2.97583Z" fill="#121313"/>
                        </svg>
                        <span>Фильтр</span>
                    </div>
                    <select class="browser-default custom-select" onchange="window.location.href=this.options[this.selectedIndex].value">
                        <option value="{{ route('shops',['category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(!isset($_GET['title'])) selected @endif>Без сортировки</option>
                        <option value="{{ route('shops',['title'=>'az','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(isset($_GET['title']) and $_GET['title'] == 'az') selected @endif>A-Z</option>
                        <option value="{{ route('shops',['title'=>'za','category'=>($_GET['category'] ?? null),'q'=>($_GET['q'] ?? null),'letter'=>($_GET['letter'] ?? null),'credit'=>($_GET['credit'] ?? null)]) }}" @if(isset($_GET['title']) and $_GET['title'] == 'za') selected @endif>Z-A</option>
                    </select>
                </div>
                <br>
{{--                <div class="orders__sort d-block d-lg-none col-12">--}}
{{--                    <div class="orders__sort-title filters__open">--}}
{{--                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M14.465 0H0.536692C0.24082 0 0.000976562 0.239843 0.000976562 0.535715V3.21423C0.00100795 3.36603 0.0654495 3.5107 0.178293 3.61227L5.35804 8.27397V14.464C5.35791 14.7599 5.59763 14.9998 5.8935 15C5.97671 15 6.05879 14.9807 6.13322 14.9435L9.34745 13.3364C9.52906 13.2456 9.64379 13.06 9.64369 12.8569V8.27397L14.8234 3.61334C14.9366 3.51155 15.001 3.36643 15.0008 3.21423V0.535715C15.0007 0.239843 14.7609 0 14.465 0ZM13.9293 2.97583L8.74958 7.63646C8.63646 7.73826 8.57201 7.88337 8.57227 8.03557V12.5259L6.42944 13.5973V8.03557C6.4294 7.88378 6.36496 7.73911 6.25212 7.63756L1.07238 2.97583V1.0714H13.9293V2.97583Z" fill="#121313"/>--}}
{{--                        </svg>--}}
{{--                        <span>Фильтр</span>--}}
{{--                    </div>--}}
{{--                    <select class="browser-default custom-select">--}}
{{--                        <option value="1" selected>Статус</option>--}}
{{--                        <option value="2">Способ доставки</option>--}}
{{--                        <option value="3">Дата</option>--}}
{{--                        <option value="4">Покупатель</option>--}}
{{--                        <option value="5">Город</option>--}}
{{--                        <option value="6">Телефон</option>--}}
{{--                        <option value="7">Сумма</option>--}}
{{--                        <option value="8">Товар</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <ul class="catalog__shops row">
                    @forelse($shops as $shop)
                        @include('pages.shops._card',['item'=>$shop])
                    @empty

                    @endforelse
                </ul>

                <div class="pagination catalog__pagination">
                    @include('layouts._paginate',['pagination'=>$shops])
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-shops/shops.min.css'.'?v'.now()->format('i')) }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-shops/shops-min.js'.'?v'.now()->format('i')) }}"></script>
@endpush


