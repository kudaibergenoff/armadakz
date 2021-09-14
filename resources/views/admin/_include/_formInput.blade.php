<div class="">
    @isset($label)
        <label for="{{ $data }}">
            @if(isset($lang) and $lang != false) <img src="/admin/img/flag-{{ $lang }}.png" width="18px" alt="">  @endif
            {{ $label }}
            @isset($required) <span class="text-danger">*</span> @endisset
        </label>
    @endisset
    <input
        @isset($type) type="{{ $type }}" @else type="text" @endisset
        @isset($id) id="{{ $id }}" @else id="{{ $data }}" @endisset
        @isset($name) name="{{ $name }}" @else name="{{ $data }}" @endisset
        @isset($class) class="{{ $class }}" @else class="form-control" @endisset
        @isset($value) value="{{ $value }}" @else value="{{ $item->$data ?? old($data) }}" @endisset
        @isset($pattern) pattern="{{ $pattern }}" @else @isset($length) pattern="[\D\d\s]{1,{{ $length }}}" @else pattern="[\D\d\s]" @endisset @endisset
        @isset($length) length="{{ $length }}" @endisset

        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @isset($required) required @endisset
        @isset($other) {{ $other }} @endisset
    >
</div>

@php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
