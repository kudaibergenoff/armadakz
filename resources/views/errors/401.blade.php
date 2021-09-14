@extends('_layout')

@section('title','ARMADA - Доступ не разрешен')

{{-- @section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Доступ не разрешен'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection --}}

@section('content')
    <section class="container" style="vertical-align: center;">
        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404" style="background-image: url({{ asset('img/404/emoji.png') }})"></div>
                <h1>401</h1>
                <h2>Ой! Доступ не разрешен</h2>
                <p>К сожалению, у вас нет доступа к этому странице</p>
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


