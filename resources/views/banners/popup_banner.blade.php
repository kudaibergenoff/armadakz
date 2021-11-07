@isset($popupBanner)
<div class="modal fade" id="myModal">
    <button type="button" class="close" data-dismiss="modal" style="color: #fff; margin-top: 25px; margin-right: 25px;">&times;</button>
    <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 800px; height: 250px;">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body" style="padding: 0px;">
            @foreach ($popupBanner as $banner)
            <a href="{{$banner->link}}" target="_blank">
                <picture>
                    <source srcset="{{ $banner->getImage('images_1580x550') }}" media="(min-width: 1580px)">
                    <source srcset="{{ $banner->getImage('images_1280x450') }}" media="(min-width: 1280px)">
                    <source srcset="{{ $banner->getImage('images_1024x450') }}" media="(min-width: 1024px)">
                    <source srcset="{{ $banner->getImage('images_768x495') }}" media="(min-width: 768px)">
                    <source srcset="{{ $banner->getImage('images_576x350') }}" media="(min-width: 320px)">
                    <img src="{{ $banner->getImage('images_1920x550') }}" alt="{{ $banner->title ?? '' }}" class="banner-item__image" style="width: 100%; object-fit: cover;">
                </picture>
            </a>
            @endforeach
        </div>

      </div>
    </div>
</div>
@endisset
