@extends('_layout')

@section('title','ARMADA - Страница не найдена')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Страница не найдена'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="container">
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404" style="background-image: url({{ asset('img/404/emoji.png') }})"></div>
                <h1>404</h1>
                <h2>Ой! Страница не найдена</h2>
                <p>Неправильно набран адрес или такой страницы на сайте больше не существует</p>
                <a href="{{ route('home') }}" class="color--accent">Вернутся на главную</a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-home/home-min.js') }}"></script>
@endpush


