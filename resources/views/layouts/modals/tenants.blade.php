@if(Route::is('tenants','advertisers'))
    <!-- Заявка на аренду -->
    <div class="modal fade bd-example-modal-md applicationPost" id="sendRequestRent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header px-md-4">
                    <h5 class="modal-title">Заявка на аренду</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body request modal__request px-md-4 pb-md-4">
                    <div class="application__success" style="display: none;">
                        <div class="d-flex justify-content-center flex-column align-items-center py-5">
                            <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M68.4972 32.4279C69.9468 33.8775 69.9468 36.2273 68.4972 37.6762L43.6021 62.5721C42.1525 64.0209 39.8034 64.0209 38.3538 62.5721L26.5028 50.7203C25.0532 49.2714 25.0532 46.9216 26.5028 45.4728C27.9516 44.0232 30.3014 44.0232 31.7503 45.4728L40.9776 54.7001L63.249 32.4279C64.6986 30.9791 67.0484 30.9791 68.4972 32.4279V32.4279ZM95 47.5C95 73.7556 73.752 95 47.5 95C21.2444 95 0 73.752 0 47.5C0 21.2444 21.248 0 47.5 0C73.7556 0 95 21.248 95 47.5ZM87.5781 47.5C87.5781 25.3467 69.6504 7.42188 47.5 7.42188C25.3467 7.42188 7.42188 25.3496 7.42188 47.5C7.42188 69.6533 25.3496 87.5781 47.5 87.5781C69.6533 87.5781 87.5781 69.6504 87.5781 47.5Z" fill="#11B603"/>
                            </svg>
                            <h5 class="text-center mt-4 w-65">Спасибо! Заявка успешно отправлена.</h5>
                        </div>
                    </div>
                    <div class="application__error" style="display: none;">
                        <div class="d-flex justify-content-center flex-column align-items-center py-5">
                            <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M47.5 0C21.2466 0 0 21.2446 0 47.5C0 73.7536 21.2446 95 47.5 95C73.7534 95 95 73.7554 95 47.5C95 21.2464 73.7554 0 47.5 0ZM47.5 87.5781C25.3487 87.5781 7.42188 69.653 7.42188 47.5C7.42188 25.3485 25.347 7.42188 47.5 7.42188C69.6513 7.42188 87.5781 25.347 87.5781 47.5C87.5781 69.6515 69.653 87.5781 47.5 87.5781Z" fill="#D60019"/>
                                <path d="M63.7513 58.5033L52.748 47.5L63.7513 36.4967C65.2004 35.0475 65.2006 32.698 63.7515 31.2487C62.302 29.7994 59.9524 29.7995 58.5035 31.2487L47.5 42.252L36.4965 31.2487C35.0476 29.7994 32.6976 29.7994 31.2485 31.2487C29.7994 32.698 29.7994 35.0475 31.2487 36.4967L42.252 47.5L31.2487 58.5033C29.7994 59.9526 29.7992 62.3022 31.2485 63.7513C32.6982 65.2008 35.0478 65.2002 36.4965 63.7513L47.5 52.748L58.5035 63.7513C59.9522 65.2004 62.3022 65.2006 63.7515 63.7513C65.2008 62.302 65.2006 59.9524 63.7513 58.5033Z" fill="#D60019"/>
                            </svg>
                            <h5 class="text-center mt-4 w-65">Произошла неизвестная ошибка.</h5>
                        </div>
                    </div>
                    <form action="#" id="applicationPost" method="POST">
                        @csrf

                        <input type="hidden" name="type" value="rent">

                        <div class="form-group">
                            <label for="organization-rent">Название организации <span style="color: #E0001A">*</span> </label>
                            <input type="text" class="form-control" name="organization" id="organization-rent" placeholder="Название организации..." required>
                        </div>
                        <div class="form-row">
                            <label for="name-rent" class="col-12">Контактное лицо, должность <span style="color: #E0001A">*</span></label>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name-rent" placeholder="Контактное лицо..." required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="position" id="position-rent" placeholder="Должность..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone-rent">Телефон <span style="color: #E0001A">*</span></label>
                            <input type="tel" class="form-control" name="phone" id="phone-rent" placeholder="Телефон..." required>
                        </div>
                        <div class="form-group">
                            <label for="site-rent">Сайт</label>
                            <input type="text" class="form-control" name="site" id="site-rent" placeholder="Сайт...">
                        </div>
                        <div class="form-group">
                            <label>Размер необходимой площади</label>
                            <div class="form-group row">
                                <div class="col-sm-6 d-flex mb-3 mb-md-0 align-items-center">
                                    <small class="text-muted mr-2">от</small>
                                    <input type="number" name="size_from" class="form-control mx-sm-3">
                                    <small class="text-muted ml-2">м<sup>2</sup></small>
                                </div>
                                <div class="col-sm-6 d-flex align-items-center">
                                    <small class="text-muted mr-2">до</small>
                                    <input type="number" name="side_to" class="form-control mx-sm-3">
                                    <small class="text-muted ml-2">м<sup>2</sup></small>
                                </div>
                            </div>
                        </div>
                        <div class="navbar font-weight-normal p-0 mt-4" style="box-shadow: none">
                            <a class="navbar-brand color--accent font-weight-semibold" href="#">Дополнительно</a>
                            <button class="navbar-toggler toggler-example color--accent" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                                    aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                                        class="fas fa-bars fa-1x"></i></span></button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                                <div class="form-group">
                                    <label for="organization-rent">Наименование товара (вид товара)</label>
                                    <input type="text" class="form-control" name="product_type" id="product-type" placeholder="Наименование товара (вид товара)...">
                                </div>
                                <div class="form-group">
                                    <label for="lifetime">Срок существования на рынке</label>
                                    <input type="text" class="form-control" name="lifetime" id="lifetime" placeholder="Срок существования на рынке...">
                                </div>
                                <div class="form-group">
                                    <label for="vendor">Завод производитель товара</label>
                                    <input type="text" class="form-control" name="factory" id="factory" placeholder="Завод производитель товара...">
                                </div>
                                <div class="form-group">
                                    <label for="you-are">Вы являетесь</label>
                                    <select name="customer_type_id" id="you-are" class="mdb-select md-form">
                                        <option value="" disabled selected>Выберите из списка</option>
                                        @foreach($customerTypes as $customerType)
                                            <option value="{{ $customerType->id }}">{{ $customerType->title_ru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product-presented">Представлен ли данный товар в ТК «ARMADA»?</label>
                                    <select name="present_type" id="product-presented" class="mdb-select md-form">
                                        <option value="" disabled selected>Выберите из списка</option>
                                        @foreach(['yes'=>'Да','no'=>'Нет','partially'=>'Частично'] as $presentKey=>$presentValue)
                                            <option value="{{ $presentKey }}">{{ $presentValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product-classification">Классификация товара</label>
                                    <select name="product_class" id="product-classification" class="mdb-select md-form">
                                        <option value="" disabled selected>Выберите из списка</option>
                                        @foreach(['elite'=>'Элтиный','middle'=>'Средний','economy'=>'Эконом'] as $classKey=>$classValue)
                                            <option value="{{ $classKey }}">{{ $classValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="textarea-1">Планируете ли Вы произвести монтажные работы по обустройству и дизайну торговой площади?</label>
                                    <textarea class="form-control" name="assembly_work" id="textarea-1" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="textarea-2">Примечание</label>
                                    <textarea class="form-control" name="note" id="textarea-2" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="application__error-messages color--accent" style="display: none"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="button btn-primary rounded mt-3">Оставить заявку</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endif
