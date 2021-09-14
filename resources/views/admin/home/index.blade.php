@extends('_layout')

@section('title','ARMADA - панель администратора' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--panel">
                @include('admin._layouts.header')
                <div class="panel orders vendor__panel pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <ul class="panel__items row">
                        @isCan('browse_admins')
                        @include('admin.home._admins')
                        @endisCan
                        @isCan('browse_users')
                        @include('admin.home._users')
                        @endisCan
                        @isCan('browse_sellers')
                        @include('admin.home._sellers')
                        @endisCan
                        @isCan('browse_products')
                        @include('admin.home._products')
                        @endisCan
                        @isCan('browse_publications')
{{--                        @include('admin.home._publications')--}}
                        @endisCan
                        @isCan('browse_maps')
                        @include('admin.home._map')
                        @endisCan
                        @isCan('browse_news')
{{--                        @include('admin.home._news')--}}
                        @endisCan
                        @isCan('browse_videos')
{{--                        @include('admin.home._videos')--}}
                        @endisCan
                        @isCan('browse_journals')
{{--                        @include('admin.home._journals')--}}
                        @endisCan
                        @isCan('browse_media')
{{--                        @include('admin.home._media')--}}
                        @endisCan
                        @isCan('browse_banners')
                        @include('admin.home._banners')
                        @endisCan
                        @isCan('browse_applications')
                        @include('admin.home._applications')
                        @endisCan
                        @isCan('browse_orders')
                        @include('admin.home._orders')
                        @endisCan
                        @isCan('browse_reviews')
                        @include('admin.home._reviews')
                        @endisCan
                        @isCan('browse_tarifs')
{{--                        @include('admin.home._tarifs')--}}
                        @endisCan
                        @isCan('browse_blogs')
{{--                        @include('admin.home._blog')--}}
                        @endisCan
                        @isCan('browse_settings')
{{--                        @include('admin.home._settings')--}}
                        @endisCan
                    </ul>
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


