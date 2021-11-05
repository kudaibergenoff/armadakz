@extends('_layout')

@section('title','ARMADA - товары' )

@section('content')
    <div class="filter-apply">
        <div class="filter-apply__wrap">
            <button>
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.875 0C2.84729 0 1.86166 0.408258 1.13496 1.13496C0.408258 1.86166 0 2.84729 0 3.875L0 27.125C0 28.1527 0.408258 29.1383 1.13496 29.865C1.86166 30.5917 2.84729 31 3.875 31H27.125C28.1527 31 29.1383 30.5917 29.865 29.865C30.5917 29.1383 31 28.1527 31 27.125V3.875C31 2.84729 30.5917 1.86166 29.865 1.13496C29.1383 0.408258 28.1527 0 27.125 0L3.875 0ZM10.3734 9.00162C10.1915 8.81972 9.94475 8.71753 9.6875 8.71753C9.43025 8.71753 9.18353 8.81972 9.00162 9.00162C8.81972 9.18353 8.71753 9.43025 8.71753 9.6875C8.71753 9.94475 8.81972 10.1915 9.00162 10.3734L14.1302 15.5L9.00162 20.6266C8.91155 20.7167 8.84011 20.8236 8.79136 20.9413C8.74262 21.059 8.71753 21.1851 8.71753 21.3125C8.71753 21.4399 8.74262 21.566 8.79136 21.6837C8.84011 21.8014 8.91155 21.9083 9.00162 21.9984C9.18353 22.1803 9.43025 22.2825 9.6875 22.2825C9.81488 22.2825 9.94101 22.2574 10.0587 22.2086C10.1764 22.1599 10.2833 22.0884 10.3734 21.9984L15.5 16.8698L20.6266 21.9984C20.7167 22.0884 20.8236 22.1599 20.9413 22.2086C21.059 22.2574 21.1851 22.2825 21.3125 22.2825C21.4399 22.2825 21.566 22.2574 21.6837 22.2086C21.8014 22.1599 21.9083 22.0884 21.9984 21.9984C22.0884 21.9083 22.1599 21.8014 22.2086 21.6837C22.2574 21.566 22.2825 21.4399 22.2825 21.3125C22.2825 21.1851 22.2574 21.059 22.2086 20.9413C22.1599 20.8236 22.0884 20.7167 21.9984 20.6266L16.8698 15.5L21.9984 10.3734C22.0884 10.2833 22.1599 10.1764 22.2086 10.0587C22.2574 9.94101 22.2825 9.81488 22.2825 9.6875C22.2825 9.56012 22.2574 9.43399 22.2086 9.31631C22.1599 9.19862 22.0884 9.0917 21.9984 9.00162C21.9083 8.91155 21.8014 8.84011 21.6837 8.79136C21.566 8.74262 21.4399 8.71753 21.3125 8.71753C21.1851 8.71753 21.059 8.74262 20.9413 8.79136C20.8236 8.84011 20.7167 8.91155 20.6266 9.00162L15.5 14.1302L10.3734 9.00162Z" fill="#E0001A"/>
                </svg>
            </button>
            <span>Применить</span>
            <button>
                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.875 0C2.84729 0 1.86166 0.408258 1.13496 1.13496C0.408258 1.86166 0 2.84729 0 3.875L0 27.125C0 28.1527 0.408258 29.1383 1.13496 29.865C1.86166 30.5917 2.84729 31 3.875 31H27.125C28.1527 31 29.1383 30.5917 29.865 29.865C30.5917 29.1383 31 28.1527 31 27.125V3.875C31 2.84729 30.5917 1.86166 29.865 1.13496C29.1383 0.408258 28.1527 0 27.125 0L3.875 0ZM23.3081 9.62937C23.1697 9.49146 23.0049 9.38287 22.8236 9.3101C22.6423 9.23734 22.4482 9.20188 22.2528 9.20586C22.0575 9.20984 21.8649 9.25317 21.6867 9.33326C21.5085 9.41336 21.3483 9.52856 21.2156 9.672L14.4867 18.2454L10.4315 14.1883C10.156 13.9316 9.7917 13.7919 9.41524 13.7985C9.03878 13.8052 8.6796 13.9577 8.41336 14.2239C8.14712 14.4902 7.99462 14.8493 7.98797 15.2258C7.98133 15.6023 8.12107 15.9666 8.37775 16.2421L13.5044 21.3706C13.6425 21.5085 13.8069 21.6171 13.9879 21.69C14.1689 21.7629 14.3628 21.7987 14.5579 21.795C14.753 21.7914 14.9454 21.7486 15.1235 21.669C15.3017 21.5894 15.462 21.4748 15.5949 21.3319L23.3294 11.6637C23.5931 11.3896 23.7388 11.023 23.7352 10.6426C23.7315 10.2622 23.5789 9.89846 23.3101 9.62937H23.3081Z" fill="#11B603"/>
                </svg>
            </button>
        </div>
    </div>

    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
{{--            @include('admin.products._filters')--}}
            @include('admin._layouts.left_menu')

            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="products orders vendor__products pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
{{--                    <form action="{{ route('admin.importxmldatapost') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="row justify-content-end">--}}
{{--                            <div class="col-lg-6">--}}

{{--                            </div>--}}
{{--                            <div class="col-lg-1">--}}
{{--                                <a href="{{ route('admin.exportxmldata') }}" type="submit" class="btn btn-success">Выгрузить</a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <input type="file" name="file" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-1">--}}
{{--                                <button type="submit" class="btn btn-success">Загрузить</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}


                    <div class="orders__header justify-content-between">
                        <div class="d-flex align-content-center flex-wrap">
                            <h2 class="page-title orders__title mr-4 mb-2">Товары</h2>
                            <div>
                                @isCan('add_products')
                                <button class="button btn-sm btn-success products__add mr-2 mb-2">
                                    <a href="{{ route('admin.products.create') }}">Добавить</a>
                                </button>
                                @endisCan
                                @isCan('delete_products')
                                <button class="button btn-sm btn-primary products__remove mr-2 mb-2" disabled data-toggle="modal" data-target="#confirm-delete-modal">
                                    <span>Удалить выделенное</span>
                                    <input type="hidden" name="muliple-delete-action" value="{{ route('admin.products.destroy','plug') }}">
                                </button>
                                @endisCan
{{--                                <button class="button btn-sm btn-light products__filter mr-2 mb-2">Фильтр</button>--}}
                                @if(isset($_GET) and count($_GET) > 0)
                                    <a href="{{ route('admin.products.index') }}" class="text-primary">
                                        <i class="fas fa-filter"></i>
                                        Сбросить фильтр
                                    </a>
                                @endif
                            </div>
                        </div>
                        <span class="orders__count">Найдено <b>{{ $products->count() }}</b>@if(isset($_GET) and count($_GET) > 0) по фильтру @endif</span>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center text-danger font-weight-bold">
                            Выберите продавца и/или категорию
                        </div>
                        <div class="col-6 col-lg mb-3">@php $get_item = isset($_GET['item']) ? $_GET['item'] : null; @endphp
                            <label class="mdb-main-label">Магазин</label>
                            <select class="form-control js-example-basic-multiple" searchable="Поиск..." onchange="window.location.href=this.options[this.selectedIndex].value" >
                                <option value="" disabled selected>Сделайте выбор</option>
                                @foreach($stores as $store)
                                    <option value="{{ route('admin.products.index',['item'=>$get_item,'store'=>$store->id]) }}" @if(isset($_GET['store']) and $_GET['store'] == $store->id) selected @endif>{{ $store->title }} (Кол-во товаров = {{ $store->products_count }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-lg mb-3">@php $get_store = isset($_GET['store']) ? $_GET['store'] : null; @endphp
                            <label class="mdb-main-label">Каталог</label>
                            <select class="form-control js-example-basic-multiple" searchable="Поиск..." onchange="window.location.href=this.options[this.selectedIndex].value" >
{{--                                <optgroup label="">--}}
{{--                                    <option value="" disabled selected>Сделайте выбор</option>--}}
{{--                                </optgroup>--}}
{{--                                @foreach($catalogs as $catalog)--}}
{{--                                    @foreach($subcatalogs->where('catalog_id',$catalog->id) as $subcatalog)--}}
{{--                                        <optgroup label="{{ $catalog->title }} | {{ $subcatalog->title }}">--}}
{{--                                            @foreach($items->where('subcatalog_id',$subcatalog->id) as $item)--}}
{{--                                                <option value="{{ route('admin.products.index',['item'=>$item->id,'store'=>$get_store]) }}" @if(isset($_GET['item']) and $_GET['item'] == $item->id) selected @endif>{{ $item->title }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </optgroup>--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
                                <option value="" disabled selected>Сделайте выбор</option>
                                @foreach($items as $item)
                                    <option value="{{ route('admin.products.index',['item'=>$item->id,'store'=>$get_store]) }}" @if(isset($_GET['item']) and $_GET['item'] == $item->id) selected @endif>
                                        {{ $item->title }} >> {{ $item->subcatalog->title }} >> {{ $item->subcatalog->catalog->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('admin.importxmldatapost') }}" method="POST" enctype="multipart/form-data" class="mt-1">
                        @csrf
                        <div class="d-flex align-items-center">
                            <div class="input-group d-flex align-items-center">
                                <span class="mr-3 mt-2">Импорт: </span>
                                <div class="custom-file cursor-pointer mt-2 mr-3" style="max-width: 320px; min-width: 250px;">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                                </div>
                                <button type="submit" class="buttons-copy buttons-html5 button btn-sm btn-light mt-2" style="font-size: 14px">Загрузить</button>
                            </div>
{{--                            <div class="input-group d-flex align-items-center">--}}
{{--                                <a href="{{ route('admin.exportxmldata') }}" class="buttons-copy buttons-html5 button btn-sm btn-light ml-3" style="font-size: 14px">Экспорт</a>--}}
{{--                            </div>--}}
                        </div>
                    </form>
                    <a href="{{ route('admin.exportxmldata') }}" type="submit" class="buttons-copy buttons-html5 button btn-sm btn-light rounded mr-2 mt-2 xmlExport d-none">XML</a>
                    <div class="table-responsive products-table vendor__products-table">
                        <table id="dt-multi-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Фото</th>
                                    <th>Артикул</th>
                                    <th>Название</th>
                                    <th>Каталог</th>
                                    <th>Продавец</th>
                                    <th>Доп.товары</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @each('admin.products._table_products',$products,'product')
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>Фото</th>
                                    <th>Артикул</th>
                                    <th>Название</th>
                                    <th>Каталог</th>
                                    <th>Продавец</th>
                                    <th>Доп.товары</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Сделайте выбор"
            });
        });
    </script>
    <script>
        // Edit product

        {
            let editProductButton = $('.products-table__edit');

            $.each(editProductButton, function () {
                $( this ).on('click', function(){
                    let editLink = $( this ).find('input[name="edit-action"]').val();
                    let editAction = $( this ).find('input[name="edit-link"]').val();
                    let productPrice = $( this ).find('input[name="edit-product-price"]').val();
                    let productIsActive = $( this ).find('input[name="edit-product-isActive"]').val();

                    if(productIsActive == 1) {
                        $('#quick-edit input[name="isActive"]').prop( "checked", true );
                    } else {
                        $('#quick-edit input[name="isActive"]').prop( "checked", false );
                    }

                    $('#quick-edit form').attr('action', editAction);
                    $('#quick-edit a').attr('href', editLink);
                    $('#quick-edit input[name="price"]').val(productPrice);
                })
            });
        }

        // Delete product

        {
            // Singe
            let deleteSingleItemButton = $('.products-table__delete');

            $.each(deleteSingleItemButton, function () {
                $( this ).on('click', function () {
                    let deleteAction = $( this ).find('input[name="delete-action"]').val();
                    let productName = $( this ).find('input[name="delete-product-name"]').val();

                    $('#confirm-delete-modal form').attr('action', deleteAction)
                    $('#confirm-delete-modal #product-name').text(productName)
                })
            });

            // Multiple
            let deleteMultipleItemsButton = $('.products__remove');

            $('tr td:first-child').on('click', function(){
                setTimeout(function () {
                    if($('table .selected').length >= 1) {
                        deleteMultipleItemsButton.removeAttr('disabled');
                    } else {
                        deleteMultipleItemsButton.attr('disabled', 'disabled');
                    }
                }, 500)
            });

            deleteMultipleItemsButton.on('click', function () {
                let selectedItems = $('table .selected');
                let itemsIds = '';

                $.each(selectedItems, function (index) {
                    let itemId = $( this ).find('.products-table__delete').attr('data-item-id');

                    if(index+1 <= selectedItems.length-1) {
                        itemsIds += itemId + ',';
                    } else {
                        itemsIds += itemId;
                    }

                });

                let deleteAction = $('.products__remove input[name="muliple-delete-action"]').val();
                $('#confirm-delete-modal form').attr('action', deleteAction.slice(0,-4) + itemsIds);

            });
        }
    </script>
@endpush


