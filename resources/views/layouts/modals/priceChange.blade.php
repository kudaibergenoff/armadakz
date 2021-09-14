@if(Route::is('product'))
    <div class="modal fade" id="priceChange" tabindex="-1" role="dialog" aria-labelledby="priceChange" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header callback__header">
                    <div class="m-auto d-flex justify-content-center flex-column align-items-center">
                        <svg class="mt-4 mb-3" width="104" height="74" viewBox="0 0 104 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M103.084 5.66205L71.5428 37L103.084 68.3379C103.654 67.1462 104 65.8287 104 64.4218V9.5781C104 8.17105 103.654 6.85378 103.084 5.66205Z" fill="#C9C9C9"/>
                            <path d="M94.8594 0.4375H9.14066C7.73361 0.4375 6.41634 0.783422 5.22461 1.35359L45.5374 41.4633C49.1018 45.0277 54.8982 45.0277 58.4627 41.4633L98.7754 1.35359C97.5837 0.783422 96.2665 0.4375 94.8594 0.4375Z" fill="#C9C9C9"/>
                            <path d="M0.916094 5.66205C0.345922 6.85378 0 8.17105 0 9.5781V64.4218C0 65.8289 0.345922 67.1464 0.916094 68.3379L32.4571 37L0.916094 5.66205Z" fill="#C9C9C9"/>
                            <path d="M67.2344 41.3085L62.7711 45.7717C56.832 51.7109 47.1679 51.7109 41.2287 45.7717L36.7657 41.3085L5.22461 72.6464C6.41634 73.2166 7.73361 73.5625 9.14066 73.5625H94.8594C96.2665 73.5625 97.5837 73.2166 98.7754 72.6464L67.2344 41.3085Z" fill="#C9C9C9"/>
                        </svg>
                        <p class="text-center mt-3 w-75">Оставьте свой E-mail, и мы оповестим Вас о снижении цены на данный товар</p>
                    </div>
                </div>
                <form class="modal-body callback__form p-0">
                    <div class="callback__content row m-0 px-4 bg-light">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <div class="md-form md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 0C5.0187 0 3 2.01871 3 4.50002C3 6.98133 5.0187 9 7.5 9C9.9813 9 12 6.98129 12 4.49998C12 2.01867 9.9813 0 7.5 0ZM7.5 7.87503C5.63903 7.87503 4.125 6.36099 4.125 4.50002C4.125 2.63904 5.63903 1.125 7.5 1.125C9.36097 1.125 10.875 2.63904 10.875 4.50002C10.875 6.36099 9.36097 7.87503 7.5 7.87503Z" fill="#737373"/>
                                    <path d="M7.50018 8.36719C3.57849 8.36719 0.387939 11.5577 0.387939 15.4794V15.9999H14.6124V15.4795C14.6124 11.5577 11.4219 8.36719 7.50018 8.36719ZM1.45084 14.959C1.7157 11.854 4.32769 9.40801 7.50018 9.40801C10.6727 9.40801 13.2847 11.8539 13.5495 14.959H1.45084Z" fill="#737373" stroke="#737373" stroke-width="0.2"/>
                                </svg>
                                <input type="text" name="name" id="price-change-name" class="form-control" required>
                                <label for="price-change-name">Ваше имя</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <div class="md-form md-outline input-with-pre-icon">
                                <svg class="input-prefix" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.418 0.0273438H1.58203C0.710789 0.0273438 0 0.749496 0 1.63642V12.3636C0 13.2475 0.707625 13.9727 1.58203 13.9727H16.418C17.287 13.9727 18 13.2529 18 12.3636V1.63642C18 0.7525 17.2924 0.0273438 16.418 0.0273438ZM16.1995 1.10006L9.03354 8.38856L1.80559 1.10006H16.1995ZM1.05469 12.1415V1.85343L6.13403 6.97529L1.05469 12.1415ZM1.80046 12.8999L6.883 7.73052L8.66391 9.52632C8.87006 9.73421 9.20275 9.73353 9.40806 9.52467L11.1445 7.75852L16.1995 12.8999H1.80046ZM16.9453 12.1414L11.8903 7L16.9453 1.85854V12.1414Z" fill="#737373"/>
                                </svg>
                                <input type="email" name="email" class="form-control" id="price-change-email" required>
                                <label for="price-change-email">Ваш Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-3">
                        <button type="button" class="button btn-light" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="button btn-primary">Подтвердить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
