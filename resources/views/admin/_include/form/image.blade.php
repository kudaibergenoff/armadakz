<div class="imgUp">
    <p class="font-weight-bold">Изображение <span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span></p>
    <div class="imagePreview" style="background-image: url(@isset($item) {{ $item->getImage() }} @else /admin/img/no-logo.png @endisset);"></div>
    <label class="btn btn-primary">
        @isset($item) Изменить @else Добавить @endisset<input type="file" name="image" class="uploadFile img" value="@isset($item){{ $item->image }}@else Добавить фото @endisset" style="width: 0px;height: 0px;overflow: hidden;" @empty($item) required @endempty>
    </label>
</div>
