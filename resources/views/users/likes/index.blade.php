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
    <div class="container page-user-area__content">
        <div class="row">
            @include('users.include.left_menu')
            <div class="page-user-area__favorites favorites col-12 col-lg-9">
                <div class="page-title">Список желаний</div>
                <div class="favorites__content">
                    @if(isset($likes) and $likes->count() > 0)
                        <div class="favorites__header border-bottom border-top">
                            <form action="#" class="favorites__actions" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="button" class="favorites__check-all favorites__action cursor-pointer">
                                    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6986 0.694157C12.9435 0.451383 13.2742 0.31475 13.619 0.313799C13.9639 0.312847 14.2952 0.447653 14.5415 0.689073C14.7877 0.930492 14.9291 1.25913 14.9349 1.60393C14.9408 1.94873 14.8108 2.28199 14.5729 2.53166L7.58688 11.2642C7.46681 11.3935 7.3219 11.4973 7.16081 11.5693C6.99972 11.6413 6.82575 11.6801 6.64932 11.6834C6.47288 11.6867 6.2976 11.6543 6.13395 11.5883C5.97031 11.5223 5.82165 11.4239 5.69688 11.2992L1.06813 6.66866C0.939178 6.5485 0.835749 6.4036 0.764013 6.2426C0.692277 6.0816 0.653704 5.9078 0.650595 5.73157C0.647486 5.55534 0.679904 5.38029 0.745915 5.21686C0.811927 5.05343 0.91018 4.90497 1.03481 4.78034C1.15945 4.65571 1.3079 4.55745 1.47133 4.49144C1.63476 4.42543 1.80981 4.39301 1.98604 4.39612C2.16227 4.39923 2.33607 4.43781 2.49707 4.50954C2.65807 4.58128 2.80297 4.68471 2.92313 4.81366L6.58763 8.47641L12.6636 0.732658C12.6745 0.719147 12.6862 0.70629 12.6986 0.694157V0.694157ZM11.0886 9.68916L12.6986 11.2992C12.8234 11.4237 12.9719 11.5218 13.1354 11.5877C13.2989 11.6535 13.474 11.6858 13.6502 11.6825C13.8264 11.6792 14.0002 11.6405 14.1611 11.5686C14.322 11.4968 14.4668 11.3932 14.5869 11.2642L21.5729 2.53166C21.6984 2.40776 21.7976 2.25984 21.8647 2.09674C21.9317 1.93364 21.9652 1.75869 21.9632 1.58235C21.9611 1.40602 21.9235 1.2319 21.8527 1.0704C21.7819 0.908909 21.6792 0.763346 21.5508 0.642409C21.4225 0.521471 21.2711 0.427639 21.1057 0.366515C20.9403 0.305392 20.7642 0.278231 20.5881 0.286654C20.4119 0.295078 20.2393 0.338914 20.0804 0.415543C19.9216 0.492173 19.7799 0.600024 19.6636 0.732658L13.5859 8.47641L12.7371 7.62591L11.0869 9.68916H11.0886Z" fill="#169BD5"/>
                                    </svg>
                                    <span>Выделить все</span>
                                </button>
                                <button type="button" class="favorites__uncheck-all favorites__action cursor-pointer">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.27455 6.5L11.686 3.17736C12.1047 2.76963 12.1047 2.10855 11.686 1.70049L10.9278 0.962051C10.5092 0.554316 9.83046 0.554316 9.41148 0.962051L6 4.28469L2.58852 0.962051C2.16989 0.554316 1.49114 0.554316 1.07216 0.962051L0.313977 1.70049C-0.104659 2.10822 -0.104659 2.7693 0.313977 3.17736L3.72545 6.5L0.313977 9.82264C-0.104659 10.2304 -0.104659 10.8914 0.313977 11.2995L1.07216 12.0379C1.4908 12.4457 2.16989 12.4457 2.58852 12.0379L6 8.71531L9.41148 12.0379C9.83011 12.4457 10.5092 12.4457 10.9278 12.0379L11.686 11.2995C12.1047 10.8918 12.1047 10.2307 11.686 9.82264L8.27455 6.5Z" fill="#E0001A"/>
                                    </svg>
                                    <span>Снять выделение</span>
                                </button>
                                <button type="button" class="favorites__delete favorites__action cursor-pointer">
                                    <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.15385 1.13333C0.847827 1.13333 0.554342 1.25274 0.337954 1.46528C0.121566 1.67782 0 1.96609 0 2.26667V3.4C0 3.70058 0.121566 3.98885 0.337954 4.20139C0.554342 4.41393 0.847827 4.53333 1.15385 4.53333H1.73077V14.7333C1.73077 15.3345 1.9739 15.911 2.40668 16.3361C2.83945 16.7612 3.42642 17 4.03846 17H10.9615C11.5736 17 12.1605 16.7612 12.5933 16.3361C13.0261 15.911 13.2692 15.3345 13.2692 14.7333V4.53333H13.8462C14.1522 4.53333 14.4457 4.41393 14.662 4.20139C14.8784 3.98885 15 3.70058 15 3.4V2.26667C15 1.96609 14.8784 1.67782 14.662 1.46528C14.4457 1.25274 14.1522 1.13333 13.8462 1.13333H9.80769C9.80769 0.832755 9.68613 0.544487 9.46974 0.331946C9.25335 0.119404 8.95987 0 8.65385 0L6.34615 0C6.04013 0 5.74665 0.119404 5.53026 0.331946C5.31387 0.544487 5.19231 0.832755 5.19231 1.13333H1.15385ZM4.61538 5.66667C4.76839 5.66667 4.91514 5.72637 5.02333 5.83264C5.13152 5.93891 5.19231 6.08304 5.19231 6.23333V14.1667C5.19231 14.317 5.13152 14.4611 5.02333 14.5674C4.91514 14.6736 4.76839 14.7333 4.61538 14.7333C4.46238 14.7333 4.31563 14.6736 4.20744 14.5674C4.09924 14.4611 4.03846 14.317 4.03846 14.1667V6.23333C4.03846 6.08304 4.09924 5.93891 4.20744 5.83264C4.31563 5.72637 4.46238 5.66667 4.61538 5.66667V5.66667ZM7.5 5.66667C7.65301 5.66667 7.79975 5.72637 7.90795 5.83264C8.01614 5.93891 8.07692 6.08304 8.07692 6.23333V14.1667C8.07692 14.317 8.01614 14.4611 7.90795 14.5674C7.79975 14.6736 7.65301 14.7333 7.5 14.7333C7.34699 14.7333 7.20025 14.6736 7.09205 14.5674C6.98386 14.4611 6.92308 14.317 6.92308 14.1667V6.23333C6.92308 6.08304 6.98386 5.93891 7.09205 5.83264C7.20025 5.72637 7.34699 5.66667 7.5 5.66667V5.66667ZM10.9615 6.23333C10.9615 6.08304 10.9008 5.93891 10.7926 5.83264C10.6844 5.72637 10.5376 5.66667 10.3846 5.66667C10.2316 5.66667 10.0849 5.72637 9.97667 5.83264C9.86847 5.93891 9.80769 6.08304 9.80769 6.23333V14.1667C9.80769 14.317 9.86847 14.4611 9.97667 14.5674C10.0849 14.6736 10.2316 14.7333 10.3846 14.7333C10.5376 14.7333 10.6844 14.6736 10.7926 14.5674C10.9008 14.4611 10.9615 14.317 10.9615 14.1667V6.23333Z" fill="#E0001A"/>
                                    </svg>
                                    <span>Удалить выделенное</span>
                                </button>
                            </form>
                            <div class="favorites__sort">
                                <select class="browser-default custom-select" onchange="window.location.href=this.options[this.selectedIndex].value">
                                    <option value="{{ route('user.likes',['price'=>'up']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'up') selected @endif>Цены по возрастанию</option>
                                    <option value="{{ route('user.likes',['price'=>'down']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'down') selected @endif>Цены по убыванию</option>
                                    <option value="{{ route('user.likes',['date'=>'down']) }}" @if(!isset($_GET['price']) or isset($_GET['date'])) selected @endif>По дате добавления</option>
    {{--                                <option value="3">! Популярные</option>--}}
    {{--                                <option value="4">! Акционные</option>--}}
                                </select>
                            </div>
                        </div>
                        <ul class="favorites__items row">
                            @foreach($likes as $like)
                                @include('users.likes._card',['item'=>$like,'viewed'=>true])
                            @endforeach
                        </ul>
                        <div class="pagination page-user-area__pagination">
    {{--                        <button class="show-more pagination__more btn btn-outline-primary">Показать ещё 16 товаров</button>--}}
{{--                            @include('layouts._paginate',['pagination'=>$likes])--}}
                        </div>
                        <div class="favorites__footer border-top d-flex flex-wrap align-items-center pt-3 mt-3 pt-md-4 mt-md-4">
                            <span class="mr-3 mr-md-4 mt-3">
                                <span class="favorites__count"><b>{{ $likesCount }}</b> товаров на сумму</span>
                                <span class="favorites__total price__current">{{ number_format($likesSumPrice, 0, ',', ' ') }} <span class="currency">тг.</span></span>
                            </span>
                            <button data-likes="{{ $likes->toJson() }}" class="button btn-primary rounded mt-3" id="buyAllProducts" data-backdrop="false" data-toggle="modal" data-target="#addToBasket">Купить все</button>
                        </div>
                    @else
                        <p class="">На данный момент список Ваших желаний пуст</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-user-area/user-area-min.js') }}"></script>

    <script>
        // Favorites
        {
            let items = $('.favorites__item');
            let checkAllButton = $('.favorites__check-all');
            let uncheckAllButton = $('.favorites__uncheck-all');
            let deleteButton = $('.favorites__delete');
            let form = $('.favorites__actions');
            let formAction = '{{ route('user.likesDelete',['id'=>'plug']) }}';

            console.log(formAction);

            checkAllButton.on('click', function () {
                items.find('.product-card__checkbox .custom-control-input').prop('checked', true);
            });

            uncheckAllButton.on('click', function () {
                items.find('.product-card__checkbox .custom-control-input').prop('checked', false);
            });

            deleteButton.on('click', () => {
                let itemsIds = '';

                $.each(items, function (index) {
                    let productId = $( this ).attr('data-product-id');
                    let checkbox = $( this ).find('.product-card__checkbox .custom-control-input');

                    if( checkbox.is(':checked') ) {
                        if(index+1 <= items.length-1) {
                            itemsIds += productId + ',';
                        } else {
                            itemsIds += productId;
                        }
                    }
                });

                form.attr('action', formAction.slice(0,-4) + itemsIds);
                console.log(form.attr('action'));
                form.submit();
            });
        }
    </script>
@endpush


