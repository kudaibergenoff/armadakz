<div class="user-block d-flex">
    <div class="user-block__icon">
        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.2872 5.65232C16.0932 2.90479 13.7961 0.728516 11 0.728516C8.20391 0.728516 5.90679 2.90479 5.71282 5.65232H0V19.2714H22V5.65232H16.2872ZM20.4286 13.8662L14.0372 12.1618C14.9966 10.8508 15.9251 9.14776 16.2108 7.22381H20.4286V13.8662ZM7.27069 6.02921C7.27069 3.97289 8.94368 2.29994 11 2.29994C13.0563 2.29994 14.7293 3.97289 14.7293 6.02921C14.7293 9.31925 12.1151 12.1709 10.9991 13.2382C9.88251 12.1735 7.27069 9.32989 7.27069 6.02921ZM1.57143 7.22375H5.7892C5.9883 8.56439 6.49943 9.7977 7.11585 10.866L3.21069 17.6999H1.57143V7.22375ZM5.02061 17.6999L8.08851 12.3312C9.24581 13.8686 10.4083 14.8268 10.5047 14.9051L11 15.3074L11.4953 14.9051C11.5642 14.8491 12.1786 14.343 12.9461 13.4971L20.4286 15.4925V17.6999H5.02061Z" fill="black"/>
            <path d="M13.3569 6.43795C13.3569 5.13822 12.2995 4.08081 10.9997 4.08081C9.69999 4.08081 8.64258 5.13822 8.64258 6.43795C8.64258 7.73768 9.69999 8.7951 10.9997 8.7951C12.2995 8.7951 13.3569 7.73773 13.3569 6.43795ZM10.214 6.43795C10.214 6.00471 10.5665 5.65224 10.9997 5.65224C11.433 5.65224 11.7854 6.00471 11.7854 6.43795C11.7854 6.8712 11.433 7.22367 10.9997 7.22367C10.5665 7.22367 10.214 6.8712 10.214 6.43795Z" fill="black"/>
        </svg>
    </div>
    <form action="{{ route('user.address') }}" class="user-block__wrap" method="POST">
        @csrf
        <div class="user-block__header">
            <div class="user-block__title">Адрес доставки</div>
            <div class="user-block__edit">
                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.3656 13.4731L16.5878 12.2231C16.7788 12.0278 17.1111 12.1646 17.1111 12.4458V18.1255C17.1111 19.1606 16.2899 20.0005 15.2778 20.0005H1.83333C0.821181 20.0005 0 19.1606 0 18.1255V4.37549C0 3.34033 0.821181 2.50049 1.83333 2.50049H12.2795C12.5507 2.50049 12.6882 2.83643 12.4972 3.03564L11.275 4.28564C11.2177 4.34424 11.1413 4.37549 11.0573 4.37549H1.83333V18.1255H15.2778V13.6919C15.2778 13.6099 15.3083 13.5317 15.3656 13.4731ZM21.3469 5.59033L11.317 15.8481L7.86424 16.2388C6.86354 16.3521 6.01181 15.4888 6.12257 14.4575L6.50451 10.9263L16.5344 0.668457C17.409 -0.226074 18.8222 -0.226074 19.6931 0.668457L21.3431 2.35596C22.2177 3.25049 22.2177 4.69971 21.3469 5.59033V5.59033ZM17.5733 6.79736L15.3542 4.52783L8.25764 11.7895L7.97882 14.3403L10.4729 14.0552L17.5733 6.79736ZM20.0483 3.68408L18.3983 1.99658C18.2417 1.83643 17.9858 1.83643 17.833 1.99658L16.6528 3.20361L18.8719 5.47314L20.0521 4.26611C20.2049 4.10205 20.2049 3.84424 20.0483 3.68408V3.68408Z" fill="#E0001A"/>
                </svg>
                <span>Редактировать</span>
            </div>
        </div>
        <div class="user-block__content">
            <ul class="user-block__items row">
                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                    <div class="user-block-info__name">Страна</div>
                    <div class="user-block-info__value">
                        <div>
                            <select class="mdb-select md-form m-0" name="country_id" searchable="Поиск...">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if((isset($info->city) and $info->city->country_id == $country->id) or old('country_id') == $country->id or ($info->city_id == null and $loop->first)) selected @endif>{{ $country->title_ru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span>{{ $info->city->country->title_ru ?? 'Не выбрана' }}</span>
                    </div>
                </li>
                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                    <div class="user-block-info__name">Город</div>
                    <div class="user-block-info__value">
                        <div>
                            <select class="mdb-select md-form m-0" name="city_id" searchable="Поиск...">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @if($info->city_id == $city->id or old('city_id') == $city->id or ($info->city_id == null and $loop->first)) selected @endif>{{ $city->title_ru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span>{{ $info->city->title_ru ?? 'Не выбран' }}</span>
                    </div>
                </li>
                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                    <div class="user-block-info__name">Адрес</div>
                    <div class="user-block-info__value">
                        <input type="text" class="form-control" name="address" value="{{ $info->address ?? old('address') }}">
                        <span>{{ $info->address ?? 'Не указан' }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>
