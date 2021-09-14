<ul class="analytics__tabs row">
    <li class="analytics__tab col-6 col-md-3 col-xxl-2">
        <a href="#" class="analytics__tab-wrap analytics__block-style">
            <span class="analytics__tab-title">Товары на витрине</span>
            <div class="analytics__tab-value">{{ $productActiveCount }}</div>
        </a>
    </li>
    <li class="analytics__tab col-6 col-md-3 col-xxl-2 active">
        <a href="#" class="analytics__tab-wrap analytics__block-style">
            <span class="analytics__tab-title">Продаж</span>
            <div class="analytics__tab-value">{{ $allSalesCount }}</div>
        </a>
    </li>
    <li class="analytics__tab col-6 col-md-3 col-xxl-2">
        <a href="#" class="analytics__tab-wrap analytics__block-style">
            <span class="analytics__tab-title">Активные сделки</span>
            <div class="analytics__tab-value">{{ $allOrdersActiveCount }}</div>
        </a>
    </li>
    <li class="analytics__tab col-6 col-md-3 col-xxl-2">
        <a href="#" class="analytics__tab-wrap analytics__block-style">
            <span class="analytics__tab-title">Нет в наличии</span>
            <div class="analytics__tab-value">{{ $productNotActiveCount }}</div>
        </a>
    </li>
</ul>
