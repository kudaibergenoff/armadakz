{{--@if(Route::is('seller.orders.*', 'admin.orders.*'))--}}
{{--    <div class="modal fade right quick-edit" id="quick-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"--}}
{{--         aria-hidden="true">--}}

{{--        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->--}}
{{--        <div class="modal-dialog modal-side modal-top-right modal-notify" role="document">--}}
{{--            <form action="#" method="POST" enctype="multipart/form-data" class="modal-content">--}}
{{--                @method('PATCH')--}}
{{--                @csrf--}}

{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title w-100" id="myModalLabel">Быстрое редактирование</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        @if(Route::is('seller.reviews.*', 'admin.reviews.*'))--}}
{{--                            <label>Статус</label>--}}
{{--                            <select name="status_id" class="form-control">--}}
{{--                                @foreach($statuses as $status)--}}
{{--                                    <option value="{{ $status->id }}">{{ $status->title }}</option>--}}
{{--                                @endforeach--}}
{{--                                <option value="" disabled selected>Ожидает модерации</option>--}}
{{--                                <option value="">Активный</option>--}}
{{--                                <option value="">Не активный</option>--}}
{{--                                <option value="">Не одобренный</option>--}}
{{--                            </select>--}}
{{--                        @else--}}
{{--                            <label>Статус</label>--}}
{{--                            <select name="status_id" class="form-control">--}}
{{--                                @foreach($statuses as $status)--}}
{{--                                    <option value="{{ $status->id }}" >{{ $status->title_ru }}</option>--}}
{{--                                    @if($order->status_id == $status->id) selected @endif--}}
{{--                                @endforeach--}}
{{--                                <option value="" disabled selected>В корзине</option>--}}
{{--                                <option value="">В ожидании</option>--}}
{{--                                <option value="">В обработке</option>--}}
{{--                                <option value="">Отправлен</option>--}}
{{--                                <option value="">Выполнен</option>--}}
{{--                            </select>--}}
{{--                            <a href="#" class="d-block mt-4 link text-underline color--accent">Перейти на страницу редактирования</a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer px-3 py-2">--}}
{{--                    <button type="button"  class="button btn-secondary" data-dismiss="modal">Отменить</button>--}}
{{--                    <button type="submit" class="button btn-primary confirm-delete-modal__accept">Обновить</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
