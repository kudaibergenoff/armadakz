<div class="clients analytics__clients col-12 col-xl-5">
    <div class="clients__wrap analytics__block-style">
        <h2 class="clients__title  analytics__block-title">Новые клиенты</h2>
        <ul class="clients__items">
            @foreach($users as $user)
                <li class="client clients__item">
                    <div class="client__avatar">
                        <img src="{{ $user->getImages(0,'avatar') }}" alt="User avatar">
                    </div>
                    <div class="client__info">
                        <b class="client__name">{!! $user->fio() !!}</b>
                        <div class="client__location">{{ $user->city->title_ru }}</div>
                    </div>
                    <button class="client__button">
                        <svg width="4" height="14" viewBox="0 0 4 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.99967 3.66658C2.91634 3.66658 3.66634 2.91658 3.66634 1.99992C3.66634 1.08325 2.91634 0.333252 1.99967 0.333252C1.08301 0.333252 0.333008 1.08325 0.333008 1.99992C0.333008 2.91658 1.08301 3.66658 1.99967 3.66658ZM1.99967 5.33325C1.08301 5.33325 0.333008 6.08325 0.333008 6.99992C0.333008 7.91658 1.08301 8.66658 1.99967 8.66658C2.91634 8.66658 3.66634 7.91658 3.66634 6.99992C3.66634 6.08325 2.91634 5.33325 1.99967 5.33325ZM1.99967 10.3333C1.08301 10.3333 0.333008 11.0833 0.333008 11.9999C0.333008 12.9166 1.08301 13.6666 1.99967 13.6666C2.91634 13.6666 3.66634 12.9166 3.66634 11.9999C3.66634 11.0833 2.91634 10.3333 1.99967 10.3333Z" fill="black" fill-opacity="0.54"/>
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
