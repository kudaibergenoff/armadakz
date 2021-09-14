<div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">О компании</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">{!! $shop->description !!}</div>
            <div class="modal-footer p-3">
                <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
