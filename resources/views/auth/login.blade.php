@extends('_layout')

@section('title','ARMADA - вход')

@section('content')

    <div class="page-login__bg" style="background: url('{{ asset('img/sections-bg/register-bg.jpg') }}')">
        <section class="login page-login__login">
            <form {{ route('login') }} class="d-flex flex-column justify-content-between h-100" method="POST">
                @csrf

                @include('layouts.messages')

                <div>
                    <h3 class="h4 text-center login__title">Вход</h3>

                    <div class="md-form md-outline input-with-pre-icon">
                        <svg class="fas fa-envelope input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                            <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                        </svg>
                        <input type="text" name="email" id="login-login" class="form-control" value="{{ old('email') }}" autocomplete="email" required>
                        <label for="login-login">Введите E-mail</label>
                    </div>
                    <div class="md-form md-outline input-with-pre-icon show_hide_password">
                        <svg class="fas fa-envelope input-prefix" width="13" height="17" viewBox="0 0 13 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2812 17H1.71875C0.840417 17 0.125 16.2853 0.125 15.4062V7.96875C0.125 7.08971 0.840417 6.375 1.71875 6.375H11.2812C12.1596 6.375 12.875 7.08971 12.875 7.96875V15.4062C12.875 16.2853 12.1596 17 11.2812 17ZM1.71875 7.4375C1.42621 7.4375 1.1875 7.6755 1.1875 7.96875V15.4062C1.1875 15.6995 1.42621 15.9375 1.71875 15.9375H11.2812C11.5738 15.9375 11.8125 15.6995 11.8125 15.4062V7.96875C11.8125 7.6755 11.5738 7.4375 11.2812 7.4375H1.71875Z" fill="#737373"/>
                            <path d="M10.2187 7.4375C9.9255 7.4375 9.6875 7.1995 9.6875 6.90625V4.25C9.6875 2.49262 8.25737 1.0625 6.5 1.0625C4.74262 1.0625 3.3125 2.49262 3.3125 4.25V6.90625C3.3125 7.1995 3.0745 7.4375 2.78125 7.4375C2.488 7.4375 2.25 7.1995 2.25 6.90625V4.25C2.25 1.90612 4.15612 0 6.5 0C8.84387 0 10.75 1.90612 10.75 4.25V6.90625C10.75 7.1995 10.512 7.4375 10.2187 7.4375Z" fill="#737373"/>
                            <path d="M6.49992 12.0418C5.71863 12.0418 5.08325 11.4065 5.08325 10.6252C5.08325 9.84387 5.71863 9.2085 6.49992 9.2085C7.28121 9.2085 7.91658 9.84387 7.91658 10.6252C7.91658 11.4065 7.28121 12.0418 6.49992 12.0418ZM6.49992 10.271C6.30512 10.271 6.14575 10.4297 6.14575 10.6252C6.14575 10.8207 6.30512 10.9793 6.49992 10.9793C6.69471 10.9793 6.85408 10.8207 6.85408 10.6252C6.85408 10.4297 6.69471 10.271 6.49992 10.271Z" fill="#737373"/>
                            <path d="M6.5 14.1667C6.20675 14.1667 5.96875 13.9287 5.96875 13.6354V11.6875C5.96875 11.3942 6.20675 11.1562 6.5 11.1562C6.79325 11.1562 7.03125 11.3942 7.03125 11.6875V13.6354C7.03125 13.9287 6.79325 14.1667 6.5 14.1667Z" fill="#737373"/>
                        </svg>
                        <input type="password" name="password" id="login-password" class="form-control" autocomplete="password" required>
                        <div class="password-view">
                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        <label for="login-password">Введите пароль</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label ml-2" for="remember">Запомнить меня</label>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('password.request') }}" class="btn-link text-underline">Забыли пароль?</a>
                        </div>
                    </div>

                    <button class="button btn-primary btn-block my-4 text-uppercase rounded" type="submit">Войти</button>

                    <div class="text-center">
                        <p>Нет аккаунта?
                            <a href="{{ route('register') }}" class="font-weight-semibold text-underline ml-3">Регистрация</a>
                        </p>
                    </div>
                </div>

                <div class="text-center">
                    <p>
                        <a href="{{ route('sellerLogin') }}" class="d-flex align-items-center justify-content-center font-weight-semibold login__as-seller">
                            <span class="mr-2">Войти как продавец</span>
                            <svg width="8" height="11" viewBox="0 0 8 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.12779 5.10739L1.73144 0.162381C1.49466 -0.0541269 1.11102 -0.0541269 0.873636 0.162381C0.636848 0.378888 0.636848 0.730553 0.873636 0.947061L5.84195 5.4997L0.874234 10.0523C0.637446 10.2689 0.637446 10.6205 0.874234 10.8376C1.11102 11.0541 1.49525 11.0541 1.73204 10.8376L7.12839 5.89257C7.36159 5.6783 7.36159 5.32111 7.12779 5.10739Z" fill="#393939"/>
                            </svg>
                        </a>
                    </p>

                    <div class="d-flex align-items-center justify-content-between" style="color: #787878;">
                        <span class="flex-grow-1"><hr></span>
                        <span class="col" style="white-space: nowrap">Войти через</span>
                        <span class="flex-grow-1"><hr></span>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <div class="social-login social-login--facebook flex-grow-1 mr-2 align-items-center">
                            <div class="social-login__icon">
                                <img src="{{ asset('img/facebook-logo.png') }}" alt="Facebook">
                            </div>
                            <div>
                                <span class="d-block social-login__name">Facebook</span>
                            </div>
                        </div>
                        <div class="social-login social-login--google flex-grow-1 ml-2 align-items-center">
                            <div class="social-login__icon">
                                <img src="{{ asset('img/google-logo.png') }}" alt="Google">
                            </div>
                            <div>
                                <span class="d-block social-login__name">Google</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-login/login.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-login/login-min.js') }}"></script>
@endpush
