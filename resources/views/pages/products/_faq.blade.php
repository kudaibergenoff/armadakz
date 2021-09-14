<section class="section faq container page-product__faq">
    <div class="section__header">
        <h2 class="section__title text-center d-block w-100">Вопросы и ответы</h2>
    </div>
    <div class="row">
        <div class="offset-1 col-10 section__content">
            <ul class="faq__items">
                @foreach([1,2,3] as $faq)
                    <li class="faq__item rounded ">
                        <b class="faq__question font-weight-semibold">
                            <span>Cколько стоит доставка?</span>
                            <span class="faq__expand"></span>
                        </b>
                        <p class="faq__response mt-2 mb-0">Доставка товара «Органайзер для кухни stag белого цвета» в пределах МКАД: — от 390 руб для мелкогабаритного товара, — от 790 руб для среднегабаритного, от 1490 руб — для крупногабаритного товара. Бесплатная доставка при заказе от 50000 рублей 🙈 .
                            <br>Подробнее о тарифах <span style="color: #E0001A; text-decoration:underline;">здесь.</span></p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
