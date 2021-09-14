@extends('_layout')

@section('title','ARMADA - Каталог' )

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
                    <form action="@isset($data){{ route('admin.catalogs.update',$data->id) }}@else{{ route('admin.catalogs.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="col-12 col-lg-2 imgUp mb-3">
                                @include('admin.subcatalogs._uploadImage')
                            </div>
                            <div class="col-12 col-lg-10 row">
                                <div class="switch col-12 col-lg-4 mb-3 pr-lg-5">
                                    @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активный','off'=>'Не активный'])
                                </div>
                                <div class="switch col-12 col-lg-4 mb-3 pr-lg-5">
                                    @include('layouts.forms.switch',['name'=>'is_popular','label'=>'ТОП (фото обязательно)','on'=>'Да','off'=>'Нет'])
                                </div>
                                <div class="switch col-12 col-lg-4 mb-3 pr-lg-5">
                                    @include('layouts.forms.switch',['name'=>'is_menu','label'=>'В верхнем меню','on'=>'Да','off'=>'Нет'])
                                </div>

                                <div class="col-12 col-lg-4"></div>
                                <div class="col-12 col-lg-4 mb-3 pr-lg-5">
                                    @include('layouts.forms.input',['name'=>'index','type'=>'number','label'=>'Порядок сортировки','placeholder'=>'Порядок сортировки'])
                                </div>
                                <div class="col-12 col-lg-4 mb-3 pr-lg-5">
                                    @include('layouts.forms.input',['name'=>'menu_title','label'=>'Название в меню','placeholder'=>'введите данные','length'=>150,'required'=>true])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                @include('layouts.forms.input',['name'=>'title','id'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                @include('layouts.forms.input',['name'=>'slug','id'=>'slug','label'=>'Slug','placeholder'=>'Slug','length'=>150,'required'=>true])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                @include('layouts.forms.textarea',['name'=>'svg','label'=>'SVG код иконки','placeholder'=>'SVG код иконки','rows'=>5,'length'=>2000])
                            </div>
                            <div class="col-6 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        @include('layouts.forms.input',['name'=>'h1','label'=>'Заголовок H1','placeholder'=>'Заголовок H1','length'=>150,'required'=>true])
                                    </div>
                                    <div class="col-12 mb-3">
                                        @include('layouts.forms.input',['name'=>'meta_title','label'=>'SEO-название','placeholder'=>'SEO-название','length'=>150,'required'=>true])
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'meta_desc','label'=>'SEO-описание','placeholder'=>'Описание','rows'=>4,'length'=>2000])
                            </div>
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'meta_tag','label'=>'Ключевые слова','placeholder'=>'Ключевые слова','rows'=>4,'length'=>2000])
                            </div>
                        </div>
                        <div class="row">
                            <div class="switch col-12 col-lg-4 mb-3 pr-lg-5">
                                @include('layouts.forms.switch',['name'=>'onlyAdmins','label'=>'Только для админов','on'=>'Да','off'=>'Нет'])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <p class="mb-2">Подкаталоги</p>
                                @if(isset($subcatalogs) and $subcatalogs->count() > 0)
                                    <ul class="custom-ul">
                                        @foreach($subcatalogs as $subcatalog)
                                            <li>
                                                <a href="{{ route('admin.subcatalogs.index',['catalog_id'=>$subcatalog->id]) }}">{{ $subcatalog->title }} ({{ $subcatalog->items_count }})</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="mb-2">Данный каталог пока пуст</p>
                                @endif
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
            $('.js-example-basic-multiple').select2({
                placeholder: "Выберите один или несколько"
            });
        });
    </script>

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

    <!-- Upload images -->
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


