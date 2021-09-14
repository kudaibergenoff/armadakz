<label class="mdb-main-label">Тип публикации</label>
<select name="type_id" class="form-control" required>
    @foreach($types as $type)
        <option value="{{ $type->id }}" @if(isset($data) and $data->type_id == $type->id) selected @endif>{{ $type->title }}</option>
    @endforeach
</select>
