@if(Route::is('seller.*','admin.*'))
    <div class="modal fade right confirm-delete-modal" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
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
                    @if(Route::is('seller.stores.*', 'admin.stores.*'))
                        <p>Вы действительно хотите удалить магазин <b><span id="product-name"></span>?</b></p>
                        <b>Все товары привязанные к данному магазину будут <span style="color: #e0001a">удалены!</span></b>
                    @elseif(Route::is('seller.products.*', 'admin.products.*'))
                        Вы действительно хотите удалить товар <b id="product-name"></b>?
                    @elseif(Route::is('seller.orders.*', 'admin.orders.*'))
                        Вы действительно хотите удалить заказ <b id="product-name"></b>?
                    @elseif(Route::is('admin.users.*', 'admin.admins.*'))
                        Вы действительно хотите удалить пользователя <b id="product-name"></b>?
                    @else
                        Вы действительно хотите удалить <b id="product-name"></b>?
                    @endif

                </div>
                <div class="modal-footer px-3 py-2">
                    <button type="button"  class="button btn-secondary" data-dismiss="modal">Отменить</button>
                    <button type="submit" class="button btn-primary confirm-delete-modal__accept">Подтвердить</button>
                </div>
            </form>
        </div>
    </div>
@endif
