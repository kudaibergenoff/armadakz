<label class="mdb-main-label">Цвета</label>
<select name="colors[]" class="form-control js-example-basic-multiple" searchable="Поиск..." multiple>
    <option value="" disabled>Выберите из списка</option>
    @foreach($colors as $color)
        <option value="{{ $color->slug }}" @if(isset($data) and is_array($data->colors) and in_array($color->slug,$data->colors)) selected @endif>{{ $color->title_ru }}</option>
    @endforeach
</select>
