@extends('_layout')

@section('title','ARMADA - добавить(изменить) баннер' )

@section('content')

    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title">Добавить баннер</h2>
                    </div>
                    <form action="@isset($data){{ route('admin.banners.update',$data->id) }}@else{{ route('admin.banners.store') }}@endisset" class="pb-4 border-bottom" method="POST" enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
{{--                            <div class="switch col-6 col-lg-3 mb-3">--}}
{{--                                @include('layouts.forms.switch',['name'=>'archive','label'=>'В архив','isOff'=>true,'on'=>'Да','off'=>'Нет'])--}}
{{--                            </div>--}}
                            <div class="switch col-6 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активен','off'=>'Не активен'])
                            </div>
                        </div>

                        <div class="row">
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1920x550','limit'=>1,'label'=>'1920x550','aspectRatioX'=>'192','aspectRatioY'=>'55'])</div>--}}
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1580x550','limit'=>1,'label'=>'1580x550','aspectRatioX'=>'158','aspectRatioY'=>'55'])</div>--}}
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1280x450','limit'=>1,'label'=>'1280x450','aspectRatioX'=>'128','aspectRatioY'=>'45'])</div>--}}
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1024x450','limit'=>1,'label'=>'1024x450','aspectRatioX'=>'512','aspectRatioY'=>'225'])</div>--}}
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_768x495','limit'=>1,'label'=>'768x495','aspectRatioX'=>'265','aspectRatioY'=>'165'])</div>--}}
{{--                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_576x350','limit'=>1,'label'=>'576x350','aspectRatioX'=>'288','aspectRatioY'=>'175'])</div>--}}
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1920x550','limit'=>1,'label'=>'< 1920px'])</div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1580x550','limit'=>1,'label'=>'< 1580px'])</div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1280x450','limit'=>1,'label'=>'< 1280px'])</div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_1024x450','limit'=>1,'label'=>'< 1024px'])</div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_768x495','limit'=>1,'label'=>'< 768px'])</div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">@include('admin.banners._uploadImage', ['name'=>'images_576x350','limit'=>1,'label'=>'< 576px'])</div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                @include('layouts.forms.input',['name'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                @include('layouts.forms.input',['name'=>'company_title','label'=>'Название рекламной кампании','placeholder'=>'Название рекламной кампании','length'=>150,'required'=>true])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                @include('layouts.forms.input',['name'=>'client','label'=>'Клиент (если не из армады)','placeholder'=>'Клиент (если не из армады)','length'=>150])
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-3">
                                @include('layouts.forms.select',['name'=>'store_id','label'=>'Клиент (если из армады)','search'=>true,'selected'=>isset($data->stock) ? $data->stock : '1','options'=>$storesArray])
                            </div>
{{--                            <div class="col-12 col-md-6 col-lg-4 mb-3">--}}
{{--                                @include('layouts.forms.input',['name'=>'created_at','label'=>'Дата создания','placeholder'=>'Дата создания','length'=>150,'required'=>true])--}}
{{--                            </div>--}}
                        </div>

                        <div class="row">
{{--                            <div class="col-12 col-lg-6 mb-3">--}}
{{--                                <label class="mdb-main-label">Клиент (если из армады)</label>--}}
{{--                                <select name="store_id" class="form-control js-example-basic-single">--}}
{{--                                    <option value="" disabled selected>Сделайте выбор</option>--}}
{{--                                    @foreach($stores as $store)--}}
{{--                                        <option value="{{ $store->id }}">{{ $store->title }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-lg-6 mb-3">--}}
{{--                                @include('layouts.forms.input',['name'=>'client','label'=>'Клиент (если не из армады)','placeholder'=>'Клиент (если не из армады)','length'=>150])--}}
{{--                            </div>--}}
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="mdb-main-label">Место размещения</label>
                                <select name="type_id" class="form-control" searchable="Поиск" required>
                                    <option value="" disabled selected>Выберите</option>
                                    @foreach($types as $bannerType)
                                        <option value="{{ $bannerType->id }}" @if(isset($data) and $data->type_id == $bannerType->id   ) selected @endif>{{ $bannerType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="col-12 col-lg-6 mb-3">--}}
{{--                                <label class="mdb-main-label">Тип</label>--}}
{{--                                <select class="form-control" name="type" searchable="Поиск">--}}
{{--                                    <option value="" disabled selected>Выберите</option>--}}
{{--                                    <option value="1">Вариант 1</option>--}}
{{--                                    <option value="2">Вариант 2</option>--}}
{{--                                    <option value="3">Вариант 3</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-12 col-lg-4 mb-3">
                                @include('layouts.forms.input',['name'=>'period','class'=>'form-control picker__input','label'=>'Период','placeholder'=>'Выберите период...','required'=>true])
{{--                                <div class="md-form">--}}
{{--                                    <label>Период</label>--}}
{{--                                    <input type="text" name="period" class="form-control picker__input" value="Выберите период..." />--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                @include('layouts.forms.input',['name'=>'link','label'=>'Ссылка','placeholder'=>'Ссылка','required'=>true])
{{--                                <div class="md-form">--}}
{{--                                    <label>Ссылка</label>--}}
{{--                                    <input type="text" name="slug" class="form-control" placeholder="Ссылка">--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-12 col-lg-12 mb-3">
                                @include('layouts.forms.textarea',['name'=>'html','class'=>'tinyMCE','cols'=>30,'rows'=>11,'label'=>'HTML','placeholder'=>'HTML'])
{{--                                <label>HTML</label>--}}
{{--                                <textarea name="html" id="" cols="30" rows="11" class="tinyMCE"></textarea>--}}
                            </div>
                            <div class="col-12 col-lg-12 mb-3">
                                @include('layouts.forms.textarea',['name'=>'comment','rows'=>12,'label'=>'Комментарий','placeholder'=>'Комментарий'])
{{--                                <div class="form-group">--}}
{{--                                    <label>Комментарий</label>--}}
{{--                                    <textarea class="form-control" name="comment" rows="12"></textarea>--}}
{{--                                </div>--}}
                            </div>
                        </div>

                       <div class="row">
                           <div class="col-12 col-lg-4" mb-3>
                               <label class="mdb-main-label">Категория</label>
                               <select class="form-control" name="category" searchable="Поиск">
                                   <option value="" disabled selected>Выберите</option>
                                   <option value="1">Вариант 1</option>
                                   <option value="2">Вариант 2</option>
                                   <option value="3">Вариант 3</option>
                               </select>
                           </div>
                           <div class="col-12 col-lg-4 mb-3">
                               <label class="mdb-main-label">Раздел</label>
                               <select class="form-control" name="section" searchable="Поиск">
                                   <option value="" disabled selected>Выберите</option>
                                   <option value="1">Вариант 1</option>
                                   <option value="2">Вариант 2</option>
                                   <option value="3">Вариант 3</option>
                               </select>
                           </div>
                           <div class="col-12 col-lg-4 mb-3">
                               <label class="mdb-main-label">Подраздел</label>
                               <select class="form-control" name="subsection" searchable="Поиск">
                                   <option value="" disabled selected>Выберите</option>
                                   <option value="1">Вариант 1</option>
                                   <option value="2">Вариант 2</option>
                                   <option value="3">Вариант 3</option>
                               </select>
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
    <!-- Prism -->
    <link rel="stylesheet" href="{{ asset('libs/prism/prism.css') }}">
    <!-- select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    @include('admin.banners._datepicker')


    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Выберите один или несколько"
            });
        });
    </script>
    @include('admin.banners._datepicker')
{{--    <script>--}}
{{--        // Data Picker Initialization--}}
{{--        {--}}
{{--            $('.datepicker').datepicker({--}}
{{--                format: 'dd.mm.yyyy',--}}

{{--                monthsFull: ['Январь', 'Февраль', 'Март', 'Апрель', 'Мая', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],--}}
{{--                monthsShort: ['Янв', 'Февр', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Ноя', 'Дек'],--}}
{{--                weekdaysFull: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],--}}
{{--                weekdaysShort: ['ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ', 'ВС'],--}}

{{--                labelMonthNext: 'След. месяц',--}}
{{--                labelMonthPrev: 'Пред. месяц',--}}
{{--                labelMonthSelect: 'Выбрать месяц',--}}
{{--                labelYearSelect: 'Выбрать год',--}}

{{--                today: 'Сегодня',--}}
{{--                clear: 'Очистить',--}}
{{--                close: 'Закрыть',--}}

{{--            });--}}
{{--        }--}}

{{--        // Date range picker--}}

{{--        {--}}
{{--            moment.locale('ru', {--}}
{{--                monthsShort : 'Янв._Февр._Март_Апр._Май_Июнь_Июль._Арг._Сент._Окт._Ноя._Дек.'.split('_'),--}}
{{--                monthsParseExact : true,--}}
{{--            });--}}

{{--            $('input.picker__input').daterangepicker({--}}
{{--                autoApply: false,--}}
{{--                startDate: moment().startOf('hour'),--}}
{{--                endDate: moment().startOf('hour').add(32, 'hour'),--}}

{{--                opens: 'left',--}}
{{--                locale: {--}}
{{--                    "format": 'DD.MM.YYYY',--}}
{{--                    "applyLabel" : "Применить",--}}
{{--                    "cancelLabel" : "Отменить",--}}
{{--                    "yearLabel" : "г.",--}}
{{--                    "daysOfWeek" : [--}}
{{--                        "ПН",--}}
{{--                        "ВТ",--}}
{{--                        "СР",--}}
{{--                        "ЧТ",--}}
{{--                        "ПТ",--}}
{{--                        "СБ",--}}
{{--                        "ВС"--}}
{{--                    ],--}}
{{--                    "monthNames" : [--}}
{{--                        "Январь",--}}
{{--                        "Февраль",--}}
{{--                        "Март",--}}
{{--                        "Апрель",--}}
{{--                        "Май",--}}
{{--                        "Июнь",--}}
{{--                        "Июль",--}}
{{--                        "Август",--}}
{{--                        "Сентябрь",--}}
{{--                        "Октябрь",--}}
{{--                        "Ноябрь",--}}
{{--                        "Декабрь"--}}
{{--                    ]--}}
{{--                },--}}
{{--            });--}}

{{--            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {--}}
{{--                $('.graph__date span').text(picker.startDate.format('MM.DD.YY') + ' - ' + picker.endDate.format('MM.DD.YY'))--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}

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


