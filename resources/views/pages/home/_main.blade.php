<div class="container-fluid" style="background-image: url({{ asset('img/jpg/main.jpg') }});  background-position: center">
    <div class="container">
        <div class="row">
            @auth
                <div class="main__txt col-lg-6 my-4">
                    <h2 class="my-5">Более 5000 юристов готовы помочь Вам</h2>
                    <form class="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Какое у Вас задание?" />
                            <button class="btn btn-outline-primary" id="search" type="button" >Найти юриста</button>
                        </div>
                    </form>
                    <div class="mt-0 mb-4">
                        <span class="font-weight-bold">Например:</span> <span>Приватизация предприятия</span>
                    </div>
                </div>
                <div class="col-lg-6 float-right" style="background-image: url({{ asset('img/png/main2.png') }}); background-size: contain; background-repeat: no-repeat;  background-position: right top;z-index: 999">
    {{--                <img class="h-auto" src="{{ asset('img/png/main2.png') }}" alt="">--}}
                </div>
            @else
                <div class="main__txt col-xl-7 col-lg-6 my-5">
                    <div class="d-flex align-items-center mb-0">
                        <img src="{{ asset('img/logo2.png') }}" height="50px" alt=""><span class="h2 mt-3 ml-3"> – более 5000</span>
                    </div>
                    <span class="h2 mb-3 mt-0">бесплатных документов и возможность продать свои</span><br>
                    <p class="h5 my-4">Присоединяйтесь к нам и пользуйтесь всеми возможностями ресурса</p>
                    <button type="button" class="btn btn-outline-primary mt-3" data-ripple-color="dark">
                        Зарегистрироваться
                    </button>
                </div>
                <div class="col-xl-5 col-lg-6 float-right mt-3" style="background-image: url({{ asset('img/png/man.png') }}); background-size: contain ; background-repeat: no-repeat;  background-position: center top;z-index: 999">
                </div>
            @endauth
        </div>
    </div>
</div>

@push('styles')
    <style>
        @media screen and (max-width: 768px) {
            .main__img {
                position: absolute;
                margin-top: -331px;
                margin-left: 350px;
                width: 280px;
                height: 214px;
            }
        }
        @media screen and (max-width: 576px) {
            .main__img {display:none;}
        }
    </style>
@endpush
<!--  @media screen and (max-width: 1200px) {
            .regbot__img {display:none;}
            .z-depth-1 {display:none;}
        }
 -->
