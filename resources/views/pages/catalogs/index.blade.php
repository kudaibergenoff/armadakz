@extends('_layout')

@section('title',"ARMADA - " . ( $product->title ?? 'Информация о продукте' ) )

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('catalogs',$catalog->slug),
                            'title'=>$catalog->title ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <div class="container">
        <h2 class="page-title page-catalog__title">{{ $catalog->title }}</h2>
    </div>

    @include('pages.catalogs._index_banners')
    <div class="mb-5">
        @include('pages.catalogs._subcatalog')
    </div>
    @include('pages.catalogs._viewed')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-catalog/catalog.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-catalog/catalog-min.js') }}"></script>
@endpush


