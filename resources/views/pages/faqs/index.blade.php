@extends('_layout')

@section('title','ARMADA - Вопрос/Ответ')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('faqs'),
                            'title'=>'Вопрос/Ответ' ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="section container mb-5">
        <div class="section__header d-block">
            <h5 class=" text-center d-block w-100">Вопросы и ответы</h5>
            <h3 class="section__subtitle text-center d-block w-100">О ТОРГОВОМ КОМПЛЕКСЕ «ARMADA»</h3>
        </div>
        <div class=" section__content">
            <p><b>«ARMADA»</b>- самый крупный Торговый Комплекс по продаже мебели и предметов интерьера, отделочных и строительных материалов в Казахстане.</p>
            <p>Общая площадь торгового комплекса -100 000 кв.м.</p>
            <p>На нашей территории представлен самый широкий ассортимент мягкой, корпусной, кухонной, садовой, кованой,  офисной мебели, ковров и постельного белья, бытовой и офисной техники, строительных и отделочных материалов. На территории комплекса, для удобства посетителей, расположены кофейни и зоны отдыха.</p>
            <p>Для удобства наших посетителей ТК «ARMADA» запустил маркетплейс, удобную платформу для поиска идей для дома и онлайн покупки мебели и прочих товаров.</p>
            <ul class="faq__items mt-4 mb-4">
                @foreach($faqs->where('type','general') as $faq)
                    <li class="faq__item rounded">
                        <b class="faq__question font-weight-semibold">
                            <span>{{ $faq->title }}</span>
                            <span class="faq__expand"></span>
                        </b>
                        <div class="faq__response mt-md-2 mb-0">
                            {!! $faq->description !!}
                        </div>
                    </li>
                @endforeach
            </ul>

            <h3 class="d-block w-100 mt-5 ">Маркетплейс «ARMADA»</h3>

            <ul class="faq__items mt-5 mb-5">
                @foreach($faqs->where('type','marketplace') as $faq)
                    <li class="faq__item rounded">
                        <b class="faq__question font-weight-semibold">
                            <span>{{ $faq->title }}</span>
                            <span class="faq__expand"></span>
                        </b>
                        <div class="faq__response mt-md-2 mb-0">
                            {!! $faq->description !!}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/dest/page-info/info-min.js') }}"></script>
@endpush


