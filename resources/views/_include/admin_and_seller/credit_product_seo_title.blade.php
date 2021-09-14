<div>
    <label class="d-flex align-items-end justify-content-between">
        <span>Заголовок<br><b>(краткое название товара)</b></span>
        <span class="material-tooltip-main d-inline-block" data-toggle="tooltip" data-html="true" data-placement="left" title="Заголовок поможет в результатах поиска.<br><b>Например: мягкая мебель</b>">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 22C8.0618 22 5.29947 20.8558 3.2218 18.7782C1.14421 16.7005 0 13.9382 0 11C0 8.0618 1.14421 5.29947 3.2218 3.2218C5.29947 1.14421 8.0618 0 11 0C13.9382 0 16.7005 1.14421 18.7782 3.2218C20.8558 5.29947 22 8.0618 22 11C22 13.9382 20.8558 16.7005 18.7782 18.7782C16.7005 20.8558 13.9382 22 11 22Z" fill="#E0001A" fill-opacity="0.72"/>
                <path d="M18.7782 3.2218C16.7005 1.14421 13.9382 0 11 0V22C13.9382 22 16.7005 20.8558 18.7782 18.7782C20.8558 16.7005 22 13.9382 22 11C22 8.0618 20.8558 5.29947 18.7782 3.2218Z" fill="#E0001A"/>
                <path d="M12.9336 15.9414V9.49609H8.20703V10.7852H9.06641V15.9414H8.16406V17.2305H13.75V15.9414H12.9336Z" fill="#E4F7FF"/>
                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984C9.93382 4.33984 9.06641 5.20725 9.06641 6.27344C9.06641 7.33962 9.93382 8.20703 11 8.20703Z" fill="#E4F7FF"/>
                <path d="M11 8.20703C12.0662 8.20703 12.9336 7.33962 12.9336 6.27344C12.9336 5.20725 12.0662 4.33984 11 4.33984V8.20703Z" fill="#E0001A" fill-opacity="0.07"/>
                <path d="M12.9336 15.9414V9.49609H11V17.2305H13.75V15.9414H12.9336Z" fill="#E0001A" fill-opacity="0.07"/>
            </svg>
        </span>
    </label>
    <div class="custom-placeholder form-row">
        @include('layouts.forms.textarea',[
           'name'=>'seo_title',
           'rows'=>7,
           'length'=>2000,
           'class'=>'custom-placeholder__input form-control h-100'
       ])
        <p class="custom-placeholder__placeholder">Заголовок поможет в результатах поиска.<br><b>Например: мягкая мебель</b></p>
    </div>
</div>
