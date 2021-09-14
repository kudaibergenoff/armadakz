<section class="subscribe page-home__subscribe">
    <div class="subscribe__bg" style="background: url({{ asset('/img/subscribe-bg.jpg') }})"></div>
    <div class="container">
        <div class="subscribe__wrap">
            <div class="subscribe__content">
                <img src="{{ asset('/img/subscribe-icon.png') }}" alt="Icon">
                <p>Подпишитесь на последние обновления и узнавайте о новинках и <span style="background: #FFF; color: #252525; display: inline-block; padding: 0 5px">специальных предложениях первыми</span></p>
            </div>
            <div class="subscribe__right-side">
                <form id="subscribe" class="subscribe__form needs-validation" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Введите email" required>
                    <button type="submit" class="button button--accent">Подписаться</button>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        let subscribeModal = $('#subscribeModal');
        let subscribeSuccessModal = $('#subscribeModal .subscribe__success');
        let subscribeErrorModal = $('#subscribeModal .subscribe__error');

        subscribeSuccessModal.on('click', function () {
            subscribeModal.modal('hide');
        });
        subscribeErrorModal.on('click', function () {
            subscribeModal.modal('hide');
        });

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        $('#subscribe button[type="submit"]').on('click', function (e) {
            e.preventDefault();

            if(isEmail($('#subscribe input[name="email"]').val())) {
                $.ajax({
                    url:     '{{ route('subscription') }}',
                    type:     "POST",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        email: $('#subscribe input[name="email"]').val()
                    },
                    success: function(response) {
                        subscribeModal.modal('show');
                        subscribeSuccessModal.show();

                        setTimeout(function () {
                            subscribeModal.modal('hide');
                            subscribeSuccessModal.hide();
                        }, 4000)
                    },
                    error: function(response) {
                        subscribeModal.modal('show');
                        subscribeErrorModal.show();

                        setTimeout(function () {
                            subscribeModal.modal('hide');
                            subscribeErrorModal.hide();
                        }, 4000)
                    }
                });
            } else {
                subscribeErrorModal.find('h5').text('Введен не верный E-mail');
                subscribeModal.modal('toggle');
                subscribeErrorModal.show();

                setTimeout(function () {
                    subscribeModal.modal('toggle');
                    subscribeErrorModal.hide();
                }, 4000)
            }
        })
    </script>
@endpush
