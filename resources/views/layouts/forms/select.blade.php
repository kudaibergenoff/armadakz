<label>@isset($label) {{ $label }} @endisset</label>
<select class="form-control @isset($class) {{ $class }} @endisset" name="{{ $name }}" @isset($search) @if($search) searchable="Поиск.." @endif @endisset @isset($required) @if($required) required @endif @endisset>
    @isset($options)
        <option value="" selected>Сделайте выбор</option>
        @foreach($options as $key=>$option)
            <option @if($key == $selected) selected @endif value="{{ $key }}">{{ $option }}</option>
        @endforeach
    @endisset
</select>
