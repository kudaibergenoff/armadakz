@if(Route::is('admin.*','seller.*'))
    <!-- Обрезка изображения -->
    <div class="modal crop-image" id="crop-image" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content px-4">
                <div class="modal-header px-0">
                    <h5 class="modal-title">Обрезать изображение</h5>
                    <button type="button" class="close crop-image__close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <img src="" alt="" class="image-no-crop" id="image-no-crop">
                </div>
                <div class="modal-footer p-3 px-0">
                    <button type="button" class="button btn-primary crop-image__save" data-dismiss="modal">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endif
