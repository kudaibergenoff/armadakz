@extends('_layout')

@section('title','ARMADA - восстановление пароля')

@section('content')

    <div class="page-login__bg" style="background: url('{{ asset('img/sections-bg/register-bg.jpg') }}')">
        @include('layouts.messages')
        <section class="login page-login__login">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="flex-column justify-content-between h-100 needs-validation" novalidate method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <h3 class="h4 text-center login__title">{{ __('Забыли пароль?') }}</h3>

                <div class="md-form md-outline input-with-pre-icon">
                    <svg class="input-prefix" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.418 0.0273438H1.58203C0.710789 0.0273438 0 0.749496 0 1.63642V12.3636C0 13.2475 0.707625 13.9727 1.58203 13.9727H16.418C17.287 13.9727 18 13.2529 18 12.3636V1.63642C18 0.7525 17.2924 0.0273438 16.418 0.0273438ZM16.1995 1.10006L9.03354 8.38856L1.80559 1.10006H16.1995ZM1.05469 12.1415V1.85343L6.13403 6.97529L1.05469 12.1415ZM1.80046 12.8999L6.883 7.73052L8.66391 9.52632C8.87006 9.73421 9.20275 9.73353 9.40806 9.52467L11.1445 7.75852L16.1995 12.8999H1.80046ZM16.9453 12.1414L11.8903 7L16.9453 1.85854V12.1414Z" fill="#737373"/>
                    </svg>
                    <input type="email" name="email" id="forgot-login" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                    <label for="forgot-login">{{ __('E-mail адрес') }}</label>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="button btn-primary btn-block my-4 text-uppercase rounded" type="submit">{{ __('Изменить пароль') }}</button>
                <div class="text-center">
                    <p>
                        <a href="{{ route('login') }}" class="font-weight-semibold text-underline ml-3 login__remembered-button">{{ __('Я вспомнил свой пароль') }}</a>
                    </p>
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
