<p class="h4 mb-4">Информация о покупателе</p>
<input type="hidden" name="user_id" value="{{ Auth::id() ?? null }}">
<p>
    <label for="fio">Введите Ф.И.О. *</label>
    <input type="text" name="fio" id="fio" class="form-control" placeholder="Ф.И.О. *" value="{{ Auth::check() ? Auth::user()->info->fio() : old('fio') }}" required>
</p>

<div class="form-row mb-4">
    <div class="col">
        <!-- Phone number -->
        <label for="phone">Введите Ваш Телефон</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Телефон *" value="{{ Auth::check() ? Auth::user()->info->phone : old('phone') }}" required>
    </div>
    <p class="col">
        <!-- Phone number -->
        <label for="phone2">Введите Ваш Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email *" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" required>
    </p>
</div>

<p class="h4 mb-4">Укажите адрес доставки</p>

<div class="form-row mb-4">
{{--    <div class="col">--}}
{{--        <label>Введите страну *</label>--}}
{{--        <select class="mdb-select md-form" name="country" searchable="Поиск..." id="country" required>--}}
{{--            <option value="" disabled selected>Выберите страну</option>--}}
{{--            @foreach($countries as $country)--}}
{{--                <option value="1" @if(Auth::check() and Auth::user()->info->city->country_id == $country->id) selected @endif>{{ $country->title_ru }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
    <div class="col-6">
        <label>Введите город *</label>
        <select class="mdb-select md-form" name="city" searchable="Поиск..." id="city" required>
            <option value="1" disabled selected>Алматы</option>
            @foreach($cities as $city)
                <option value="1" @if(Auth::check() and Auth::user()->info->city_id == $city->id) selected @endif>{{ $city->title_ru }}</option>
            @endforeach
        </select>
    </div>
</div>

<p>
    <label for="address">Адрес для доставки товара</label>
    <input type="text" name="address" id="address" class="form-control" placeholder="Адрес *" value="{{ Auth::check() ? Auth::user()->info->delivery_address : old('address') }}" required>
</p>

<p class="form-group">
    <label for="comment">Ваш комментарий к заказу</label>
    <textarea class="form-control" name="comment" id="comment" rows="4" placeholder="Комментарии">{{ old('comment') }}</textarea>
</p>
