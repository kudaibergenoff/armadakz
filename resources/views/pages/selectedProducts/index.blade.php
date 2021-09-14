@extends('_layout')

@section('title','ARMADA - торговый комплекс')

@section('breadcrumb')
    {{--    @php--}}
    {{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
    {{--                            'title'=>$trans['home'] ];--}}
    {{--        $breadcrumbs[] = [  'route'=>route('user.index'),--}}
    {{--                            'title'=>$trans['Personal Area']  ];--}}
    {{--        $breadcrumbs[] = [  'route'=>route('user.profile.index'),--}}
    {{--                            'title'=>$trans['Profile parameters']  ];--}}
    {{--    @endphp--}}
    {{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
@endsection

@section('content')
    <section class="section slideshow section--slideshow recent page-home__recent">
        <div class="container">
            <div class="section__header">
                <h2 class="section__title section__title--dark">Избранные товары</h2>
                <div class="section__arrows">
                    <div class="section__arrow section__arrow--prev slideshow__arrow--prev">
                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18.5" cy="18.5" r="18.5" fill="#F5F5F5"/>
                            <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                        </svg>
                    </div>
                    <div class="section__arrow section__arrow--next slideshow__arrow--next">
                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18.5" cy="18.5" r="18.5" fill="#F5F5F5"/>
                            <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="section__content">
                <ul class="slideshow__items recommended__items">
                    @foreach($products as $product)
                        @include('pages.home.__card',['item'=>$product,'wp'=>true])
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-home/home.min.css') }}">
@endpush

@push('scripts')
{{--    <script>--}}
{{--        function like(product_id) {--}}
{{--            $.ajax({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                url:'/product-like',--}}
{{--                type:'post',--}}
{{--                data:{"product_id":product_id},--}}
{{--                // dataType:"json",--}}
{{--                success:function(data)--}}
{{--                {--}}
{{--                    var id = '#like' + task_id;--}}
{{--                    var heart = '<i class="fas fa-star"></i>';--}}
{{--                    $(id).html(heart);--}}
{{--                },--}}
{{--                error:function(data)--}}
{{--                {--}}
{{--                    alert('ошибка');--}}
{{--                },--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
@endpush


