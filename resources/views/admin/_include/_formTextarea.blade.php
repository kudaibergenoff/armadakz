<div class="form-group">
    <label for="{{ $data }}">
        @if(isset($lang) and $lang != false) <img src="/admin/img/flag-{{ $lang }}.png" width="18px" alt="">  @endif
        {{ $label }}
        @isset($required)<span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span>@endisset
    </label>
    <textarea class="form-control rounded-0" name="{{ $data }}" length="{{ $length }}" id="{{ $data }}" @isset($required) required @endisset>@isset($item){{ $item->$data }}@endisset</textarea>
</div>

@php
    $label = null; $data = null; $lang = null; $type = null; $id = null; $class = null; $value = null; $pattern = null; $length = null; $placeholder = null; $required = null; $other = null;
@endphp
