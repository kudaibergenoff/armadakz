@extends('_layout')

@section('title','ARMADA - 3D Тур')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('tour'),
                            'title'=>'3D тур'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="container mb-5">
        <iframe src="https://my.matterport.com/show/?m=mLnPEbTZenU" frameborder="0" style="width: 100%; height: 550px"></iframe>
        <iframe src="https://my.matterport.com/show/?m=jd6GBP8Pm3e" frameborder="0" style="width: 100%; height: 550px"></iframe>
        <iframe src="https://my.matterport.com/show/?m=tU8DshWqgtX" frameborder="0" style="width: 100%; height: 550px"></iframe>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-home/home-min.js') }}"></script>
@endpush


