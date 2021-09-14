@extends('_layout')

@section('title','ARMADA - Добавить/редактировать Публикацию' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('sellers._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('sellers._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title"></h2>
                    </div>
                    <form action="@isset($data){{ route('seller.news.update',['id'=>$data->id]) }}@else{{ route('seller.news.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активна','off'=>'Не активна'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3 mb-3 imgUp">
                                @include('sellers.news._uploadImage')
                            </div>

                            <div class="col-12 col-lg-9 mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        <label class="mdb-main-label">Магазин</label>
                                        <select name="store_id" class="form-control" required>
                                            @if(isset($stores) and $stores->count() > 0)
                                                @foreach($stores as $store)
                                                    <option value="{{ $store->id }}" @if(isset($data) and $data->store_id == $store->id) selected @endif>{{ $store->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        @include('_include.admin_and_seller.credit_new_types')
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        @include('layouts.forms.input',['name'=>'title','label'=>'Название','id'=>'title','placeholder'=>'Название','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        @include('_include.admin_and_seller.credit_new_slug')
                                    </div>
                                    <div class="col-12 mb-3">
                                        @include('layouts.forms.input',['name'=>'description','label'=>'Короткое описание','placeholder'=>'Короткое описание','length'=>150,'required'=>true])
                                    </div>

{{--                                    <div class="col-12 col-lg-6 mb-3">--}}
{{--                                        <label class="mdb-main-label">Теги</label>--}}
{{--                                        <select class="form-control js-example-basic-multiple" name="items[]" multiple="multiple">--}}
{{--                                            @foreach($catalogs as $catalog)--}}
{{--                                                @foreach($subcatalogs->where('catalog_id',$catalog->id) as $subcatalog)--}}
{{--                                                    <optgroup label="{{ $catalog->title }} | {{ $subcatalog->title }}">--}}
{{--                                                        @foreach($items->where('subcatalog_id',$subcatalog->id) as $item)--}}
{{--                                                            <option value="{{ $item->id }}" @if(isset($data) and $data->items->pluck('id')->contains($item->id)) selected @endif>{{ $item->title }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </optgroup>--}}
{{--                                                @endforeach--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-6 col-lg-3">--}}
{{--                                        <label class="mdb-main-label">Статус публикации</label>--}}
{{--                                        <select name="status_id" class="form-control" required>--}}
{{--                                            @foreach($statuses as $status)--}}
{{--                                                <option value="{{ $status->id }}">{{ $status->title }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-lg-6 mb-3">--}}
{{--                                        @include('layouts.forms.input',['name'=>'url','label'=>'Ссылка на видео','placeholder'=>'Ссылка на видео','length'=>150])--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'text','class'=>'tinyMCE','label'=>'Содержание','placeholder'=>'Содержание','cols'=>30,'rows'=>15,'length'=>2000])
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-12 col-lg mb-3">
                                    <div>
                                        <label class="d-flex align-items-end justify-content-between">
                                            <span>Заголовок<br><b>(краткое название публикации)</b></span>
                                            <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Заголовок поможет в результатах поиска.<br><b>Например: мягкая мебель</b>">
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
                                               'name'=>'seo_title',
                                               'rows'=>7,
                                               'length'=>2000,
                                               'class'=>'custom-placeholder__input form-control h-100'
                                           ])
                                            <p class="custom-placeholder__placeholder">Заголовок поможет в результатах поиска.<br><b>Например: мягкая мебель</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg mb-3">
                                    <div>
                                        <label class="d-flex align-items-end justify-content-between">
                                            <span>Описание<br><b>(краткое описание публикации)</b></span>
                                            <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Поле должно содержать краткое описание публикации для помощи в поисковой системе.">
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
                                               'length'=>2000,
                                               'class'=>'custom-placeholder__input form-control h-100'
                                           ])
                                            <p class="custom-placeholder__placeholder">Поле должно содержать краткое описание публикации для помощи в поисковой системе.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg mb-3">
                                    <div>
                                        <label class="d-flex align-items-end justify-content-between">
                                            <span>Ключевые слова<br><b>(слова для поиска в каталоге)</b></span>
                                            <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Необходимо перечислить, через запятую, ключевые слова, характиризующие публикацию.<br><b>Например: мягкая мебель, диван, двухместный диван, раскладной диван</b>">
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
                                                        'name'=>'meta_tags',
                                                        'rows'=>7,
                                                        'length'=>2000,
                                                        'class'=>'custom-placeholder__input form-control h-100'
                                                    ])
                                            <p class="custom-placeholder__placeholder">Необходимо перечислить, через запятую, ключевые слова, характиризующие публикацию.<br><b>Например: мягкая мебель, диван, двухместный диван, раскладной диван</b></p>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Выберите один или несколько"
            });
        });
    </script>

    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

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
@endpush


