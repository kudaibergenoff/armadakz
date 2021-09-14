<li class="panel-item panel__item col-12 col-md-6 col-lg-4 col-xxl-3">
    <div class="panel-item__wrap">
        <div class="panel-item__bg" style="background-image: url({{ asset('img/care-images/7.jpg') }})"></div>
        <div class="panel-item__icon">

        </div>
        <div class="panel-item__content">
            <p class="panel-item__title"></p>
            <span class="panel-item__info">В базе данных <span>{{ $adminsCount }}</span> </span>
            <div class="text-center">
                <a href="{{ route('admin.admins.index') }}" class="panel-item__button button btn-primary btn-rounded"></a>
            </div>
        </div>
    </div>
</li>
