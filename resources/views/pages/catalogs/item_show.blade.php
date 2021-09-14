@extends('_layout')

@section('title',"ARMADA - " . ( $item->title ?? 'Информация о продукте' ) )

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('catalogs',$item->subcatalog->catalog->slug),
                            'title'=>$item->subcatalog->catalog->title ];
        $breadcrumbs[] = [  'route'=>route('catalog',['slug'=>$item->subcatalog->slug]),
                            'title'=>$item->subcatalog->title ];
        $breadcrumbs[] = [  'route'=>route('item',['slug'=>$item->slug]),
                            'title'=>$item->title ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    {{-- @include('pages.catalogs._subcategories') --}}
    @include('pages.catalogs._filter')
    @include('pages.catalogs._catalog')
    @include('pages.catalogs._viewed')
    {{-- @include('pages.catalogs._about') --}}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-catalog/catalog.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-catalog/catalog-min.js') }}"></script>
@endpush


