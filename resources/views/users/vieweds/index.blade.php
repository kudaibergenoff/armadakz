@extends('_layout')

@section('title',"ARMADA - личный кабинет пользователя" )

{{--@section('breadcrumb')--}}
{{--    @php--}}
{{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
{{--                            'title'=>'Главная' ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',$product->catalog->slug),--}}
{{--                            'title'=>$product->catalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',['catalog_slug'=>$product->catalog->slug,'subcatalog_slug'=>$product->subcatalog->slug]),--}}
{{--                            'title'=>$product->subcatalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('product',$product->slug),--}}
{{--                            'title'=>$product->title ?? 'Информация о продукте' ];--}}
{{--    @endphp--}}
{{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
{{--@endsection--}}

@section('content')
    <div class="container page-user-area__content">
        <div class="row">
            @include('users.include.left_menu')
            <div class="col-12 col-lg-9">
                <p class="page-title">Просмотренные товары</p>
                <ul class="slideshow__items viewed__items row pl-0 list-style-none">
                    @foreach($views as $view)
                        @include('pages.home.__card',['item'=>$view->product,'viewed'=>true])
                    @endforeach
                </ul>
                <div class="pagination page-user-area__pagination">
                    @include('layouts._paginate',['pagination'=>$views])
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-user-area/user-area-min.js') }}"></script>
@endpush


