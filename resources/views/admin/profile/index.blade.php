@extends('_layout')

@section('title',"ARMADA - редактирование профиля" )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid px-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content vendor__content--settings flex-grow-1 bg-light vendor__content--panel">
                @include('admin._layouts.header')
                <div class="panel orders vendor__panel mt-lg-2 pt-4 pb-3 p-lg-3 pr-0">
                    <div class="user-block">
                        <form action="{{ route('admin.profile.update',Auth::id()) }}" class="user-block__wrap" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="user-block__header">
                                <p class="page-title">Профиль</p>
                                <div class="user-block__edit">
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3656 13.4731L16.5878 12.2231C16.7788 12.0278 17.1111 12.1646 17.1111 12.4458V18.1255C17.1111 19.1606 16.2899 20.0005 15.2778 20.0005H1.83333C0.821181 20.0005 0 19.1606 0 18.1255V4.37549C0 3.34033 0.821181 2.50049 1.83333 2.50049H12.2795C12.5507 2.50049 12.6882 2.83643 12.4972 3.03564L11.275 4.28564C11.2177 4.34424 11.1413 4.37549 11.0573 4.37549H1.83333V18.1255H15.2778V13.6919C15.2778 13.6099 15.3083 13.5317 15.3656 13.4731ZM21.3469 5.59033L11.317 15.8481L7.86424 16.2388C6.86354 16.3521 6.01181 15.4888 6.12257 14.4575L6.50451 10.9263L16.5344 0.668457C17.409 -0.226074 18.8222 -0.226074 19.6931 0.668457L21.3431 2.35596C22.2177 3.25049 22.2177 4.69971 21.3469 5.59033V5.59033ZM17.5733 6.79736L15.3542 4.52783L8.25764 11.7895L7.97882 14.3403L10.4729 14.0552L17.5733 6.79736ZM20.0483 3.68408L18.3983 1.99658C18.2417 1.83643 17.9858 1.83643 17.833 1.99658L16.6528 3.20361L18.8719 5.47314L20.0521 4.26611C20.2049 4.10205 20.2049 3.84424 20.0483 3.68408V3.68408Z" fill="#E0001A"/>
                                    </svg>
                                    <span>Редактировать</span>
                                </div>
                            </div>

                            <div>
                                @include('admin.profile._personal')
{{--                                @include('admin.profile._contact')--}}
                                @include('admin.profile._auth')
                                {{--@include('sellers.personal_data._avatar')--}}
                                {{--@include('sellers._____personal_data._additional')--}}
                            </div>
                        </form>
                        <div class="text-right">
                            <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button btn-outline-dark d-block d-sm-inline mt-3 mx-auto mx-sm-0">Выйти из профиля</button>
                        </div>
                    </div>
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


