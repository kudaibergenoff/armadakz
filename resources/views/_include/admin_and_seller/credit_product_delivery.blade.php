<label class="mdb-main-label" for="delivery_ids">Доставка</label>
<select name="delivery_ids[]" id="delivery_ids" class="form-control js-example-basic-multiple" multiple required>
    @foreach($deliveries as $delivery)
        <option value="{{ $delivery->id }}" @if(isset($data) and is_array($data->delivery_ids) and in_array($delivery->id,$data->delivery_ids)) selected @endif>
            {{ $delivery->title }}
        </option>
    @endforeach
</select>
