@extends('_layout')

@section('title','ARMADA - изменить заказ' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <form action="{{ route('admin.orders.update',$data->id) }}" class="was-validated change-shop pb-4 border-bottom" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                       <div class="row">
                           <div class="col-12 col-md-6">
                               <div class="bg-light rounded p-4">
                                   <h3 class="mb-3">Параметры заказа</h3>
                                   <hr color="white">
                                   <p><b>ID: </b>#{{ $data->id }}</p>
                                   <p><b>Номер заказа: </b>#{{ $data->order_id }}</p>
                                   <p><b>Заказчик: </b>{{ $data->fio }}</p>
                                   <p><b>Дата создания: </b>{{ $data->created_at }}</p>
                                   <p><b>Дата обновления: </b>{{ $data->updated_at }}</p>
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <p>
                                               <b>Телефон покупателя:</b>
                                               @include('layouts.forms.input',['name'=>'phone','type'=>'tel'])
                                           </p>
                                       </div>
                                       <div class="col-12 col-md-6">
                                           <p>
                                               <b>E-mail покупателя:</b>
                                               @include('layouts.forms.input',['data'=>$data->user,'type'=>'email','name'=>'email'])
                                           </p>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <p>
                                               <b>Имя получателя:</b>
                                               @include('layouts.forms.input',['type'=>'text','name'=>'client_name'])
                                           </p>
                                       </div>
                                       <div class="col-12 col-md-6">
                                           <p>
                                               <b>Телефон получателя:</b>
                                               @include('layouts.forms.input',['type'=>'tel','name'=>'client_phone'])
                                           </p>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <b>Способ доставки: </b>
                                           <select class="mdb-select md-form mt-0" name="delivery_id" searchable="Поиск..." id="delivery_id" required>
                                               <option value="" disabled selected>Выберите способ доставки</option>
                                               @foreach($deliveryTypes as $deliveryType)
                                                   <option value="{{ $deliveryType->id }}" @if($deliveryType->id == $data->pay_id) selected @endif>{{ $deliveryType->title }}</option>
                                               @endforeach
                                           </select>
{{--                                           @include('layouts.forms.select',['name'=>'delivery','class'=>'mt-0','selected'=>'1','options'=>array('1'=>'Способ доставки 1','2'=>'Способ доставки 2','3'=>'Способ доставки 3','4'=>'Способ доставки 4'),'5'=>'Способ доставки 5'])--}}
                                       </div>
                                       <div class="col-12 col-md-6">
                                           <b>Способ оплаты: </b>
                                           <select class="mdb-select md-form mt-0" name="pay_id" searchable="Поиск..." id="pay_id" required>
                                               <option value="" disabled selected>Выберите способ оплаты</option>
                                               @foreach($payTypes as $payType)
                                                   <option value="{{ $payType->id }}" @if($payType->id == $data->delivery_id) selected @endif>{{ $payType->title }}</option>
                                               @endforeach
                                           </select>
{{--                                           @include('layouts.forms.select',['name'=>'payment','class'=>'mt-0','selected'=>'1','options'=>array('1'=>'Способ оплаты 1','2'=>'Способ оплаты 2','3'=>'Способ оплаты 3','4'=>'Способ оплаты 4'),'5'=>'Способ оплаты 5'])--}}
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <p>
                                               <b>Город:</b>
                                               <select class="mdb-select md-form mt-0" name="city" searchable="Поиск..." id="city_id" required>
                                                   <option value="" disabled selected>Выберите город</option>
                                                   @foreach($cities as $city)
                                                       <option value="{{ $city->id }}" @if($data->city_id == $city->id) selected @endif>{{ $city->title_ru }}</option>
                                                   @endforeach
                                               </select>
                                           </p>
                                       </div>
                                   </div>
                                   <p>
                                       <b>Адрес доставки:</b>
                                       @include('layouts.forms.input',['type'=>'text','name'=>'address'])
                                   </p>
                                   <p>
                                       <b>Комментарий заказчика:</b>
                                       @include('layouts.forms.textarea',['name'=>'comment','placeholder'=>'Комментарий заказчика','cols'=>30,'rows'=>8,'length'=>2000])
                                   </p>
                                   <p>
                                       <b>Статус: </b>
                                       @include('layouts.forms.select',['name'=>'status','class'=>'mt-0','selected'=>isset($data->status_id) ? $data->status_id : '1','options'=>array('1'=>'Выполнен','2'=>'Отменён','3'=>'В ожидании','4'=>'Заморожен'),'5'=>'В корзине'])
                                   </p>
                               </div>
                           </div>
                           <div class="col-12 col-md-6">
                               <div class="bg-light rounded p-4">
                                   <h3 class="mb-3">Товар</h3>
                                   <hr color="white">
                                   <ul class="seller__products row list-style-none mb-0 p-0">
                                       <li class="col-12 seller__product order-total__item product-card product-card--vertical">
                                           <article class="product-card__wrap product-card__wrap--no-hover">
{{--                                                <span class="product-card__header">--}}
{{--                                                    <span class="product-card__stickers">--}}
{{--                                                        <span class="product-card__sticker product-card__sticker--sale">-8%</span>--}}
{{--                                                    </span>--}}
{{--                                                </span>--}}
                                               <a href="{{ route('product',$product->slug) }}" class="product-card__link" target="_blank">
                                                   <div class="product-card__image">
                                                       <img src="{{ $product->getImages() }}" alt="Product image" />
                                                   </div>
                                                   <div class="product-card__content product-card__content--wp">
                                                       <h4 class="product-card__title">{{ $product->title }}</h4>
                                                       <div class="product-card__vendor">Продавец: {{ $product->store->title }}</div>
                                                       <div class="product-card__vendor">Артикул: {{ $product->articul }}</div>
                                                       <div class="price product-card__price mt-3">
                                                           <span class="price__current">{{ $data->price }} <span class="price__currency">тг.</span></span>
                                                       </div>
                                                       <div class="product-card__count">Кол-во: <span>{{ $data->count }}</span> шт.</div>
                                                   </div>
                                               </a>
                                           </article>
                                       </li>
                                   </ul>
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
    <link rel="stylesheet" href="{{ asset('css/page-order/order.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
    <!-- inputmask -->
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/mask-form.js') }}"></script>
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
@endpush
