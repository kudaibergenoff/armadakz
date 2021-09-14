<label class="mdb-main-label">Каталог</label>
<select class="form-control js-example-basic-single" name="item_id" required><!-- multiple="multiple" -->
    <option value="" selected>Сделайте выбор</option>
    @foreach($catalogs as $catalog)
        @foreach($subcatalogs->where('catalog_id',$catalog->id) as $subcatalog)
            <optgroup label="{{ $catalog->title }} | {{ $subcatalog->title }}">
                @foreach($items->where('subcatalog_id',$subcatalog->id) as $item)
                    <option value="{{ $item->id }}" @if(isset($data) and $data->item_id == $item->id) selected @endif>{{ $item->title }}</option>
                @endforeach
            </optgroup>
        @endforeach
    @endforeach
</select>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Выберите один или несколько"
            });
        });
    </script>
@endpush
