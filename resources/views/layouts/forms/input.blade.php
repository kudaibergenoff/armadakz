@isset($label)
    <label for="{{ $name }}">{!! $label !!}</label>
@endisset

@isset($show_password)
    @if($show_password)
        <div class="show_hide_password position-relative">
            <div class="password-view">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
    @endif
@endisset

<input
    @isset($array) name="{{ $name."[]" }}" @else name="{{ $name }}" @endisset
    @isset($type) type="{{ $type }}" @else type="text" @endisset
    @isset($id) id="{{ $id }}" @else id="{{ $name }}" @endisset
    @isset($class) class="{{ $class }}" @else class="form-control" @endisset
    @isset($value) value="{!! $value !!}" @else @if(!isset($array)) value="{!! $data->$name ?? old($name) !!}" @endif @endisset
    @isset($pattern) pattern="{{ $pattern }}" @else @isset($length) pattern="[\D\d\s]{0,{{ $length }}}" @else pattern="[\D\d\s]{0,190}" @endisset @endisset
    @isset($length) length="{{ $length }}" @endisset
    @isset($length) maxlength="{{ $length }}" @endisset
    @isset($min) min="{{ $min }}" @endisset
    @isset($max) max="{{ $max }}" @endisset

    @isset($data_attributes)
        @foreach($data_attributes as $key=>$data_attribute)
            {{ $key }}="{{ $data_attribute }}"
        @endforeach
    @endisset

    @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    @isset($required) required @endisset
    @isset($other) {{ $other }} @endisset
>

@isset($show_password)
    @if($show_password)
        </div>
    @endif
@endisset

@isset($small)
    <small>{!! $small !!}</small>
@endisset

@isset($required)
<div class="invalid-feedback">
    Поле заполнено неправильно
</div>
@endisset

@php
    $label = null; $data = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $other = null;
@endphp
