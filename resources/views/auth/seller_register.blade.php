@extends('_layout')

@section('title','ARMADA - регистрация')

@section('content')

    <div class="page-login__bg page-login__bg--seller" style="background: url('{{ asset('img/sections-bg/vendor-login-bg.jpg') }}')">
        <div class="login login--register page-login__login">
            <form action="{{ route('register') }}" class="d-flex flex-column justify-content-between h-100 needs-validation" novalidate method="POST">
                @csrf

                @include('layouts.messages')

                <input type="hidden" name="recaptcha" id="recaptcha">
                <input type="hidden" name="seller" value="seller">
                <div>
                    <h3 class="h4 pb-3 border-bottom text-center login__title">Регистрация продавца</h3>

                    <div class="row">
                        <div class="col-12 col-xl">
                            <div class="md-form mt-0 mb-xl-0 md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                                    <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                                </svg>
                                <input type="text" name="name" id="register-name" class="form-control mb-0" value="{{ old('name') }}" autocomplete="name" required>
                                <label for="register-name">Ваше имя</label>
                                <div class="invalid-feedback">
                                    Пожалуйста введите имя.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl">
                            <div class="md-form m-0 md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                                    <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                                </svg>
                                <input type="text" name="sname" id="register-surname" class="form-control mb-0" value="{{ old('sname') }}" autocomplete="sname" >
                                <label for="register-surname">Ваша фамилия</label>
                            </div>
                        </div>
                    </div>
                    {{--                <div class="md-form md-outline input-with-pre-icon">--}}
                    {{--                    <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                        <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>--}}
                    {{--                        <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>--}}
                    {{--                    </svg>--}}
                    {{--                    <input type="text" name="login" id="register-login" class="form-control" required>--}}
                    {{--                    <label for="register-login">Введите логин</label>--}}
                    {{--                    <div class="invalid-feedback">--}}
                    {{--                        Пожалуйста введите логин.--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    <div class="md-form mb-0 md-outline input-with-pre-icon">
                        <svg class="input-prefix" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.6579 11.1932C14.6092 11.1932 13.5821 11.0294 12.6077 10.7073C12.1326 10.5436 11.594 10.6697 11.2809 10.9883L9.35092 12.4458C7.13732 11.2648 5.72006 9.84838 4.55335 7.64913L5.97149 5.76481C6.32849 5.40693 6.45645 4.88527 6.30345 4.39586C5.98043 3.417 5.81581 2.38895 5.81581 1.34211C5.81581 0.602144 5.21366 0 4.4737 0H1.34211C0.602144 0 0 0.602144 0 1.34211C0 9.97542 7.02458 17 15.6579 17C16.3979 17 17 16.3979 17 15.6579V12.5353C17 11.7953 16.3979 11.1932 15.6579 11.1932ZM16.1053 15.6579C16.1053 15.9048 15.904 16.1053 15.6579 16.1053C7.51756 16.1053 0.894724 9.48244 0.894724 1.34211C0.894724 1.09516 1.09604 0.894724 1.34211 0.894724H4.4737C4.71977 0.894724 4.92108 1.09516 4.92108 1.34211C4.92108 2.4847 5.10005 3.6067 5.45076 4.67053C5.50264 4.83783 5.46061 5.01054 5.29687 5.18053L3.66844 7.33683C3.56556 7.47373 3.54945 7.65714 3.62729 7.80926C4.95418 10.4156 6.56563 12.028 9.19079 13.3727C9.34198 13.4515 9.52719 13.4354 9.66409 13.3316L11.8669 11.662C11.9869 11.5439 12.1631 11.5028 12.3224 11.5555C13.3925 11.909 14.5145 12.0879 15.658 12.0879C15.904 12.0879 16.1054 12.2883 16.1054 12.5353V15.6579H16.1053Z" fill="#737373"/>
                        </svg>
                        <input type="tel" name="phone" id="register-phone" class="form-control mb-0" value="{{ old('phone') }}" placeholder="+7 (---) --- -- --" autocomplete="phone" required>
                        <label for="register-phone">Номер телефона</label>
                        <div class="invalid-feedback">
                            Пожалуйста введите номер телефона.
                        </div>
                    </div>
                    <div class="md-form mb-0 md-outline input-with-pre-icon">
                        <svg class="input-prefix" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.418 0.0273438H1.58203C0.710789 0.0273438 0 0.749496 0 1.63642V12.3636C0 13.2475 0.707625 13.9727 1.58203 13.9727H16.418C17.287 13.9727 18 13.2529 18 12.3636V1.63642C18 0.7525 17.2924 0.0273438 16.418 0.0273438ZM16.1995 1.10006L9.03354 8.38856L1.80559 1.10006H16.1995ZM1.05469 12.1415V1.85343L6.13403 6.97529L1.05469 12.1415ZM1.80046 12.8999L6.883 7.73052L8.66391 9.52632C8.87006 9.73421 9.20275 9.73353 9.40806 9.52467L11.1445 7.75852L16.1995 12.8999H1.80046ZM16.9453 12.1414L11.8903 7L16.9453 1.85854V12.1414Z" fill="#737373"/>
                        </svg>
                        <input type="email" name="email" id="register-email" class="form-control mb-0" value="{{ old('email') }}" autocomplete="email" required>
                        <label for="register-email">E-mail</label>
                        <div class="invalid-feedback">
                            Пожалуйста введите ваш E-mail.
                        </div>
                    </div>
                    <div class="md-form md-outline input-with-pre-icon show_hide_password">
                        <svg class="input-prefix" width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2812 17H1.71875C0.840417 17 0.125 16.2853 0.125 15.4062V7.96875C0.125 7.08971 0.840417 6.375 1.71875 6.375H11.2812C12.1596 6.375 12.875 7.08971 12.875 7.96875V15.4062C12.875 16.2853 12.1596 17 11.2812 17ZM1.71875 7.4375C1.42621 7.4375 1.1875 7.6755 1.1875 7.96875V15.4062C1.1875 15.6995 1.42621 15.9375 1.71875 15.9375H11.2812C11.5738 15.9375 11.8125 15.6995 11.8125 15.4062V7.96875C11.8125 7.6755 11.5738 7.4375 11.2812 7.4375H1.71875Z" fill="#737373"/>
                            <path d="M10.2187 7.4375C9.9255 7.4375 9.6875 7.1995 9.6875 6.90625V4.25C9.6875 2.49262 8.25737 1.0625 6.5 1.0625C4.74262 1.0625 3.3125 2.49262 3.3125 4.25V6.90625C3.3125 7.1995 3.0745 7.4375 2.78125 7.4375C2.488 7.4375 2.25 7.1995 2.25 6.90625V4.25C2.25 1.90612 4.15612 0 6.5 0C8.84387 0 10.75 1.90612 10.75 4.25V6.90625C10.75 7.1995 10.512 7.4375 10.2187 7.4375Z" fill="#737373"/>
                            <path d="M6.49992 12.0418C5.71863 12.0418 5.08325 11.4065 5.08325 10.6252C5.08325 9.84387 5.71863 9.2085 6.49992 9.2085C7.28121 9.2085 7.91658 9.84387 7.91658 10.6252C7.91658 11.4065 7.28121 12.0418 6.49992 12.0418ZM6.49992 10.271C6.30512 10.271 6.14575 10.4297 6.14575 10.6252C6.14575 10.8207 6.30512 10.9793 6.49992 10.9793C6.69471 10.9793 6.85408 10.8207 6.85408 10.6252C6.85408 10.4297 6.69471 10.271 6.49992 10.271Z" fill="#737373"/>
                            <path d="M6.5 14.1667C6.20675 14.1667 5.96875 13.9287 5.96875 13.6354V11.6875C5.96875 11.3942 6.20675 11.1562 6.5 11.1562C6.79325 11.1562 7.03125 11.3942 7.03125 11.6875V13.6354C7.03125 13.9287 6.79325 14.1667 6.5 14.1667Z" fill="#737373"/>
                        </svg>
                        <input type="password" name="password" id="register-password" class="form-control" autocomplete="password" required>
                        <label for="register-password">Придумайте пароль</label>
                        <div class="password-view">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        <div class="invalid-feedback">
                            Пожалуйста придумайте пароль.
                        </div>
                    </div>
                    <div class="md-form md-outline input-with-pre-icon show_hide_password">
                        <svg class="input-prefix" width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2812 17H1.71875C0.840417 17 0.125 16.2853 0.125 15.4062V7.96875C0.125 7.08971 0.840417 6.375 1.71875 6.375H11.2812C12.1596 6.375 12.875 7.08971 12.875 7.96875V15.4062C12.875 16.2853 12.1596 17 11.2812 17ZM1.71875 7.4375C1.42621 7.4375 1.1875 7.6755 1.1875 7.96875V15.4062C1.1875 15.6995 1.42621 15.9375 1.71875 15.9375H11.2812C11.5738 15.9375 11.8125 15.6995 11.8125 15.4062V7.96875C11.8125 7.6755 11.5738 7.4375 11.2812 7.4375H1.71875Z" fill="#737373"/>
                            <path d="M10.2187 7.4375C9.9255 7.4375 9.6875 7.1995 9.6875 6.90625V4.25C9.6875 2.49262 8.25737 1.0625 6.5 1.0625C4.74262 1.0625 3.3125 2.49262 3.3125 4.25V6.90625C3.3125 7.1995 3.0745 7.4375 2.78125 7.4375C2.488 7.4375 2.25 7.1995 2.25 6.90625V4.25C2.25 1.90612 4.15612 0 6.5 0C8.84387 0 10.75 1.90612 10.75 4.25V6.90625C10.75 7.1995 10.512 7.4375 10.2187 7.4375Z" fill="#737373"/>
                            <path d="M6.49992 12.0418C5.71863 12.0418 5.08325 11.4065 5.08325 10.6252C5.08325 9.84387 5.71863 9.2085 6.49992 9.2085C7.28121 9.2085 7.91658 9.84387 7.91658 10.6252C7.91658 11.4065 7.28121 12.0418 6.49992 12.0418ZM6.49992 10.271C6.30512 10.271 6.14575 10.4297 6.14575 10.6252C6.14575 10.8207 6.30512 10.9793 6.49992 10.9793C6.69471 10.9793 6.85408 10.8207 6.85408 10.6252C6.85408 10.4297 6.69471 10.271 6.49992 10.271Z" fill="#737373"/>
                            <path d="M6.5 14.1667C6.20675 14.1667 5.96875 13.9287 5.96875 13.6354V11.6875C5.96875 11.3942 6.20675 11.1562 6.5 11.1562C6.79325 11.1562 7.03125 11.3942 7.03125 11.6875V13.6354C7.03125 13.9287 6.79325 14.1667 6.5 14.1667Z" fill="#737373"/>
                        </svg>
                        <input type="password" name="password_confirmation" id="register-password-repeat" class="form-control" autocomplete="password_confirmation" required>
                        <label for="register-password-repeat">Повторите пароль</label>
                        <div class="password-view">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        <div class="invalid-feedback">
                            Повторный пароль не совпадает.
                        </div>
                    </div>
                    <button class="button btn-primary btn-block my-4 text-uppercase rounded" type="submit">Зарегистрироваться</button>
                    <p class="text-center">
                        <a href="{{ route('sellerLogin') }}" class="d-flex align-items-center justify-content-center font-weight-semibold login__as-seller">
                            <span class="mr-2">У меня уже есть аккаунт продавца</span>
                            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.12779 5.10739L1.73144 0.162381C1.49466 -0.0541269 1.11102 -0.0541269 0.873636 0.162381C0.636848 0.378888 0.636848 0.730553 0.873636 0.947061L5.84195 5.4997L0.874234 10.0523C0.637446 10.2689 0.637446 10.6205 0.874234 10.8376C1.11102 11.0541 1.49525 11.0541 1.73204 10.8376L7.12839 5.89257C7.36159 5.6783 7.36159 5.32111 7.12779 5.10739Z" fill="#393939"/>
                            </svg>
                        </a>
                    </p>
                </div>

                <div class="text-center mt-2">
                    <div class="d-flex align-items-center justify-content-between" style="color: #787878;">
                        <span class="flex-grow-1"><hr></span>
                        <span class="col" style="white-space: nowrap">Войти или зарегистрироваться как пользователь</span>
                        <span class="flex-grow-1"><hr></span>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="font-weight-semibold text-underline ml-3">Вход</a>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="font-weight-semibold text-underline ml-3">Регистрация</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-login/login.min.css') }}">
    {{-- inputmask --}}
    {{--    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>--}}
    {{--    <script src="{{ asset('plugins/inputmask/mask-form.js') }}"></script>--}}
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-login/login-min.js') }}"></script>
@endpush

