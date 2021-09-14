<div class="d-flex mb-5 pb-5 border-bottom">
    <div class="user-block__icon">
        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9 11.875C10.8109 11.875 10.2873 12.5 8.5 12.5C6.71272 12.5 6.19286 11.875 5.1 11.875C2.28437 11.875 0 14.2266 0 17.125V18.125C0 19.1602 0.815848 20 1.82143 20H15.1786C16.1842 20 17 19.1602 17 18.125V17.125C17 14.2266 14.7156 11.875 11.9 11.875ZM15.1786 18.125H1.82143V17.125C1.82143 15.2656 3.29375 13.75 5.1 13.75C5.65402 13.75 6.55335 14.375 8.5 14.375C10.4618 14.375 11.3422 13.75 11.9 13.75C13.7063 13.75 15.1786 15.2656 15.1786 17.125V18.125ZM8.5 11.25C11.5167 11.25 13.9643 8.73047 13.9643 5.625C13.9643 2.51953 11.5167 0 8.5 0C5.48326 0 3.03571 2.51953 3.03571 5.625C3.03571 8.73047 5.48326 11.25 8.5 11.25ZM8.5 1.875C10.5074 1.875 12.1429 3.55859 12.1429 5.625C12.1429 7.69141 10.5074 9.375 8.5 9.375C6.49263 9.375 4.85714 7.69141 4.85714 5.625C4.85714 3.55859 6.49263 1.875 8.5 1.875Z" fill="black"/>
        </svg>
    </div>
    <div class="user-block__wrap">
        <div class="user-block__header">
            <div class="user-block__title">Персональные данные</div>
        </div>
        <div class="user-block__content flex-grow-1">
            <ul class="user-block__items align-items-start row">
                <li class="images-wrap col-12 col-md-4 col-xl-2">
                    <div class="image-upload-wrap">
                        <div class="image-upload">
                            <div class="image-upload__preview" data-default-image="{{ asset('/img/noimg.jpg') }}" style="background-image: url({{ Auth::user()->getImage('avatar') }})"></div>
                            <input type="hidden" name="images[]" value="">
                            <ul class="image-upload__actions">
                                <li class="image-upload__action image-upload__action--load">
                                    <label>
                                        <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.98606 6.98194L9.44853 3.54907V18.7546C9.44853 19.33 9.91959 19.7971 10.5 19.7971C11.0804 19.7971 11.5515 19.33 11.5515 18.7546V3.54907L15.0139 6.98194C15.219 7.18574 15.4881 7.28738 15.7573 7.28738C16.0265 7.28738 16.2957 7.18574 16.5007 6.98194C16.9113 6.57485 16.9113 5.91497 16.5007 5.50788L11.2434 0.295514C10.8333 -0.111571 10.1667 -0.111571 9.75661 0.295514L4.49929 5.50788C4.0887 5.91497 4.0887 6.57485 4.49929 6.98194C4.90936 7.38902 5.57599 7.38902 5.98606 6.98194Z" fill="white"/>
                                            <path d="M19.9632 16.6699C19.3827 16.6699 18.9117 17.1369 18.9117 17.7124V21.8823C18.9117 22.4572 18.4401 22.9247 17.8602 22.9247H3.13974C2.55986 22.9247 2.08828 22.4572 2.08828 21.8823V17.7124C2.08828 17.1369 1.61722 16.6699 1.03681 16.6699C0.456407 16.6699 -0.0146484 17.1369 -0.0146484 17.7124V21.8823C-0.0146484 23.607 1.4001 25.0097 3.13974 25.0097H17.8602C19.5999 25.0097 21.0146 23.607 21.0146 21.8823V17.7124C21.0146 17.1369 20.5436 16.6699 19.9632 16.6699Z" fill="white"/>
                                        </svg>
                                        <input
                                            type="file"
                                            class="image-upload__upload img"
                                            value="Загрузить фото"
                                            accept=".png, .jpg, .jpeg"
                                            data-aspect-ratio-x="4"
                                            data-aspect-ratio-y="3">
                                    </label>
                                </li>
                                <li class="image-upload__action image-upload__action--clear">
                                    <svg width="29" height="25" viewBox="0 0 29 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M28.1504 23.2497H18.8379L27.8358 14.0983C28.5861 13.3353 28.9993 12.3209 28.9993 11.2419C28.9993 10.163 28.5861 9.14851 27.8358 8.38549L20.7742 1.20381C19.2255 -0.371247 16.7056 -0.371247 15.1569 1.20381L1.16351 15.4352C0.413193 16.1982 0 17.2126 0 18.2917C0 19.3706 0.413193 20.385 1.16351 21.1481L4.68044 24.7248C4.83977 24.8868 5.05586 24.9779 5.28117 24.9779H28.1504C28.6196 24.9779 29 24.591 29 24.1138C29 23.6366 28.6196 23.2497 28.1504 23.2497ZM13.3633 5.47178L15.5993 7.7458L8.74673 14.715L6.51073 12.441L13.3633 5.47178ZM20.2017 12.4265L13.3491 19.3956L9.94819 15.9369L16.8008 8.96775L20.2017 12.4265ZM21.4032 13.6484L23.6392 15.9225L21.3471 18.2538L16.7867 22.8916L14.5506 20.6175L21.4032 13.6484ZM16.3584 2.42576C17.2446 1.52455 18.6865 1.52455 19.5727 2.42576L26.6343 9.60744C27.5205 10.5087 27.5205 11.9752 26.6343 12.8764L24.8408 14.7005L14.5648 4.24984L16.3584 2.42576ZM2.36497 19.9261C1.93564 19.4895 1.69922 18.9089 1.69922 18.2917C1.69922 17.6743 1.93564 17.0938 2.36492 16.6572L5.30915 13.6629L8.14583 16.5478L8.14588 16.5479L12.7482 21.2285C12.7484 21.2287 12.7486 21.2288 12.7487 21.229L14.7357 23.2497H5.63308L2.36497 19.9261Z" fill="white"/>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="col-12 col-md-8 col-xl-8">
                    <ul class="row list-style-none p-0">
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Наименование компании</div>
                            <div class="user-block-info__value">
                                <input type="text" class="form-control" name="company" value="{{ $user->company ?? old('company') }}" required>
                                <span>{{ $user->company ?? 'Не указано' }}</span>
                            </div>
                        </li>
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Фамилия</div>
                            <div class="user-block-info__value">
                                <input type="text" class="form-control" name="sname" value="{{ $user->sname ?? old('sname') }}" required>
                                <span>{{ $user->sname ?? 'Не указано' }}</span>
                            </div>
                        </li>
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Имя</div>
                            <div class="user-block-info__value">
                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" required>
                                <span>{{ $user->name ?? 'Не указано' }}</span>
                            </div>
                        </li>
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Отчество</div>
                            <div class="user-block-info__value">
                                <input type="text" class="form-control" name="mname" value="{{ $user->mname ?? old('mname') }}">
                                <span>{{ $user->mname ?? 'Не указано' }}</span>
                            </div>
                        </li>
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Контактное лицо</div>
                            <div class="user-block-info__value">
                                <input type="text" class="form-control" name="contact_person" value="{{ $user->contact_person ?? old('contact_person') }}">
                                <span>{{ $user->contact_person ?? 'Не указано' }}</span>
                            </div>
                        </li>
                        <li class="user-block-info user-block__item col-12 col-md-6 col-lg-5">
                            <div class="user-block-info__name">Телефон для связи</div>
                            <div class="user-block-info__value">
                                <input type="tel" class="form-control" name="contact_phone" value="{{ $user->contact_phone ?? old('contact_phone') }}" >
                                <span>{{ $user->contact_phone ?? 'Не указан' }}</span>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
