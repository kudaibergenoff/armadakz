<div class="d-flex mb-4 pb-4 border-bottom">
    <div class="user-block__icon">
        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9 11.875C10.8109 11.875 10.2873 12.5 8.5 12.5C6.71272 12.5 6.19286 11.875 5.1 11.875C2.28437 11.875 0 14.2266 0 17.125V18.125C0 19.1602 0.815848 20 1.82143 20H15.1786C16.1842 20 17 19.1602 17 18.125V17.125C17 14.2266 14.7156 11.875 11.9 11.875ZM15.1786 18.125H1.82143V17.125C1.82143 15.2656 3.29375 13.75 5.1 13.75C5.65402 13.75 6.55335 14.375 8.5 14.375C10.4618 14.375 11.3422 13.75 11.9 13.75C13.7063 13.75 15.1786 15.2656 15.1786 17.125V18.125ZM8.5 11.25C11.5167 11.25 13.9643 8.73047 13.9643 5.625C13.9643 2.51953 11.5167 0 8.5 0C5.48326 0 3.03571 2.51953 3.03571 5.625C3.03571 8.73047 5.48326 11.25 8.5 11.25ZM8.5 1.875C10.5074 1.875 12.1429 3.55859 12.1429 5.625C12.1429 7.69141 10.5074 9.375 8.5 9.375C6.49263 9.375 4.85714 7.69141 4.85714 5.625C4.85714 3.55859 6.49263 1.875 8.5 1.875Z" fill="black"/>
        </svg>
    </div>
    <div class="user-block__wrap">
        <div class="user-block__header">
            <div class="user-block__title">Логин</div>
        </div>
        <div class="user-block__content flex-grow-1">
            <ul class="user-block__items row">
                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-4">
                    <div class="user-block-info__na2me">Логин</div>
                    <div class="user-block-info__value">
                        <input type="text" class="form-control user-block-info__value--no-change" name="login" value="{{ Auth::user()->email ?? old('email') }}" required>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </li>
                <li class="user-block-info user-block__item col-12 col-md-6 col-xl-8">
                    <a href="{{ route('password.request') }}" class="button btn-outline-dark d-block d-sm-inline mt-5 mx-auto mx-sm-0">Сменить пароль</a>
                </li>
            </ul>
        </div>
    </div>
</div>
