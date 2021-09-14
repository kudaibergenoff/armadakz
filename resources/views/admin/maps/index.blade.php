@extends('_layout')

@section('title','ARMADA - мебельный торговый комплекс' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="products orders vendor__products pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <div class="d-flex align-content-center flex-wrap">
                            <h2 class="page-title orders__title mr-4 mb-2">Карта</h2>
                            <div>
                                <button class="button btn-sm btn-success products__add mr-2 mb-2">
                                    <a href="{{ route('admin.maps.create') }}">Добавить</a>
                                </button>
{{--                                <button class="button btn-sm btn-primary products__remove mr-2 mb-2">Удалить выделенное</button>--}}
{{--                                <button class="button btn-sm btn-light products__filter mr-2 mb-2">Фильтр</button>--}}
                            </div>
                        </div>
                        <span class="orders__count">Найдено <b>{{ $maps->count() }} мест</b></span>
                    </div>
                    <div class="table-responsive products-table vendor__products-table">
                        <table id="dt-multi-checkbox" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Магазин</th>
                                    <th>Карта</th>
                                    <th>Дата создания</th>
                                    <th class="text-center">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($maps as $map)
                                    @include('admin.maps._table_maps')
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Магазин</th>
                                <th>Карта</th>
                                <th>Дата создания</th>
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
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
@endpush


