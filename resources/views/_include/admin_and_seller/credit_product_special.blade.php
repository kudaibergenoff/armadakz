@isset($label)
    <label class="mdb-main-label" for="@isset($name) {{ $name }} @endisset">{!! $label !!}</label><br>
@endisset
<select name="discount" class="form-control" @isset($required) {{ __('required') }} @endisset>
    @foreach($discounts as $discount)
        <option value="{{ $discount->value }}" @if((!isset($data) and $loop->first) or (isset($data) and $data->discount == $discount->value)) selected @endif>
            {{ $discount->value }}
        </option>
    @endforeach
</select>
