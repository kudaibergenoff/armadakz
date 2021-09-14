<div class="catalog__header d-none d-lg-flex align-items-center justify-content-end">
    <label for="select_filter" class="select_label mb-0 mr-4">Сортировка:</label>
    <select class="form-control w-auto bg-light border-0" id="select_filter" onchange="window.location.href=this.options[this.selectedIndex].value">
        <option value="{{ route('shop',['slug'=>$shop->slug]) }}" @if(!isset($_GET['price'])) selected @endif>Без сортировки</option>
        <option value="{{ route('shop',['slug'=>$shop->slug,'price'=>'down']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'down') selected @endif>Цены по убыванию</option>
        <option value="{{ route('shop',['slug'=>$shop->slug,'price'=>'up']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'up') selected @endif>Цены по возрастанию</option>
    </select>
</div>
<div class="orders__sort d-block d-lg-none col-12">
    <div class="orders__sort-title filters__open">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.465 0H0.536692C0.24082 0 0.000976562 0.239843 0.000976562 0.535715V3.21423C0.00100795 3.36603 0.0654495 3.5107 0.178293 3.61227L5.35804 8.27397V14.464C5.35791 14.7599 5.59763 14.9998 5.8935 15C5.97671 15 6.05879 14.9807 6.13322 14.9435L9.34745 13.3364C9.52906 13.2456 9.64379 13.06 9.64369 12.8569V8.27397L14.8234 3.61334C14.9366 3.51155 15.001 3.36643 15.0008 3.21423V0.535715C15.0007 0.239843 14.7609 0 14.465 0ZM13.9293 2.97583L8.74958 7.63646C8.63646 7.73826 8.57201 7.88337 8.57227 8.03557V12.5259L6.42944 13.5973V8.03557C6.4294 7.88378 6.36496 7.73911 6.25212 7.63756L1.07238 2.97583V1.0714H13.9293V2.97583Z" fill="#121313"/>
        </svg>
        <span>Фильтр</span>
    </div>
    <select class="browser-default custom-select" onchange="window.location.href=this.options[this.selectedIndex].value">
        <option value="{{ route('shop',['slug'=>$shop->slug]) }}" @if(!isset($_GET['price'])) selected @endif>Без сортировки</option>
        <option value="{{ route('shop',['slug'=>$shop->slug,'price'=>'down']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'down') selected @endif>Цены по убыванию</option>
        <option value="{{ route('shop',['slug'=>$shop->slug,'price'=>'up']) }}" @if(isset($_GET['price']) and $_GET['price'] == 'up') selected @endif>Цены по возрастанию</option>
    </select>
</div>
