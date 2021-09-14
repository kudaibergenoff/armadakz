<label>
    @isset($lang) <img src="/admin/img/flag-{{ $lang }}.png" width="18px" alt="">  @endisset
    {{ $label }}
    @isset($item->$data)
        <a href="{{ $item->getFile($data) }}" class="text-primary" download>
            <i class="far fa-file-pdf"></i>
        </a>
    @endisset
</label>
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="{{ $data }}" id="{{ $data }}" aria-describedby="{{ $data }}" accept=".pdf"  @isset($required) @empty($item->$data) required @endempty @endisset>
        <label class="custom-file-label" for="{{ $data }}">@isset($item->$data) {{ $item->$data }} @else Выберите файл @endisset</label>
    </div>
</div>
