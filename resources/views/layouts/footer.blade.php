<footer class="footer @if(Route::is('vendor.*','admin.*')) d-none @endif">
    <div class="footer__top">
        <div class="container">
            <div class="row">
                <div class="footer__about col-12 col-md-4 col-lg-3">
                    <a href="{{ route('home') }}" class="footer__logo">
                        <img src="{{ asset('img/logo.png') }}" alt="ARMADA">
                    </a>
                    <p class="footer__description">Самый большой выбор мебели и товаров для дома в стране</p>
                    <div class="footer__social">
                        <p>Мы в соцсетях:</p>
                        <ul>
                            <li>
                                <a href="https://facebook.com/armada.kz" target="_blank">
                                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="33" height="33" rx="16.5" fill="#EBEBEB"/>
                                        <path d="M20.3447 18.125L20.8632 14.8674H17.621V12.7535C17.621 11.8623 18.0739 10.9936 19.526 10.9936H21V8.22008C21 8.22008 19.6624 8 18.3835 8C15.7134 8 13.9681 9.56023 13.9681 12.3847V14.8674H11V18.125H13.9681V26H17.621V18.125H20.3447Z" fill="#282C34"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/armada_almaty/" target="_blank">
                                    <svg width="35" height="33" viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="35" height="33" rx="16.5" fill="#EBEBEB"/>
                                        <path d="M17.5038 11.5081C15.0904 11.5081 13.1437 13.512 13.1437 15.9963C13.1437 18.4807 15.0904 20.4846 17.5038 20.4846C19.9172 20.4846 21.8638 18.4807 21.8638 15.9963C21.8638 13.512 19.9172 11.5081 17.5038 11.5081ZM17.5038 18.9143C15.9442 18.9143 14.6692 17.6057 14.6692 15.9963C14.6692 14.387 15.9404 13.0784 17.5038 13.0784C19.0672 13.0784 20.3384 14.387 20.3384 15.9963C20.3384 17.6057 19.0634 18.9143 17.5038 18.9143V18.9143ZM23.0591 11.3245C23.0591 11.9065 22.6038 12.3713 22.0422 12.3713C21.4768 12.3713 21.0252 11.9026 21.0252 11.3245C21.0252 10.7463 21.4806 10.2776 22.0422 10.2776C22.6038 10.2776 23.0591 10.7463 23.0591 11.3245ZM25.9468 12.387C25.8823 10.9846 25.5712 9.74243 24.5732 8.71899C23.579 7.69556 22.3723 7.37524 21.01 7.30493C19.606 7.2229 15.3977 7.2229 13.9937 7.30493C12.6352 7.37134 11.4285 7.69165 10.4306 8.71509C9.43257 9.73853 9.1252 10.9807 9.0569 12.3831C8.97721 13.8284 8.97721 18.1604 9.0569 19.6057C9.12141 21.0081 9.43257 22.2502 10.4306 23.2737C11.4285 24.2971 12.6314 24.6174 13.9937 24.6877C15.3977 24.7698 19.606 24.7698 21.01 24.6877C22.3723 24.6213 23.579 24.301 24.5732 23.2737C25.5674 22.2502 25.8785 21.0081 25.9468 19.6057C26.0265 18.1604 26.0265 13.8323 25.9468 12.387V12.387ZM24.133 21.1565C23.837 21.9221 23.264 22.512 22.5165 22.8206C21.3971 23.2776 18.7408 23.1721 17.5038 23.1721C16.2667 23.1721 13.6067 23.2737 12.491 22.8206C11.7473 22.5159 11.1743 21.926 10.8745 21.1565C10.4306 20.0041 10.533 17.2698 10.533 15.9963C10.533 14.7229 10.4344 11.9846 10.8745 10.8362C11.1705 10.0706 11.7435 9.48071 12.491 9.17212C13.6105 8.71509 16.2667 8.82056 17.5038 8.82056C18.7408 8.82056 21.4009 8.71899 22.5165 9.17212C23.2602 9.47681 23.8332 10.0667 24.133 10.8362C24.577 11.9885 24.4745 14.7229 24.4745 15.9963C24.4745 17.2698 24.577 20.0081 24.133 21.1565Z" fill="#282C34"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__payments">
                        <span>Принимаем оплату</span>
                        <br>
                        <ul>
                            <li><img src="{{ asset('img/payments/4.png') }}" alt="Payment"></li>
                            <li><img src="{{ asset('img/payments/5.png') }}" alt="Payment"></li>
                        </ul>
                    </div>
                </div>
                <div class="footer__pages col-12 col-md-3">
                    <b class="footer__column-title">Меню</b>
                    <nav class="footer__nav">
                        <ul>
                            <li><a href="{{ route('about') }}">О нас</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a></li>
                            <li><a href="{{ route('news.index') }}">Новости</a></li>
                            <li><a href="{{ route('ideas') }}">Идеи</a></li>
                            <li><a href="{{ route('faqs') }}">Вопрос/ответ</a></li>
                            <li><a href="{{ route('projects') }}">Наши проекты</a></li>
                            <li><a href="{{ route('furnitureCare') }}">Уход за мебелью</a></li>
                            <li><a href="{{ route('tour') }}">3D Тур</a></li>
                            <li><a href="{{ route('delivery') }}">Доставка</a></li>
                            <li><a href="{{ route('payment') }}">Оплата</a></li>
                            <li><a href="{{ route('tenants') }}">Арендаторам</a></li>
                            <li><a href="{{ route('advertisers') }}">Рекламодателям</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer__categories col-12 col-md-3">
                    <b class="footer__column-title">Продавцам</b>
                    <nav class="footer__nav">
                        <ul>
                            <li><a href="{{ route('forSeller') }}">Создать кабинет на ARMADA.KZ</a></li>
                            <li><a href="{{ route('sellerLogin') }}">Вход в кабинет для продавца</a></li>
                        </ul>
                    </nav>
                    <b class="footer__column-title">Покупателям</b>
                    <nav class="footer__nav">
                        <ul>
                            <li><a href="{{ route('howToBuy') }}">Как покупать на ARMADA.KZ?</a></li>
                            <li><a href="{{ route('login') }}">Вход в кабинет для покупателя</a></li>
                        </ul>
                    </nav>
                    <b class="footer__column-title">Ссылки</b>
                    <nav class="footer__nav">
                        <ul>
                            <li><a href="{{ asset('files/Privacy-Policy.docx') }}" download="Политика конфиденциальности">Политика конфиденциальности</a></li>
                            <li><a href="{{ asset('files/Terms-of-use.docx') }}" download="Согласие на обработку персональных данных">Сбор и обработка информации</a></li>
                            <li><a href="{{ asset('files/Personal-data.docx') }}" download="Пользовательское соглашение">Пользовательское соглашение</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="footer__contacts col-12 col-md-3">
                    <b class="footer__column-title">Контакты</b>
                    <ul class="footer__contacts-items">
                        <li class="footer__contacts-item">
                            <span>
                                <img src="{{ asset('img/location-accent.png') }}" width="12" alt="Location">
                            </span>
                            <span>Алматы, ул. Кабдолова (Маречека) 1/8, угол ул. Саина</span>
                        </li>
                        <li class="footer__contacts-item">
                            <span>
                                <img src="{{ asset('img/phone.png') }}" width="14" alt="phone">
                            </span>
                            <span>
                                <span>Справочная:</span><br>
                                <b><a href="tel:87273279027">8 (727) 327 90 27</a></b>
                            </span>
                        </li>
                        <li class="footer__contacts-item">
                            <span>
                                <img src="{{ asset('img/whatsapp.png') }}" width="16" alt="watsapp">
                            </span>
                            <span>
                                <span>Напишите:</span><br>
                                <b><a href="https://wa.me/87273279027" target="_blank">8 (727) 327 90 27</a></b>
                            </span>
                        </li>
                        <li class="footer__contacts-item">
                            <span>
                                <img src="{{ asset('img/mail.png') }}" width="17" alt="mail">
                            </span>
                            <span>
                                <span>Электронная почта:</span><br>
                                <b><a href="mailto:info@armada.kz">info@armada.kz</a></b>
                            </span>
                        </li>
                        <li class="footer__contacts-item">
                            <span></span>
                            <span>
                                <span>&copy; TK ARMADA, 2020</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="footer__bottom container">
        <div class="footer__bottom-wrap">
            <div class="footer__payments">
                <span>Принимаем оплату</span>
                <ul>
                    <li><img src="{{ asset('img/payments/4.png') }}" alt="Payment"></li>
                    <li><img src="{{ asset('img/payments/5.png') }}" alt="Payment"></li>
                </ul>
            </div>
            {{-- <div class="footer__vendor">
                <span>Разработка и продвижение в интеренет</span>
                <a href="https://webpr.ua/" target="_blank">
                    <img src="{{ asset('img/vendor.png') }}" alt="WebPR">
                </a>
            </div> --}}
        </div>
    </div> --}}
</footer>
