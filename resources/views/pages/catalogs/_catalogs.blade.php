<section class="container catalog page-catalog__catalog mb-5">
    <div class="row">
        <aside class="filters catalog__filters col-12 col-md-3">
            <form action="{{ route('subcatalog',['slug'=>$subcatalog->slug]) }}" method="GET">
                <div class="filters__header p-4 d-flex d-lg-none border-bottom align-items-center justify-content-between">
                    <b>Фильтр</b>
                    <div class="filters__close">
                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.50776 5.50008L10.7909 1.21668C11.0697 0.938066 11.0697 0.48758 10.7909 0.208963C10.5123 -0.0696543 10.0619 -0.0696543 9.78324 0.208963L5.49993 4.49236L1.21676 0.208963C0.938014 -0.0696543 0.487668 -0.0696543 0.209056 0.208963C-0.0696855 0.48758 -0.0696855 0.938066 0.209056 1.21668L4.49224 5.50008L0.209056 9.78348C-0.0696855 10.0621 -0.0696855 10.5126 0.209056 10.7912C0.347906 10.9302 0.530471 11 0.712906 11C0.895341 11 1.07778 10.9302 1.21676 10.7912L5.49993 6.5078L9.78324 10.7912C9.92222 10.9302 10.1047 11 10.2871 11C10.4695 11 10.652 10.9302 10.7909 10.7912C11.0697 10.5126 11.0697 10.0621 10.7909 9.78348L6.50776 5.50008Z" fill="#1C2021"/>
                        </svg>
                    </div>
                </div>
                <div class="filters__search border-bottom">
                    <p class="font-weight-semibold">Поиск</p>
                    <div class="search search--alphabet mt-3">
                        <input type="text" name="q" placeholder="Поиск" value="@isset($_GET['q']){{ $_GET['q'] }}@endisset">
                        <button type="submit">
                            <img src="{{ asset('img/svg/search.svg') }}" alt="Search">
                        </button>
                    </div>
                </div>
                <div class="filters__checkbox-group py-4 mb-4">
                    <p class="font-weight-semibold">Производитель</p>
                    <div class="custom-scrollbar default-skin" style="max-height: 340px">
                        <ul class="list-style-none mb-b p-0">
                            @foreach($stores as $store)
                                @if($store->activeProducts->count() > 0)
                                    <li class="custom-control custom-checkbox mb-2"><!-- filter-apply  -->
                                        <input type="checkbox" name="store[]" value="{{ $store->id }}" id="vendor-{{ $store->id }}" class="custom-control-input" @if(isset($_GET['store']) and in_array($store->id,$_GET['store'])) checked @endif>
                                        <label for="vendor-{{ $store->id }}" class="custom-control-label">{{ $store->title }}</label>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="price-range filters__price">
                    <p class="font-weight-semibold">Цена</p>
                    <div class="price-range__values">
                        <input type="number" name="price_min" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" onchange="validity.valid||(value='{{ $minPrice }}');" id="min_price" class="price-range-field bg-light border-0 rounded" />
                        <span></span>
                        <input type="number" name="price_max" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" onchange="validity.valid||(value='{{ $maxPrice }}');" id="max_price" class="price-range-field bg-light border-0 rounded" />
                    </div>
                    <div id="slider-range" class="price-range__slider price-filter-range" data-min="{{ $minPrice }}" data-max="{{ $maxPrice }}" data-selected-min="{{ $_GET['price_min'] ?? $minPrice }}" data-selected-max="{{ $_GET['price_max'] ?? $maxPrice }}" name="rangeInput"></div>
                </div>
                @if(count($countries) > 0)
                <div class="filters__checkbox-group mt-4">
                    <p class="font-weight-semibold">Страна производитель</p>
                    <div class="custom-scrollbar default-skin" style="max-height: 340px">
                        <ul class="list-style-none mb-b p-0">
                            @foreach($countries as $country)
                                <li class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" name="country[]" value="{{ $country->id }}" id="vendor-{{ $country->id }}" class="custom-control-input" @if(isset($_GET['country']) and in_array($country->id,$_GET['country'])) checked @endif>
                                    <label for="vendor-{{ $country->id }}" class="custom-control-label">{{ $country->title_ru }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <button class="button btn-primary d-lg-none my-4 mr-4 float-right">Применить</button>
            </form>
        </aside>
        <div class="catalog__content col-12 col-lg-9">
            <div class="catalog__header d-none d-lg-flex align-items-center justify-content-end">
                <label for="select_filter" class="select_label mb-0 mr-4">Сортировка:</label>
                <select class="form-control w-auto bg-light border-0" id="select_filter" onchange="window.location.href=this.options[this.selectedIndex].value">
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug,'price'=>'down']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'down') selected @endif>Цены по убыванию</option>
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug,'price'=>'up']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'up') selected @endif>Цены по возрастанию</option>
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug]) }}" @if(!isset($_GET['price'])) selected @endif>Без сортировки</option>
                </select>
            </div>
            <div class="orders__sort d-block d-lg-none col-12">
                <div class="orders__sort-title filters__open">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.465 0H0.536692C0.24082 0 0.000976562 0.239843 0.000976562 0.535715V3.21423C0.00100795 3.36603 0.0654495 3.5107 0.178293 3.61227L5.35804 8.27397V14.464C5.35791 14.7599 5.59763 14.9998 5.8935 15C5.97671 15 6.05879 14.9807 6.13322 14.9435L9.34745 13.3364C9.52906 13.2456 9.64379 13.06 9.64369 12.8569V8.27397L14.8234 3.61334C14.9366 3.51155 15.001 3.36643 15.0008 3.21423V0.535715C15.0007 0.239843 14.7609 0 14.465 0ZM13.9293 2.97583L8.74958 7.63646C8.63646 7.73826 8.57201 7.88337 8.57227 8.03557V12.5259L6.42944 13.5973V8.03557C6.4294 7.88378 6.36496 7.73911 6.25212 7.63756L1.07238 2.97583V1.0714H13.9293V2.97583Z" fill="#121313"/>
                    </svg>
                    <span>Фильтр</span>
                </div>
                <select class="browser-default custom-select" onchange="window.location.href=this.options[this.selectedIndex].value">
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug]) }}" @if(!isset($_GET['price'])) selected @endif>Без сортировки</option>
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug,'price'=>'down']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'down') selected @endif>Цены по убыванию</option>
                    <option value="{{ route('subcatalog',['slug'=>$subcatalog->slug,'price'=>'up']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'up') selected @endif>Цены по возрастанию</option>
                </select>
            </div>
            <ul class="catalog__items justify-content-center justify-content-md-start row list-style-none p-0 mb-0">
                @foreach($products as $product)
                    @include('pages.home.__card',['item'=>$product,'col'=>true])
                @endforeach
            </ul>
            @include('layouts._paginate',['pagination'=>$products])
        </div>
    </div>
</section>

