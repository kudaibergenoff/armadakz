@extends('_layout')

@section('title','Главная')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>$trans['home'] ];
        $breadcrumbs[] = [  'route'=>route('blogs'),
                            'title'=>$trans['Blog']  ];
    @endphp
    @include('layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <div class="container">
        @include('layout.pageTitle',['pageTitle'=>$trans['Blog']])

        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-end mb-3">
                @include('layout._sort',['route'=>'blogs'])
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-3">
                    @include('pages.blogs._card')
                </div>
            @endforeach
        </div>

        @include('layout.pagination',['pagination'=>$blogs])
    </div>
@endsection
