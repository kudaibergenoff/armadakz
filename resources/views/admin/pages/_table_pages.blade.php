<tr>
    <td>{{ $page->slug }}</td>
    <td>{{ $page->title }}</td>
{{--    <td>{!! $page->body !!}</td>--}}
    <td>
        @if($page->isActive == true)
            <div class="products__status products__status--active">Активный</div>
        @else
            <div class="products__status products__status--disabled">Неактивный</div>
        @endif
    </td>
{{--    <td>--}}
{{--        @if($page->is_banner == true)--}}
{{--            <div class="products__status products__status--five">Банеры</div>--}}
{{--        @endif--}}
{{--    </td>--}}
    <td>
        <b>Создания:</b><br>
        <span>{{ $page->created_at }}</span><br>
        <b>Обновления:</b><br>
        <span>{{ $page->updated_at }}</span>
    </td>
    <td class="text-center">
        <a href="{{ route('admin.pages.edit',$page->slug) }}" class="products-table__edit" data-toggle="modal" data-target="#quick-edit" data-item-id="{{ $page->slug }}">
            <input type="hidden" name="edit-action" value="{{ route('admin.pages.edit',$page->slug) }}">
            <input type="hidden" name="edit-link" value="{{ route('admin.pages.update',$page->slug) }}">
            <input type="hidden" name="edit-product-isActive" value="{{ $page->isActive  }}">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="30" height="30" rx="3" fill="#169BD5"/>
                <path d="M21.4541 14.8847C21.1036 14.8847 20.8195 15.1689 20.8195 15.5194V21.8658C20.8195 22.2163 20.5353 22.5004 20.1848 22.5004H8.76134C8.41083 22.5004 8.12669 22.2163 8.12669 21.8658V9.17296C8.12669 8.82245 8.41083 8.53831 8.76134 8.53831H16.377C16.7275 8.53831 17.0117 8.25417 17.0117 7.90366C17.0117 7.55314 16.7275 7.26904 16.377 7.26904H8.76134C7.70984 7.26904 6.85742 8.12146 6.85742 9.17296V21.8658C6.85742 22.9173 7.70984 23.7697 8.76134 23.7697H20.1849C21.2364 23.7697 22.0888 22.9173 22.0888 21.8658V15.5193C22.0888 15.1689 21.8046 14.8847 21.4541 14.8847Z" fill="white"/>
                <path d="M23.9161 6.71167C23.4604 6.25592 22.8424 5.99994 22.1979 6.00001C21.5531 5.99815 20.9344 6.25458 20.48 6.71208L12.1204 15.0709C12.0511 15.1408 11.9988 15.2257 11.9675 15.319L10.6982 19.1269C10.5875 19.4594 10.7672 19.8188 11.0998 19.9295C11.1643 19.951 11.2319 19.962 11.2999 19.9621C11.368 19.962 11.4357 19.951 11.5004 19.9297L15.3082 18.6604C15.4018 18.6292 15.4867 18.5766 15.5564 18.5069L23.9159 10.1474C24.8647 9.19871 24.8648 7.66047 23.9161 6.71167ZM23.0185 9.25062L14.7682 17.501L12.3032 18.3241L13.1238 15.8623L21.3773 7.61198C21.831 7.15913 22.566 7.15988 23.0189 7.61362C23.2352 7.83038 23.3571 8.12381 23.358 8.43004C23.3588 8.7379 23.2365 9.0333 23.0185 9.25062Z" fill="white"/>
            </svg>
        </a>
    </td>
</tr>
