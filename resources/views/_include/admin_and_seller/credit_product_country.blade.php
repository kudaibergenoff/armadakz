<label class="mdb-main-label">Страна производитель</label>
<select name="country_id" class="form-control js-example-basic-multiple" searchable="Поиск...">
    <option value="" disabled selected>Выберите из списка</option>
    @foreach($countries as $country)
        <option value="{{ $country->id }}" @if(isset($data) and $data->country_id == $country->id) selected @endif>{{ $country->title_ru }}</option>
    @endforeach
</select>
