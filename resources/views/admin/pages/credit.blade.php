@extends('_layout')

@section('title','ARMADA - Редактировать страницу' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title"></h2>
                    </div>
                    <form action="@isset($data){{ route('admin.pages.update',$data->id) }}@else{{ route('admin.pages.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активна','off'=>'Не активна'])
                            </div>
{{--                            <div class="switch col-12 col-lg-3 mb-3">--}}
{{--                                @include('layouts.forms.switch',['name'=>'is_banner','label'=>'Слайдер'])--}}
{{--                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">@php $formother = isset($data) ? 'readonly' : null; @endphp
                                @include('layouts.forms.input',['name'=>'slug','label'=>'Урл','placeholder'=>'Урл','length'=>150,'required'=>true,'other'=>$formother])
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                @include('layouts.forms.input',['name'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                            </div>
{{--                            <div class="col-6 col-lg mb-3">--}}
{{--                                @include('layouts.forms.input',['name'=>'price','type'=>'number','label'=>'Цена','placeholder'=>'Цена','length'=>15,'required'=>true])--}}
{{--                            </div>--}}
{{--                            <div class="col-6 col-lg mb-3">--}}
{{--                                @include('layouts.forms.input',['name'=>'articul','label'=>'Артикул','placeholder'=>'Артикул','length'=>50,'required'=>true])--}}
{{--                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'body','class'=>'tinyMCE','label'=>'Содержимое','placeholder'=>'Содержимое','cols'=>30,'rows'=>15,'length'=>2000])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Описание<br><b>(краткое описание товара)</b></span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Поле должно содержать краткое описание товара для помощи в поисковой системе.<br><b>Например: комфортная массивная мебель дивана. Обивка дивана из элитных тканей, основание сделано из натуральеого дерева, имеются кожаные вставки</b>">
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
                                    <div class="custom-placeholder form-row mx-0">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'meta_description',
                                           'rows'=>7,
                                           'length'=>2000,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                        <p class="custom-placeholder__placeholder">Поле должно содержать краткое описание товара для помощи в поисковой системе.<br><b>Например: комфортная массивная мебель дивана. Обивка дивана из элитных тканей, основание сделано из натуральеого дерева, имеются кожаные вставки</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Ключевые слова<br><b>(слова для поиска в каталоге)</b></span>
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Необходимо перечислить, через запятую, ключевые слова, характиризующие товар.<br><b>Например: мягкая мебель, диван, двухместный диван, раскладной диван</b>">
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
                                    <div class="custom-placeholder form-row mx-0">
                                        @include('layouts.forms.textarea',[
                                                    'name'=>'meta_keywords',
                                                    'rows'=>7,
                                                    'length'=>2000,
                                                    'class'=>'custom-placeholder__input form-control h-100'
                                                ])
                                        <p class="custom-placeholder__placeholder">Необходимо перечислить, через запятую, ключевые слова, характиризующие товар.<br><b>Например: мягкая мебель, диван, двухместный диван, раскладной диван</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-5 button btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="modal crop-image" id="crop-image" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered"><!-- modal-lg -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Обрезать изображение</h5>
                </div>
                <div class="modal-body p-0">
                    <img src="" alt="" class="image-no-crop" id="image-no-crop">
                </div>
                <div class="modal-footer p-3">
                    <button type="button" class="button btn-primary crop-image__save" data-dismiss="modal">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
    <!-- Data tables -->
{{--    <link rel="stylesheet" href="{{ asset('libs/mdbootstrap/css/addons/datatables2.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('libs/mdbootstrap/css/addons/datatables-select2.min.css') }}">--}}
@endpush

@push('scripts')
    {{-- inputmask --}}
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

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
@endpush


