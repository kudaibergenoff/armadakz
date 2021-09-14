<li class="product-card favorites__item product-card--favorite col-6 col-md-4 mb-3" data-product-id="{{ $item->id }}">
    <article class="product-card__wrap">
        <span class="product-card__header">
            <span class="product-card__stickers">
{{--                @if($loop->iteration == 3 or $loop->iteration == 8)--}}
                {{--                    @if($loop->iteration != 4 or $loop->iteration != 6)--}}
                {{--                        <span class="product-card__sticker product-card__sticker--sale">-8%</span>--}}
                {{--                    @endif--}}

                {{--                    @if($loop->iteration != 2 or $loop->iteration != 7)--}}
                {{--                        <span class="product-card__sticker product-card__sticker--new">Новинка</span>--}}
                {{--                    @endif--}}
                {{--                @endif--}}
            </span>
            <span class="product-card__checkbox">
               <span class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="checked{{ $item->id }}">
                  <label class="custom-control-label" for="checked{{ $item->id }}"></label>
                </span>
            </span>
        </span>
        <a href="{{ route('product',['id' => $item->id, 'slug'=>$item->slug]) }}" class="product-card__link">
            <div class="product-card__image">
                <img src="{{ $item->getImages() }}" alt="{{ ucfirst(strtolower($item->title)) }}" data-zoom-image="{{ $item->getImages() }}">
                {{--                @foreach($item->images as $image)--}}
                {{--                    @if(!$loop->first)--}}
                {{--                        @break--}}
                {{--                    @endif--}}
                {{--                @dd('/storage/'.$image)--}}
                {{--                    <img src="{{ '/storage/'.$image }}" alt="{{ ucfirst(strtolower($item->title)) }}" data-zoom-image="{{ '/storage/'.$image }}">--}}
                {{--                @endforeach--}}

            </div>
            <div class="product-card__content">
                <h4 class="product-card__title">{{ $item->title }}</h4>
                <span class="product-card__vendor">{{ $item->store->title }}</span>
                <div class="price product-card__price">
                    @if($item->discount != null and $item->discount_data_end > now())
                        <strike class="price__previous">{{ number_format($item->price*(1-$item->discount_data_end), 0, ',', ' ') }} <span class="price__currency">тг.</span></strike>
                        <span class="price__special">{{ number_format($item->price, 0, ',', ' ') }} <span class="price__currency">тг.</span></span>
                    @else
                        <span class="price__current">{{ number_format($item->price, 0, ',', ' ') }} <span class="price__currency">тг.</span></span>
                    @endif
                </div>
            </div>
        </a>
        <div class="product-card__add-to-card d-flex align-items-center justify-content-between">
            @auth
                <div class="product-card__add-to-card-button" data-backdrop="false" data-toggle="modal" data-target="#addToBasket">
                    <button class="btn_to_basket btn btn-primary ARMADA_PRODUCT_{{ $item->id }}_CH" data-chosen = 'false' data-product-information='{{ $item->toJson() }}'>
                        <span class="btn_to_basket" data-product-information='{{ $item->toJson() }}'>В корзину</span>
                        <svg class="btn_to_basket" data-product-information='{{ $item->toJson() }}' width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.928974 0.457031H3.69167C3.97878 0.457031 4.22487 0.662109 4.27761 0.943359L5.75417 8.78027H12.1614L13.2864 4.71973H8.37331C8.04226 4.71973 7.77565 4.45312 7.77565 4.12207C7.77565 3.79102 8.04226 3.52441 8.37331 3.52441H14.0716C14.6048 3.52441 14.7278 3.99902 14.6458 4.28027L13.1897 9.53613C13.1194 9.79394 12.8821 9.97266 12.6155 9.97266H5.25905C4.97194 9.97266 4.72585 9.76758 4.67311 9.48633L3.19362 1.65234H0.926044C0.594989 1.65234 0.328388 1.38574 0.328388 1.05469C0.331318 0.723633 0.597919 0.457031 0.928974 0.457031Z" fill="white"/>
                            <path d="M6.65088 10.9717C7.61768 10.9717 8.40283 11.7715 8.40283 12.7588C8.40283 13.7432 7.61768 14.5459 6.65088 14.5459C5.68408 14.5459 4.89892 13.7461 4.89892 12.7588C4.89892 11.7715 5.68408 10.9717 6.65088 10.9717ZM6.65088 13.3477C6.9585 13.3477 7.20752 13.0811 7.20752 12.7559C7.20752 12.4307 6.9585 12.1641 6.65088 12.1641C6.34326 12.1641 6.09424 12.4307 6.09424 12.7559C6.09424 13.084 6.34326 13.3477 6.65088 13.3477Z" fill="white"/>
                            <path d="M11.2881 10.9717C12.2549 10.9717 13.04 11.7715 13.04 12.7588C13.04 13.7432 12.2549 14.5459 11.2881 14.5459C10.3213 14.5459 9.53613 13.7461 9.53613 12.7588C9.53613 11.7715 10.3213 10.9717 11.2881 10.9717ZM11.2881 13.3477C11.5957 13.3477 11.8447 13.0811 11.8447 12.7559C11.8447 12.4307 11.5957 12.1641 11.2881 12.1641C10.9805 12.1641 10.7314 12.4307 10.7314 12.7559C10.7314 13.084 10.9805 13.3477 11.2881 13.3477Z" fill="white"/>
                        </svg>
                    </button>
                </div>
            @else
                <div class="product-card__add-to-card-button" data-toggle="modal" data-target="#login">
                    <button class="btn_to_basket btn btn-primary btn_to_basket ARMADA_PRODUCT_{{ $item->id }}_CH" data-chosen = 'false' data-product-information='{{ $item->toJson() }}'>
                        <span class="btn_to_basket">В корзину</span>
                        <svg class="btn_to_basket" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.928974 0.457031H3.69167C3.97878 0.457031 4.22487 0.662109 4.27761 0.943359L5.75417 8.78027H12.1614L13.2864 4.71973H8.37331C8.04226 4.71973 7.77565 4.45312 7.77565 4.12207C7.77565 3.79102 8.04226 3.52441 8.37331 3.52441H14.0716C14.6048 3.52441 14.7278 3.99902 14.6458 4.28027L13.1897 9.53613C13.1194 9.79394 12.8821 9.97266 12.6155 9.97266H5.25905C4.97194 9.97266 4.72585 9.76758 4.67311 9.48633L3.19362 1.65234H0.926044C0.594989 1.65234 0.328388 1.38574 0.328388 1.05469C0.331318 0.723633 0.597919 0.457031 0.928974 0.457031Z" fill="white"/>
                            <path d="M6.65088 10.9717C7.61768 10.9717 8.40283 11.7715 8.40283 12.7588C8.40283 13.7432 7.61768 14.5459 6.65088 14.5459C5.68408 14.5459 4.89892 13.7461 4.89892 12.7588C4.89892 11.7715 5.68408 10.9717 6.65088 10.9717ZM6.65088 13.3477C6.9585 13.3477 7.20752 13.0811 7.20752 12.7559C7.20752 12.4307 6.9585 12.1641 6.65088 12.1641C6.34326 12.1641 6.09424 12.4307 6.09424 12.7559C6.09424 13.084 6.34326 13.3477 6.65088 13.3477Z" fill="white"/>
                            <path d="M11.2881 10.9717C12.2549 10.9717 13.04 11.7715 13.04 12.7588C13.04 13.7432 12.2549 14.5459 11.2881 14.5459C10.3213 14.5459 9.53613 13.7461 9.53613 12.7588C9.53613 11.7715 10.3213 10.9717 11.2881 10.9717ZM11.2881 13.3477C11.5957 13.3477 11.8447 13.0811 11.8447 12.7559C11.8447 12.4307 11.5957 12.1641 11.2881 12.1641C10.9805 12.1641 10.7314 12.4307 10.7314 12.7559C10.7314 13.084 10.9805 13.3477 11.2881 13.3477Z" fill="white"/>
                        </svg>
                    </button>
                </div>
            @endauth
            <button class="product-card__zoom" data-toggle="modal" data-target="#product-image">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="18" fill="white"/>
                    <path d="M28.2683 27.1494L22.5551 21.4362C25.1581 18.2692 24.981 13.5678 22.0231 10.61C18.8765 7.46335 13.7566 7.46335 10.61 10.61C7.46335 13.7566 7.46335 18.8765 10.61 22.0231C13.567 24.9801 18.2678 25.1592 21.4362 22.5551L27.1494 28.2683C27.4584 28.5772 27.9593 28.5772 28.2682 28.2683C28.5772 27.9593 28.5772 27.4584 28.2683 27.1494ZM20.9042 20.9042C18.3746 23.4339 14.2585 23.4338 11.7289 20.9042C9.19919 18.3745 9.19919 14.2585 11.7289 11.7288C14.2584 9.19927 18.3745 9.19907 20.9042 11.7288C23.4339 14.2585 23.4339 18.3745 20.9042 20.9042Z" fill="black"/>
                    <path d="M20.191 15.5259H17.1085V12.4433C17.1085 12.0063 16.7542 11.6521 16.3173 11.6521C15.8803 11.6521 15.5261 12.0063 15.5261 12.4433V15.5259H12.4435C12.0066 15.5259 11.6523 15.8801 11.6523 16.317C11.6523 16.754 12.0066 17.1082 12.4435 17.1082H15.5261V20.1908C15.5261 20.6278 15.8803 20.982 16.3173 20.982C16.7542 20.982 17.1085 20.6278 17.1085 20.1908V17.1082H20.191C20.628 17.1082 20.9822 16.754 20.9822 16.317C20.9822 15.8801 20.628 15.5259 20.191 15.5259Z" fill="black"/>
                </svg>
            </button>
        </div>
    </article>
</li>
@php $item = null; @endphp


{{--<li class="product-card favorites__item product-card--favorite col-6 col-md-4 mb-3" data-product-id="{{ $item->id }}">--}}
{{--    <article class="product-card__wrap product-card__wrap--no-hover">--}}
{{--        <span class="product-card__header">--}}
{{--            <span class="product-card__stickers">--}}
{{--                @if($loop->iteration == 3 or $loop->iteration == 8)--}}
{{--                    @if($loop->iteration != 4 or $loop->iteration != 6)--}}
{{--                        <span class="product-card__sticker product-card__sticker--sale">-8%</span>--}}
{{--                    @endif--}}

{{--                    @if($loop->iteration != 2 or $loop->iteration != 7)--}}
{{--                        <span class="product-card__sticker product-card__sticker--new">Новинка</span>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--            </span>--}}
{{--            <span class="product-card__checkbox">--}}
{{--               <span class="custom-control custom-checkbox">--}}
{{--                  <input type="checkbox" class="custom-control-input" id="checked{{ $item->id }}">--}}
{{--                  <label class="custom-control-label" for="checked{{ $item->id }}"></label>--}}
{{--                </span>--}}
{{--            </span>--}}
{{--        </span>--}}
{{--        <div class="product-card__link">--}}
{{--            <a href="{{ route('product',['slug'=>$item->slug]) }}" class="product-card__image">--}}
{{--                <img src="{{ $item->getImages() }}" alt="{{ ucfirst(strtolower($item->title)) }}">--}}

{{--                @foreach($item->images as $image)--}}
{{--                    @if($loop->first)--}}
{{--                        <img src="{{ '/storage/'.$image }}" alt="{{ ucfirst(strtolower($item->title)) }}">--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </a>--}}
{{--            <div class="product-card__content">--}}
{{--                <h4 class="product-card__title">--}}
{{--                    <a href="{{ route('product',['slug'=>$item->slug]) }}">{{ $item->title }}</a>--}}
{{--                </h4>--}}
{{--                <span class="product-card__vendor">{{ $item->store->title }}</span>--}}
{{--                <div class="price product-card__price product-card__price--favorite flex-wrap">--}}
{{--                    <span>--}}
{{--                        <strike class="price__previous">98 000 <span class="price__currency">тг</span></strike>--}}
{{--                        <span class="price__special">{{ $item->price }} <span class="price__currency">тг.</span></span>--}}
{{--                    </span>--}}

{{--                    <div class="mt-3 mt-md-0 product-card__add-to-card-button" data-backdrop="false" data-toggle="modal" data-target="#addToBasket">--}}
{{--                        <button class="btn_to_basket ARMADA_PRODUCT_{{ $item->id }}_CH" data-chosen = 'false' data-product-information='{{ $item->toJson() }}'>--}}
{{--                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.71875 0.4375C0.528126 0.4375 0.345309 0.513225 0.210517 0.648017C0.0757252 0.782809 0 0.965626 0 1.15625C0 1.34687 0.0757252 1.52969 0.210517 1.66448C0.345309 1.79927 0.528126 1.875 0.71875 1.875H2.31438L2.89081 4.18506L5.04419 15.6635C5.07502 15.8282 5.16243 15.977 5.29131 16.0841C5.42019 16.1911 5.58243 16.2498 5.75 16.25H7.1875C6.425 16.25 5.69373 16.5529 5.15457 17.0921C4.6154 17.6312 4.3125 18.3625 4.3125 19.125C4.3125 19.8875 4.6154 20.6188 5.15457 21.1579C5.69373 21.6971 6.425 22 7.1875 22C7.95 22 8.68127 21.6971 9.22043 21.1579C9.7596 20.6188 10.0625 19.8875 10.0625 19.125C10.0625 18.3625 9.7596 17.6312 9.22043 17.0921C8.68127 16.5529 7.95 16.25 7.1875 16.25H17.25C16.4875 16.25 15.7562 16.5529 15.2171 17.0921C14.6779 17.6312 14.375 18.3625 14.375 19.125C14.375 19.8875 14.6779 20.6188 15.2171 21.1579C15.7562 21.6971 16.4875 22 17.25 22C18.0125 22 18.7438 21.6971 19.2829 21.1579C19.8221 20.6188 20.125 19.8875 20.125 19.125C20.125 18.3625 19.8221 17.6312 19.2829 17.0921C18.7438 16.5529 18.0125 16.25 17.25 16.25H18.6875C18.8551 16.2498 19.0173 16.1911 19.1462 16.0841C19.2751 15.977 19.3625 15.8282 19.3933 15.6635L21.5496 4.1635C21.569 4.05977 21.5653 3.95303 21.5388 3.85087C21.5123 3.74871 21.4637 3.65364 21.3963 3.57241C21.3289 3.49117 21.2445 3.42577 21.149 3.38085C21.0535 3.33594 20.9493 3.3126 20.8438 3.3125H4.15438L3.57219 0.982312C3.53339 0.826752 3.44369 0.68863 3.31736 0.589911C3.19103 0.491192 3.03533 0.437544 2.875 0.4375H0.71875ZM5.75 19.125C5.75 18.7438 5.90145 18.3781 6.17103 18.1085C6.44062 17.839 6.80625 17.6875 7.1875 17.6875C7.56875 17.6875 7.93438 17.839 8.20397 18.1085C8.47355 18.3781 8.625 18.7438 8.625 19.125C8.625 19.5062 8.47355 19.8719 8.20397 20.1415C7.93438 20.411 7.56875 20.5625 7.1875 20.5625C6.80625 20.5625 6.44062 20.411 6.17103 20.1415C5.90145 19.8719 5.75 19.5062 5.75 19.125ZM15.8125 19.125C15.8125 18.7438 15.964 18.3781 16.2335 18.1085C16.5031 17.839 16.8688 17.6875 17.25 17.6875C17.6312 17.6875 17.9969 17.839 18.2665 18.1085C18.536 18.3781 18.6875 18.7438 18.6875 19.125C18.6875 19.5062 18.536 19.8719 18.2665 20.1415C17.9969 20.411 17.6312 20.5625 17.25 20.5625C16.8688 20.5625 16.5031 20.411 16.2335 20.1415C15.964 19.8719 15.8125 19.5062 15.8125 19.125ZM12.9375 6.90625C12.9375 6.71563 12.8618 6.53281 12.727 6.39802C12.5922 6.26323 12.4094 6.1875 12.2188 6.1875C12.0281 6.1875 11.8453 6.26323 11.7105 6.39802C11.5757 6.53281 11.5 6.71563 11.5 6.90625V9.0625H9.34375C9.15313 9.0625 8.97031 9.13823 8.83552 9.27302C8.70073 9.40781 8.625 9.59063 8.625 9.78125C8.625 9.97187 8.70073 10.1547 8.83552 10.2895C8.97031 10.4243 9.15313 10.5 9.34375 10.5H11.5V12.6562C11.5 12.8469 11.5757 13.0297 11.7105 13.1645C11.8453 13.2993 12.0281 13.375 12.2188 13.375C12.4094 13.375 12.5922 13.2993 12.727 13.1645C12.8618 13.0297 12.9375 12.8469 12.9375 12.6562V10.5H15.0938C15.2844 10.5 15.4672 10.4243 15.602 10.2895C15.7368 10.1547 15.8125 9.97187 15.8125 9.78125C15.8125 9.59063 15.7368 9.40781 15.602 9.27302C15.4672 9.13823 15.2844 9.0625 15.0938 9.0625H12.9375V6.90625Z" fill="#169BD5"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </article>--}}
{{--</li>--}}
{{--@php $item = null; @endphp--}}
