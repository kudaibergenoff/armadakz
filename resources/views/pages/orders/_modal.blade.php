<div class="modal fade" id="order-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order-modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light p-4">
                <div class="order-item details__block" data-order-index="2">
                    <ul class="order-item__order-details row m-0 p-0 list-style-none">
                        <li class="details__block order-item__order-detail bg-white rounded py-3 px-4 col-12 mb-3" data-seller-detail-type="delivery">
                            <h5 class="order-item__order-detail-title d-flex align-items-center justify-content-between mb-0" >
                                <span>Способ доставки</span>
                                <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.03033 7.03033C7.32322 6.73744 7.32322 6.26256 7.03033 5.96967L2.25736 1.1967C1.96447 0.903806 1.48959 0.903806 1.1967 1.1967C0.903806 1.48959 0.903806 1.96447 1.1967 2.25736L5.43934 6.5L1.1967 10.7426C0.903806 11.0355 0.903806 11.5104 1.1967 11.8033C1.48959 12.0962 1.96447 12.0962 2.25736 11.8033L7.03033 7.03033ZM5.5 7.25H6.5V5.75H5.5V7.25Z" fill="#424242"/>
                                </svg>
                            </h5>
                            <div class="order-item__order-detail-content pt-4">
                                @foreach($typeDeliverys as $typeDelivery)
                                    <div class="form-row mb-4 justify-content-around justify-content-md-start delivery-container-{{ $typeDelivery->id }}">
                                        <div class="col-8 col-xl-4">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" data-input-id-in-base='{{ $typeDelivery->id }}' data-type="delivery" id="delivery-method-1-{{ $loop->iteration }}" name="delivery-method-1" title="Способ доставки {{ $loop->iteration }}" @if($loop->first) checked @endif>
                                                <label class="custom-control-label" for="delivery-method-1-{{ $loop->iteration }}">{{ $typeDelivery->title }}</label>
                                            </div>
                                        </div>
{{--                                        <div class="col-4 col-md-6 col-xl-3 font-weight-semibold text-left text-xl-center">Бесплатно</div>--}}
{{--                                        <div class="col-12 col-md-6 col-xl-5 mt-2 mt-xl-0">Будет передавно в службу доставки 23 августа</div>--}}
                                    </div>
                                @endforeach
                            </div>
                        </li>
                        <li class="details__block order-item__order-detail bg-white rounded py-3 px-4 col-12 mb-3" data-seller-detail-type="payment">
                            <h5 class="order-item__order-detail-title d-flex align-items-center justify-content-between mb-0" >
                                <span>Способ оплаты</span>
                                <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.03033 7.03033C7.32322 6.73744 7.32322 6.26256 7.03033 5.96967L2.25736 1.1967C1.96447 0.903806 1.48959 0.903806 1.1967 1.1967C0.903806 1.48959 0.903806 1.96447 1.1967 2.25736L5.43934 6.5L1.1967 10.7426C0.903806 11.0355 0.903806 11.5104 1.1967 11.8033C1.48959 12.0962 1.96447 12.0962 2.25736 11.8033L7.03033 7.03033ZM5.5 7.25H6.5V5.75H5.5V7.25Z" fill="#424242"/>
                                </svg>
                            </h5>
                            <div class="order-item__order-detail-content pt-4">
                                @foreach($typePays as $typePay)
                                    <p class="custom-control custom-radio pay-container-{{ $typePay->id }}">
                                        <input type="radio" class="custom-control-input" data-input-id-in-base='{{ $typePay->id }}' data-type="payment" id="payment-method-1-{{ $loop->iteration }}" title="Способ оплаты {{ $loop->iteration }}" name="payment-method-1" @if($loop->first) checked @endif>
                                        <label class="custom-control-label" for="payment-method-1-{{ $loop->iteration }}">{{ $typePay->title }}</label>
                                    </p>
                                @endforeach
                            </div>
                        </li>
                        <li class="details__block order-item__order-detail bg-white rounded py-3 px-4 col-12 mb-3" data-seller-detail-type="recipient">
                            <h5 class="order-item__order-detail-title d-flex align-items-center justify-content-between mb-0" >
                                <span>Получатель</span>
                                <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.03033 7.03033C7.32322 6.73744 7.32322 6.26256 7.03033 5.96967L2.25736 1.1967C1.96447 0.903806 1.48959 0.903806 1.1967 1.1967C0.903806 1.48959 0.903806 1.96447 1.1967 2.25736L5.43934 6.5L1.1967 10.7426C0.903806 11.0355 0.903806 11.5104 1.1967 11.8033C1.48959 12.0962 1.96447 12.0962 2.25736 11.8033L7.03033 7.03033ZM5.5 7.25H6.5V5.75H5.5V7.25Z" fill="#424242"/>
                                </svg>
                            </h5>
                            <div class="order-item__order-detail-content pt-4">
                                <p class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input seller__recipient" data-type="recipient" title="Я" id="me" name="recipient" checked>
                                    <label class="custom-control-label" for="me">Я</label>
                                </p>

                                <p class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input seller__recipient" data-id="other" data-type="recipient" title="Другой человек" id="other" name="recipient">
                                    <label class="custom-control-label" for="other">Другой человек</label>
                                </p>

                                <div class="details__other-recipient">
                                    <label for="recipient-fio">Введите Ф.И.О. получателя</label>
                                    <input type="text" id="recipient-fio" class="form-control" placeholder="Ф.И.О." >

                                    <div class="form-row mb-4">
                                        <div class="custom-radio col-12 col-md-6">
                                            <label for="recipient-phone">Введите Телефон получателя</label>
                                            <input type="tel" id="recipient-phone" class="form-control" placeholder="Телефон">
                                        </div>
                                    </div>

{{--                                    <div class="custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" name="is_callback" id="recipient-callback">--}}
{{--                                        <label class="custom-control custom-control-label" for="recipient-callback">Не перезванивать мне, я уверен в заказе</label>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </li>
                        <!--li class="details__block order-item__order-detail bg-white rounded py-3 px-4 col-12 mb-3" data-seller-detail-type="additional-services">
                            <h5 class="order-item__order-detail-title d-flex align-items-center justify-content-between mb-0" >
                                <span>Дополнительные услуги</span>
                                <svg class="active" width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.03033 7.03033C7.32322 6.73744 7.32322 6.26256 7.03033 5.96967L2.25736 1.1967C1.96447 0.903806 1.48959 0.903806 1.1967 1.1967C0.903806 1.48959 0.903806 1.96447 1.1967 2.25736L5.43934 6.5L1.1967 10.7426C0.903806 11.0355 0.903806 11.5104 1.1967 11.8033C1.48959 12.0962 1.96447 12.0962 2.25736 11.8033L7.03033 7.03033ZM5.5 7.25H6.5V5.75H5.5V7.25Z" fill="#424242"/>
                                </svg>
                            </h5>
                            <div class="order-item__order-detail-content pt-4">
                                <ul class="additional__items">
                                    @foreach($dopServices as $dopService)
                                        <li class="additional-item additional__item dopService-container-{{ $dopService->id }}">
                                            <div class="d-flex justify-content-between align-items-center font-weight-semibold">
                                                <span class="custom-control custom-radio">
                                                    <input type="checkbox" data-input-id-in-base='{{ $dopService->id }}' data-type="additional-services" title="Услуга {{ $loop->iteration }}" data-service-price="Бесплатно" class="custom-control-input" name="service-1" id="service-{{ $loop->iteration }}">
                                                    <label class="custom-control-label pl-2" for="service-{{ $loop->iteration }}">{{ $dopService->title }}</label>
                                                </span>
{{--                                                <div class="additional-item__price">@if($loop->first) Бесплатно @else 1000 <span class="currency">тг</span> @endif</div>--}}
                                            </div>
{{--                                            <p class="additional-item__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra</p>--}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li-->
                    </ul>
                </div>
            </div>
            <div class="modal-footer py-3 px-4">
                <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
