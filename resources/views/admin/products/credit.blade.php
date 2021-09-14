@extends('_layout')

@section('title','ARMADA - изменить(создать) товар' )

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
                    <form action="@isset($data){{ route('admin.products.update',$data->id) }}@else{{ route('admin.products.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        @include('admin.products._uploadImage')

                        <div class="row">
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активный','off'=>'Не активный'])
                            </div>
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'is_hot','label'=>'Горячий','on'=>'Да','off'=>'Нет'])
                            </div>

                            <div class="col-12 col-lg-2 mb-3">
                                @include('_include.admin_and_seller.credit_product_presence')
                            </div>
                            <div class="row col-12 col-lg-4">
                                <div class="switch col-12 col-lg-6 mb-3">
                                    @include('layouts.forms.switch',['name' => 'is_discount','label'=>'Скидки','on'=>'Да','off'=>'Нет', 'attributes' => ['id' => 'is_discount']])
                                </div>
                                <div class="row col-12 col-lg-6" id="discount_box" style="display: none">
                                    <div class="col-12 col-lg mb-3">
                                        @include('layouts.forms.input',['type' => 'number', 'name'=>'discount','id'=>'discount','label'=>'%','placeholder'=>'%','length'=>3, 'min' => 0, 'max' => 100])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                @include('_include.admin_and_seller.credit_product_delivery')
                            </div>
                            <div class="col mb-3">
                                @include('_include.admin_and_seller.credit_product_pay')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'title','id'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                            </div>
                            <div class="col-12 col-lg mb-3">
                                <label for="slug">Slug (ЧПУ)</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="height: 38px;">
                                            <input class="form-check-input" type="checkbox" name="is_slug" id="is_slug" @if(isset($data) and $data->is_slug == true) checked @endif>
                                            <label class="form-check-label" for="is_slug"></label>
                                        </div>
                                    </div>
                                    @include('layouts.forms.input',['name'=>'slug','placeholder'=>'Slug','other'=>'disabled readonly'])
                                </div>
                            </div>
                            <div class="col-6 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'price','label'=>'Цена','placeholder'=>'Цена','pattern'=>'[0-9]{0,15}','max'=>999999999999999,'length'=>15,'required'=>true])
                            </div>
                            <div class="col-6 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'articul','label'=>'Артикул','placeholder'=>'Артикул','length'=>50])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('_include.admin_and_seller.credit_product_store')
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('_include.admin_and_seller.credit_product_item')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'description','class'=>'tinyMCE','label'=>'Описание','placeholder'=>'Описание','cols'=>30,'rows'=>15,'length'=>2000])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'manufacture','label'=>'Материал изготовления','placeholder'=>'Материал изготовления','length'=>150])
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('_include.admin_and_seller.credit_product_country')
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('_include.admin_and_seller.credit_product_colors')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'width','pattern'=>'[0-9]{0,5}','max'=>99999,'label'=>'Длина, см','placeholder'=>'Длина','length'=>5])
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'height','pattern'=>'[0-9]{0,5}','max'=>99999,'label'=>'Высота, см','placeholder'=>'Высота','length'=>5])
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'depth','pattern'=>'[0-9]{0,5}','max'=>99999,'label'=>'Глубина, см','placeholder'=>'Глубина','length'=>5])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('_include.admin_and_seller.credit_product_seo_title')
                            </div>
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
                                    <div class="custom-placeholder form-row">
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
                                        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-tippy-content="Необходимо перечислить, через запятую, ключевые слова, характиризующие товар.<br><b>Например: мягкая мебель, диван, двухместный диван, раскладной диван</b>f">
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
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $.each($('.js-example-basic-multiple'), function () {
                if( $( this ).attr('name') === 'country_id') {
                    $( this ).select2({
                        placeholder: "Выберите из списка"
                    });
                } else {
                    $( this ).select2({
                        placeholder: "Выберите один или несколько"
                    });
                }
            })
        });
    </script>
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

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

    @php $countImage = (isset($data) and $data->images != null and count($data->images) > 0) ? 10+1-count($data->images) : 10 ; @endphp
    <script>
        // Image module
        {
            let addButton = $('.image-upload-add');
            let i = 1;
            let limit = @json($countImage);

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
                let is_discount = document.getElementById("is_discount");
                let discount_box = document.getElementById("discount_box");

                function is_check() {
                    if(is_discount.checked)
                    {
                        discount_box.style.display = "block";
                    }else {
                        discount_box.style.display = "none";
                    }
                }
                is_check();

                is_discount.addEventListener("change", function(e) {
                    is_check();
                });
            })();
            
    </script>
@endpush


