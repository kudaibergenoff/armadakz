<div class="user-block">
    <div class="user-block__bg"></div>
    <div class="user-block__success">Данные успешно сохранены!</div>
    <div class="user-block__error">При сохранении данных произошла ошибка. <br> Пожалуйста перепроверьте все поля.</div>
    <div class="user-block__wrapper d-flex">
        <div class="user-block__icon">
            <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.9 11.875C10.8109 11.875 10.2873 12.5 8.5 12.5C6.71272 12.5 6.19286 11.875 5.1 11.875C2.28437 11.875 0 14.2266 0 17.125V18.125C0 19.1602 0.815848 20 1.82143 20H15.1786C16.1842 20 17 19.1602 17 18.125V17.125C17 14.2266 14.7156 11.875 11.9 11.875ZM15.1786 18.125H1.82143V17.125C1.82143 15.2656 3.29375 13.75 5.1 13.75C5.65402 13.75 6.55335 14.375 8.5 14.375C10.4618 14.375 11.3422 13.75 11.9 13.75C13.7063 13.75 15.1786 15.2656 15.1786 17.125V18.125ZM8.5 11.25C11.5167 11.25 13.9643 8.73047 13.9643 5.625C13.9643 2.51953 11.5167 0 8.5 0C5.48326 0 3.03571 2.51953 3.03571 5.625C3.03571 8.73047 5.48326 11.25 8.5 11.25ZM8.5 1.875C10.5074 1.875 12.1429 3.55859 12.1429 5.625C12.1429 7.69141 10.5074 9.375 8.5 9.375C6.49263 9.375 4.85714 7.69141 4.85714 5.625C4.85714 3.55859 6.49263 1.875 8.5 1.875Z" fill="black"/>
            </svg>
        </div>
        <form action="{{ route('user.personal') }}" class="user-block__wrap cmxform" method="POST">
            @csrf
            <div class="user-block__header">
                <div class="user-block__title">Персональные данные</div>
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
                        <div class="user-block-info__name">Фамилия</div>
                        <div class="user-block-info__value">
                            <input type="text" class="form-control" name="sname" value="{{ $user->sname ?? old('sname') }}" required>
                            <span>{{ $user->sname ?? 'Не указано' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                        <div class="user-block-info__name">Имя</div>
                        <div class="user-block-info__value">
                            <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" required>
                            <span>{{ $user->name ?? 'Не указано' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                        <div class="user-block-info__name">Отчество</div>
                        <div class="user-block-info__value">
                            <input type="text" class="form-control" name="mname" value="{{ $user->mname ?? old('mname') }}">
                            <span>{{ $user->mname ?? 'Не указано' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                        <div class="user-block-info__name">Дата рождения</div>
                        <div class="user-block-info__value">
                            <input type="text" name="dob" id="dob" data-toggle="datepicker" class="form-control docs-date" value="{{ $user->dob ?? old('dob') }}" placeholder="дд.мм.гггг" required>
                            <span>{{ $user->dob ?? 'Не указан' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                        <div class="user-block-info__name">Пол</div>
                        <div class="user-block-info__value">
                            {{-- <input type="text" class="form-control" name="sex" value="{{ $info->sex }}"> --}}
                            <div>
                                <select class="form-control m-0" name="sex_id">
                                    @foreach($sexes as $sex)
                                        <option value="{{ $sex->id }}" @if($user->sex_id == $sex->id or old('sex_id') == $sex->id or ($user->sex_id == null and $loop->first)) selected @endif>{{ $sex->title_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span>{{ $info->sex->title_ru ?? 'Не выбран' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                        <div class="user-block-info__name">Язык общения с поддержкой</div>
                        <div class="user-block-info__value">
                            <div>
                                <select class="form-control m-0" name="lang_id" searchable="Поиск...">
                                    @foreach($langs as $lang)
                                        <option value="{{ $lang->id }}" @if($user->lang_id == $lang->id or old('lang_id') == $lang->id or ($user->lang_id == null and $loop->first)) selected @endif>{{ $lang->title_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span>{!! $user->lang->title_ru ?? 'Не выбран' !!}</span>
                        </div>
                    </li>
                </ul>
                <div class="user-block__error-list color--accent"></div>
            </div>
        </form>
    </div>
</div>
