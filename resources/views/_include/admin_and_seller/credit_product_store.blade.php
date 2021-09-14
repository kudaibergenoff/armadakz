<label class="mdb-main-label">Продавцы</label>
<select name="store_id" class="form-control js-example-basic-multiple" @if($stores->count() > 0) searchable="Поиск..." @endif @empty($stores) onchange="window.location.href=this.options[this.selectedIndex].value" @endempty required>
    @if($stores->count() > 0)
        <option value="" disabled selected>Выберите из списка</option>
    @endif
    @forelse($stores as $store)
        <option value="{{ $store->id }}" @if(isset($data) and $data->store_id == $store->id) selected @endif>{{ $store->title }}</option>
    @empty
        <option value="{{ route('seller.stores.index') }}">У вас ещё нет магазинов. Добавьте их</option>
    @endforelse
</select>
