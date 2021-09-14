@extends('_layout')

@section('title','ARMADA - новости' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="products orders vendor__products pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <div class="d-flex align-content-center flex-wrap">
                            <h2 class="page-title orders__title mr-4 mb-2">Все новости</h2>
                            <div>
                                <button class="button btn-sm btn-success products__add mr-2 mb-2">
                                    <a href="{{ route('admin.publications.create') }}">Добавить</a>
                                </button>
{{--                                <button class="button btn-sm btn-primary products__remove mr-2 mb-2">! Удалить выделенное</button>--}}
{{--                                <button class="button btn-sm btn-light products__filter mr-2 mb-2">Фильтр</button>--}}
                            </div>
                        </div>
                        <span class="orders__count">Найдено <b>{{ $news->count() }}</b></span><!--  по фильтру -->
                    </div>
                    <div class="table-responsive products-table vendor__products-table">
                        <table id="dt-multi-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Изображение</th>
                                <th>Вид</th>
                                <th>Магазин</th>
                                <th>Название | Описание | Текст</th>
                                <th>Статус</th>
                                <th class="text-center">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                                @each('admin.publications._table_news',$news,'new')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

    <script>
        // Edit product

        {
            let editProductButton = $('.products-table__edit');

            $.each(editProductButton, function () {
                $( this ).on('click', function(){
                    let editLink = $( this ).find('input[name="edit-action"]').val();
                    let editAction = $( this ).find('input[name="edit-link"]').val();
                    let productIsActive = $( this ).find('input[name="edit-product-isActive"]').val();

                    if(productIsActive == 1) {
                        $('#quick-edit input[name="isActive"]').prop( "checked", true );
                    } else {
                        $('#quick-edit input[name="isActive"]').prop( "checked", false );
                    }

                    $('#quick-edit form').attr('action', editAction);
                    $('#quick-edit a').attr('href', editLink);
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


