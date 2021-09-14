@extends('_layout')

@section('title','Главная')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>$trans['home'] ];
        $breadcrumbs[] = [  'route'=>route('privacy'),
                            'title'=>$trans['privacy']  ];
    @endphp
    @include('layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <div class="container">
        @include('layout.pageTitle',['pageTitle'=>$trans['privacy']]) <!-- $trans[''] -->
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-3">
                <h5>Мы серьезно относимся к вопросу конфиденциальности информации своих пользователей на веб-сайте yurhub.com.</h5>
                <h5>В этой политике узнаешь, как мы в ЮрХаб работаем с конфиденциальной информацией и почему тебе не стоит беспокоиться о сохранности своих персональных данных.</h5>
            </div>
            <div class="col-md-12 mb-3">
                <div class="accordion" id="accordionExample">
                    @foreach($privacies as $privacy)
                        <div class="mb-3" id="heading{{ $privacy->id }}">
                            <a class="btn btn-light btn-block text-left @if(!$loop->first) collapsed @endif" data-toggle="collapse" data-target="#collapse{{ $privacy->id }}" aria-expanded="@if($loop->first) true @else false @endif" aria-controls="collapse{{ $privacy->id }}">
                                <span class="h4 mt-1">{{ $privacy->lang('title') }}</span>
                            </a>
                        </div>

                        <div id="collapse{{ $privacy->id }}" class="collapse @if($loop->first) show @endif pl-3" aria-labelledby="heading{{ $privacy->id }}" data-parent="#accordionExample">
                            {!! $privacy->lang('description') !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
