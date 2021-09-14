<div class="custom-control custom-checkbox">
    <input type="checkbox"
       class="custom-control-input @isset($class) {{ $class }} @endisset"
       name="{{ $name }}"
       id="{{ $name }}"
       @if(!isset($data) or $data->$name == true) checked @endif
       @isset($required) required @endisset>

    @isset($label)
        <label class="custom-control-label ml-2" for="{{ $name }}">{!! $label !!}</label><br>
    @endisset
</div>
