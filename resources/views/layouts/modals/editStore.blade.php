@if(Route::is('seller.stores.*', 'admin.stores.*'))
    <div class="modal fade right quick-edit" id="quick-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-side modal-top-right modal-notify" role="document">
            <form action="#" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title w-100" id="myModalLabel">Быстрое редактирование</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="switch col-12">
                            <label>
                                <label>Активность</label><br>
                                Нет
                                <input type="checkbox" name="isActive">
                                <span class="lever"></span>
                                Да
                            </label>
                        </div>
                    </div>
                    <a href="#" class="d-block mt-4 link text-underline color--accent">Перейти на страницу редактирования</a>
                </div>
                <div class="modal-footer px-3 py-2">
                    <button type="button"  class="button btn-secondary" data-dismiss="modal">Отменить</button>
                    <button type="submit" class="button btn-primary confirm-delete-modal__accept">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endif
