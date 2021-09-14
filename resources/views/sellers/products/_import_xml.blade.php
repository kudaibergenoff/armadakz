<form action="{{ route('sellerimportxmldatapost') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-6">
            <input type="file" name="file" class="form-control">
        </div>

        <div class="col-md-6">
            <button type="submit" class="btn btn-success">Загрузить</button>
        </div>

    </div>
</form>
