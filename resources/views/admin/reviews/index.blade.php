@extends('_layout')

@section('title','ARMADA - Отзывы' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')

            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')

                <div class="orders pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title">Отзывы</h2>
                        <span class="orders__count">Найдено <b>{{ $reviews != null ? $reviews->count() : 0 }}</b></span>
                    </div>
                    <div class="table-responsive products-table vendor__products-table">
                        <table id="dt-multi-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th class="th-sm">Продукт | Магазин</th>
                                    <th class="th-sm">Имя | Email</th>
                                    <th class="th-lg" style="min-width: 285px">Отзыв</th>
                                    <th>Оценка</th>
                                    <th>Статус</th>
                                    <th>Дата</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($reviews) and $reviews->count() > 0)
                                @foreach($reviews as $review)
                                    @include('admin.reviews._table_reviews')
                                @endforeach
                            @else
                                <tr>
                                    <th colspan="8">У Вас ещё нет отзывов</th>
                                </tr>
                            @endif
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
                    let reviewStatus = $( this ).find('input[name="edit-product-status"]').val();

                    $('#quick-edit form select option[value="' + reviewStatus + '"]').prop('selected', true);

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

    <script>
        // Change application status

        {
            let form = $('.change-order-status');

            $.each(form, function () {
                let select = $( this ).find('select');

                select.on('change', () => {
                    $( this ).submit();
                })
            });
        }
    </script>


@endpush


