<section class="section advantages page-home__advantages container">
    <div class="advantages__header section__header">
        <h2 class="section__title section__title--dark">Наши преимущества</h2>
    </div>
    <div class="advantages__content section__content">
        <ul class="advantages__items row">
            @foreach([
                    'Более 400+ продавцов'=>'Представлены продавцы с лучшими отзывами и большим выбором товаров',
                    'Удобная доставка'=>'Каждый продавец предоставит удобные условия доставки по городу и области',
                    'Самовывоз'=>'Вы можете самостоятельно забрать свой заказ с салона продавца',
                    'Покупка в кредит'=>'Выбирайте и покупайте в рассрочку и без переплаты'
                    ] as $key=>$advantage)
                <li class="advantage advantages__item col-6 col-md-3">
                    <div class="advantage__image">
                        <img src="/img/excellence/{{ $loop->iteration }}.png" alt="Excellence image">
                    </div>
                    <b class="advantage__title">{{ $key }}</b>
                    <p class="advantage__description">{{ $advantage }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
