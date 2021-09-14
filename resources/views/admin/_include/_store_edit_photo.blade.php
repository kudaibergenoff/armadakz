@php
    if(!isset($photos) or $photos->count() == 0)
    {
        if(isset($params['N_Photo']) and is_numeric($params['N_Photo']))
        {
            $N_Photo = $params['N_Photo'];
        }
        else
        {
            $N_Photo = 3;
        }

        for ($i = 1; $i <= $N_Photo; $i++)
        {
            $photos[$i] = $i;
        }
    }
@endphp

@if(isset($photos))
    @foreach($photos as $photo)
        <div class="col-sm-2 imgUp">
            <input type="hidden" name="oldPhoto[]" value="@isset($photo->photo){{ $photo->photo }}@endisset">
            <p>Изображение {{ $loop->iteration }} <span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span></p>
            <div class="imagePreview" style="background-image: url(@isset($photo->photo) {{ $photo->getImage('photo') }} @else /admin/img/no-logo.png @endisset);"></div>
            <label class="btn btn-primary">
                @isset($photo->photo) Изменить @else Добавить @endisset<input type="file" name="photo[{{$loop->iteration}}]" class="uploadFile img" value="@isset($photo->photo){{ $photo->photo }}@else Добавить фото @endisset" style="width: 0px;height: 0px;overflow: hidden;">
            </label>
        </div>
    @endforeach
@endif

@if(isset($params['addPhoto']) and $params['addPhoto'] === true)
    <i class="fa fa-plus imgAdd"></i>
@endif
