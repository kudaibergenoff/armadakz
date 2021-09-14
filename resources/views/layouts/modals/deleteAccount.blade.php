<div class="modal fade right confirm-delete-modal" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-side modal-top-right modal-notify modal-danger" role="document">
        <form action="#" method="POST" enctype="multipart/form-data" class="modal-content">
            @method('DELETE')
            @csrf
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Подтвердите действие</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить аккаунт?</p>
            </div>
            <div class="modal-footer px-3 py-2">
                <button type="button" class="button btn-secondary" data-dismiss="modal">Отменить</button>
                <button type="submit" class="button btn-primary confirm-delete-modal__accept" onclick="event.preventDefault(); document.getElementById('destroy').submit();">Подтвердить</button>
            </div>
        </form>
    </div>
</div>
