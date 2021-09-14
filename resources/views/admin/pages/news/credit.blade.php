@extends('_layout')

@section('title','ARMADA - Новости' )

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
                    <form action="@isset($data){{ route('admin.news.update',$data->id) }}@else{{ route('admin.news.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

{{--                        <div class="row">--}}
{{--                            <div class="switch col-12 col-lg-3 mb-3">--}}
{{--                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активна','off'=>'Не активна'])--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-12 col-lg-3 mb-3 imgUp">
                                @include('admin.pages.news._uploadImage')
                            </div>

                            <div class="col-12 col-lg-9 mb-3">
                                <div class="row">
                                    <div class="col-12 col-lg-3 mb-3">
                                        <label class="mdb-main-label">Вид новости</label>
                                        <select name="type_id" class="form-control" required>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" @if(isset($data) and $data->type_id == $type->id) selected @endif>{{ $type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        @include('_include.admin_and_seller.credit_new_types')
                                    </div>
                                    <div class="col-12 col-lg-3 mb-3">
                                        <label class="mdb-main-label">Статус</label>
                                        <select name="status_id" class="form-control" required>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}" @if(isset($data) and $data->status_id == $status->id) selected @endif>{{ $status->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6 mb-3">
                                        @include('layouts.forms.input',['name'=>'url','label'=>'Ссылка на видео','placeholder'=>'Ссылка на видео','length'=>150])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6 mb-3">
                                        @include('layouts.forms.input',['name'=>'title','id'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        @include('_include.admin_and_seller.credit_new_slug')
                                    </div>
                                    <div class="col-12 col-lg-12 mb-3">
                                        @include('layouts.forms.input',['name'=>'description','label'=>'Описание','placeholder'=>'Описание','length'=>150,'required'=>true])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'text','class'=>'tinyMCE','label'=>'Содержание','placeholder'=>'Содержание','cols'=>30,'rows'=>15,'length'=>2000])
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-lg mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Описание (meta)</span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'meta_description',
                                           'rows'=>7,
                                           'length'=>2000,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>Ключевые слова (meta)</span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                           'name'=>'meta_keywords',
                                           'rows'=>7,
                                           'length'=>2000,
                                           'class'=>'custom-placeholder__input form-control h-100'
                                       ])
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg mb-3">
                                <div>
                                    <label class="d-flex align-items-end justify-content-between">
                                        <span>SEO название</span>
                                    </label>
                                    <div class="custom-placeholder form-row">
                                        @include('layouts.forms.textarea',[
                                                    'name'=>'seo_title',
                                                    'rows'=>7,
                                                    'length'=>2000,
                                                    'class'=>'custom-placeholder__input form-control h-100'
                                                ])
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

@endpush


