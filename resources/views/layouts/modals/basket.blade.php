@if(!Route::is('vendor.*','admin.*'))
    <div class="modal fade bd-example-modal-lg" id="cardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="overflow: auto">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Корзина</h5>
                    <button type="button" id="BASKET_PRODUCT_modal_close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body cart modal__cart">
                    <input type="hidden" name="token" value="{{ csrf_token() }}" class="TOKEN">
                    <ul class="cart__items BASKET_PRODUCT_parent">
                        <li class="cart-product cart__item BASKET_PRODUCT" style = 'display: none'>
                            <div class="cart-product__wrap">
                                <div class="cart-product__image">
                                    <img class = "BASKET_PRODUCT_image" src="{{ asset('img/categories/17.png') }}" alt="Product image">
                                </div>
                                <div class="cart-product__content">
                                    <div class="cart-product__header">
                                        <div>
                                            <h4 class="cart-product__name BASKET_PRODUCT_title"></h4>
                                            <ul class="cart-product__info">
                                                <li class="cart-product__info-item">
                                                    <span>Продавец:</span>
                                                    <span><a href="#" class = "BASKET_PRODUCT_store"></a></span>
                                                </li>
                                                <!--<li class="cart-product__info-item">
                                                    <span>Модель:</span>
                                                    <span><a href="#">Magic Dreams</a></span>
                                                </li>-->
                                                <li class="cart-product__info-item">
                                                    <span>Артикул:</span>
                                                    <span><a href="#" class = "BASKET_PRODUCT_articul"></a></span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="cart-product__delete BASKET_PRODUCT_delete">
                                            <svg class="BASKET_PRODUCT_delete" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle class="BASKET_PRODUCT_delete" cx="10" cy="10" r="10" fill="#E0001A" fill-opacity="0.5"/>
                                                <path class="BASKET_PRODUCT_delete" fill-rule="evenodd" clip-rule="evenodd" d="M6.22776 6.22776C6.28001 6.17537 6.34208 6.13381 6.41042 6.10545C6.47876 6.0771 6.55202 6.0625 6.62601 6.0625C6.69999 6.0625 6.77325 6.0771 6.84159 6.10545C6.90993 6.13381 6.972 6.17537 7.02426 6.22776L10.001 9.20563L12.9778 6.22776C13.0301 6.17546 13.0921 6.13397 13.1605 6.10567C13.2288 6.07736 13.302 6.06279 13.376 6.06279C13.45 6.06279 13.5232 6.07736 13.5915 6.10567C13.6599 6.13397 13.722 6.17546 13.7743 6.22776C13.8266 6.28005 13.868 6.34214 13.8963 6.41047C13.9246 6.47881 13.9392 6.55204 13.9392 6.62601C13.9392 6.69997 13.9246 6.77321 13.8963 6.84154C13.868 6.90987 13.8266 6.97196 13.7743 7.02426L10.7964 10.001L13.7743 12.9778C13.8266 13.0301 13.868 13.0921 13.8963 13.1605C13.9246 13.2288 13.9392 13.302 13.9392 13.376C13.9392 13.45 13.9246 13.5232 13.8963 13.5915C13.868 13.6599 13.8266 13.722 13.7743 13.7743C13.722 13.8266 13.6599 13.868 13.5915 13.8963C13.5232 13.9246 13.45 13.9392 13.376 13.9392C13.302 13.9392 13.2288 13.9246 13.1605 13.8963C13.0921 13.868 13.0301 13.8266 12.9778 13.7743L10.001 10.7964L7.02426 13.7743C6.97196 13.8266 6.90987 13.868 6.84154 13.8963C6.77321 13.9246 6.69997 13.9392 6.62601 13.9392C6.55204 13.9392 6.47881 13.9246 6.41047 13.8963C6.34214 13.868 6.28005 13.8266 6.22776 13.7743C6.17546 13.722 6.13397 13.6599 6.10567 13.5915C6.07736 13.5232 6.06279 13.45 6.06279 13.376C6.06279 13.302 6.07736 13.2288 6.10567 13.1605C6.13397 13.0921 6.17546 13.0301 6.22776 12.9778L9.20563 10.001L6.22776 7.02426C6.17537 6.972 6.13381 6.90993 6.10545 6.84159C6.0771 6.77325 6.0625 6.69999 6.0625 6.62601C6.0625 6.55202 6.0771 6.47876 6.10545 6.41042C6.13381 6.34208 6.17537 6.28001 6.22776 6.22776Z" fill="white"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="cart-product__footer">
                                        <span class="quantity cart-product__quantity">
                                            <span class="quantity__title">Кол-во:</span>
                                                <span class="quantity__input-wrap">
                                                    <span class="quantity__operation quantity__operation--plus BASKET_PRODUCT_plus">+</span>
                                                    <input type="number" class="quantity__input BASKET_PRODUCT_count" value="1">
                                                    <span class="quantity__operation quantity__operation--minus BASKET_PRODUCT_minus">-</span>
                                                </span>
                                            </span>
                                        <div class="cart-product__total">
                                            <span class="price cart-product__price">
                                                <strike class="price__previous"><span class = "BASKET_PRODUCT_price"></span> <span class="currency">тг.</span></strike>
                                                <span class="price__special"><span class = "BASKET_PRODUCT_price_2"></span> <span class="currency">тг.</span></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="cart__total">
                        <button data-dismiss="modal" aria-label="Close" class="button btn-outline-grey rounded cart__continue">Продолжить покупки</button>
                        <div class="cart__total-wrap">
                            <span class="price">
                                <span class="price__current"><span class = "BASKET_PRODUCT_final_price"></span> <span class="currency">тг.</span></span>
                            </span>
                            {{--                            <form action="{{ route('orderPost') }}" class="order__form row" method="POST">--}}
                            {{--                                @csrf--}}

                            <input type="hidden" name="products" class = 'ALL_ORDERS'>
                            <a href="{{ route('orders') }}" type="submit" class="busket_submit button ml-3 btn-primary">Оформить заказ</a>
                            {{--                            </form>--}}
                        </div>
                    </div>
                </div>
                {{--                <div class="modal-footer">--}}
                {{--                    <div class="together bg-light modal__together">--}}
                {{--                        <div class="container">--}}
                {{--                            <div class="together__wrap d-flex justify-content-between">--}}
                {{--                                <div class="together__arrow together__arrow--prev">--}}
                {{--                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                        <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>--}}
                {{--                                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>--}}
                {{--                                    </svg>--}}
                {{--                                </div>--}}
                {{--                                <div class="together__content">--}}
                {{--                                    <h2 class="together__title mb-3">Вместе дешевле</h2>--}}
                {{--                                    <ul class="together__items bg-white rounded">--}}
                {{--                                        <li class="together-item together__item">--}}
                {{--                                            <div class="row together-item__wrap m-0">--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6 border-right">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/products/1.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__current">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/categories/18.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__special ml-0">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__total col-12 border-top">--}}
                {{--                                                    <span class="text-dark">Код комплекта: 93982488 8937245</span>--}}
                {{--                                                    <span class="d-flex flex-column align-items-center flex-md-row">--}}
                {{--                                            <span class="price d-flex align-items-center mr-4">--}}
                {{--                                                <span class="price__special">180 800 <span class="currency">тг</span></span>--}}
                {{--                                            </span>--}}
                {{--                                            <span class="btn btn-primary d-flex align-items-center">--}}
                {{--                                                <span>Купить комплект</span>--}}
                {{--                                                <svg class="ml-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                                    <path d="M13.2807 5.42773C12.9881 5.06133 12.5889 4.85898 12.1568 4.85898H11.1697C11.0767 2.32695 9.24198 0.300781 6.99979 0.300781C4.75761 0.300781 2.92284 2.32695 2.82987 4.85898H1.84276C1.41073 4.85898 1.01151 5.06133 0.718935 5.42773C0.349794 5.88711 0.21581 6.52695 0.355263 7.14219L1.53925 12.3594C1.71698 13.1469 2.32948 13.6992 3.02675 13.6992H10.9701C11.6674 13.6992 12.2799 13.1496 12.4576 12.3594L13.6443 7.14219C13.7838 6.52695 13.6498 5.88711 13.2807 5.42773ZM6.99979 1.41641C8.62948 1.41641 9.96386 2.94219 10.0514 4.85898H3.94823C4.03573 2.94492 5.37011 1.41641 6.99979 1.41641ZM12.556 6.89336L11.3721 12.1133C11.3119 12.3813 11.1396 12.5836 10.9728 12.5836H3.02675C2.85995 12.5836 2.68768 12.3813 2.62753 12.1133L1.44354 6.89336C1.38065 6.61719 1.34237 5.97461 1.84276 5.97461H12.1568C12.6955 5.97461 12.6189 6.61719 12.556 6.89336Z" fill="white"/>--}}
                {{--                                                    <path d="M4.22969 7.08472C3.9207 7.08472 3.67188 7.33354 3.67188 7.64253V11.1289C3.67188 11.4378 3.9207 11.6867 4.22969 11.6867C4.53867 11.6867 4.7875 11.4378 4.7875 11.1289V7.64253C4.79023 7.33628 4.53867 7.08472 4.22969 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M6.93428 7.08472C6.62529 7.08472 6.37646 7.33354 6.37646 7.64253V11.1289C6.37646 11.4378 6.62529 11.6867 6.93428 11.6867C7.24326 11.6867 7.49209 11.4378 7.49209 11.1289V7.64253C7.49209 7.33628 7.24053 7.08472 6.93428 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M9.63594 7.08472C9.32695 7.08472 9.07812 7.33354 9.07812 7.64253V11.1289C9.07812 11.4378 9.32695 11.6867 9.63594 11.6867C9.94492 11.6867 10.1937 11.4378 10.1937 11.1289V7.64253C10.1937 7.33628 9.94492 7.08472 9.63594 7.08472Z" fill="white"/>--}}
                {{--                                                </svg>--}}
                {{--                                            </span>--}}
                {{--                                        </span>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="together-item together__item">--}}
                {{--                                            <div class="row together-item__wrap m-0">--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6 border-right">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/products/1.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__current">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/categories/18.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__special ml-0">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__total col-12 border-top">--}}
                {{--                                                    <span class="text-dark">Код комплекта: 93982488 8937245</span>--}}
                {{--                                                    <span class="d-flex flex-column align-items-center flex-md-row">--}}
                {{--                                            <span class="price d-flex align-items-center mr-4">--}}
                {{--                                                <span class="price__special">180 800 <span class="currency">тг</span></span>--}}
                {{--                                            </span>--}}
                {{--                                            <span class="btn btn-primary d-flex align-items-center">--}}
                {{--                                                <span>Купить комплект</span>--}}
                {{--                                                <svg class="ml-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                                    <path d="M13.2807 5.42773C12.9881 5.06133 12.5889 4.85898 12.1568 4.85898H11.1697C11.0767 2.32695 9.24198 0.300781 6.99979 0.300781C4.75761 0.300781 2.92284 2.32695 2.82987 4.85898H1.84276C1.41073 4.85898 1.01151 5.06133 0.718935 5.42773C0.349794 5.88711 0.21581 6.52695 0.355263 7.14219L1.53925 12.3594C1.71698 13.1469 2.32948 13.6992 3.02675 13.6992H10.9701C11.6674 13.6992 12.2799 13.1496 12.4576 12.3594L13.6443 7.14219C13.7838 6.52695 13.6498 5.88711 13.2807 5.42773ZM6.99979 1.41641C8.62948 1.41641 9.96386 2.94219 10.0514 4.85898H3.94823C4.03573 2.94492 5.37011 1.41641 6.99979 1.41641ZM12.556 6.89336L11.3721 12.1133C11.3119 12.3813 11.1396 12.5836 10.9728 12.5836H3.02675C2.85995 12.5836 2.68768 12.3813 2.62753 12.1133L1.44354 6.89336C1.38065 6.61719 1.34237 5.97461 1.84276 5.97461H12.1568C12.6955 5.97461 12.6189 6.61719 12.556 6.89336Z" fill="white"/>--}}
                {{--                                                    <path d="M4.22969 7.08472C3.9207 7.08472 3.67188 7.33354 3.67188 7.64253V11.1289C3.67188 11.4378 3.9207 11.6867 4.22969 11.6867C4.53867 11.6867 4.7875 11.4378 4.7875 11.1289V7.64253C4.79023 7.33628 4.53867 7.08472 4.22969 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M6.93428 7.08472C6.62529 7.08472 6.37646 7.33354 6.37646 7.64253V11.1289C6.37646 11.4378 6.62529 11.6867 6.93428 11.6867C7.24326 11.6867 7.49209 11.4378 7.49209 11.1289V7.64253C7.49209 7.33628 7.24053 7.08472 6.93428 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M9.63594 7.08472C9.32695 7.08472 9.07812 7.33354 9.07812 7.64253V11.1289C9.07812 11.4378 9.32695 11.6867 9.63594 11.6867C9.94492 11.6867 10.1937 11.4378 10.1937 11.1289V7.64253C10.1937 7.33628 9.94492 7.08472 9.63594 7.08472Z" fill="white"/>--}}
                {{--                                                </svg>--}}
                {{--                                            </span>--}}
                {{--                                        </span>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="together-item together__item">--}}
                {{--                                            <div class="row together-item__wrap m-0">--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6 border-right">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/products/1.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__current">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__product col-12 col-lg-6">--}}
                {{--                                                    <div class="product-card product-card--vertical">--}}
                {{--                                                        <article class="product-card__wrap">--}}
                {{--                                                            <a href="#" class="product-card__link">--}}
                {{--                                                                <div class="product-card__image">--}}
                {{--                                                                    <img src="{{ asset('img/categories/18.png') }}" alt="Product image" />--}}
                {{--                                                                </div>--}}
                {{--                                                                <div class="product-card__content product-card__content--wp">--}}
                {{--                                                                    <h4 class="product-card__title">Стол для детей</h4>--}}
                {{--                                                                    <span class="product-card__vendor">E-LIRA Белорусская мебель</span>--}}
                {{--                                                                    <div class="price product-card__price">--}}
                {{--                                                                        <span class="price__special ml-0">90 400 <span class="price__currency">тг</span></span>--}}
                {{--                                                                    </div>--}}
                {{--                                                                </div>--}}
                {{--                                                            </a>--}}
                {{--                                                        </article>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="together-item__total col-12 border-top">--}}
                {{--                                                    <span class="text-dark">Код комплекта: 93982488 8937245</span>--}}
                {{--                                                    <span class="d-flex flex-column align-items-center flex-md-row">--}}
                {{--                                            <span class="price d-flex align-items-center mr-4">--}}
                {{--                                                <span class="price__special">180 800 <span class="currency">тг</span></span>--}}
                {{--                                            </span>--}}
                {{--                                            <span class="btn btn-primary d-flex align-items-center">--}}
                {{--                                                <span>Купить комплект</span>--}}
                {{--                                                <svg class="ml-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                                    <path d="M13.2807 5.42773C12.9881 5.06133 12.5889 4.85898 12.1568 4.85898H11.1697C11.0767 2.32695 9.24198 0.300781 6.99979 0.300781C4.75761 0.300781 2.92284 2.32695 2.82987 4.85898H1.84276C1.41073 4.85898 1.01151 5.06133 0.718935 5.42773C0.349794 5.88711 0.21581 6.52695 0.355263 7.14219L1.53925 12.3594C1.71698 13.1469 2.32948 13.6992 3.02675 13.6992H10.9701C11.6674 13.6992 12.2799 13.1496 12.4576 12.3594L13.6443 7.14219C13.7838 6.52695 13.6498 5.88711 13.2807 5.42773ZM6.99979 1.41641C8.62948 1.41641 9.96386 2.94219 10.0514 4.85898H3.94823C4.03573 2.94492 5.37011 1.41641 6.99979 1.41641ZM12.556 6.89336L11.3721 12.1133C11.3119 12.3813 11.1396 12.5836 10.9728 12.5836H3.02675C2.85995 12.5836 2.68768 12.3813 2.62753 12.1133L1.44354 6.89336C1.38065 6.61719 1.34237 5.97461 1.84276 5.97461H12.1568C12.6955 5.97461 12.6189 6.61719 12.556 6.89336Z" fill="white"/>--}}
                {{--                                                    <path d="M4.22969 7.08472C3.9207 7.08472 3.67188 7.33354 3.67188 7.64253V11.1289C3.67188 11.4378 3.9207 11.6867 4.22969 11.6867C4.53867 11.6867 4.7875 11.4378 4.7875 11.1289V7.64253C4.79023 7.33628 4.53867 7.08472 4.22969 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M6.93428 7.08472C6.62529 7.08472 6.37646 7.33354 6.37646 7.64253V11.1289C6.37646 11.4378 6.62529 11.6867 6.93428 11.6867C7.24326 11.6867 7.49209 11.4378 7.49209 11.1289V7.64253C7.49209 7.33628 7.24053 7.08472 6.93428 7.08472Z" fill="white"/>--}}
                {{--                                                    <path d="M9.63594 7.08472C9.32695 7.08472 9.07812 7.33354 9.07812 7.64253V11.1289C9.07812 11.4378 9.32695 11.6867 9.63594 11.6867C9.94492 11.6867 10.1937 11.4378 10.1937 11.1289V7.64253C10.1937 7.33628 9.94492 7.08472 9.63594 7.08472Z" fill="white"/>--}}
                {{--                                                </svg>--}}
                {{--                                            </span>--}}
                {{--                                        </span>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                    <div class="together__controls">--}}
                {{--                                        <div class="together__dots">--}}

                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="together__arrow together__arrow--next">--}}
                {{--                                    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                {{--                                        <circle cx="18.5" cy="18.5" r="18.5" fill="white"/>--}}
                {{--                                        <path d="M14.2929 18.2929C13.9024 18.6834 13.9024 19.3166 14.2929 19.7071L20.6569 26.0711C21.0474 26.4616 21.6805 26.4616 22.0711 26.0711C22.4616 25.6805 22.4616 25.0474 22.0711 24.6569L16.4142 19L22.0711 13.3431C22.4616 12.9526 22.4616 12.3195 22.0711 11.9289C21.6805 11.5384 21.0474 11.5384 20.6569 11.9289L14.2929 18.2929ZM16 18L15 18L15 20L16 20L16 18Z" fill="black"/>--}}
                {{--                                    </svg>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endif
