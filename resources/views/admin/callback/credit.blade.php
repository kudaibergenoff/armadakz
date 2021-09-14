@extends('_layout')

@section('title','ARMADA - обратная связь' )

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
                    <form action="@isset($data){{ route('admin.colors.update',$data->id) }}@else{{ route('admin.colors.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="col-4 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'rgb','type'=>'color','label'=>'Цвет RGB','placeholder'=>'Цвет RGB','length'=>150,'required'=>true])
                            </div>
                            <div class="col-4 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'slug','label'=>'Title','placeholder'=>'Title','length'=>15,'required'=>true])
                            </div>
                            <div class="col-4 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'title_ru','label'=>'Название','placeholder'=>'Название','length'=>50,'required'=>true])
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
    <!-- Crippie -->
    <link rel="stylesheet" href="{{ asset('libs/croppie/croppie.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select a state"
            });
        });
    </script>
{{--    <script>--}}
{{--        $('#catalogs').on('change',function () {--}}
{{--            var catalog_id = $(this).val();--}}
{{--            if(catalog_id){--}}
{{--                $.ajax({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    },--}}
{{--                    url:'/seller/select-subcatalogs',--}}
{{--                    type:'post',--}}
{{--                    data:{"catalog_id":catalog_id},--}}
{{--                    // dataType:"json",--}}
{{--                    success:function(data)--}}
{{--                    {--}}
{{--                        alert(data);--}}
{{--                        $('#subcatalogs').html(data);--}}
{{--                    },--}}
{{--                    error:function(data)--}}
{{--                    {--}}

{{--                    },--}}
{{--                });--}}
{{--            }--}}
{{--        })--}}
{{--        $('#subcatalogs').on('change',function () {--}}
{{--            var subcatalog_id = $(this).val();--}}
{{--            if(subcatalog_id){--}}
{{--                $.ajax({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    },--}}
{{--                    url:'/seller/select-items',--}}
{{--                    type:'post',--}}
{{--                    data:{"subcatalog_id":subcatalog_id},--}}
{{--                    // dataType:"json",--}}
{{--                    success:function(data)--}}
{{--                    {--}}
{{--                        alert(data);--}}
{{--                        $('#items').html(data);--}}
{{--                    },--}}
{{--                    error:function(data)--}}
{{--                    {--}}

{{--                    },--}}
{{--                });--}}
{{--            }--}}
{{--        })--}}
{{--        $('#catalogs').change(function(){--}}
{{--            $('#subcatalogs').val('');--}}
{{--            $('#items').val('');--}}
{{--        });--}}

{{--        $('#subcatalogs').change(function(){--}}
{{--            $('#items').val('');--}}
{{--        });--}}
{{--    </script>--}}
    <!-- inputmask -->
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

    <!-- Croppr -->
    <script src="{{ asset('libs/cropper/cropper.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('libs/cropper/cropper.min.css') }}">
    <!-- Upload images -->
    @php $countImage = (isset($data) and $data->images != null and count($data->images) > 0) ? 5+1-count($data->images) : 5 ; @endphp
    <script>
        let i = 1;
        let limit = @json($countImage);

        $(".imgAdd").click(function(){
            if(i < limit) {
                $(this).closest(".row").find('.imgAdd').before('<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 imgUp">' +
                    '<div class="imagePreview" style="background-image: url(/img/noimg.jpg)"></div>' +
                        '<input type="hidden" name="images[]">' +
                        '<label class="button btn-primary image-load">' +
                            'Загрузить' +
                            '<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;" accept=".png, .jpg, .jpeg">' +
                        '</label>' +
                        '<i class="fa fa-times del"></i>' +
                    '</div>');
            }

            if(i == limit - 1) {
                $('.imgAdd').addClass('disabled')
            }

            i++;
        });

        $(document).on("click", "i.del" , function() {
            $(this).parent().remove();
            i--;
            $('.imgAdd').removeClass('disabled')
        });


        $(document).on("change",".uploadFile", function() {

            let uploadFile = $(this);
            let files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){

                    $('.crop-image__save').unbind('click');
                    $('#crop-image').unbind('click');
                    $('.crop-image__close').unbind('click');

                    $('#image-no-crop').attr("src", ""+this.result+"");

                    let image = document.getElementById('image-no-crop');

                    let cropper = new Cropper(image, {
                        aspectRatio: 4/3,
                        zoomable: false,
                        scrolable: false,
                        autoCropArea: 0,
                    });

                    $('#crop-image').modal();

                    $('.crop-image__save').on('click', () => {

                        let imgurl = cropper.getCroppedCanvas().toDataURL();

                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+imgurl+")");
                        uploadFile.closest(".imgUp").find('input[type="hidden"]').attr("value", imgurl);

                        cropper.destroy();
                        $('.cropper-container').detach();
                    });

                    $('#crop-image').on('hidden.bs.modal', () => {
                        cropper.destroy();
                        $('.cropper-container').detach();
                    });

                    $('.crop-image__close').on('click', function () {
                        cropper.destroy();
                        $('.cropper-container').detach()
                    });

                    /* ---------------- SEND IMAGE TO THE SERVER-------------------------

                        cropper.getCroppedCanvas().toBlob(function (blob) {
                              var formData = new FormData();
                              formData.append('croppedImage', blob);
                              // Use `jQuery.ajax` method
                              $.ajax('/path/to/upload', {
                                method: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function () {
                                  console.log('Upload success');
                                },
                                error: function () {
                                  console.log('Upload error');
                                }
                              });
                        });

                    ----------------------------------------------------*/
                }
            }

        });
    </script>
{{--    <script>--}}

{{--        let i = 1;--}}
{{--        let limit = 5;--}}

{{--        $(".imgAdd").click(function(){--}}
{{--            if(i < limit) {--}}
{{--                $(this).closest(".row").find('.imgAdd').before('<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 imgUp"><div class="imagePreview"></div><label class="button btn-primary image-load">Загрузить<input type="file" name="images[]" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');--}}
{{--            }--}}

{{--            if(i == limit - 1) {--}}
{{--                $('.imgAdd').addClass('disabled')--}}
{{--            }--}}

{{--            i++;--}}
{{--        });--}}

{{--        $(document).on("click", "i.del" , function() {--}}
{{--            $(this).parent().remove();--}}
{{--            i--;--}}
{{--            $('.imgAdd').removeClass('disabled')--}}
{{--        });--}}

{{--        $(document).on("change",".uploadFile", function() {--}}

{{--            let uploadFile = $(this);--}}
{{--            let files = !!this.files ? this.files : [];--}}
{{--            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support--}}

{{--            if (/^image/.test( files[0].type)){ // only image file--}}
{{--                var reader = new FileReader(); // instance of the FileReader--}}
{{--                reader.readAsDataURL(files[0]); // read the local file--}}

{{--                reader.onloadend = function(){--}}
{{--                    $('#image-no-crop').attr("src", ""+this.result+"");--}}

{{--                    let image = document.getElementById('image-no-crop');--}}

{{--                    let cropper = new Cropper(image, {--}}
{{--                        aspectRatio: 4/3,--}}
{{--                        zoomable: false,--}}
{{--                        scrolable: false,--}}
{{--                        autoCropArea: 0,--}}
{{--                    });--}}

{{--                    $('#crop-image').modal();--}}

{{--                    $('.crop-image__save').on('click', function () {--}}

{{--                        let imgurl = cropper.getCroppedCanvas().toDataURL();--}}

{{--                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+imgurl+")");--}}

{{--                        cropper.destroy();--}}
{{--                        $('.cropper-container').detach();--}}
{{--                        cropper = null;--}}
{{--                        image = null;--}}

{{--                        $( this ).unbind('click');--}}
{{--                    });--}}
{{--                    var imageData = img;--}}
{{--                    html = '<input type="hidden" name="main_photo" value="'+ img +'" id="image">';--}}
{{--                    $("#preview-crop-image").html(html);--}}
{{--                    // $('.crop-image__close').on('click', function () {--}}
{{--                    // 	cropper.destroy();--}}
{{--                    // 	$('.cropper-container').detach();--}}
{{--                    // 	cropper = null;--}}
{{--                    // 	image = null;--}}
{{--                    //--}}
{{--                    // 	$( this ).unbind('click');--}}
{{--                    // });--}}

{{--                    /* ---------------- SEND IMAGE TO THE SERVER---------------------------}}

{{--                        cropper.getCroppedCanvas().toBlob(function (blob) {--}}
{{--                              var formData = new FormData();--}}
{{--                              formData.append('croppedImage', blob);--}}
{{--                              // Use `jQuery.ajax` method--}}
{{--                              $.ajax('/path/to/upload', {--}}
{{--                                method: "POST",--}}
{{--                                data: formData,--}}
{{--                                processData: false,--}}
{{--                                contentType: false,--}}
{{--                                success: function () {--}}
{{--                                  console.log('Upload success');--}}
{{--                                },--}}
{{--                                error: function () {--}}
{{--                                  console.log('Upload error');--}}
{{--                                }--}}
{{--                              });--}}
{{--                        });--}}

{{--                    ----------------------------------------------------*/--}}
{{--                }--}}
{{--            }--}}

{{--        });--}}

{{--    </script>--}}
@endpush


