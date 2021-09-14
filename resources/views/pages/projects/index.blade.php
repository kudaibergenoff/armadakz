@extends('_layout')

@section('title','ARMADA - Наши проекты')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('projects'),
                            'title'=>'Наши проекты'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="projects page-info__projects container container-xl-fluid">
        <ul class="projects__items">
            @foreach($projects as $project)
                <li class="projects__item project @if($loop->odd) project--ltr @else project--rtl @endif row">
                    <div class="project__image col-12 col-xl-6" style="background-image: url({{ $project->getImage('images') }})"></div>
                    <div class="project__content-wrap col-12 col-xl-6">
                        <div class="project__content text-center">
                            <h3 class="project__title">{{ $project->title }}</h3>
                            {!! $project->description !!}

                            @if($project->phone != null)
                                <p>Телефон редакции: <a href="tel:{{ $project->phone }}">{{ $project->phone }}</a></p>
                            @endif
                            @if($project->email != null)
                                <p class="mb-4">E-mail: <a href="mailto:{{ $project->email }}">{{ $project->email }}</a></p>
                            @endif
                            @if($project->url != null)
                                <div class="project__button">
                                    <a href="{{ $project->url }}" target="_blank" class="button btn-outline-dark">Смотреть выпуски программы</a>
                                </div>
                            @endif
                        </div>
                    </div>
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


