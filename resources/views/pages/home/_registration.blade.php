<div class="container regbot">
    <div class="row justify-content-md-center">
        <div class="col-lg-7 col-md-6">
            <h3 class="font-weight-bold mb-3 mt-5 regbot__h">Регистрируйтесь <span style="color: #57A2E6">бесплатно</span> на ЮрХаб</h3>
            <p class="regbot__p">Станьте частью уникального сообщества юристов в Украине</p>
            <img src="{{ asset('img/svg/man.svg') }}" alt="" class="regbot__img">
        </div>
        <div class="col-lg-5 col-md-6">
            @include('layout._formRegistration')
        </div>
    </div>
</div>

<style>
    @media screen and (max-width: 768px) {
        .regbot__img {display:none;}
        .regbot__h {
            padding-top: 0;
        }
        .regbot__p {
            padding-bottom: 20px;
        }
    }
</style>
