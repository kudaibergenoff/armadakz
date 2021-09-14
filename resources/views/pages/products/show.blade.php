@extends('_layout')

@section('title',"ARMADA - " . ( $product->title ?? 'Информация о продукте' ) )

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('catalogs', $product->catalog->slug),
                           'title'=>$product->catalog->title ];
        $breadcrumbs[] = [  'route'=>route('catalog', $product->subcatalog->slug),
                           'title'=>$product->subcatalog->title ];
        $breadcrumbs[] = [  'route'=>route('item', $product->item->slug),
                           'title'=>$product->item->title ];
        $breadcrumbs[] = [  'route'=>route('product',[$product->id, $product->slug]),
                            'title'=>$product->title ?? 'Информация о продукте' ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('modals')
    <div class="modal fade applicationPost" id="add-review" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('productReview') }}" class="modal-content callback needs-validation" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оставить коментарий</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body add-review reviews__add-review pb-0">
                    <div class="d-flex align-items-center mb-4">
                        <span>Выберите оценку: </span>
                        <div class="review_rating ml-3">
                            <span class="rating-group">
                                @foreach([1,2,3,4,5] as $star)
                                    <label aria-label="{{ $star }} star" class="mb-0 rating__label" for="add-review-{{ $star }}"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="add-review-{{ $star }}" value="{{ $star }}" type="radio" @if($loop->iteration == 4) checked @endif>
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="mt-0">
                        <input type="hidden" name="store_id" value="{{ $product->store->id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div>
                            <div class="md-form mb-0 md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                                    <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                                </svg>
                                <input type="text" name="name" placeholder="Ваше имя" required class="form-control">
                            </div>
                        </div>

                        <div>
                            <div class="md-form mb-0 md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.418 0.0273438H1.58203C0.710789 0.0273438 0 0.749496 0 1.63642V12.3636C0 13.2475 0.707625 13.9727 1.58203 13.9727H16.418C17.287 13.9727 18 13.2529 18 12.3636V1.63642C18 0.7525 17.2924 0.0273438 16.418 0.0273438ZM16.1995 1.10006L9.03354 8.38856L1.80559 1.10006H16.1995ZM1.05469 12.1415V1.85343L6.13403 6.97529L1.05469 12.1415ZM1.80046 12.8999L6.883 7.73052L8.66391 9.52632C8.87006 9.73421 9.20275 9.73353 9.40806 9.52467L11.1445 7.75852L16.1995 12.8999H1.80046ZM16.9453 12.1414L11.8903 7L16.9453 1.85854V12.1414Z" fill="#737373"/>
                                </svg>
                                <input type="email" name="email" placeholder="E-mail" required class="form-control">
                            </div>
                        </div>

                        <div>
                            <div class="md-form mb-0 pink-textarea">
                                <textarea name="comment" placeholder="Коментарий" rows="5" required class="mt-3 md-textarea form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="application__error-messages color--accent" style="display: none"></div>
                    </div>
                </div>
                <div class="modal-footer p-3">
                    <button type="button" class="button btn-primary">Закрыть</button>
                    <button type="submit" class="button btn-success">Отправить</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalChars" tabindex="-1" role="dialog" aria-labelledby="modalChars" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Характеристики</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">

                    <ul class="d-flex flex-column pl-0 mb-0">
                        <li class="d-flex mb-2">
                            <span class="w-35 text-muted">Название:</span>
                            <span class="w-55">{{ $product->title }}</span>
                        </li>
                        @isset($product->width)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Ширина:</span>
                                <span class="w-55">{{ $product->width ?? 'отсутсвует :(' }} см</span>
                            </li>
                        @endisset
                        @isset($product->height)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Ширина:</span>
                                <span class="w-55">{{ $product->height ?? 'отсутсвует :(' }} см</span>
                            </li>
                        @endisset
                        @isset($product->depth)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Глубина:</span>
                                <span class="w-55">{{ $product->depth ?? 'отсутсвует :(' }} см</span>
                            </li>
                        @endisset
                        @isset($product->manufacture)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Материалы:</span>
                                <span class="w-55">{{ $product->manufacture ?? 'отсутсвует :(' }}</span>
                            </li>
                        @endisset
                        @isset($product->country_id)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Страна:</span>
                                <span class="w-55">{{ $product->country->title_ru ?? 'отсутсвует :(' }}</span>
                            </li>
                        @endisset
                        {{--                        @isset($product->width)--}}
                        {{--                            <li class="d-flex mb-2">--}}
                        {{--                                <span class="w-35 text-muted">Бренд:</span>--}}
                        {{--                                <span class="w-55">La Redoute</span>--}}
                        {{--                            </li>--}}
                        {{--                        @endisset--}}
                        {{--                        @isset($product->width)--}}
                        {{--                            <li class="d-flex mb-2">--}}
                        {{--                                <span class="w-35 text-muted">Коллекция:</span>--}}
                        {{--                                <span class="w-55">Authentic Style</span>--}}
                        {{--                            </li>--}}
                        {{--                        @endisset--}}
                        @isset($product->width)
                            <li class="d-flex mb-2">
                                <span class="w-35 text-muted">Доставка:</span>
                                <span class="w-55">Доставка в город Москва, по России и в СНГ</span>
                            </li>
                        @endisset
                    </ul>

                </div>
                <!--Footer-->
                <div class="modal-footer p-3">
                    <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="photo-modal container">--}}
    {{--        <div class="photo-modal__wrap">--}}
    {{--            <div class="photo-modal__current container">--}}
    {{--                @foreach($product->images as $image)--}}
    {{--                    @if($loop->first)--}}
    {{--                        <img src="{{ '/storage/'.$image }}" alt="{{ ucfirst(strtolower($product->title)) }}">--}}
    {{--                    @else--}}
    {{--                        @break--}}
    {{--                    @endif--}}
    {{--                    <img src="{{ $product->getImages() }}" alt="{{ ucfirst(strtolower($product->title)) }}">--}}
    {{--                    @break--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--            <div class="photo-modal__actions">--}}
    {{--                <div class="photo-modal__close">Закрыть</div>--}}
    {{--                <div class="photo-modal__arrow photo-modal__arrow--next">--}}
    {{--                    <svg width="33" height="51" viewBox="0 0 33 51" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                        <g clip-path="url(#clip10)" filter="url(#filter10_d)">--}}
    {{--                            <path d="M29.0965 24.5001C29.0965 25.3066 28.7941 26.113 28.1905 26.7279L9.18683 46.0769C7.97796 47.3077 6.01798 47.3077 4.8096 46.0769C3.60123 44.8465 3.60123 42.8513 4.8096 41.6204L21.6251 24.5001L4.81019 7.37979C3.60181 6.14894 3.60181 4.15393 4.81019 2.92368C6.01857 1.69224 7.97854 1.69224 9.18741 2.92368L28.1911 22.2724C28.7948 22.8875 29.0965 23.6939 29.0965 24.5001Z" fill="white"/>--}}
    {{--                        </g>--}}
    {{--                        <defs>--}}
    {{--                            <filter id="filter10_d" x="-1" y="-2" width="35" height="55" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">--}}
    {{--                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>--}}
    {{--                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>--}}
    {{--                                <feOffset dy="1"/>--}}
    {{--                                <feGaussianBlur stdDeviation="1.5"/>--}}
    {{--                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.45 0"/>--}}
    {{--                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>--}}
    {{--                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>--}}
    {{--                            </filter>--}}
    {{--                            <clipPath id="clip10">--}}
    {{--                                <rect width="49" height="29" fill="white" transform="translate(2 49) rotate(-90)"/>--}}
    {{--                            </clipPath>--}}
    {{--                        </defs>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--                <div class="photo-modal__arrow photo-modal__arrow--prev">--}}
    {{--                    <svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                        <g clip-path="url(#clip9)" filter="url(#filter9_d)">--}}
    {{--                            <path d="M3.90348 25.4999C3.90348 24.6934 4.20591 23.887 4.80952 23.2721L23.8132 3.92314C25.022 2.69229 26.982 2.69229 28.1904 3.92314C29.3988 5.15349 29.3988 7.1487 28.1904 8.37964L11.3749 25.4999L28.1898 42.6202C29.3982 43.8511 29.3982 45.8461 28.1898 47.0763C26.9814 48.3078 25.0215 48.3078 23.8126 47.0763L4.80893 27.7276C4.20523 27.1125 3.90348 26.3061 3.90348 25.4999Z" fill="white"/>--}}
    {{--                        </g>--}}
    {{--                        <defs>--}}
    {{--                            <filter id="filter9_d" x="-3" y="-2" width="39" height="59" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">--}}
    {{--                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>--}}
    {{--                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>--}}
    {{--                                <feOffset dy="1"/>--}}
    {{--                                <feGaussianBlur stdDeviation="1.5"/>--}}
    {{--                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.45 0"/>--}}
    {{--                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>--}}
    {{--                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>--}}
    {{--                            </filter>--}}
    {{--                            <clipPath id="clip9">--}}
    {{--                                <rect width="53" height="33" fill="white" transform="translate(33) rotate(90)"/>--}}
    {{--                            </clipPath>--}}
    {{--                        </defs>--}}
    {{--                    </svg>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

@section('content')
    @php
        $likeIds = \Auth::check() ? \App\Http\Services\Service::likeIds() : null;
    @endphp
    @include('pages.products._product')
    {{--    @include('pages.products._together')    <!-- Вместе дешевле -->--}}
    @include('pages.products._collection')  <!-- + Из этой же коллекции -->
    {{--    @include('pages.products._new')         <!-- Новинки -->--}}
    @include('pages.products._info')        <!-- + Информация о продукте -->
    {{--    @include('pages.products._interior')    <!-- Фото в интерьере -->--}}
    {{--    @include('pages.products._overlay')--}}
    @include('pages.products._reviews')     <!-- Отзывы -->
    {{--    @include('pages.products._faq')         <!-- Вопросы и ответы -->--}}
    @include('pages.products._other')       <!-- + Другие товары этого производителя -->
    @include('pages.products._viewed')      <!-- + Просмотренные товары -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-product/product.min.css') }}">
@endpush

@push('scripts')
    <script>
        // Open the Modal
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Close the Modal
        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>
    <script src="{{ asset('js/dest/page-product/product-min.js') }}"></script>
@endpush


