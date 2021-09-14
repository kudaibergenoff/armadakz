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
                <p class="page-title">Личные данные</p>
                @include('users._____personal_data._personal')
                @include('users._____personal_data._contact')
                @include('users._____personal_data._address')
{{--                @include('users._____personal_data._login')--}}
                @include('users._____personal_data._additional')
                @include('users._____personal_data._social_and_delete')
                <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button btn-outline-dark d-block d-sm-inline mt-5 mx-auto mx-sm-0">Выйти из профиля</button>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-user-area/user-area-min.js') }}"></script>
    {{-- inputmask --}}
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/mask-form.js') }}"></script>

    <script>
        // Datepicker

        {
            $('[data-toggle="datepicker"]').datepicker({
                language: 'ru_RU'
            });
        }
    </script>
@endpush


