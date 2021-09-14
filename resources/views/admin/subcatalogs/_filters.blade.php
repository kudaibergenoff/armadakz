<aside class="filters filters--hidden col-12 col-md-3">
    <form action="{{ route('admin.subcatalogs.index') }}" method="GET">
        <div class="filters__header p-4 d-flex border-bottom align-items-center justify-content-between">
            <b>Фильтр</b>
            <div class="filters__close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.50776 5.50008L10.7909 1.21668C11.0697 0.938066 11.0697 0.48758 10.7909 0.208963C10.5123 -0.0696543 10.0619 -0.0696543 9.78324 0.208963L5.49993 4.49236L1.21676 0.208963C0.938014 -0.0696543 0.487668 -0.0696543 0.209056 0.208963C-0.0696855 0.48758 -0.0696855 0.938066 0.209056 1.21668L4.49224 5.50008L0.209056 9.78348C-0.0696855 10.0621 -0.0696855 10.5126 0.209056 10.7912C0.347906 10.9302 0.530471 11 0.712906 11C0.895341 11 1.07778 10.9302 1.21676 10.7912L5.49993 6.5078L9.78324 10.7912C9.92222 10.9302 10.1047 11 10.2871 11C10.4695 11 10.652 10.9302 10.7909 10.7912C11.0697 10.5126 11.0697 10.0621 10.7909 9.78348L6.50776 5.50008Z" fill="#1C2021"/>
                </svg>
            </div>
        </div>

        <div class="filters__checkbox-group mt-3 mb-4">
            <p class="font-weight-semibold">Алфавитный указатель</p>
            <div class="custom-scrollbar default-skin" style="max-height: 340px">
                <ul class="list-style-none mb-b p-0">
                    @foreach($catalogs as $catalog)
                        <li class="custom-control custom-checkbox mb-2">
                            <input type="radio" name="catalog_id" value="{{ $catalog->id }}" id="vendor-{{ $catalog->id }}" class="form-check-input">
                            <label for="vendor-{{ $catalog->id }}" class="custom-control-label">{{ $catalog->id }}{{ $catalog->title }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <button class="button btn-primary my-4 mr-4 float-right">Применить</button>
    </form>
</aside>
