@extends('_layout')

@section('title',"ARMADA - " . ( $subcatalog->title ?? 'Информация о продукте' ) )

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('catalogs',$subcatalog->catalog->slug),
                            'title'=>$subcatalog->catalog->title ];
        $breadcrumbs[] = [  'route'=>route('subcatalog',['slug'=>$subcatalog->slug]),
                            'title'=>$subcatalog->title ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    @php
        $likesCount = Auth::check() ? \App\Http\Services\Service::likesCount() : null;
        $userBasket = Auth::check() ? \App\Http\Services\Service::userBasket() : null;
    @endphp
    {{--    @include('pages.catalogs._subcategories')--}}
    @include('pages.catalogs._filter')
    @include('pages.catalogs._catalogs')
    @include('pages.catalogs._viewed')
    {{--    @include('pages.catalogs._about')--}}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-catalog/catalog.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-catalog/catalog-min.js') }}"></script>
@endpush


