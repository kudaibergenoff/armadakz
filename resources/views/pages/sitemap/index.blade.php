@extends('_layout')

@section('title','ARMADA - Карта сайта')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('sitemap'),
                            'title'=>'Карта сайта'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('overlay')

@endsection

@section('content')
    <section class="page-info__sitemap container">
        <h2 class="page-title">Карта сайта</h2>
        <ul class="sitemap">
            @foreach($menuCatalogs->sortBy('index') as $menuCatalog)
                <li>
                    <a href="{{ route('catalogs',$menuCatalog->slug) }}" class="sitemap__main-category border-bottom">
                        {{ $menuCatalog->title }}
                    </a>
                    <ul>
                        @foreach($menuSubcatalogs->where('catalog_id',$menuCatalog->id) as $menuSubcatalog)
                            <li>
                                <a href="{{ route('catalog',$menuSubcatalog->slug) }}" class="sitemap__sub-category">
                                    {{ $menuSubcatalog->title }}
                                </a>
                                <ul>
                                    @foreach($menuItems->where('subcatalog_id',$menuSubcatalog->id) as $menuItem)
                                        <li>
                                            <a href="{{ route('item',$menuItem->slug) }}">
                                                {{ $menuItem->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-info/info-min.js') }}"></script>
@endpush


