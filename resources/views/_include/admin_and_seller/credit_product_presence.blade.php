<label class="mdb-main-label">Наличие</label>
<select name="presence_id" class="form-control" required>
    @foreach($presences as $presence)
        <option value="{{ $presence->id }}" @if((!isset($data) and $loop->first) or (isset($data) and $data->presence_id == $presence->id)) selected @endif>
            {{ $presence->title }}
        </option>
    @endforeach
</select>
