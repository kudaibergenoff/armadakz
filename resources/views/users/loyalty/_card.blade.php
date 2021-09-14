<li class="order-item orders__item col-12 col-md-6 col-xxl-12">
    <div class="order-item__wrap bg-light rounded" data-order-status="completed"><!-- completed = green, canceled = red, expect = orange, frozen = blue  -->
        <div class="orders__column order-item__number">
            <div class="order-item__title">Номер заказа</div>
            <span class="order-item__status-bar"></span>
            <span>{{ $loyalty->order_id }}</span>
            <div class="order-item__status">{{-- $order->status->title_ru --}}</div>
        </div>
        <div class="orders__column order-item__date">
            <div class="order-item__title">Дата заказа</div>
            <span>{{ $loyalty->created_at->format('d.m.Y') }}</span>
        </div>
        <div class="orders__column order-item__seller">
            <div class="order-item__title">Продавец</div>
            <span>
                <a href="{{ route('shop',$loyalty->store->slug) }}">{{ $loyalty->store->title }}</a>
            </span>
        </div>
        <div class="orders__column order-item__total-price">
            <div class="order-item__title">Баллы</div>
            <span>{{ $loyalty->amt }}</span>
        </div>
        <div class="orders__column order-item__customer">
            <div class="order-item__title">Комментарий</div>
            <span>---</span>
        </div>
        <div class="orders__column order-item__thumbnails">
            <span class="order-item__title">Дата списания</span>
            <span>
                {{ $loyalty->data_end->format('d.m.Y') }}
            </span>
        </div>
    </div>
</li>
