@if(isset($populars) and $populars->count() > 0)
    <section class="section popular-categories page-home__popular-categories container">
        <div class="section__header">
            <h2 class="section__title section__title--dark">Популярные разделы</h2>
            <div class="section__header-text section__header-text--search">
                <span>Не можете найти нужный раздел?</span>
                <span>
                    <span>Воспользуйтесь поиском</span>
                    <svg width="29" height="8" viewBox="0 0 29 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.3536 4.35355C28.5488 4.15829 28.5488 3.84171 28.3536 3.64645L25.1716 0.464466C24.9763 0.269204 24.6597 0.269204 24.4645 0.464466C24.2692 0.659728 24.2692 0.976311 24.4645 1.17157L27.2929 4L24.4645 6.82843C24.2692 7.02369 24.2692 7.34027 24.4645 7.53553C24.6597 7.7308 24.9763 7.7308 25.1716 7.53553L28.3536 4.35355ZM0 4.5H28V3.5H0V4.5Z" fill="#EC6676"/>
                    </svg>
                </span>
            </div>
        </div>
        <div class="section__content">
            <ul class="popular-categories__items row justify-content-center">
                @foreach($populars as $popular)
                    <li class="category-card popular-categories__item col-6 col-md-3 col-xl-2">
                        <a href="{{ $popular->model . '/' . $popular->slug }}" class="category-card__wrap">
                            <span class="category-card__image">
                                <img src="{{ $popular->getImages() }}" alt="Category image">
                            </span>
                            <span class="category-card__title">{{ $popular->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endif
{{--[1=>'Освещение',2=>'Диваны',3=>'Кресла',4=>'Пуфы',5=>'Столы',6=>'Стулья',7=>'Кровати',8=>'Тумбы',9=>'Шкафы',10=>'Комоды',--}}
{{--11=>'Консоли',12=>'Стеллажи',13=>'Зеркала',14=>'Декор',15=>'Подарки',16=>'Ковры',17=>'Текстиль',18=>'Для дачи']--}}
{{--/img/categories/{{ $key }}.png--}}
