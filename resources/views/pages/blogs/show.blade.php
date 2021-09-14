@extends('_layout')

@section('title','Главная')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>$trans['home'] ];
        $breadcrumbs[] = [  'route'=>route('blogs'),
                            'title'=>$trans['Blog']  ];
        $breadcrumbs[] = [  'route'=>route('blog',['slug'=>$blog->slug]),
                            'title'=>$blog->lang('title')   ];
    @endphp
    @include('layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <div class="container">
    @include('layout.pageTitle',['pageTitle'=>$blog->lang('title')]) <!-- $trans[''] -->
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="d-flex justify-content-between">
                    <div class="div">
                        <span class="text-warning mr-3">
                            <i class="fas fa-star"></i> {{ $blog->stars() }}
                        </span>

                        <span class="mr-3"><i class="far fa-eye"></i> {{ $blog->views }}</span>

                    </div>
                    <div>
                        <span class="mr-3">{!! $trans['Share this'] !!}:</span>
                        <a href="#" class="mr-3"><span class="mr-3"><i class="fab fa-facebook-f"></i></span>facebook</a>
                        <a href="#" class=""><span class="mr-3"><i class="fab fa-telegram-plane"></i></span>telegram</a>
                    </div>
                </div>
                <img src="{{ $blog->getImage() }}" class="img-fluid" alt="card1">
            </div>
            <div class="col-12">
{{--                <span>{!! $trans['Description'] !!}</span>--}}
                {!! $blog->lang('description') !!}
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #F3F3F3">
        <div class="container">
            @include('layout.comments')
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2 class="my-3">{!! $trans['Similar documents'] !!}</h2>
                <p>Товарищи! постоянный количественный рост и сфера нашей активности требуют определения.</p>
            </div>

            @foreach($blogs as $blog)
                <div class="col-md-4 mb-3">
                    @include('pages.blogs._card')
                </div>
            @endforeach

            <div class="col-12 text-center mb-3">
                <a href="{{ route('blogs') }}" class="btn btn-outline-primary">{!! $trans['View all'] !!}</a>
            </div>
        </div>
    </div>
@endsection
