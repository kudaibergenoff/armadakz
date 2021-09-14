<li class="slideshow__item product-card col-6 col-lg-4 col-xxl-3 mb-4">
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
{{--{{ debug($item->id,$likeIds) }}--}}
            <span class="product-card__favorite @if(isset($likeIds) and in_array($item->id,$likeIds)) active @endif" @auth onclick="like({{ $item->id }})" @else data-toggle="modal" data-target="#login" @endauth>
                <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.1579 4.54686L13.5 5.74842L12.8422 4.54688C12.4255 3.78596 11.7299 2.76435 10.7056 1.97259C9.64989 1.1566 8.4672 0.75 7.17188 0.75C3.55333 0.75 0.75 3.69848 0.75 7.77476C0.75 9.93815 1.60865 11.7905 3.22847 13.744C4.8673 15.7204 7.2269 17.7333 10.1555 20.2277L9.66922 20.7986L10.1555 20.2277L10.1559 20.228C11.1449 21.0703 12.2691 22.0279 13.4382 23.0497L13.4384 23.0499C13.4549 23.0644 13.4765 23.0728 13.5 23.0728C13.5235 23.0728 13.545 23.0644 13.5615 23.05L13.5618 23.0497C14.7302 22.0285 15.8538 21.0715 16.8418 20.2299L16.8438 20.2282L16.8438 20.2282C19.7728 17.7336 22.1325 15.7205 23.7715 13.744C25.3914 11.7904 26.25 9.93815 26.25 7.77476C26.25 3.69848 23.4467 0.75 19.8281 0.75C18.5328 0.75 17.3501 1.1566 16.2944 1.97259L15.8358 1.37919L16.2944 1.97259C15.2701 2.76436 14.5745 3.78592 14.1579 4.54686Z" stroke="#FFE605" stroke-width="1.5"/>
                </svg>
            </span>
        </span>
        <a href="{{ route('product',['id'=>$item->id, 'slug' => $item->slug]) }}" class="product-card__link">
            <div class="product-card__image">
                <img src="{{ $item->getImages() }}" alt="{{ ucfirst(strtolower($item->title)) }}" data-zoom-image="{{ $item->getImages() }}">
            </div>
            <div class="product-card__content">
                <h4 class="product-card__title">{{ ucfirst($item->title) }}</h4>
                <span class="product-card__vendor">{{ ucfirst($item->store->title) }}</span>
                <div class="price product-card__price">
                    @if($item->is_discount === 1 and $item->discount != null)
                        <strike class="price__previous">{{ number_format($item->price, 0, ',', ' ') }} <span class="price__currency">тг.</span></strike>
                        <span class="price__special">{{ $item->price*(1-$item->discount/100) }} <span class="price__currency">тг</span></span>
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
                    <button class="btn_to_basket btn btn-primary">
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
