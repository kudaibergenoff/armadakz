<aside class="filters filters--hidden col-12 col-md-3">
    <form action="{{ route('seller.orders.index') }}">
{{--        @csrf--}}
        <div class="filters__header p-4 d-flex border-bottom align-items-center justify-content-between">
            <b>Фильтр</b>
            <div class="filters__close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.50776 5.50008L10.7909 1.21668C11.0697 0.938066 11.0697 0.48758 10.7909 0.208963C10.5123 -0.0696543 10.0619 -0.0696543 9.78324 0.208963L5.49993 4.49236L1.21676 0.208963C0.938014 -0.0696543 0.487668 -0.0696543 0.209056 0.208963C-0.0696855 0.48758 -0.0696855 0.938066 0.209056 1.21668L4.49224 5.50008L0.209056 9.78348C-0.0696855 10.0621 -0.0696855 10.5126 0.209056 10.7912C0.347906 10.9302 0.530471 11 0.712906 11C0.895341 11 1.07778 10.9302 1.21676 10.7912L5.49993 6.5078L9.78324 10.7912C9.92222 10.9302 10.1047 11 10.2871 11C10.4695 11 10.652 10.9302 10.7909 10.7912C11.0697 10.5126 11.0697 10.0621 10.7909 9.78348L6.50776 5.50008Z" fill="#1C2021"/>
                </svg>
            </div>
        </div>
    {{--    <div class="filters__search border-bottom">--}}
    {{--        <p class="font-weight-semibold">Заказчик</p>--}}
    {{--        <form id="alphabet" action="#" class="search search--alphabet mt-3">--}}
    {{--            <input type="text" placeholder="Поиск">--}}
    {{--            <button type="submit">--}}
    {{--                <img src="{{ asset('img/svg/search.svg') }}" alt="Search">--}}
    {{--            </button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
        <div class="filters__checkbox-group mt-3 mb-4">
            <p class="font-weight-semibold">Статус</p>
            <div class="custom-scrollbar default-skin" style="max-height: 340px">
                <ul class="list-style-none mb-b p-0">
                    @foreach($statuses as $status)
                        <li class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" name="status_id[]" id="vendor-{{ $loop->iteration }}" class="custom-control-input" value="{{ $status->id }}"
                                @if((!$request->has('status_id') and $status->id == \App\Models\OrderStatus::EXPECT) or ($request->has('status_id') and in_array($status->id,$request->status_id) )) checked @endif
                            >
                            <label for="vendor-{{ $loop->iteration }}" class="custom-control-label">{{ $status->title_ru }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
{{--        <div class="price-range filters__price">--}}
{{--            <p class="font-weight-semibold">Цена</p>--}}
{{--            <div class="price-range__values">--}}
{{--                <input type="number" min="0" max="9900" value="6" onchange="validity.valid||(value='0');" id="min_price" class="price-range-field bg-light border-0 rounded" />--}}
{{--                <span></span>--}}
{{--                <input type="number" min="0" max="60000" value="60000" onchange="validity.valid||(value='10000');" id="max_price" class="price-range-field bg-light border-0 rounded" />--}}
{{--            </div>--}}
{{--            <div id="slider-range" class="price-range__slider price-filter-range" name="rangeInput"></div>--}}
{{--        </div>--}}

        <div class="filters__checkbox-group mt-4">
            <p class="font-weight-semibold">Дата</p>
            <div>
                @include('layouts.forms.input',[
                            'name'=>'period',
                            'class'=>'form-control picker__input',
                            'placeholder'=>'Выберите период...',
                            'required'=>true,
                            'data_attributes' => [
                                'data-route' => route('admin.orders.index')
                            ]
                        ])
                {{--                                <button class="button btn-sm btn-success products__add mr-2 mb-2">Добавить</button>--}}
                {{--                                <button class="button btn-sm btn-primary products__remove mr-2 mb-2">Удалить выделенное</button>--}}
                {{--                                <button class="button btn-sm btn-light products__filter mr-2 mb-2">Фильтр</button>--}}
            </div>
        </div>

        <button type="submit" class="button btn-primary my-4 mr-4 float-right">Применить</button>
    </form>
</aside>
