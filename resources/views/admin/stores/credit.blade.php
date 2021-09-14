@extends('_layout')

@section('title','ARMADA - изменить магазин' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0 row">
                    <div class="col orders__header justify-content-between">
                        <h2 class="page-title orders__title">@isset($data) Изменить @else Добавить @endisset магазин</h2>
                    </div>
                    <form action="@isset($data){{ route('admin.stores.update',$data->id) }}@else{{ route('admin.stores.store') }}@endisset" class="was-validated change-shop container-fluid pb-4 border-bottom" method="POST" enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-2">
                                @include('sellers.stores._uploadImage', ['name'=>'logo','limit'=>1,'label'=>'Логотип'])
                            </div>
                            <div class="col-12 col-md-3 col-lg-2">
                                @include('sellers.stores._uploadImage', ['name'=>'mini_img','limit'=>1,'label'=>'Миниатюра','tooltip'=>'Фотография Вашего магазина с наружной стороны, подгружаете одинаковые фотографии в миниатюру и в фон, НО в разных размерах. Рекомендуемые размеры для миниатюры 300х245'])
                            </div>
                            <div class="col-12 col-md-3 col-lg-2">
                                @include('sellers.stores._uploadImage', ['name'=>'background','limit'=>1,'label'=>'Фон','tooltip'=>'Фотография Вашего магазина с наружной стороны, подгружаете одинаковые фотографии в миниатюру и в фон, НО в разных размерах. Рекомендуемые размеры для фона 1680*450'])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 mb-4">
                                @include('layouts.forms.input',['name'=>'title','id'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-4">
                                @include('layouts.forms.input',['name'=>'original_title','label'=>'Юридическое наименование','placeholder'=>'Юридическое наименование','length'=>150,'required'=>true])
                            </div>
{{--                             SEO заголовок (Реализовать)--}}
                            <div class="col-12 col-sm-6 col-md-3 mb-4">
                                @include('layouts.forms.input',['name'=>'seo_title','label'=>'SEO заголовок','placeholder'=>'SEO заголовок','maxlength'=>150])
                            </div>
{{--                             /SEO заголовок (Реализовать)--}}
                            <div class="col-12 col-sm-6 col-md-3 mb-4">
                                <label for="slug">Slug</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="height: 38px;">
                                            <input class="form-check-input" type="checkbox" name="is_slug" id="is_slug" @if(isset($data) and $data->is_slug == true) checked @endif>
                                            <label class="form-check-label" for="is_slug"></label>
                                        </div>
                                    </div>
                                    @include('layouts.forms.input',['name'=>'slug','id'=>'slug','placeholder'=>'Slug', 'other'=>'readonly disabled'])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="description col-12 col-lg-6 mb-3">
                                @include('layouts.forms.textarea',['name'=>'description','class'=>'tinyMCE','label'=>'Описание','placeholder'=>'Описание','cols'=>30,'rows'=>12,'length'=>2000,'required'=>true])
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Мини описание (через запятую)</span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="<span>Напишите через запятую категорию продаваемых товаров/услуг.</span><br><span>Если Вы продаете мягкую и корпусную мебель, то вписываете следующим образом:</span><br><b>Например: мягкая, корпусная мебель</b>">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 22C8.0618 22 5.29947 20.8558 3.2218 18.7782C1.14421 16.7005 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29947 1.14421 8.0618 0 11 0C13.9382 0 16.7005 1.14421 18.7782 3.2218C20.8558 5.29947 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7005 20.8558 13.9382 22 11 22Z" fill="#E0001A" fill-opacity="0.72"/>
                                                <path d="M18.7782 3.2218C16.7005 1.14421 13.9382 0 11 0V22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.0618 20.8558 5.29947 18.7782 3.2218Z" fill="#E0001A"/>
                                                <path d="M12.9336 15.9414V9.49609H8.20703V10.7852H9.06641V15.9414H8.16406V17.2305H13.75V15.9414H12.9336Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984C9.93382 4.33984 9.06641 5.20725 9.06641 6.27344C9.06641 7.33962 9.93382 8.20703 11 8.20703Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984V8.20703Z" fill="#E0001A" fill-opacity="0.07"/>
                                                <path d="M12.9336 15.9414V9.49609H11V17.2305H13.75V15.9414H12.9336Z" fill="#E0001A" fill-opacity="0.07"/>
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'mini_desc',
                                           'rows'=>5,
                                           'length'=>100,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                        <p class="custom-placeholder__placeholder">
                                            <span>Напишите через запятую категорию продаваемых товаров/услуг.</span><br>
                                            <span>Если Вы продаете мягкую и корпусную мебель, то вписываете следующим образом:</span><br>
                                            <b>Например: мягкая, корпусная мебель</b>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'email','type'=>'email','label'=>'Эл. адрес','placeholder'=>'Эл. адрес','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'web_url','label'=>'Адрес сайта','placeholder'=>'Адрес сайта','length'=>150])
                                    </div>
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'instagram','label'=>'Instagram','placeholder'=>'Instagram','length'=>150])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'facebook','label'=>'Facebook','placeholder'=>'Facebook','length'=>150])
                                    </div>
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'youtube','label'=>'Youtube','placeholder'=>'Youtube','length'=>150])
                                    </div>
                                    <div class="col mb-3">
                                        @include('layouts.forms.input',['name'=>'vkontakte','label'=>'Vkontakte','placeholder'=>'Vkontakte','length'=>150])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @include('sellers.stores._phones')
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                @include('layouts.forms.input',['name'=>'whatsapp','pattern'=>'[0-9]{0,11}','max'=>99999999999,'length'=>11,'label'=>'Whatsapp','placeholder'=>'Введите номер WhatsApp для рассылки','small'=>'Пример: 77076665544 (без восьмерки и пробелов)'])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg">
                                <div class="switch">
                                @include('layouts.forms.switch',['name' => 'is_Armada','label'=>'Арендуйете в Армаде','on'=>'Да','off'=>'Нет', 'attributes' => ['id' => 'is_Armada']])
                                </div>
                            </div>
                        </div>

                        {{-- Адреса магазина (Реализовать) --}}
                        <div class="bg-light rounded px-4 py-3 my-3" id="in_Armada_address" style="display: none">
                            <div class="shops__address my-4 duplicate">
                                @if(isset($data) and is_array($data->block) and is_array($data->intersection) and is_array($data->butik))
                                    @for($i = 0; $i < max(count($data->block),count($data->intersection),count($data->butik)); $i++)
                                        <div class="duplicate__item d-flex align-items-center" data-duplicate-item-id="1">
                                            <ul class="row pl-0 list-style-none w-100">
                                                <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'block','value'=>$data->block[$i],'array'=>true,'label'=>'Номер блока','placeholder'=>'Номер блока','maxlength'=>50])</li>
                                                <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'intersection','value'=>$data->intersection[$i],'array'=>true,'label'=>'Код перекрестка','placeholder'=>'Код перекрестка','maxlength'=>50])</li>
                                                <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'butik','value'=>$data->butik[$i],'array'=>true,'label'=>'Номер бутика','placeholder'=>'Номер бутика','maxlength'=>50])</li>
                                            </ul>
                                            <div class="duplicate__delete d-flex align-items-center">
                                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="30" height="30" rx="3" fill="#E0001A"/>
                                                    <path d="M21.9641 6.85707H18.4284V6.21422C18.4284 5.15081 17.5632 4.28564 16.4998 4.28564H13.9284C12.865 4.28564 11.9998 5.15081 11.9998 6.21422V6.85707H8.46408C7.5779 6.85707 6.85693 7.57804 6.85693 8.46422V10.7142C6.85693 11.0692 7.14477 11.3571 7.49979 11.3571H7.85111L8.4065 23.0202C8.45556 24.0502 9.30172 24.8571 10.3329 24.8571H20.0953C21.1265 24.8571 21.9726 24.0502 22.0217 23.0202L22.577 11.3571H22.9284C23.2834 11.3571 23.5712 11.0692 23.5712 10.7142V8.46422C23.5712 7.57804 22.8503 6.85707 21.9641 6.85707ZM13.2855 6.21422C13.2855 5.85976 13.5739 5.57136 13.9284 5.57136H16.4998C16.8542 5.57136 17.1426 5.85976 17.1426 6.21422V6.85707H13.2855V6.21422ZM8.14265 8.46422C8.14265 8.28699 8.28685 8.14279 8.46408 8.14279H21.9641C22.1413 8.14279 22.2855 8.28699 22.2855 8.46422V10.0714C22.0874 10.0714 8.96362 10.0714 8.14265 10.0714V8.46422ZM20.7374 22.9591C20.721 23.3024 20.439 23.5714 20.0953 23.5714H10.3329C9.98913 23.5714 9.70708 23.3024 9.69077 22.9591L9.13827 11.3571H21.2899L20.7374 22.9591Z" fill="white"/>
                                                    <path d="M15.2141 22.2859C15.5692 22.2859 15.857 21.9981 15.857 21.6431V13.2859C15.857 12.9309 15.5692 12.6431 15.2141 12.6431C14.8591 12.6431 14.5713 12.9309 14.5713 13.2859V21.6431C14.5713 21.9981 14.8591 22.2859 15.2141 22.2859Z" fill="white"/>
                                                    <path d="M18.4285 22.2859C18.7835 22.2859 19.0714 21.9981 19.0714 21.6431V13.2859C19.0714 12.9309 18.7835 12.6431 18.4285 12.6431C18.0735 12.6431 17.7856 12.9309 17.7856 13.2859V21.6431C17.7856 21.9981 18.0734 22.2859 18.4285 22.2859Z" fill="white"/>
                                                    <path d="M11.9998 22.2859C12.3548 22.2859 12.6426 21.9981 12.6426 21.6431V13.2859C12.6426 12.9309 12.3548 12.6431 11.9998 12.6431C11.6448 12.6431 11.3569 12.9309 11.3569 13.2859V21.6431C11.3569 21.9981 11.6447 22.2859 11.9998 22.2859Z" fill="white"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @endfor
                                @else
                                    <div class="duplicate__item d-flex align-items-center" data-duplicate-item-id="1">
                                        <ul class="row pl-0 list-style-none w-100">
                                            <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'block','array'=>true,'label'=>'Номер блока','placeholder'=>'Номер блока','maxlength'=>50])</li>
                                            <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'intersection','array'=>true,'label'=>'Код перекрестка','placeholder'=>'Код перекрестка','maxlength'=>50])</li>
                                            <li class="col-12 col-lg mb-3">@include('layouts.forms.input',['name'=>'butik','array'=>true,'label'=>'Номер бутика','placeholder'=>'Номер бутика','maxlength'=>50])</li>
                                        </ul>

                                        <div class="duplicate__delete d-flex align-items-center">
                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="30" height="30" rx="3" fill="#E0001A"/>
                                                <path d="M21.9641 6.85707H18.4284V6.21422C18.4284 5.15081 17.5632 4.28564 16.4998 4.28564H13.9284C12.865 4.28564 11.9998 5.15081 11.9998 6.21422V6.85707H8.46408C7.5779 6.85707 6.85693 7.57804 6.85693 8.46422V10.7142C6.85693 11.0692 7.14477 11.3571 7.49979 11.3571H7.85111L8.4065 23.0202C8.45556 24.0502 9.30172 24.8571 10.3329 24.8571H20.0953C21.1265 24.8571 21.9726 24.0502 22.0217 23.0202L22.577 11.3571H22.9284C23.2834 11.3571 23.5712 11.0692 23.5712 10.7142V8.46422C23.5712 7.57804 22.8503 6.85707 21.9641 6.85707ZM13.2855 6.21422C13.2855 5.85976 13.5739 5.57136 13.9284 5.57136H16.4998C16.8542 5.57136 17.1426 5.85976 17.1426 6.21422V6.85707H13.2855V6.21422ZM8.14265 8.46422C8.14265 8.28699 8.28685 8.14279 8.46408 8.14279H21.9641C22.1413 8.14279 22.2855 8.28699 22.2855 8.46422V10.0714C22.0874 10.0714 8.96362 10.0714 8.14265 10.0714V8.46422ZM20.7374 22.9591C20.721 23.3024 20.439 23.5714 20.0953 23.5714H10.3329C9.98913 23.5714 9.70708 23.3024 9.69077 22.9591L9.13827 11.3571H21.2899L20.7374 22.9591Z" fill="white"/>
                                                <path d="M15.2141 22.2859C15.5692 22.2859 15.857 21.9981 15.857 21.6431V13.2859C15.857 12.9309 15.5692 12.6431 15.2141 12.6431C14.8591 12.6431 14.5713 12.9309 14.5713 13.2859V21.6431C14.5713 21.9981 14.8591 22.2859 15.2141 22.2859Z" fill="white"/>
                                                <path d="M18.4285 22.2859C18.7835 22.2859 19.0714 21.9981 19.0714 21.6431V13.2859C19.0714 12.9309 18.7835 12.6431 18.4285 12.6431C18.0735 12.6431 17.7856 12.9309 17.7856 13.2859V21.6431C17.7856 21.9981 18.0734 22.2859 18.4285 22.2859Z" fill="white"/>
                                                <path d="M11.9998 22.2859C12.3548 22.2859 12.6426 21.9981 12.6426 21.6431V13.2859C12.6426 12.9309 12.3548 12.6431 11.9998 12.6431C11.6448 12.6431 11.3569 12.9309 11.3569 13.2859V21.6431C11.3569 21.9981 11.6447 22.2859 11.9998 22.2859Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                @endif

                                <span class="duplicate__add d-block input-duplicate">
                                    <span class="d-inline-flex align-items-center button btn-success btn-sm">
                                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 0C3.36425 0 0 3.36425 0 7.5C0 11.6358 3.36425 15 7.5 15C11.6358 15 15 11.6352 15 7.5C15 3.36483 11.6358 0 7.5 0ZM7.5 13.8381C4.00562 13.8381 1.16188 10.995 1.16188 7.5C1.16188 4.00503 4.00562 1.16188 7.5 1.16188C10.9944 1.16188 13.8381 4.00503 13.8381 7.5C13.8381 10.995 10.995 13.8381 7.5 13.8381Z" fill="white"/>
                                            <path d="M10.4046 6.86713H8.0808V4.54336C8.0808 4.22268 7.82111 3.9624 7.49984 3.9624C7.17857 3.9624 6.91889 4.22268 6.91889 4.54336V6.86713H4.59512C4.27385 6.86713 4.01416 7.1274 4.01416 7.44809C4.01416 7.76877 4.27385 8.02904 4.59512 8.02904H6.91889V10.3528C6.91889 10.6735 7.17857 10.9338 7.49984 10.9338C7.82111 10.9338 8.0808 10.6735 8.0808 10.3528V8.02904H10.4046C10.7258 8.02904 10.9855 7.76877 10.9855 7.44809C10.9855 7.1274 10.7258 6.86713 10.4046 6.86713Z" fill="white"/>
                                        </svg>
                                        <span>Добавить</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        {{-- /Адреса магазина (Реализовать) --}}

                        <div class="row" id="out_Armada_address" style="display: none">
{{--                            <div class="col-12 col-md-6 col-lg-4 mb-3">--}}
{{--                                <label for="address">Адрес</label>--}}
{{--                                <input type="text" id="address" class="form-control" value="Блок: {!! $data->block[0] ?? null !!}, перекресток: {!! $data->intersection[0] ?? null !!}, бутик: {!! $data->butik[0] ?? null !!}" readonly disabled>--}}
{{--                            </div>--}}
                            <div class="col-12 col-md-12 mb-3">
                                @include('layouts.forms.input',['name'=>'location','type'=>'text','label'=>'Адрес магазина','placeholder'=>'Адрес магазина','length'=>150])
                            </div>
                        </div>

                        <div class="row align-items-start">
                            <div class="col-12 col-lg-4 mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Мета описание</span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Поле должно содержать краткое описание Вашей компании (магазина) для помощи в поисковой системе.<br><b>Например: ТК «ARMADA» - Самый большой выбор мебели и товаров для дома в стране!</b>">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 22C8.0618 22 5.29947 20.8558 3.2218 18.7782C1.14421 16.7005 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29947 1.14421 8.0618 0 11 0C13.9382 0 16.7005 1.14421 18.7782 3.2218C20.8558 5.29947 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7005 20.8558 13.9382 22 11 22Z" fill="#E0001A" fill-opacity="0.72"/>
                                                <path d="M18.7782 3.2218C16.7005 1.14421 13.9382 0 11 0V22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.0618 20.8558 5.29947 18.7782 3.2218Z" fill="#E0001A"/>
                                                <path d="M12.9336 15.9414V9.49609H8.20703V10.7852H9.06641V15.9414H8.16406V17.2305H13.75V15.9414H12.9336Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984C9.93382 4.33984 9.06641 5.20725 9.06641 6.27344C9.06641 7.33962 9.93382 8.20703 11 8.20703Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984V8.20703Z" fill="#E0001A" fill-opacity="0.07"/>
                                                <path d="M12.9336 15.9414V9.49609H11V17.2305H13.75V15.9414H12.9336Z" fill="#E0001A" fill-opacity="0.07"/>
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'meta_description',
                                           'rows'=>7,
                                           'length'=>150,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                        <p class="custom-placeholder__placeholder">Поле должно содержать краткое описание Вашей компании (магазина) для помощи в поисковой системе.<br><b>Например: ТК «ARMADA» - Самый большой выбор мебели и товаров для дома в стране!</b></p>
                                    </div>
                                </div>
                            </div>
                            {{-- Синонимы (Реализовать) --}}
                            <div class="col-12 col-lg-4 mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Синонимы для поиска</span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="<b>Синонимы для поиска</b> - всевозможные варианты написания слов в поисковике<br>(салон, категория товаров и ТОО/ИП)<br><b>Например: ТЦ Армада, тц армада, ТЦ Armada, Мебель, мебиль, мебел.</b>">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 22C8.0618 22 5.29947 20.8558 3.2218 18.7782C1.14421 16.7005 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29947 1.14421 8.0618 0 11 0C13.9382 0 16.7005 1.14421 18.7782 3.2218C20.8558 5.29947 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7005 20.8558 13.9382 22 11 22Z" fill="#E0001A" fill-opacity="0.72"/>
                                                <path d="M18.7782 3.2218C16.7005 1.14421 13.9382 0 11 0V22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.0618 20.8558 5.29947 18.7782 3.2218Z" fill="#E0001A"/>
                                                <path d="M12.9336 15.9414V9.49609H8.20703V10.7852H9.06641V15.9414H8.16406V17.2305H13.75V15.9414H12.9336Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984C9.93382 4.33984 9.06641 5.20725 9.06641 6.27344C9.06641 7.33962 9.93382 8.20703 11 8.20703Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984V8.20703Z" fill="#E0001A" fill-opacity="0.07"/>
                                                <path d="M12.9336 15.9414V9.49609H11V17.2305H13.75V15.9414H12.9336Z" fill="#E0001A" fill-opacity="0.07"/>
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'search_tags',
                                           'rows'=>7,
                                           'length'=>150,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                        <p class="custom-placeholder__placeholder"><b>Синонимы для поиска</b> - всевозможные варианты написания слов в поисковике<br>(салон, категория товаров и ТОО/ИП)<br><b>Например: ТЦ Армада, тц армада, ТЦ Armada, Мебель, мебиль, мебел.</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Синонимы для поиска на карте</span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="<b>Синонимы для поиска на карте</b> - всевозможные варианты написания слов для поиска местоположения на схеме комплекса.<br><b>(Наименование ТОО/ИП и салона в разных вариантах)</b>">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 22C8.0618 22 5.29947 20.8558 3.2218 18.7782C1.14421 16.7005 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29947 1.14421 8.0618 0 11 0C13.9382 0 16.7005 1.14421 18.7782 3.2218C20.8558 5.29947 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7005 20.8558 13.9382 22 11 22Z" fill="#E0001A" fill-opacity="0.72"/>
                                                <path d="M18.7782 3.2218C16.7005 1.14421 13.9382 0 11 0V22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.0618 20.8558 5.29947 18.7782 3.2218Z" fill="#E0001A"/>
                                                <path d="M12.9336 15.9414V9.49609H8.20703V10.7852H9.06641V15.9414H8.16406V17.2305H13.75V15.9414H12.9336Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984C9.93382 4.33984 9.06641 5.20725 9.06641 6.27344C9.06641 7.33962 9.93382 8.20703 11 8.20703Z" fill="#E4F7FF"/>
                                                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984V8.20703Z" fill="#E0001A" fill-opacity="0.07"/>
                                                <path d="M12.9336 15.9414V9.49609H11V17.2305H13.75V15.9414H12.9336Z" fill="#E0001A" fill-opacity="0.07"/>
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'search_map_tags',
                                           'rows'=>7,
                                           'length'=>150,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                        <p class="custom-placeholder__placeholder"><b>Синонимы для поиска на карте</b> - всевозможные варианты написания слов для поиска местоположения на схеме комплекса.<br><b>(Наименование ТОО/ИП и салона в разных вариантах)</b></p>
                                    </div>
                                </div>
                            </div>
                            {{-- /Синонимы (Реализовать) --}}
                        </div>

                        {{-- Тарифные планы (Реализовать) --}}
                            <div class="row align-items-start">
                                <div class="col-12 col-md-5">

                                    <label class="mdb-main-label mt-4">Тарифный план</label>
                                    <select name="tarif_id" class="form-control">
                                        @foreach($tarifs as $tarif)
                                            <option value="{{ $tarif->id }}" @if(isset($data) and $data->tarif_id == $tarif->id) selected @endif>{{ $tarif->title }}</option>
                                        @endforeach
                                    </select>

                                    <label class="mdb-main-label mt-3">Дата окончания размещения</label>
                                    <div class="md-form md-outline date m-0">
                                        <input type="text" name="tarif_end_date" id="tarif_end_date" class="form-control" value="{{ (isset($data) and $data->tarif_end_date != null) ? $data->tarif_end_date->format('d.m.Y') : null }}">
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-6 mb-3">
                                            <div class="switch">
                                                @include('layouts.forms.switch',['name'=>'status','label'=>'Активный','on'=>'Активный','off'=>'В архив'])
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="switch">
                                                @include('layouts.forms.switch',['name'=>'hot','label'=>'Уровень горячий'])
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="switch">
                                                @include('layouts.forms.switch',['name'=>'is_delivery','label'=>'Доставка'])
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="switch">
                                                @include('layouts.forms.switch',['name'=>'is_credit','label'=>'Кредитование'])
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="switch">
                                                @include('layouts.forms.switch',['name'=>'is_import_csv','label'=>'Доступ импорта товаров (csv)'])
                                            </div>
                                        </div>
                                    </div>

                                    <label class="mdb-main-label">Дата окончания тарифа "Горячий"</label>
                                    <div class="md-form md-outline date m-0">
                                        <input type="text" name="hot_end_date" id="hot_end_date" class="form-control" value="{{ (isset($data) and $data->hot_end_date != null) ? $data->hot_end_date->format('d.m.Y') : null }}">
                                    </div>

                                    <label class="mdb-main-label">Метки на карте</label>
                                    <div class="md-form md-outline m-0">
                                        <input type="text" name="mappoints" id="mappoints" class="form-control" value="{{ isset($data) ? $data->mappoints : '' }}">
                                    </div>

                                    <label class="mdb-main-label">Ссылка НСВ</label>
                                    <div class="md-form md-outline m-0">
                                        <input type="text" name="hcb_link" id="hcb_link" class="form-control" value="{{ isset($data) ? $data->hcb_link : '' }}">
                                    </div>

                                </div>
                                <div class="col-12 col-md-7 row align-items-start">
                                    @include('sellers.stores._workTime')
                                </div>
                            </div>
                        {{-- /Тарифные планы (Реализовать) --}}

                        <button type="submit" class="mt-5 button btn-primary">Сохранить</button>
                    </form>
                    @include('admin.stores._products_table')
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
    <!-- inputmask -->
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/mask-form.js') }}"></script>

    {{--  Slug generation  --}}
    <script>
        $('#title').change(function(e) {
            $.get('{{ route('admin.checkSlug') }}',
                { 'title': $(this).val() },
                function( data ) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>

    {{--  Slug checkbox  --}}
    <script>
        let slugInput = $('input[name="slug"]');
        let slugCheckbox = $('input[name="is_slug"]');

        slugCheckbox.on('input', function () {
           if( $( this ).is(':checked') ) {
               slugInput.removeAttr('disabled readonly')
           } else {
               slugInput.attr('disabled', 'disabled');
               slugInput.attr('readonly', 'readonly')
           }
        });
    </script>

    <!-- validation -->
    <script src="{{ asset('plugins/validation-form/validation-forms.js') }}"></script>

    <script>

        // Validation
        let form = $('form.was-validated');

        form.on('submit', function (e) {
            let editorContent = tinymce.get('description').getContent();
            if (editorContent.length < 20)
            {
                e.preventDefault();

                $('.description .invalid-feedback').css({'display':'block'})
                $('.tox-tinymce').css({
                    'border-color' : '#dc3545'
                });
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".description").offset().top - 100
                }, 1000);
            }
        })
    </script>

    <!-- Upload images -->
    <script>
        // Image module
        {
            let addButton = $('.image-upload-add');
            let i = 1;
            let limit = 1;

            // Clear input before upload
            function clearInput(input) {
                input.on('click', function(){
                    $( this ).val('');
                });
            }

            // Create new image block
            {
                let imageBlockPattern = $('.image-upload-wrap.d-none');

                addButton.on('click', function () {
                    if(i < limit) {
                        let imageBlockClone = imageBlockPattern.clone();
                        imageBlockClone.removeClass('d-none');

                        $( this ).parents('.row').find('.image-upload-add').before(imageBlockClone);
                    }

                    if(i == limit - 1) {
                        addButton.addClass('disabled');
                    }

                    i++;

                    $('.images-wrap').sortable();

                    clearInput($('.image-upload__upload'));
                });
            }

            // Delete image block
            {
                $(document).on("click", "li.image-upload__action--delete" , function() {
                    let imagesCount = $( this ).parents('.row').find('.image-upload-wrap').length-1;
                    let image = $( this ).parents('.image-upload').find('.image-upload__preview');
                    let defaultImage = image.attr('data-default-image');

                    if(imagesCount <= 1) {
                        image.attr('style', 'background-image: url(' + defaultImage + ')');
                    } else {
                        $( this ).parents('.image-upload-wrap').remove();
                        i--;
                        if(i < limit) {
                            addButton.removeClass('disabled');
                        }
                    }
                });
            }

            // Clear image block
            {
                $(document).on("click", "li.image-upload__action--clear" , function() {
                    let image = $( this ).parents('.image-upload').find('.image-upload__preview');
                    let defaultImage = image.attr('data-default-image');

                    image.attr('style', 'background-image: url(' + defaultImage + ')');
                    $( this ).parents(".image-upload").find('input[type="hidden"]').attr("value", '');
                });
            }

            clearInput($('.image-upload__upload'));

            // Upload and crop image
            $(document).on("change",".image-upload__upload", function() {
                let aspectRatioX = parseInt($( this ).attr('data-aspect-ratio-x'));
                let aspectRatioY = parseInt($( this ).attr('data-aspect-ratio-y'));
                let uploadFile = $(this);
                let files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){
                        $('.crop-image__save').unbind('click');
                        $('.crop-image__close').unbind('click');
                        $('#crop-image').unbind('click');

                        $('#image-no-crop').attr("src", ""+this.result+"");

                        let image = document.getElementById('image-no-crop');

                        let cropper = new Cropper(image, {
                            aspectRatio: aspectRatioX/aspectRatioY,
                            zoomable: false,
                            scrolable: false,
                            autoCropArea: 0,
                        });

                        $('#crop-image').modal({
                            backdrop: 'static',
                            keyboard: false
                        });

                        $('.crop-image__save').on('click', () => {

                            let imgurl = cropper.getCroppedCanvas().toDataURL();

                            uploadFile.parents(".image-upload").find('.image-upload__preview').css("background-image", "url("+imgurl+")");
                            uploadFile.parents(".image-upload").find('input[type="hidden"]').attr("value", imgurl);

                            cropper.destroy();
                            $('.cropper-container').detach();
                        });

                        $('#crop-image').on('hidden.bs.modal', () => {
                            cropper.destroy();
                            $('.cropper-container').detach();
                        });

                        $('.crop-image__close').on('click', function () {
                            cropper.destroy();
                            $('.cropper-container').detach();
                        });
                    }
                }
            });
        }
    </script>

    <script>
        (function() {
            let is_Armada = document.getElementById("is_Armada");
            let in_Armada_address = document.getElementById("in_Armada_address");
            let out_Armada_address = document.getElementById("out_Armada_address");

            function is_check() {
                if(is_Armada.checked)
                {
                    in_Armada_address.style.display = "block";
                    out_Armada_address.style.display = "none";
                }else {
                    in_Armada_address.style.display = "none";
                    out_Armada_address.style.display = "block";
                }
            }
            is_check();

            is_Armada.addEventListener("change", function(e) {
                is_check();
            });
        })();
    </script>
@endpush


