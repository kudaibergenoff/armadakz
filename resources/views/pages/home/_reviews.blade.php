<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 text-center">
                <h3 class="font-weight-bold my-5">Отзывы о лучших юристах</h3>
            </div>
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach([1,2,3,4] as $item)
                                <div class="col-md-3 col-6">
                                    <div class="card border border-grey-dark shadow-0 mb-3">
                                        <div class="card-body text-center">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="img-fluid w-50 rounded-circle z-depth-1"/>
                                            <h5 class="card-title font-weight-bold">Игорь В.</h5>
                                            <p class="card-text text-left">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            @foreach([1,2,3,4] as $item)
                                <div class="col-md-3 col-6">
                                    <div class="card border border-grey-dark shadow-0 mb-3">
                                        <div class="card-body text-center">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="img-fluid w-50 rounded-circle z-depth-1"/>
                                            <h5 class="card-title font-weight-bold">Игорь В.</h5>
                                            <p class="card-text text-left">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            @foreach([1,2,3,4] as $item)
                                <div class="col-md-3 col-6">
                                    <div class="card border border-grey-dark shadow-0 mb-3">
                                        <div class="card-body text-center">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="img-fluid w-50 rounded-circle z-depth-1"/>
                                            <h5 class="card-title font-weight-bold">Игорь В.</h5>
                                            <p class="card-text text-left">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--            <div class="controls-top text-center mr-3">--}}
                {{--                <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>--}}
                {{--                <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>
</div>
