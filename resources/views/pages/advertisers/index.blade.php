@extends('_layout')

@section('title','ARMADA - Рекламодателям')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('advertisers'),
                            'title'=>'Рекламодателям'  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('content')
    <section class="site-ad container page-info__site-ad">
        <div class="ad-request mb-5 d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between bg-light rounded pt-3 pb-4 px-3 py-md-4 px-md-4">
            <div class="d-flex align-items-center">
                <svg class="mr-4 d-none d-md-block" width="72" height="64" viewBox="0 0 72 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50.2875 43.1111L54.2875 39.1111C54.9125 38.4861 56 38.9236 56 39.8236V57.9986C56 61.3111 53.3125 63.9986 50 63.9986H6C2.6875 63.9986 0 61.3111 0 57.9986V13.9986C0 10.6861 2.6875 7.99863 6 7.99863H40.1875C41.075 7.99863 41.525 9.07363 40.9 9.71113L36.9 13.7111C36.7125 13.8986 36.4625 13.9986 36.1875 13.9986H6V57.9986H50V43.8111C50 43.5486 50.1 43.2986 50.2875 43.1111ZM69.8625 17.8861L37.0375 50.7111L25.7375 51.9611C22.4625 52.3236 19.675 49.5611 20.0375 46.2611L21.2875 34.9611L54.1125 2.13613C56.975 -0.726367 61.6 -0.726367 64.45 2.13613L69.85 7.53613C72.7125 10.3986 72.7125 15.0361 69.8625 17.8861V17.8861ZM57.5125 21.7486L50.25 14.4861L27.025 37.7236L26.1125 45.8861L34.275 44.9736L57.5125 21.7486ZM65.6125 11.7861L60.2125 6.38613C59.7 5.87363 58.8625 5.87363 58.3625 6.38613L54.5 10.2486L61.7625 17.5111L65.625 13.6486C66.125 13.1236 66.125 12.2986 65.6125 11.7861V11.7861Z" fill="#E0001A"/>
                </svg>
                <div>
                    <h5 class="text-uppercase m-0 font-weight-bold">Онлайн заявка</h5>
                    <p class="m-0">Оставьте заявку и наши менеджеры свяжутся с вами.</p>
                    <p class="m-0">Или воспользуйтесь телефоном: <a href="tel:77272601805" class="white-space-nowrap">+ 7 (727) 260-18-05</a></p>
                </div>
            </div>
            <div class="mt-4 mt-lg-0">
                <a href="#" data-toggle="modal" data-target="#sendRequestAd" class="button btn-primary">На рекламу</a>
                <a href="#" data-toggle="modal" data-target="#sendRequestRent" class="button btn-primary">На аренду</a>
            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                   aria-controls="pills-home" aria-selected="true">Реклама в торговом комплексе</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                   aria-controls="pills-profile" aria-selected="false">Реклама на сайте</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                   aria-controls="pills-contact" aria-selected="false">Аудио-видео реклама</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-files-tab" data-toggle="pill" href="#pills-files" role="tab"
                   aria-controls="pills-files" aria-selected="false">Файлы для скачивания</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <ul class="site-ad__items">
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image col-12 col-md-4">
                            <img src="img/site-ad/1.jpg" alt="Site-ad image">
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <h4 class="site-ad-item__title">Размещение промо стола или авто</h4>
                                <p>Стоимость оговаривается в зависимости от сроков проведения акции</p>
                                <p>Размещение промоутеров 2 человека - 5000 тенге</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Кол-во модулей</p>
                                <p class="m-0">Размер (м) полотна м</p>
                                <p class="m-0">Стоимость за шт.(тг) тг.</p>
                            </div>
                        </div>
                    </li>
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image col-12 col-md-4">
                            <img src="img/site-ad/2.jpg" alt="Site-ad image">
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <h4 class="site-ad-item__title">ПОДВЕСНЫЕ БАНЕРЫ</h4>
                                <p>Подвесные баннеры могут быть размещены над торговыми бутиками на подвесных конструкциях. В любом из секторов ТК «ARMADA»</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Кол-во модулей 300</p>
                                <p class="m-0">Размер (м) полотна 2.4 x 1.2 м</p>
                                <p class="m-0">Стоимость за шт.(тг) 10 000,00 тенге/месяц тг.</p>
                            </div>
                        </div>
                    </li>
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image col-12 col-md-4">
                            <img src="img/site-ad/1.jpg" alt="Site-ad image">
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <h4 class="site-ad-item__title">Размещение промо стола или авто</h4>
                                <p>Стоимость оговаривается в зависимости от сроков проведения акции</p>
                                <p>Размещение промоутеров 2 человека - 5000 тенге</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Кол-во модулей</p>
                                <p class="m-0">Размер (м) полотна м</p>
                                <p class="m-0">Стоимость за шт.(тг) тг.</p>
                            </div>
                        </div>
                    </li>
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image col-12 col-md-4">
                            <img src="img/site-ad/2.jpg" alt="Site-ad image">
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <h4 class="site-ad-item__title">ПОДВЕСНЫЕ БАНЕРЫ</h4>
                                <p>Подвесные баннеры могут быть размещены над торговыми бутиками на подвесных конструкциях. В любом из секторов ТК «ARMADA»</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Кол-во модулей 300</p>
                                <p class="m-0">Размер (м) полотна 2.4 x 1.2 м</p>
                                <p class="m-0">Стоимость за шт.(тг) 10 000,00 тенге/месяц тг.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row mb-4">
                    <div class="col-12 col-md-6 col-lg-7 col-xl-8">
                        <img src="http://dummyimage.com/1920x2560" class="img-responsive"/>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A1</div>
                            <div>
                                <p>Сквозной баннер, виден на всех страницах сайта 1920x100 px</p>
                                <p class="color--accent mb-0">30 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A2</div>
                            <div>
                                <p>Баннер в слайдере на главной странице. Время показа 5 сек. 1026x480 px</p>
                                <p class="color--accent mb-0">30 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A3</div>
                            <div>
                                <p>Баннер боковой (верх) на главной странице. 255x330 px</p>
                                <p class="color--accent mb-0">25 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A4</div>
                            <div>
                                <p>Баннер боковой (низ) на главной странице. 255x330 px</p>
                                <p class="color--accent mb-0">25 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex pt-3">
                            <div class="color--accent mr-3 font-weight-bold">A5</div>
                            <div>
                                <p>Баннер боковой (слева) на главной странице. 255x330 px</p>
                                <p class="color--accent">20 000 тг/мес.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-md-6 col-lg-7 col-xl-8">
                        <img src="http://dummyimage.com/1920x2560" class="img-responsive"/>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A1</div>
                            <div>
                                <p>Сквозной баннер, виден на всех страницах сайта 1920x100 px</p>
                                <p class="color--accent mb-0">30 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A2</div>
                            <div>
                                <p>Баннер в слайдере на главной странице. Время показа 5 сек. 1026x480 px</p>
                                <p class="color--accent mb-0">30 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A3</div>
                            <div>
                                <p>Баннер боковой (верх) на главной странице. 255x330 px</p>
                                <p class="color--accent mb-0">25 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex py-3 border-bottom">
                            <div class="color--accent mr-3 font-weight-bold">A4</div>
                            <div>
                                <p>Баннер боковой (низ) на главной странице. 255x330 px</p>
                                <p class="color--accent mb-0">25 000 тг/мес.</p>
                            </div>
                        </div>
                        <div class="d-flex pt-3">
                            <div class="color--accent mr-3 font-weight-bold">A5</div>
                            <div>
                                <p>Баннер боковой (слева) на главной странице. 255x330 px</p>
                                <p class="color--accent">20 000 тг/мес.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <ul class="site-ad__items">
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image video col-12 col-md-4">
                            <a href="https://youtu.be/MvsZiRFdJxo" class="video__preview">
                                <img src="https://img.youtube.com/vi/MvsZiRFdJxo/0.jpg" alt="Video preview">
                                <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                </svg>
                            </a>
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <p>ТК "ARMADA" является генральным партнером программы "Мастерская уюта", в связи с этим Вы можете разместить 5-ти минутный сюжет про вашу компанию либо разместиться в новостном блоке.</p>
                                <p>Благодарим за проявленное внимание и надеемся на взаимовыгодное сотрудничество.</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Связаться с редакцией: <a href="tel:87273271881">8 (727) 327 - 18 - 81</a> </p>
                                <p class="m-0">E-mail: <a href="mailto:mastera_doma@mail.ru">mastera_doma@mail.ru</a></p>
                            </div>
                        </div>
                    </li>
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image video col-12 col-md-4">
                            <a href="https://youtu.be/MvsZiRFdJxo" class="video__preview">
                                <img src="https://img.youtube.com/vi/MvsZiRFdJxo/0.jpg" alt="Video preview">
                                <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                </svg>
                            </a>
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <p>ТК "ARMADA" является генральным партнером программы "Мастерская уюта", в связи с этим Вы можете разместить 5-ти минутный сюжет про вашу компанию либо разместиться в новостном блоке.</p>
                                <p>Благодарим за проявленное внимание и надеемся на взаимовыгодное сотрудничество.</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Связаться с редакцией: <a href="tel:87273271881">8 (727) 327 - 18 - 81</a> </p>
                                <p class="m-0">E-mail: <a href="mailto:mastera_doma@mail.ru">mastera_doma@mail.ru</a></p>
                            </div>
                        </div>
                    </li>
                    <li class="site-ad-item site-ad__item row">
                        <div class="site-ad-item__image video col-12 col-md-4">
                            <a href="https://youtu.be/MvsZiRFdJxo" class="video__preview">
                                <img src="https://img.youtube.com/vi/MvsZiRFdJxo/0.jpg" alt="Video preview">
                                <svg class="video__button" width="39" height="28" viewBox="0 0 39 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M38.1247 4.72459C37.6777 3.0617 36.3604 1.75205 34.6879 1.30761C31.6563 0.5 19.5 0.5 19.5 0.5C19.5 0.5 7.34377 0.5 4.31212 1.30761C2.63959 1.75213 1.32232 3.0617 0.87524 4.72459C0.0629272 7.73867 0.0629272 14.0273 0.0629272 14.0273C0.0629272 14.0273 0.0629272 20.3159 0.87524 23.33C1.32232 24.9929 2.63959 26.2479 4.31212 26.6924C7.34377 27.5 19.5 27.5 19.5 27.5C19.5 27.5 31.6562 27.5 34.6879 26.6924C36.3604 26.2479 37.6777 24.9929 38.1247 23.33C38.9371 20.3159 38.937 14.0273 38.937 14.0273C38.937 14.0273 38.9371 7.73867 38.1247 4.72459V4.72459ZM15.5242 19.7369V8.3177L25.6844 14.0274L15.5242 19.7369V19.7369Z" fill="#D9001B" fill-opacity="1"/>
                                </svg>
                            </a>
                        </div>
                        <div class="site-ad-item__content col-12 col-md-8">
                            <div class="site-ad-item__header">
                                <p>ТК "ARMADA" является генральным партнером программы "Мастерская уюта", в связи с этим Вы можете разместить 5-ти минутный сюжет про вашу компанию либо разместиться в новостном блоке.</p>
                                <p>Благодарим за проявленное внимание и надеемся на взаимовыгодное сотрудничество.</p>
                            </div>
                            <div class="site-ad-item__footer">
                                <p class="m-0">Связаться с редакцией: <a href="tel:87273271881">8 (727) 327 - 18 - 81</a> </p>
                                <p class="m-0">E-mail: <a href="mailto:mastera_doma@mail.ru">mastera_doma@mail.ru</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-files" role="tabpanel" aria-labelledby="pills-files-tab">
                <ul class="site-ad__files">
                    <li class="site-ad__file mb-4">
                        <a href="https://armada.kz/admin/reklamo-offers/doc/1" download class="d-inline-flex align-items-center">
                            <svg class="mr-3" width="36" height="46" viewBox="0 0 36 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0H22.3125V2.875H6.5C5.7375 2.875 5.00623 3.1779 4.46707 3.71707C3.9279 4.25623 3.625 4.9875 3.625 5.75V40.25C3.625 41.0125 3.9279 41.7438 4.46707 42.2829C5.00623 42.8221 5.7375 43.125 6.5 43.125H29.5C30.2625 43.125 30.9938 42.8221 31.5329 42.2829C32.0721 41.7438 32.375 41.0125 32.375 40.25V12.9375H35.25V40.25C35.25 41.775 34.6442 43.2375 33.5659 44.3159C32.4875 45.3942 31.025 46 29.5 46H6.5C4.97501 46 3.51247 45.3942 2.43414 44.3159C1.3558 43.2375 0.75 41.775 0.75 40.25V5.75C0.75 4.22501 1.3558 2.76247 2.43414 1.68414C3.51247 0.605802 4.97501 0 6.5 0V0Z" fill="black"/>
                                <path d="M22.3125 8.625V0L35.25 12.9375H26.625C25.4813 12.9375 24.3844 12.4831 23.5756 11.6744C22.7669 10.8656 22.3125 9.76875 22.3125 8.625V8.625Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0018 17.25C18.3831 17.25 18.7487 17.4015 19.0183 17.671C19.2879 17.9406 19.4393 18.3063 19.4393 18.6875V29.5924L22.7341 26.2947C23.004 26.0248 23.3701 25.8732 23.7518 25.8732C24.1335 25.8732 24.4996 26.0248 24.7696 26.2947C25.0395 26.5647 25.1911 26.9308 25.1911 27.3125C25.1911 27.6942 25.0395 28.0603 24.7696 28.3302L19.0196 34.0802C18.886 34.2141 18.7274 34.3203 18.5528 34.3928C18.3781 34.4653 18.1909 34.5026 18.0018 34.5026C17.8127 34.5026 17.6255 34.4653 17.4509 34.3928C17.2762 34.3203 17.1176 34.2141 16.9841 34.0802L11.2341 28.3302C10.9641 28.0603 10.8125 27.6942 10.8125 27.3125C10.8125 26.9308 10.9641 26.5647 11.2341 26.2947C11.504 26.0248 11.8701 25.8732 12.2518 25.8732C12.6335 25.8732 12.9996 26.0248 13.2696 26.2947L16.5643 29.5924V18.6875C16.5643 18.3063 16.7158 17.9406 16.9853 17.671C17.2549 17.4015 17.6206 17.25 18.0018 17.25V17.25Z" fill="black"/>
                            </svg>
                            <span>Коммерческое предложение наружная реклама</span>
                        </a>
                    </li>
                    <li class="site-ad__file mb-4">
                        <a href="https://armada.kz/storage/reklamo-offers-docs/January2019/propsals.pdf" download class="d-inline-flex align-items-center">
                            <svg class="mr-3" width="36" height="46" viewBox="0 0 36 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0H22.3125V2.875H6.5C5.7375 2.875 5.00623 3.1779 4.46707 3.71707C3.9279 4.25623 3.625 4.9875 3.625 5.75V40.25C3.625 41.0125 3.9279 41.7438 4.46707 42.2829C5.00623 42.8221 5.7375 43.125 6.5 43.125H29.5C30.2625 43.125 30.9938 42.8221 31.5329 42.2829C32.0721 41.7438 32.375 41.0125 32.375 40.25V12.9375H35.25V40.25C35.25 41.775 34.6442 43.2375 33.5659 44.3159C32.4875 45.3942 31.025 46 29.5 46H6.5C4.97501 46 3.51247 45.3942 2.43414 44.3159C1.3558 43.2375 0.75 41.775 0.75 40.25V5.75C0.75 4.22501 1.3558 2.76247 2.43414 1.68414C3.51247 0.605802 4.97501 0 6.5 0V0Z" fill="black"/>
                                <path d="M22.3125 8.625V0L35.25 12.9375H26.625C25.4813 12.9375 24.3844 12.4831 23.5756 11.6744C22.7669 10.8656 22.3125 9.76875 22.3125 8.625V8.625Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0018 17.25C18.3831 17.25 18.7487 17.4015 19.0183 17.671C19.2879 17.9406 19.4393 18.3063 19.4393 18.6875V29.5924L22.7341 26.2947C23.004 26.0248 23.3701 25.8732 23.7518 25.8732C24.1335 25.8732 24.4996 26.0248 24.7696 26.2947C25.0395 26.5647 25.1911 26.9308 25.1911 27.3125C25.1911 27.6942 25.0395 28.0603 24.7696 28.3302L19.0196 34.0802C18.886 34.2141 18.7274 34.3203 18.5528 34.3928C18.3781 34.4653 18.1909 34.5026 18.0018 34.5026C17.8127 34.5026 17.6255 34.4653 17.4509 34.3928C17.2762 34.3203 17.1176 34.2141 16.9841 34.0802L11.2341 28.3302C10.9641 28.0603 10.8125 27.6942 10.8125 27.3125C10.8125 26.9308 10.9641 26.5647 11.2341 26.2947C11.504 26.0248 11.8701 25.8732 12.2518 25.8732C12.6335 25.8732 12.9996 26.0248 13.2696 26.2947L16.5643 29.5924V18.6875C16.5643 18.3063 16.7158 17.9406 16.9853 17.671C17.2549 17.4015 17.6206 17.25 18.0018 17.25V17.25Z" fill="black"/>
                            </svg>
                            <span>Коммерческое предложение реклама на сайте</span>
                        </a>
                    </li>
                    <li class="site-ad__file mb-4">
                        <a href="https://armada.kz/storage/reklamo-offers-docs/January2019/propsals.pdf" download class="d-inline-flex align-items-center">
                            <svg class="mr-3" width="36" height="46" viewBox="0 0 36 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 0H22.3125V2.875H6.5C5.7375 2.875 5.00623 3.1779 4.46707 3.71707C3.9279 4.25623 3.625 4.9875 3.625 5.75V40.25C3.625 41.0125 3.9279 41.7438 4.46707 42.2829C5.00623 42.8221 5.7375 43.125 6.5 43.125H29.5C30.2625 43.125 30.9938 42.8221 31.5329 42.2829C32.0721 41.7438 32.375 41.0125 32.375 40.25V12.9375H35.25V40.25C35.25 41.775 34.6442 43.2375 33.5659 44.3159C32.4875 45.3942 31.025 46 29.5 46H6.5C4.97501 46 3.51247 45.3942 2.43414 44.3159C1.3558 43.2375 0.75 41.775 0.75 40.25V5.75C0.75 4.22501 1.3558 2.76247 2.43414 1.68414C3.51247 0.605802 4.97501 0 6.5 0V0Z" fill="black"/>
                                <path d="M22.3125 8.625V0L35.25 12.9375H26.625C25.4813 12.9375 24.3844 12.4831 23.5756 11.6744C22.7669 10.8656 22.3125 9.76875 22.3125 8.625V8.625Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0018 17.25C18.3831 17.25 18.7487 17.4015 19.0183 17.671C19.2879 17.9406 19.4393 18.3063 19.4393 18.6875V29.5924L22.7341 26.2947C23.004 26.0248 23.3701 25.8732 23.7518 25.8732C24.1335 25.8732 24.4996 26.0248 24.7696 26.2947C25.0395 26.5647 25.1911 26.9308 25.1911 27.3125C25.1911 27.6942 25.0395 28.0603 24.7696 28.3302L19.0196 34.0802C18.886 34.2141 18.7274 34.3203 18.5528 34.3928C18.3781 34.4653 18.1909 34.5026 18.0018 34.5026C17.8127 34.5026 17.6255 34.4653 17.4509 34.3928C17.2762 34.3203 17.1176 34.2141 16.9841 34.0802L11.2341 28.3302C10.9641 28.0603 10.8125 27.6942 10.8125 27.3125C10.8125 26.9308 10.9641 26.5647 11.2341 26.2947C11.504 26.0248 11.8701 25.8732 12.2518 25.8732C12.6335 25.8732 12.9996 26.0248 13.2696 26.2947L16.5643 29.5924V18.6875C16.5643 18.3063 16.7158 17.9406 16.9853 17.671C17.2549 17.4015 17.6206 17.25 18.0018 17.25V17.25Z" fill="black"/>
                            </svg>
                            <span>Технические требование к рекламным ресурсам</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-info/info.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-home/home-min.js') }}"></script>
    <script src="{{ asset('js/dest/page-info/info-min.js') }}"></script>

    <script>
        let applicationModal = $('.applicationPost');

        $.each(applicationModal, function () {
            let $this = $( this );
            let applicationModalForm = $( this ).find('form');
            let applicationModalSuccess = $( this ).find('.application__success');
            let applicationModalError = $( this ).find('.application__error');
            let errorList = $( this ).find('.application__error-messages');

            $( this ).find('button[type="submit"]').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    url:     '{{ route('applicationPost') }}',
                    type:     "POST",
                    data: applicationModalForm.serialize(),
                    success: function(response) {
                        applicationModalForm.slideUp(200);
                        applicationModalSuccess.slideDown(200);

                        setTimeout(function () {
                            applicationModalSuccess.slideUp(200);
                            applicationModalForm.slideDown(200);
                        }, 2000)
                    },
                    error: function(xhr, status, error) {
                        let err = JSON.parse(xhr.responseText);

                        if(err) {
                            errorList.html('');

                            $.each(err.errors, function () {
                                errorList.append('<p class="mb-0">' + $( this )[0] + '</p>').stop('true').slideDown(200);
                            });

                            setTimeout(function () {
                                errorList.stop('true').slideUp(200);
                            }, 3000)
                        } else {
                            applicationModalForm.slideUp(200);
                            applicationModalError.slideDown(200);

                            setTimeout(function () {
                                applicationModalError.slideUp(200);
                                applicationModalForm.slideDown(200);
                            }, 2000)
                        }
                    }
                });
            })
        })
    </script>
@endpush


