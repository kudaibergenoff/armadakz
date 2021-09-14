<div class="details__block">
    <p class="h4 mb-4">Способ оплаты</p>

    <p class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="me" name="recipient" checked>
        <label class="custom-control-label" for="me">Я</label>
    </p>

    <p class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="other" name="recipient">
        <label class="custom-control-label" for="other">Другой человек</label>
    </p>

    <p>
        <label for="address">Введите Ф.И.О. получателя *</label>
        <input type="text" id="recipient-fio" class="form-control" placeholder="Ф.И.О. *" >
    </p>

    <div class="form-row mb-4">
        <div class="custom-radio col-12 col-md-6">
            <label for="recipient-phone">Введите Телефон получателя</label>
            <input type="tel" id="recipient-phone" class="form-control" placeholder="Телефон *" >
        </div>
    </div>

    <p class="custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="callback">
        <label class="custom-control custom-control-label" for="callback">Не перезванивать мне, я уверен в заказе</label>
    </p>
</div>
