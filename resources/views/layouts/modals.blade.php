@include('layouts.modals.basket')       <!-- Корзина -->
@include('layouts.modals.delete')       <!-- Удаление продавцом магазина, продукта, заказа -->
@include('layouts.modals.deleteAccount')       <!-- Удаление аккаунта -->
@include('layouts.modals.editStore')    <!-- Быстрое редактирование магазина -->
@include('layouts.modals.editProduct')  <!-- Быстрое редактирование продукта -->
@include('layouts.modals.editOrder')    <!-- Быстрое редактирование заказа -->
@include('layouts.modals.editReview')    <!-- Быстрое редактирование отзыва -->
@include('layouts.modals.editApplication')    <!-- Быстрое редактирование заказа -->
@include('layouts.modals.editCatalog')  <!-- Быстрое редактирование каталога -->
@include('layouts.modals.cropImage')    <!-- Обрезка изображения -->
@include('layouts.modals.advertisers')  <!-- Заявка на рекламу -->
@include('layouts.modals.tenants')      <!-- Заявка на аренду -->
@include('layouts.modals.callback')      <!-- Перезвоните мне -->
@include('layouts.modals.subscribe')      <!-- Подписка на рассылку -->
@include('layouts.modals.priceChange')      <!-- Узнать о снижении цены -->
@include('layouts.modals.pay_result')

<div class="photo-modal photo-modal--product-card">
    <div class="photo-modal__wrap">
        <div class="photo-modal__current container">
            <div class="photo-modal__zoom">
                <img src="" alt="Product image">
            </div>
        </div>
        <div class="photo-modal__actions">
            <div class="photo-modal__close">Закрыть</div>
        </div>
    </div>
</div>

<div class="photo-modal photo-modal--main-product container">
    <div class="photo-modal__overlay"></div>
    <div class="photo-modal__wrap">
        <div class="photo-modal__current container">
            <div class="photo-modal__zoom">
                <img src="" alt="Product image">
            </div>
        </div>
        <div class="photo-modal__actions">
            <div class="photo-modal__close">Закрыть</div>
            <div class="photo-modal__arrow photo-modal__arrow--next">
                <svg width="33" height="51" viewBox="0 0 33 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip10)" filter="url(#filter10_d)">
                        <path d="M29.0965 24.5001C29.0965 25.3066 28.7941 26.113 28.1905 26.7279L9.18683 46.0769C7.97796 47.3077 6.01798 47.3077 4.8096 46.0769C3.60123 44.8465 3.60123 42.8513 4.8096 41.6204L21.6251 24.5001L4.81019 7.37979C3.60181 6.14894 3.60181 4.15393 4.81019 2.92368C6.01857 1.69224 7.97854 1.69224 9.18741 2.92368L28.1911 22.2724C28.7948 22.8875 29.0965 23.6939 29.0965 24.5001Z" fill="white"/>
                    </g>
                    <defs>
                        <filter id="filter10_d" x="-1" y="-2" width="35" height="55" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                            <feOffset dy="1"/>
                            <feGaussianBlur stdDeviation="1.5"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.45 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <clipPath id="clip10">
                            <rect width="49" height="29" fill="white" transform="translate(2 49) rotate(-90)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="photo-modal__arrow photo-modal__arrow--prev">
                <svg width="33" height="53" viewBox="0 0 33 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip9)" filter="url(#filter9_d)">
                        <path d="M3.90348 25.4999C3.90348 24.6934 4.20591 23.887 4.80952 23.2721L23.8132 3.92314C25.022 2.69229 26.982 2.69229 28.1904 3.92314C29.3988 5.15349 29.3988 7.1487 28.1904 8.37964L11.3749 25.4999L28.1898 42.6202C29.3982 43.8511 29.3982 45.8461 28.1898 47.0763C26.9814 48.3078 25.0215 48.3078 23.8126 47.0763L4.80893 27.7276C4.20523 27.1125 3.90348 26.3061 3.90348 25.4999Z" fill="white"/>
                    </g>
                    <defs>
                        <filter id="filter9_d" x="-3" y="-2" width="39" height="59" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                            <feOffset dy="1"/>
                            <feGaussianBlur stdDeviation="1.5"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.45 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                        </filter>
                        <clipPath id="clip9">
                            <rect width="53" height="33" fill="white" transform="translate(33) rotate(90)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addToBasket">
    <div class="modal-dialog modal-dialog-centered modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading">Товар успешно добавлен в корзину</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-3">
                        <p></p>
                        <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
                    </div>

                    <div class="col-9">
                        <p>Вам нужно больше времени, чтобы принять решение о покупке?</p>
                        <p>Не переживайте, ваш товар будет ждать вас в корзине.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center p-3">
                <button type="button" class="BASKET button btn-danger font-weight-normal d-flex align-items-center mr-2" data-dismiss="modal" data-toggle="modal" data-target="#cardModal">
                    <span class="BASKET" style="color: #FFF;">Перейти в корзину</span>
                    <svg class="ml-3" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.928974 0.457031H3.69167C3.97878 0.457031 4.22487 0.662109 4.27761 0.943359L5.75417 8.78027H12.1614L13.2864 4.71973H8.37331C8.04226 4.71973 7.77565 4.45312 7.77565 4.12207C7.77565 3.79102 8.04226 3.52441 8.37331 3.52441H14.0716C14.6048 3.52441 14.7278 3.99902 14.6458 4.28027L13.1897 9.53613C13.1194 9.79394 12.8821 9.97266 12.6155 9.97266H5.25905C4.97194 9.97266 4.72585 9.76758 4.67311 9.48633L3.19362 1.65234H0.926044C0.594989 1.65234 0.328388 1.38574 0.328388 1.05469C0.331318 0.723633 0.597919 0.457031 0.928974 0.457031Z" fill="white"/>
                        <path d="M6.65088 10.9717C7.61768 10.9717 8.40283 11.7715 8.40283 12.7588C8.40283 13.7432 7.61768 14.5459 6.65088 14.5459C5.68408 14.5459 4.89892 13.7461 4.89892 12.7588C4.89892 11.7715 5.68408 10.9717 6.65088 10.9717ZM6.65088 13.3477C6.9585 13.3477 7.20752 13.0811 7.20752 12.7559C7.20752 12.4307 6.9585 12.1641 6.65088 12.1641C6.34326 12.1641 6.09424 12.4307 6.09424 12.7559C6.09424 13.084 6.34326 13.3477 6.65088 13.3477Z" fill="white"/>
                        <path d="M11.2881 10.9717C12.2549 10.9717 13.04 11.7715 13.04 12.7588C13.04 13.7432 12.2549 14.5459 11.2881 14.5459C10.3213 14.5459 9.53613 13.7461 9.53613 12.7588C9.53613 11.7715 10.3213 10.9717 11.2881 10.9717ZM11.2881 13.3477C11.5957 13.3477 11.8447 13.0811 11.8447 12.7559C11.8447 12.4307 11.5957 12.1641 11.2881 12.1641C10.9805 12.1641 10.7314 12.4307 10.7314 12.7559C10.7314 13.084 10.9805 13.3477 11.2881 13.3477Z" fill="white"/>
                    </svg>
                </button>
                <a type="button" class="button btn-success font-weight-normal bg-light waves-effect d-flex align-items-center" data-dismiss="modal">Закрыть</a>
            </div>
        </div>
    </div>
</div>

{{--<div class="modal fade bottom" id="addToBasket">--}}
{{--    <div class="modal-dialog modal-frame modal-bottom modal-notify modal-success" role="document">--}}
{{--        <!--Content-->--}}
{{--        <div class="modal-content">--}}
{{--            <!--Body-->--}}
{{--            <div class="modal-body">--}}
{{--                <div class="row d-flex justify-content-center align-items-center flex-wrap">--}}

{{--                    <span class="mr-3">Товар успешно добавлен в корзину.</span>--}}

{{--                    <button type="button" class="button btn-primary font-weight-normal d-flex align-items-center mr-2" data-toggle="modal" data-target="#cardModal">--}}
{{--                        <span class="BASKET" style="color: #FFF;">Перейти в корзину</span>--}}
{{--                        <svg class="ml-3" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M0.928974 0.457031H3.69167C3.97878 0.457031 4.22487 0.662109 4.27761 0.943359L5.75417 8.78027H12.1614L13.2864 4.71973H8.37331C8.04226 4.71973 7.77565 4.45312 7.77565 4.12207C7.77565 3.79102 8.04226 3.52441 8.37331 3.52441H14.0716C14.6048 3.52441 14.7278 3.99902 14.6458 4.28027L13.1897 9.53613C13.1194 9.79394 12.8821 9.97266 12.6155 9.97266H5.25905C4.97194 9.97266 4.72585 9.76758 4.67311 9.48633L3.19362 1.65234H0.926044C0.594989 1.65234 0.328388 1.38574 0.328388 1.05469C0.331318 0.723633 0.597919 0.457031 0.928974 0.457031Z" fill="white"/>--}}
{{--                            <path d="M6.65088 10.9717C7.61768 10.9717 8.40283 11.7715 8.40283 12.7588C8.40283 13.7432 7.61768 14.5459 6.65088 14.5459C5.68408 14.5459 4.89892 13.7461 4.89892 12.7588C4.89892 11.7715 5.68408 10.9717 6.65088 10.9717ZM6.65088 13.3477C6.9585 13.3477 7.20752 13.0811 7.20752 12.7559C7.20752 12.4307 6.9585 12.1641 6.65088 12.1641C6.34326 12.1641 6.09424 12.4307 6.09424 12.7559C6.09424 13.084 6.34326 13.3477 6.65088 13.3477Z" fill="white"/>--}}
{{--                            <path d="M11.2881 10.9717C12.2549 10.9717 13.04 11.7715 13.04 12.7588C13.04 13.7432 12.2549 14.5459 11.2881 14.5459C10.3213 14.5459 9.53613 13.7461 9.53613 12.7588C9.53613 11.7715 10.3213 10.9717 11.2881 10.9717ZM11.2881 13.3477C11.5957 13.3477 11.8447 13.0811 11.8447 12.7559C11.8447 12.4307 11.5957 12.1641 11.2881 12.1641C10.9805 12.1641 10.7314 12.4307 10.7314 12.7559C10.7314 13.084 10.9805 13.3477 11.2881 13.3477Z" fill="white"/>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                    <a type="button" class="button btn-success font-weight-normal bg-light waves-effect d-flex align-items-center" data-dismiss="modal">Закрыть</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/.Content-->--}}
{{--    </div>--}}
{{--</div>--}}

<script>
    $('#addToBasket').on('show.bs.modal', function() {
        setTimeout(function () {
            $('#addToBasket').modal('hide');
        }, 3000)
    });
</script>
