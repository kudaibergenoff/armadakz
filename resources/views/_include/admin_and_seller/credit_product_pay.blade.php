<label class="mdb-main-label" for="pay_ids">Оплата</label>
<select name="pay_ids[]" id="pay_ids" class="form-control js-example-basic-multiple" multiple required>
    @foreach($pays as $pay)
        <option value="{{ $pay->id }}" @if(isset($data) and is_array($data->pay_ids) and in_array($pay->id,$data->pay_ids)) selected @endif>
            {{ $pay->title }}
        </option>
    @endforeach
</select>
