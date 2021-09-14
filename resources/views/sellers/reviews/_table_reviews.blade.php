<tr>
    <td>{{ $review->id }}</td>
    <td>
        <a href="{{ route('product',['id' => $review->product->id,'slug'=>$review->product->slug]) }}" target="_blank">{!! $review->product->title !!}</a><br>
        {!! $review->store->title !!}
    </td>
    <td>
        {{ $review->name }}<br>
        {{ $review->email }}
    </td>
    <td style="max-width: 700px;">{{ $review->comment }}</td>
    <td>
        <span class="rating-group rating-group--no-change">
            @foreach([1,2,3,4,5] as $star)
                <label aria-label="{{ $star }} star" class="rating__label" for="rating-{{ $star }}"><i class="rating__icon  @if($review->rating >= $star) rating__icon--star @endif fas fa-star"></i></label>
                <input class="rating__input" name="rating-{{ $star }}" id="rating-{{ $star }}" value="{{ $star }}" type="radio" disabled>
            @endforeach
        </span>
    </td>
    <td>
        <div class="products__status products__status--{{ $review->status->color }}">{{ $review->status->title }}</div>
    </td>
    <td style="white-space: nowrap">
        {{ $review->created_at->format('d.m.Y') }}<br>
        {{ $review->created_at->format('h:i') }}
    </td>
{{--    <td class="text-center" style="width: 200px">--}}
{{--        <form action="{{ route('seller.reviews.update',['id'=>$review->id]) }}" method="POST" enctype="multipart/form-data" class="change-order-status">--}}
{{--            @method('PATCH')--}}
{{--            @csrf--}}
{{--            <select name="status_id" class="mdb-select md-form mx-3 my-0">--}}
{{--                <option value="0" selected disabled>Изменить статус</option>--}}
{{--                @foreach($statuses as $status)--}}
{{--                    <option value="{{ $status->id }}">{{ $status->title }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </form>--}}
{{--    </td>--}}
</tr>
