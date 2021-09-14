<label>
    @isset($label)
        <label for="@isset($name) {{ $name }} @endisset">{!! $label !!}</label><br>
    @endisset
    {{ $off ?? 'нет' }}
    <input type="checkbox"
           @isset($attributes)
               @foreach($attributes as $key=>$attribute)
               {{ $key }}="{{ $attribute }}"
               @endforeach
           @endisset
           class="@isset( $class ){{ $class }}@endisset"
           @isset($name)
            name="{{ $name }}"
           @endisset
           @if(isset($data) and $data->$name == true) checked @endif>
           
    <span class="lever"></span>
    {{ $on ?? 'да' }}
</label>
