<div class="modal fade applicationPost" id="callback" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content callback">
            <div class="modal-header callback__header">
                <div class="m-auto d-flex justify-content-center flex-column align-items-center">
                    <svg class="my-4" width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M92.5523 70.0965L80.7454 58.287C77.5952 55.1368 72.0913 55.1314 68.9359 58.287L66.967 60.2559L90.5842 83.8717L92.5523 81.9036C95.8215 78.6343 95.8105 73.3492 92.5523 70.0965Z" fill="#C9C9C9"/>
                        <path d="M62.9219 64.0823C60.4374 66.0069 56.8931 65.9301 54.623 63.655L31.278 40.2939C29.0027 38.0185 28.926 34.4716 30.8507 31.9932L7.28793 8.43176C-2.84868 20.2474 -2.45235 38.0512 8.7352 49.2387L45.6781 86.1978C56.4139 96.9332 73.9991 98.357 86.4858 87.6445L62.9219 64.0823Z" fill="#C9C9C9"/>
                        <path d="M36.6461 14.1741L24.8392 2.36456C21.689 -0.785657 16.1851 -0.791038 13.0297 2.36456L11.0609 4.33339L34.678 27.9492L36.6461 25.981C39.9151 22.712 39.9043 17.4269 36.6461 14.1741Z" fill="#C9C9C9"/>
                    </svg>
                    <h4 class="text-center mt-3">Перезвоните мне</h4>
                    <p class="text-center">Поможем подобрать для Вас самый подходящий вариант!</p>
                </div>
            </div>
            <form action="#" class="modal-body callback__form p-0" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{ Route::is('product') ? $product->id : null }}">

                <div class="callback__content row m-0 px-4 bg-light">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="md-form mb-0 md-outline input-with-pre-icon">
                            <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                                <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                            </svg>
                            <input type="text" name="name" id="callback-name" class="form-control" required>
                            <label for="callback-name">Ваше имя</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <div class="md-form mb-0 md-outline input-with-pre-icon">
                            <svg class="input-prefix" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6579 11.1932C14.6092 11.1932 13.5821 11.0294 12.6077 10.7073C12.1326 10.5436 11.594 10.6697 11.2809 10.9883L9.35092 12.4458C7.13732 11.2648 5.72006 9.84838 4.55335 7.64913L5.97149 5.76481C6.32849 5.40693 6.45645 4.88527 6.30345 4.39586C5.98043 3.417 5.81581 2.38895 5.81581 1.34211C5.81581 0.602144 5.21366 0 4.4737 0H1.34211C0.602144 0 0 0.602144 0 1.34211C0 9.97542 7.02458 17 15.6579 17C16.3979 17 17 16.3979 17 15.6579V12.5353C17 11.7953 16.3979 11.1932 15.6579 11.1932ZM16.1053 15.6579C16.1053 15.9048 15.904 16.1053 15.6579 16.1053C7.51756 16.1053 0.894724 9.48244 0.894724 1.34211C0.894724 1.09516 1.09604 0.894724 1.34211 0.894724H4.4737C4.71977 0.894724 4.92108 1.09516 4.92108 1.34211C4.92108 2.4847 5.10005 3.6067 5.45076 4.67053C5.50264 4.83783 5.46061 5.01054 5.29687 5.18053L3.66844 7.33683C3.56556 7.47373 3.54945 7.65714 3.62729 7.80926C4.95418 10.4156 6.56563 12.028 9.19079 13.3727C9.34198 13.4515 9.52719 13.4354 9.66409 13.3316L11.8669 11.662C11.9869 11.5439 12.1631 11.5028 12.3224 11.5555C13.3925 11.909 14.5145 12.0879 15.658 12.0879C15.904 12.0879 16.1054 12.2883 16.1054 12.5353V15.6579H16.1053Z" fill="#737373"/>
                            </svg>
                            <input type="tel" name="phone" id="callback-phone" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-3">
                    <div class="text-right">
                        <button type="button" data-dismiss="modal" class="button btn-light rounded mr-3">Закрыть</button>
                        <button type="submit" class="button btn-primary rounded">Отправить</button>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="application__error-messages color--accent" style="display: none"></div>
                </div>
            </form>
            <div class="application__success" style="display: none;">
                <div class="d-flex justify-content-center flex-column align-items-center py-5">
                    <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M68.4972 32.4279C69.9468 33.8775 69.9468 36.2273 68.4972 37.6762L43.6021 62.5721C42.1525 64.0209 39.8034 64.0209 38.3538 62.5721L26.5028 50.7203C25.0532 49.2714 25.0532 46.9216 26.5028 45.4728C27.9516 44.0232 30.3014 44.0232 31.7503 45.4728L40.9776 54.7001L63.249 32.4279C64.6986 30.9791 67.0484 30.9791 68.4972 32.4279V32.4279ZM95 47.5C95 73.7556 73.752 95 47.5 95C21.2444 95 0 73.752 0 47.5C0 21.2444 21.248 0 47.5 0C73.7556 0 95 21.248 95 47.5ZM87.5781 47.5C87.5781 25.3467 69.6504 7.42188 47.5 7.42188C25.3467 7.42188 7.42188 25.3496 7.42188 47.5C7.42188 69.6533 25.3496 87.5781 47.5 87.5781C69.6533 87.5781 87.5781 69.6504 87.5781 47.5Z" fill="#11B603"/>
                    </svg>
                    <h5 class="text-center mt-4 w-65">Спасибо! Мы перезвоним вам в ближайшее время.</h5>
                </div>
            </div>
            <div class="application__error" style="display: none;">
                <div class="d-flex justify-content-center flex-column align-items-center py-5">
                    <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M47.5 0C21.2466 0 0 21.2446 0 47.5C0 73.7536 21.2446 95 47.5 95C73.7534 95 95 73.7554 95 47.5C95 21.2464 73.7554 0 47.5 0ZM47.5 87.5781C25.3487 87.5781 7.42188 69.653 7.42188 47.5C7.42188 25.3485 25.347 7.42188 47.5 7.42188C69.6513 7.42188 87.5781 25.347 87.5781 47.5C87.5781 69.6515 69.653 87.5781 47.5 87.5781Z" fill="#D60019"/>
                        <path d="M63.7513 58.5033L52.748 47.5L63.7513 36.4967C65.2004 35.0475 65.2006 32.698 63.7515 31.2487C62.302 29.7994 59.9524 29.7995 58.5035 31.2487L47.5 42.252L36.4965 31.2487C35.0476 29.7994 32.6976 29.7994 31.2485 31.2487C29.7994 32.698 29.7994 35.0475 31.2487 36.4967L42.252 47.5L31.2487 58.5033C29.7994 59.9526 29.7992 62.3022 31.2485 63.7513C32.6982 65.2008 35.0478 65.2002 36.4965 63.7513L47.5 52.748L58.5035 63.7513C59.9522 65.2004 62.3022 65.2006 63.7515 63.7513C65.2008 62.302 65.2006 59.9524 63.7513 58.5033Z" fill="#D60019"/>
                    </svg>
                    <h5 class="text-center mt-4 w-65">Произошла неизвестная ошибка.</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let callbackModal = $('#callback');

    $.each(callbackModal, function () {
        let $this = $( this );
        let applicationModalForm = $( this ).find('form');
        let applicationModalSuccess = $( this ).find('.application__success');
        let applicationModalError = $( this ).find('.application__error');
        let errorList = $( this ).find('.application__error-messages');
        let button =  $( this ).find('button[type="submit"]')

        button.on('click', function (e) {
            e.preventDefault();

            applicationModalForm.validate({
                errorPlacement: function(error, element) {
                    error.insertAfter( element.parent('.md-form ') );
                },
                debug: true
            });

            if(applicationModalForm.valid()) {
                $.ajax({
                    url:     '{{ route('callback') }}',
                    type:     "POST",
                    data: $this.find('input, select, textarea'),
                    beforeSend: function() {
                        button.css({
                            'opacity': '.5'
                        })
                    },
                    success: function(response) {
                        $('.callback__header').slideUp(200);
                        applicationModalForm.slideUp(200);
                        applicationModalSuccess.slideDown(200);

                        button.css({
                            'opacity': '1'
                        })
                    },
                    error: function(xhr, status, error) {
                        let err = JSON.parse(xhr.responseText);

                        if(err) {
                            errorList.html('');

                            $.each(err.errors, function () {
                                errorList.append('<p class="mb-0">' + $( this )[0] + '</p>').stop('true').slideDown(200);
                            });

                        } else {
                            $('.callback__header').slideUp(200);
                            applicationModalForm.slideUp(200);
                            applicationModalError.slideDown(200);

                        }

                        button.css({
                            'opacity': '1'
                        })
                    }
                });
            }
        })
    })
</script>
