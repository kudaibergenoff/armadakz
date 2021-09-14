<div class="duplicate user-block__additional-phones bg-light rounded py-3 px-4 mt-4">
    <p class="mb-4">Дополнительные номера телефонов</p>

    @if(isset($user->additional_phone) and count($user->additional_phone) > 0)
        @for($i = 0; $i < count($user->additional_phone); $i++)
            <div class="duplicate__item user-block__additional-phone d-flex align-items-center" data-duplicate-item-id="1">
                <ul class="user-block__items flex-grow-1 row">
                    <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                        <div class="user-block-info__name">Телефон</div>
                        <div class="user-block-info__value">
                            <input type="tel" class="form-control" name="additional_phone[]" value="{{ $user->additional_phone[$i] ?? old('additional_phone') }}">
                            <span>{{ $user->additional_phone[$i] ?? 'Не указан' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                        <div class="user-block-info__name">Добавочный</div>
                        <div class="user-block-info__value">
                            <input type="text" class="form-control" name="additional_phone_additional[]" placeholder="Например: 10" value="{{ $user->additional_phone_additional[$i] ?? old('additional_phone_additional') }}">
                            <span>{{ $user->additional_phone_additional[$i] ?? 'Не указан' }}</span>
                        </div>
                    </li>
                    <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                        <div class="user-block-info__name">Коментарий</div>
                        <div class="user-block-info__value">
                            <input type="text" class="form-control" name="additional_phone_comment[]" placeholder="Например: Бухгалтер" value="{{ $user->additional_phone_comment[$i] ?? old('additional_phone_comment') }}">
                            <span>{{ $user->additional_phone_comment[$i] ?? 'Не указан' }}</span>
                        </div>
                    </li>
                </ul>
                <div class="duplicate__delete">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="30" height="30" rx="3" fill="#E0001A"/>
                        <path d="M21.9641 6.85707H18.4284V6.21422C18.4284 5.15081 17.5632 4.28564 16.4998 4.28564H13.9284C12.865 4.28564 11.9998 5.15081 11.9998 6.21422V6.85707H8.46408C7.5779 6.85707 6.85693 7.57804 6.85693 8.46422V10.7142C6.85693 11.0692 7.14477 11.3571 7.49979 11.3571H7.85111L8.4065 23.0202C8.45556 24.0502 9.30172 24.8571 10.3329 24.8571H20.0953C21.1265 24.8571 21.9726 24.0502 22.0217 23.0202L22.577 11.3571H22.9284C23.2834 11.3571 23.5712 11.0692 23.5712 10.7142V8.46422C23.5712 7.57804 22.8503 6.85707 21.9641 6.85707ZM13.2855 6.21422C13.2855 5.85976 13.5739 5.57136 13.9284 5.57136H16.4998C16.8542 5.57136 17.1426 5.85976 17.1426 6.21422V6.85707H13.2855V6.21422ZM8.14265 8.46422C8.14265 8.28699 8.28685 8.14279 8.46408 8.14279H21.9641C22.1413 8.14279 22.2855 8.28699 22.2855 8.46422V10.0714C22.0874 10.0714 8.96362 10.0714 8.14265 10.0714V8.46422ZM20.7374 22.9591C20.721 23.3024 20.439 23.5714 20.0953 23.5714H10.3329C9.98913 23.5714 9.70708 23.3024 9.69077 22.9591L9.13827 11.3571H21.2899L20.7374 22.9591Z" fill="white"/>
                        <path d="M15.2141 22.2859C15.5692 22.2859 15.857 21.9981 15.857 21.6431V13.2859C15.857 12.9309 15.5692 12.6431 15.2141 12.6431C14.8591 12.6431 14.5713 12.9309 14.5713 13.2859V21.6431C14.5713 21.9981 14.8591 22.2859 15.2141 22.2859Z" fill="white"/>
                        <path d="M18.4285 22.2859C18.7835 22.2859 19.0714 21.9981 19.0714 21.6431V13.2859C19.0714 12.9309 18.7835 12.6431 18.4285 12.6431C18.0735 12.6431 17.7856 12.9309 17.7856 13.2859V21.6431C17.7856 21.9981 18.0734 22.2859 18.4285 22.2859Z" fill="white"/>
                        <path d="M11.9998 22.2859C12.3548 22.2859 12.6426 21.9981 12.6426 21.6431V13.2859C12.6426 12.9309 12.3548 12.6431 11.9998 12.6431C11.6448 12.6431 11.3569 12.9309 11.3569 13.2859V21.6431C11.3569 21.9981 11.6447 22.2859 11.9998 22.2859Z" fill="white"/>
                    </svg>
                </div>
            </div>
        @endfor
    @else
        <div class="duplicate__item user-block__additional-phone d-flex align-items-center" data-duplicate-item-id="1">
            <ul class="user-block__items flex-grow-1 row">
                <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                    <div class="user-block-info__name">Телефон</div>
                    <div class="user-block-info__value">
                        <input type="tel" class="form-control" name="additional_phone[]">
                        <span>Не указан</span>
                    </div>
                </li>
                <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                    <div class="user-block-info__name">Добавочный</div>
                    <div class="user-block-info__value">
                        <input type="text" class="form-control" name="additional_phone_additional[]" placeholder="Например: 10">
                        <span>Не указан</span>
                    </div>
                </li>
                <li class="user-block-info user-block__item col-12 col-md-6 mb-0 col-xl-4">
                    <div class="user-block-info__name">Коментарий</div>
                    <div class="user-block-info__value">
                        <input type="text" class="form-control" name="additional_phone_comment[]" placeholder="Например: Бухгалтер">
                        <span>Не указан</span>
                    </div>
                </li>
            </ul>
            <div class="duplicate__delete">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="30" height="30" rx="3" fill="#E0001A"/>
                    <path d="M21.9641 6.85707H18.4284V6.21422C18.4284 5.15081 17.5632 4.28564 16.4998 4.28564H13.9284C12.865 4.28564 11.9998 5.15081 11.9998 6.21422V6.85707H8.46408C7.5779 6.85707 6.85693 7.57804 6.85693 8.46422V10.7142C6.85693 11.0692 7.14477 11.3571 7.49979 11.3571H7.85111L8.4065 23.0202C8.45556 24.0502 9.30172 24.8571 10.3329 24.8571H20.0953C21.1265 24.8571 21.9726 24.0502 22.0217 23.0202L22.577 11.3571H22.9284C23.2834 11.3571 23.5712 11.0692 23.5712 10.7142V8.46422C23.5712 7.57804 22.8503 6.85707 21.9641 6.85707ZM13.2855 6.21422C13.2855 5.85976 13.5739 5.57136 13.9284 5.57136H16.4998C16.8542 5.57136 17.1426 5.85976 17.1426 6.21422V6.85707H13.2855V6.21422ZM8.14265 8.46422C8.14265 8.28699 8.28685 8.14279 8.46408 8.14279H21.9641C22.1413 8.14279 22.2855 8.28699 22.2855 8.46422V10.0714C22.0874 10.0714 8.96362 10.0714 8.14265 10.0714V8.46422ZM20.7374 22.9591C20.721 23.3024 20.439 23.5714 20.0953 23.5714H10.3329C9.98913 23.5714 9.70708 23.3024 9.69077 22.9591L9.13827 11.3571H21.2899L20.7374 22.9591Z" fill="white"/>
                    <path d="M15.2141 22.2859C15.5692 22.2859 15.857 21.9981 15.857 21.6431V13.2859C15.857 12.9309 15.5692 12.6431 15.2141 12.6431C14.8591 12.6431 14.5713 12.9309 14.5713 13.2859V21.6431C14.5713 21.9981 14.8591 22.2859 15.2141 22.2859Z" fill="white"/>
                    <path d="M18.4285 22.2859C18.7835 22.2859 19.0714 21.9981 19.0714 21.6431V13.2859C19.0714 12.9309 18.7835 12.6431 18.4285 12.6431C18.0735 12.6431 17.7856 12.9309 17.7856 13.2859V21.6431C17.7856 21.9981 18.0734 22.2859 18.4285 22.2859Z" fill="white"/>
                    <path d="M11.9998 22.2859C12.3548 22.2859 12.6426 21.9981 12.6426 21.6431V13.2859C12.6426 12.9309 12.3548 12.6431 11.9998 12.6431C11.6448 12.6431 11.3569 12.9309 11.3569 13.2859V21.6431C11.3569 21.9981 11.6447 22.2859 11.9998 22.2859Z" fill="white"/>
                </svg>
            </div>
        </div>
    @endif

    <span class="duplicate__add input-duplicate">
        <span class="d-inline-flex align-items-center button btn-success btn-sm">
            <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 0C3.36425 0 0 3.36425 0 7.5C0 11.6358 3.36425 15 7.5 15C11.6358 15 15 11.6352 15 7.5C15 3.36483 11.6358 0 7.5 0ZM7.5 13.8381C4.00562 13.8381 1.16188 10.995 1.16188 7.5C1.16188 4.00503 4.00562 1.16188 7.5 1.16188C10.9944 1.16188 13.8381 4.00503 13.8381 7.5C13.8381 10.995 10.995 13.8381 7.5 13.8381Z" fill="white"/>
                <path d="M10.4046 6.86713H8.0808V4.54336C8.0808 4.22268 7.82111 3.9624 7.49984 3.9624C7.17857 3.9624 6.91889 4.22268 6.91889 4.54336V6.86713H4.59512C4.27385 6.86713 4.01416 7.1274 4.01416 7.44809C4.01416 7.76877 4.27385 8.02904 4.59512 8.02904H6.91889V10.3528C6.91889 10.6735 7.17857 10.9338 7.49984 10.9338C7.82111 10.9338 8.0808 10.6735 8.0808 10.3528V8.02904H10.4046C10.7258 8.02904 10.9855 7.76877 10.9855 7.44809C10.9855 7.1274 10.7258 6.86713 10.4046 6.86713Z" fill="white"/>
            </svg>
            <span>Добавить</span>
        </span>
    </span>
</div>
