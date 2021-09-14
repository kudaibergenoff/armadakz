@if(Route::is('tenants','advertisers'))
    <!-- Заявка на рекламу -->
    <div class="modal fade bd-example-modal-md applicationPost" id="sendRequestAd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="modal-title">Заявка на рекламу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body request modal__request px-4 pb-4">
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
                    <form action="{{ route('applicationPost') }}" id="applicationPost111111" method="POST">
                        @csrf

                        <input type="hidden" name="type" value="advertising">

                        <div class="form-group">
                            <label for="organization">Название организации <span style="color: #E0001A">*</span> </label>
                            <input type="text" class="form-control" name="organization" id="organization" placeholder="Название организации..." required>
                        </div>
                        <div class="form-row">
                            <label class="col-12">Контактное лицо, должность <span style="color: #E0001A">*</span></label>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Контактное лицо..." required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="position" id="position" placeholder="Должность..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон <span style="color: #E0001A">*</span></label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Телефон...">
                        </div>
                        <div class="form-group">
                            <label for="site">Сайт</label>
                            <input type="url" class="form-control" name="site" id="site" placeholder="Сайт...">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-form-label">Вид рекламы</div>
                            <div class="col-sm-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="ad_type1" id="ad-type1" >
                                    <label class="custom-control-label" for="ad-type1">Реклама в торговом комплексе</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="ad_type2" id="ad-type2" >
                                    <label class="custom-control-label" for="ad-type2">Реклама на сайте</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="ad_type3" id="ad-type3" >
                                    <label class="custom-control-label" for="ad-type3">Аудио-видео реклама</label>
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
