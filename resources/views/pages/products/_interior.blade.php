<section class="section interior container page-product__photos mb-85">
    <div class="section__header">
        <h2 class="section__title text-center d-block w-100 font-weight-semibold">Фото в интерьере</h2>
    </div>
    <div class="section__content">
        <ul class="interior__items row">
            @foreach([1,2,3,4,5,6,7] as $interior)
                <li class="interior__item rounded overflow-hidden col-6 col-md-3 image-popup">
                    <img class="hover-shadow w-100" src="/img/interior/{{ $interior }}.jpg" alt="Interior">
                </li>
            @endforeach
        </ul>
    </div>
</section>

<div class="modal-image overflow-auto container">
    <div class="modal-image__close">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.53033 6.53033C6.82322 6.23744 6.82322 5.76256 6.53033 5.46967L1.75736 0.696699C1.46447 0.403806 0.989592 0.403806 0.696699 0.696699C0.403806 0.989592 0.403806 1.46447 0.696699 1.75736L4.93934 6L0.696699 10.2426C0.403806 10.5355 0.403806 11.0104 0.696699 11.3033C0.989592 11.5962 1.46447 11.5962 1.75736 11.3033L6.53033 6.53033ZM5 6.75H6V5.25H5V6.75Z" fill="black"/>
            <path d="M5.46967 5.46967C5.17678 5.76256 5.17678 6.23744 5.46967 6.53033L10.2426 11.3033C10.5355 11.5962 11.0104 11.5962 11.3033 11.3033C11.5962 11.0104 11.5962 10.5355 11.3033 10.2426L7.06066 6L11.3033 1.75736C11.5962 1.46447 11.5962 0.989592 11.3033 0.696699C11.0104 0.403806 10.5355 0.403806 10.2426 0.696699L5.46967 5.46967ZM7 5.25H6V6.75H7V5.25Z" fill="black"/>
        </svg>
    </div>
    <div class="modal-image__wrap">
        <img src="/img/interior/1.jpg" alt="">
    </div>
</div>
