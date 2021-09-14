<div class="container-fluid" style="background-color: #F3F3F3">
    <div class="container">
        <div class="row">
            <h3 class="col-12 font-weight-bold text-center mb-5 mt-5">Лучшие специалисты и фирмы</h3>
            @foreach([1,2,3,4,5,6,7,8] as $item)
                <div class="col-lg-3 col-6 mb-4 text-center text-sm-left">
                    <a href="{{ route('organization',1) }}" class="row d-flex align-items-center">
                        <div class="col-md-5 avatar d-flex justify-content-center align-items-center">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="img-fluid @if($loop->first) border border-primary fa-border @endif w-75 rounded-circle z-depth-1" />
                            @if($loop->first)<span class="badge rounded-pill bg-primary mb-5">PRO</span>@endif
                        </div>
                        <div class="col-md-7 text-center text-sm-left">
                            <h6 class="font-weight-bold">Alan Turing</h6>
                            <h6 class="text-muted">Software Engineer</h6>
                            <h6 class="text-warning"><i class="fas fa-star"></i> 4,58 <span class="text-muted">(48 отзывов)</span></h6>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-12 mb-4"></div>
        </div>
    </div>
</div>
