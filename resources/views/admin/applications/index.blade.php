@extends('_layout')

@section('title','ARMADA - Заявки' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="products orders vendor__products pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <div class="d-flex align-content-center flex-wrap">
                            <h2 class="page-title orders__title mr-4 mb-2">Все заявки @if(isset($_GET['type']) and $_GET['type'] == 'rent') на аренду @else на рекламу @endif</h2>
{{--                            <div>--}}
{{--                                <a href="{{ route('admin.applications.create') }}" class="button btn-sm btn-success products__add mr-2 mb-2">Добавить</a>--}}
{{--                                <button class="button btn-sm btn-primary products__remove mr-2 mb-2">Удалить выделенное</button>--}}
{{--                            </div>--}}
                            <button class="button btn-sm btn-primary products__remove mr-2 mb-2" disabled data-toggle="modal" data-target="#confirm-delete-modal">
                                <span>Удалить выделенное</span>
                                <input type="hidden" name="muliple-delete-action" value="{{ route('admin.applications.destroy','plug') }}"><!-- ['id'=>'plug'] -->
                            </button>
                        </div>
                        <span class="orders__count">Найдено <b>{{ $applications->count() }}</b></span>
                    </div>
                    <div class="table-responsive products-table vendor__products-table">
                        <table id="dt-multi-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">Статус</th>
                                    <th class="text-center">Организация<br>Имя<br>Должность</th>
                                    <th class="text-center">Телефон<br>Сайт</th>
                                    @if(!isset($_GET['type']) or $_GET['type'] != 'rent')
                                        <th class="text-center">Вид рекламы</th>
                                    @endif
                                    @if(isset($_GET['type']) and $_GET['type'] == 'rent')
                                        <th class="text-center">Площадь, м2</th>
                                        <th class="text-center">Дополнительно</th>
                                    @endif
                                    <th class="text-center">Дата</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    @include('admin.applications._table_applications')
                                @endforeach
                            </tbody>
{{--                            <tfoot>--}}
{{--                            <tr>--}}
{{--                                <th></th>--}}
{{--                                <th>Название</th>--}}
{{--                                <th>Пользователь</th>--}}
{{--                                <th>Телефон</th>--}}
{{--                                <th>Whatsapp</th>--}}
{{--                                <th>Статус</th>--}}
{{--                                <th>Дата</th>--}}
{{--                                <th>Товары</th>--}}
{{--                                <th class="text-center">Действия</th>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
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
                    let productIsDelivery = $( this ).find('input[name="edit-product-isDelivery"]').val();
                    let productPrice = $( this ).find('input[name="edit-product-price"]').val();

                    if(productIsActive == 1) {
                        $('#quick-edit input[name="isActive"]').prop( "checked", true );
                    } else {
                        $('#quick-edit input[name="isActive"]').prop( "checked", false );
                    }

                    if(productIsDelivery == 1) {
                        $('#quick-edit input[name="is_delivery"]').prop( "checked", true );
                    } else {
                        $('#quick-edit input[name="is_delivery"]').prop( "checked", false );
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

            $('tr td:first-child').on('click', function(){
                setTimeout(function () {
                    if($('table .selected').length >= 1) {
                        deleteMultipleItemsButton.removeAttr('disabled');
                    } else {
                        deleteMultipleItemsButton.attr('disabled', 'disabled');
                    }
                }, 500)
            });

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

            deleteMultipleItemsButton.on('click', function () {
                let selectedItems = $('table .selected');
                let itemsIds = '';

                $.each(selectedItems, function (index) {
                    let itemId = $( this ).find('.products-table__delete').attr('data-item-id');

                    if(index+1 <= selectedItems.length-1) {
                        itemsIds += itemId + '_';
                    } else {
                        itemsIds += itemId;
                    }

                });

                let deleteAction = $('.products__remove input[name="muliple-delete-action"]').val();
                $('#confirm-delete-modal form').attr('action', deleteAction.slice(0,-4) + itemsIds);

            });
        }
    </script>

    <script>
        // Change application status

        {
            let form = $('.js-change-order-status');

            $.each(form, function () {
                let $this = $( this );
                let select = $( this ).find('select');
                select.on('change', function () {
                    $this.submit();
                })
            })

        }
    </script>

@endpush


