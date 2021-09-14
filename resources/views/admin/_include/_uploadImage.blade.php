<div class="row imgWrap mb-4">
    @if(isset($data) and $data->images != null and count($data->images) > 0)
        @foreach($data->images as $image)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 imgUp">
                <div class="imagePreview" style="background-image: url({{ "/storage/".$image ?? asset('/img/noimg.jpg') }})"></div>
                <input type="hidden" name="{{ $imgName ?? 'images' }}[]" value="{{ $image }}">
                <label class="button btn-primary image-load">
                    Загрузить
                    <input type="file" class="uploadFile img" value="Загрузить фото" style="width: 0px;height: 0px;overflow: hidden;" accept=".png, .jpg, .jpeg">
                </label>
                @if($loop->iteration > 1)
                    <i class="fa fa-times del"></i>
                @endif
            </div>
        @endforeach
    @else
        <div class="col-12 col-sm-6 col-md-4 col-lg-2 imgUp">
            <div class="imagePreview" style="background-image: url({{ asset('/img/noimg.jpg') }})"></div>
            <input type="hidden" name="{{ $imgName ?? 'images' }}[]" value="">
            <label class="button btn-primary image-load">
                Загрузить
                <input type="file" class="uploadFile img" value="Загрузить фото" style="width: 0px;height: 0px;overflow: hidden;" accept=".png, .jpg, .jpeg">
            </label>
        </div>
    @endif
    <i class="fa fa-plus imgAdd"></i>
</div>
