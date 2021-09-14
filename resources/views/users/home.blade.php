@extends('_layout')

@section('title','ARMADA - Личный кабинет пользователя' )

{{--@section('breadcrumb')--}}
{{--    @php--}}
{{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
{{--                            'title'=>'Главная' ];--}}
{{--    @endphp--}}
{{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
{{--@endsection--}}

@section('content')
    <div class="container personal_cab page-user-area__content">
        <div class="row">
            @include('users.include.left_menu')
            <div class="col-12 col-lg-9">
                <p class="page-title">Личные данные</p>
                <div class="user-block d-flex">
                    <div class="user-block__icon">
                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9 11.875C10.8109 11.875 10.2873 12.5 8.5 12.5C6.71272 12.5 6.19286 11.875 5.1 11.875C2.28437 11.875 0 14.2266 0 17.125V18.125C0 19.1602 0.815848 20 1.82143 20H15.1786C16.1842 20 17 19.1602 17 18.125V17.125C17 14.2266 14.7156 11.875 11.9 11.875ZM15.1786 18.125H1.82143V17.125C1.82143 15.2656 3.29375 13.75 5.1 13.75C5.65402 13.75 6.55335 14.375 8.5 14.375C10.4618 14.375 11.3422 13.75 11.9 13.75C13.7063 13.75 15.1786 15.2656 15.1786 17.125V18.125ZM8.5 11.25C11.5167 11.25 13.9643 8.73047 13.9643 5.625C13.9643 2.51953 11.5167 0 8.5 0C5.48326 0 3.03571 2.51953 3.03571 5.625C3.03571 8.73047 5.48326 11.25 8.5 11.25ZM8.5 1.875C10.5074 1.875 12.1429 3.55859 12.1429 5.625C12.1429 7.69141 10.5074 9.375 8.5 9.375C6.49263 9.375 4.85714 7.69141 4.85714 5.625C4.85714 3.55859 6.49263 1.875 8.5 1.875Z" fill="black"/>
                        </svg>
                    </div>
                    <form action="#" class="user-block__wrap">
                        <div class="user-block__header">
                            <div class="user-block__title">Контакты</div>
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
                                        <input type="text" class="form-control" name="lastName" value="Афонин" required>
                                        <span>Афонин</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Имя</div>
                                    <div class="user-block-info__value">
                                        <input type="text" class="form-control" name="firstName" value="Александр" required>
                                        <span>Александр</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Отчество</div>
                                    <div class="user-block-info__value">
                                        <input type="text" class="form-control" name="patronymic" value="">
                                        <span>Не указано</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Дата рождения</div>
                                    <div class="user-block-info__value">
                                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker m-0">
                                            <input type="text" name="dateOfBirth" id="example" class="form-control" value="" required readonly>
                                            <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                        </div>
                                        <span>Не указан</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Пол</div>
                                    <div class="user-block-info__value">
                                        <input type="text" class="form-control" name="gender" value="">
                                        <span>Не указан</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Язык общения с поддержкой</div>
                                    <div class="user-block-info__value">
                                        <div>
                                            <select class="mdb-select md-form m-0" name="faqLanguage" searchable="Поиск...">
                                                <option value="" disabled selected>Русский</option>
                                                <option value="0">Український</option>
                                                <option value="1">USA</option>
                                                <option value="2">Germany</option>
                                                <option value="3">France</option>
                                                <option value="3">Poland</option>
                                                <option value="3">Japan</option>
                                            </select>
                                        </div>
                                        <span>Русский</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="user-block d-flex">
                    <div class="user-block__icon">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.2941 0H2.25859C1.87849 0 1.5705 0.308078 1.5705 0.688083V4.65594H0.706638C0.326541 4.65594 0.0185547 4.96401 0.0185547 5.34402C0.0185547 5.72402 0.326541 6.0321 0.706638 6.0321H1.5705V9.31196H0.706638C0.326541 9.31196 0.0185547 9.62004 0.0185547 10C0.0185547 10.3801 0.326541 10.6881 0.706638 10.6881H1.5705V13.9679H0.706638C0.326541 13.9679 0.0185547 14.276 0.0185547 14.656C0.0185547 15.036 0.326541 15.3441 0.706638 15.3441H1.5705V19.3119C1.5705 19.6919 1.87849 20 2.25859 20H17.2942C17.6743 20 17.9823 19.6919 17.9823 19.3119V0.688083C17.9822 0.308078 17.6742 0 17.2941 0ZM16.606 18.6238H2.94667V15.3441H3.81053C4.19063 15.3441 4.49862 15.036 4.49862 14.656C4.49862 14.276 4.19063 13.9679 3.81053 13.9679H2.94667V10.6881H3.81053C4.19063 10.6881 4.49862 10.3801 4.49862 10C4.49862 9.62004 4.19063 9.31196 3.81053 9.31196H2.94667V6.0321H3.81053C4.19063 6.0321 4.49862 5.72402 4.49862 5.34402C4.49862 4.96401 4.19063 4.65594 3.81053 4.65594H2.94667V1.37617H16.6061V18.6238H16.606Z" fill="black"/>
                            <path d="M10.2685 10.3163C11.8285 10.3163 13.0977 9.04665 13.0977 7.48608C13.0977 5.92541 11.8285 4.65576 10.2685 4.65576C8.70803 4.65576 7.43848 5.92541 7.43848 7.48608C7.43848 9.04665 8.70803 10.3163 10.2685 10.3163ZM10.2685 6.03202C11.0697 6.03202 11.7216 6.68432 11.7216 7.48617C11.7216 8.28792 11.0698 8.94022 10.2685 8.94022C9.46685 8.94022 8.81464 8.28792 8.81464 7.48617C8.81464 6.68432 9.46685 6.03202 10.2685 6.03202Z" fill="black"/>
                            <path d="M7.11875 15.4628C7.49884 15.4628 7.80683 15.1547 7.80683 14.7747V13.5856C7.80683 12.8224 8.42794 12.2014 9.19125 12.2014H11.3639C12.1273 12.2014 12.7484 12.8223 12.7484 13.5856V14.7747C12.7484 15.1547 13.0563 15.4628 13.4364 15.4628C13.8164 15.4628 14.1245 15.1547 14.1245 14.7747V13.5856C14.1245 12.0636 12.8862 10.8252 11.3639 10.8252H9.19125C7.66903 10.8252 6.43066 12.0635 6.43066 13.5856V14.7747C6.43066 15.1547 6.73874 15.4628 7.11875 15.4628Z" fill="black"/>
                        </svg>
                    </div>
                    <form action="#" class="user-block__wrap">
                        <div class="user-block__header">
                            <div class="user-block__title">Контакты</div>
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
                                    <div class="user-block-info__name">Электронная почта</div>
                                    <div class="user-block-info__value">
                                        <input type="email" class="form-control" name="email" value="mail_albertov@gmail.com" required>
                                        <span>mail_albertov@gmail.com</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Телефон</div>
                                    <div class="user-block-info__value">
                                        <input type="tel" class="form-control" name="mainPhone" value="+7 800 88 98 456" required>
                                        <span>+7 800 88 98 456</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Контактный телефон</div>
                                    <div class="user-block-info__value">
                                        <input type="tel" class="form-control" name="contactPhone" value="+7 800 88 98 456">
                                        <span>+7 800 88 98 456</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="user-block d-flex">
                    <div class="user-block__icon">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2872 5.65232C16.0932 2.90479 13.7961 0.728516 11 0.728516C8.20391 0.728516 5.90679 2.90479 5.71282 5.65232H0V19.2714H22V5.65232H16.2872ZM20.4286 13.8662L14.0372 12.1618C14.9966 10.8508 15.9251 9.14776 16.2108 7.22381H20.4286V13.8662ZM7.27069 6.02921C7.27069 3.97289 8.94368 2.29994 11 2.29994C13.0563 2.29994 14.7293 3.97289 14.7293 6.02921C14.7293 9.31925 12.1151 12.1709 10.9991 13.2382C9.88251 12.1735 7.27069 9.32989 7.27069 6.02921ZM1.57143 7.22375H5.7892C5.9883 8.56439 6.49943 9.7977 7.11585 10.866L3.21069 17.6999H1.57143V7.22375ZM5.02061 17.6999L8.08851 12.3312C9.24581 13.8686 10.4083 14.8268 10.5047 14.9051L11 15.3074L11.4953 14.9051C11.5642 14.8491 12.1786 14.343 12.9461 13.4971L20.4286 15.4925V17.6999H5.02061Z" fill="black"/>
                            <path d="M13.3569 6.43795C13.3569 5.13822 12.2995 4.08081 10.9997 4.08081C9.69999 4.08081 8.64258 5.13822 8.64258 6.43795C8.64258 7.73768 9.69999 8.7951 10.9997 8.7951C12.2995 8.7951 13.3569 7.73773 13.3569 6.43795ZM10.214 6.43795C10.214 6.00471 10.5665 5.65224 10.9997 5.65224C11.433 5.65224 11.7854 6.00471 11.7854 6.43795C11.7854 6.8712 11.433 7.22367 10.9997 7.22367C10.5665 7.22367 10.214 6.8712 10.214 6.43795Z" fill="black"/>
                        </svg>
                    </div>
                    <form action="#" class="user-block__wrap">
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
                                    <div class="user-block-info__name">Адрес</div>
                                    <div class="user-block-info__value">
                                        <input type="text" class="form-control" name="address" value="">
                                        <span>Не указано</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="user-block d-flex">
                    <div class="user-block__icon">
                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.9 11.875C10.8109 11.875 10.2873 12.5 8.5 12.5C6.71272 12.5 6.19286 11.875 5.1 11.875C2.28437 11.875 0 14.2266 0 17.125V18.125C0 19.1602 0.815848 20 1.82143 20H15.1786C16.1842 20 17 19.1602 17 18.125V17.125C17 14.2266 14.7156 11.875 11.9 11.875ZM15.1786 18.125H1.82143V17.125C1.82143 15.2656 3.29375 13.75 5.1 13.75C5.65402 13.75 6.55335 14.375 8.5 14.375C10.4618 14.375 11.3422 13.75 11.9 13.75C13.7063 13.75 15.1786 15.2656 15.1786 17.125V18.125ZM8.5 11.25C11.5167 11.25 13.9643 8.73047 13.9643 5.625C13.9643 2.51953 11.5167 0 8.5 0C5.48326 0 3.03571 2.51953 3.03571 5.625C3.03571 8.73047 5.48326 11.25 8.5 11.25ZM8.5 1.875C10.5074 1.875 12.1429 3.55859 12.1429 5.625C12.1429 7.69141 10.5074 9.375 8.5 9.375C6.49263 9.375 4.85714 7.69141 4.85714 5.625C4.85714 3.55859 6.49263 1.875 8.5 1.875Z" fill="black"/>
                        </svg>
                    </div>
                    <form action="#" class="user-block__wrap">
                        <div class="user-block__header">
                            <div class="user-block__title">Логин</div>
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
                                    <div class="user-block-info__name">Логин</div>
                                    <div class="user-block-info__value">
                                        <input type="text" class="form-control" name="login" value="" required>
                                        <span>mail_albertov@gmail.com</span>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                                    <div class="user-block-info__name">Пароль</div>
                                    <div class="user-block-info__value">
                                        <input type="password" class="form-control" name="password" value="" required>
                                        <span>********56</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="user-block d-flex">
                    <div class="user-block__icon">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.50032 0C4.25289 0 0 4.2516 0 9.50032C0 14.7465 4.25289 19 9.50032 19C14.7458 19 18.9994 14.7465 18.9994 9.50032C18.9994 4.2516 14.7465 0 9.50032 0ZM9.50032 17.4503C5.10655 17.4503 1.54843 13.8915 1.54843 9.49968C1.54843 5.1072 5.10655 1.54715 9.50032 1.54715C13.8902 1.54715 17.4509 5.10784 17.4509 9.49968C17.4516 13.8915 13.8902 17.4503 9.50032 17.4503Z" fill="black"/>
                            <path d="M10.8269 7.16846H8.15658V7.17296H7.16268V8.72525H8.15658V14.2693H7.10156V15.7527H8.15658V15.763H10.8269V15.7527H11.7005V14.2693H10.8269V7.16846Z" fill="black"/>
                            <path d="M9.47324 6.11389C10.3706 6.11389 10.9142 5.51691 10.9142 4.77775C10.8969 4.0238 10.37 3.44482 9.50926 3.44482C8.64981 3.44482 8.08691 4.02316 8.08691 4.77775C8.08627 5.51691 8.63115 6.11389 9.47324 6.11389Z" fill="black"/>
                        </svg>
                    </div>
                    <form action="#" class="user-block__wrap">
                        <div class="user-block__header">
                            <div class="user-block__title">Дополнительная информация</div>
                        </div>
                        <div class="user-block__content">
                            <ul class="user-block__items row">
                                <li class="user-block-info user-block__item col-12 col-xl-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked1" checked>
                                        <label class="custom-control-label" for="defaultUnchecked1">Этот аккаунт используется юридическим лицом, представителем компании или частным предпринимателем</label>
                                    </div>
                                </li>
                                <li class="user-block-info user-block__item col-12 col-xl-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked2">
                                        <label class="custom-control-label" for="defaultUnchecked2">Не сохранять мои карты для оплаты онлайн (ранее сохраненные карты можно удалить в разделе "Мои банковские карты")</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <p class="page-user-area__notation">Связывайте учетную запись Армады с учетными записями соцсетей и входите на сайт, как пользователь Facebook или Google</p>
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start">
                        <div class="social-login social-login--facebook mt-3 mt-md-0 mb-sm-0 mr-0 mr-sm-4">
                            <div class="social-login__icon">
                                <img src="img/facebook-logo.png" alt="Facebook">
                            </div>
                            <div>
                                <span class="d-block social-login__name">Facebook</span>
                                <span>Связать учетную запись</span>
                            </div>
                        </div>
                        <div class="social-login social-login--google mt-3 mt-md-0">
                            <div class="social-login__icon">
                                <img src="img/google-logo.png" alt="Google">
                            </div>
                            <div>
                                <span class="d-block social-login__name">Google</span>
                                <span>Связать учетную запись</span>
                            </div>
                        </div>
                    </div>
                    <div class="user-block__edit mx-auto ml-sm-3 mr-sm-0 mt-4 mt-md-0" data-toggle="modal" data-target="#deleteAccount">
                        <svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.97321 13.8125H9.77679C9.88335 13.8125 9.98554 13.7705 10.0609 13.6958C10.1362 13.6211 10.1786 13.5197 10.1786 13.4141V6.24219C10.1786 6.13652 10.1362 6.03517 10.0609 5.96045C9.98554 5.88573 9.88335 5.84375 9.77679 5.84375H8.97321C8.86665 5.84375 8.76446 5.88573 8.68911 5.96045C8.61376 6.03517 8.57143 6.13652 8.57143 6.24219V13.4141C8.57143 13.5197 8.61376 13.6211 8.68911 13.6958C8.76446 13.7705 8.86665 13.8125 8.97321 13.8125ZM14.4643 2.65625H11.705L10.5666 0.773633C10.4238 0.537564 10.2217 0.342222 9.98003 0.206642C9.7384 0.0710621 9.46547 -0.000130933 9.18783 1.80773e-07H5.81216C5.53465 -1.62287e-05 5.26185 0.0712313 5.02035 0.206806C4.77884 0.34238 4.57685 0.53766 4.43404 0.773633L3.29498 2.65625H0.535714C0.393634 2.65625 0.257373 2.71222 0.156907 2.81185C0.0564412 2.91148 0 3.0466 0 3.1875L0 3.71875C0 3.85965 0.0564412 3.99477 0.156907 4.0944C0.257373 4.19403 0.393634 4.25 0.535714 4.25H1.07143V15.4062C1.07143 15.8289 1.24075 16.2343 1.54215 16.5332C1.84355 16.8321 2.25233 17 2.67857 17H12.3214C12.7477 17 13.1565 16.8321 13.4578 16.5332C13.7592 16.2343 13.9286 15.8289 13.9286 15.4062V4.25H14.4643C14.6064 4.25 14.7426 4.19403 14.8431 4.0944C14.9436 3.99477 15 3.85965 15 3.71875V3.1875C15 3.0466 14.9436 2.91148 14.8431 2.81185C14.7426 2.71222 14.6064 2.65625 14.4643 2.65625ZM5.75357 1.69037C5.77148 1.66082 5.79681 1.63638 5.82709 1.61944C5.85737 1.60251 5.89157 1.59365 5.92634 1.59375H9.07366C9.10837 1.59371 9.1425 1.60259 9.17272 1.61952C9.20294 1.63646 9.22822 1.66087 9.24609 1.69037L9.83069 2.65625H5.16931L5.75357 1.69037ZM12.3214 15.4062H2.67857V4.25H12.3214V15.4062ZM5.22321 13.8125H6.02679C6.13335 13.8125 6.23554 13.7705 6.31089 13.6958C6.38624 13.6211 6.42857 13.5197 6.42857 13.4141V6.24219C6.42857 6.13652 6.38624 6.03517 6.31089 5.96045C6.23554 5.88573 6.13335 5.84375 6.02679 5.84375H5.22321C5.11665 5.84375 5.01446 5.88573 4.93911 5.96045C4.86376 6.03517 4.82143 6.13652 4.82143 6.24219V13.4141C4.82143 13.5197 4.86376 13.6211 4.93911 13.6958C5.01446 13.7705 5.11665 13.8125 5.22321 13.8125Z" fill="#E0001A"/>
                        </svg>
                        <span>Удалить аккаунт</span>
                    </div>
                </div>
                <button class="button btn-outline-dark d-block d-sm-inline mt-5 mx-auto mx-sm-0">Выйти из профиля</button>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    {{-- inputmask --}}
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/inputmask.js') }}"></script>
@endpush


