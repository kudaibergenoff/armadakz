<label>
    @isset($lang) <img src="/admin/img/flag-{{ $lang }}.png" width="18px" alt="">  @endisset
    {{ $label }} @isset($required) <span class="text-danger">*</span> @endisset @if(isset($item->file) and $item->file != null) <a href="{{ $item->getFile() }}" class="text-primary" target="_blank"><i class="far fa-share-square"></i></a> @endif
</label>
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="{{ $data }}" id="{{ $data }}" aria-describedby="{{ $data }}" accept=".doc,.docx,.pdf,.xls,.xlsx"  @isset($required) @empty($item->$data) required @endempty @endisset>
        <label class="custom-file-label" for="{{ $data }}">@isset($item->$data) {{ $item->$data }} @else Выберите файл @endisset</label>
    </div>
</div>
