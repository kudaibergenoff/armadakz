<div class="col-12">
    <h3 class="mt-4">Товары</h3>
    <div class="table-responsive">
        <table class="table table-striped" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>№</th>
                <th>Товар</th>
                <th>Цена</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($products) and $products->count() > 0)
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('admin.products.edit',$product->id) }}">{{ $product->title }}</a></td>
                        <td>{{ $product->price }} тг.</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Товаров ещё нет</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

</div>
