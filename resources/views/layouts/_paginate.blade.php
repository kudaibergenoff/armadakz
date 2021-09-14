@if($pagination->lastPage() > 1)
{{--    <div class="pagination page-catalog__pagination">--}}
        <div class="pagination__wrap">@php $get = null; (isset($_GET) and $_GET != null) ? $get = $_GET : $get = null; @endphp
            <a href="{{ $pagination->appends($get)->previousPageUrl() }}" class="pagination__arrow pagination__arrow--prev" @if($pagination->currentPage() == 1) disabled @endif>
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.292893 7.29289C-0.097631 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928933C7.68054 0.538408 7.04738 0.538408 6.65685 0.928933L0.292893 7.29289ZM3 7L1 7L1 9L3 9L3 7Z" fill="#282C34"/>
                </svg>
            </a>

        <ul class="pagination__items">
{{--            <li class="first" @if($pagination->currentPage() == 1) disabled @endif>--}}
{{--                <a href="{{ $pagination->appends($get)->url(1) }}">--}}
{{--                    <picture><source srcset="{{ asset('img/two-arrow1.svg') }}" type="image/webp"><img src="{{ asset('img/two-arrow1.svg') }}" alt="first"></picture>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="prev" @if($pagination->currentPage() == 1) disabled @endif>--}}
{{--                <a href="{{ $pagination->appends($get)->previousPageUrl() }}">--}}
{{--                    <picture><source srcset="{{ asset('img/prev.svg') }}" type="image/webp"><img src="{{ asset('img/prev.svg') }}" alt="prev"></picture>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="pagination__item @if($pagination->currentPage() == 1) active @endif">
                <a href="{{ $pagination->appends($get)->url(1) }}">
                    1
                </a>
            </li>
            @if($pagination->lastPage() >= 2)
                <li class="pagination__item @if($pagination->currentPage() == 2) active @endif">
                    <a href="{{ $pagination->appends($get)->url(2) }}">
                        2
                    </a>
                </li>
            @endif
{{--            @if($pagination->lastPage() >= 3)--}}
{{--                <li class="pagination__item @if($pagination->currentPage() == 3) active @endif">--}}
{{--                    <a href="{{ $pagination->appends($get)->url(3) }}">--}}
{{--                        3--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

            @if($pagination->currentPage()-1 > 3)
                ...
            @endif

            @if($pagination->currentPage()-1 >= 3 and $pagination->currentPage()-1 <= $pagination->lastPage()-2)
                <li class="pagination__item">
                    <a href="{{ $pagination->appends($get)->url($pagination->currentPage()-1) }}">
                        {{ $pagination->currentPage()-1 }}
                    </a>
                </li>
            @endif
            @if($pagination->currentPage() >= 3 and $pagination->currentPage() <= $pagination->lastPage()-2)
                <li class="pagination__item active">
                    <a href="{{ $pagination->appends($get)->url($pagination->currentPage()) }}">
                        {{ $pagination->currentPage() }}
                    </a>
                </li>
            @endif
            @if($pagination->currentPage()+1 >= 3 and $pagination->currentPage()+1 <= $pagination->lastPage()-2)
                <li class="pagination__item">
                    <a href="{{ $pagination->appends($get)->url($pagination->currentPage()+1) }}">
                        {{ $pagination->currentPage()+1 }}
                    </a>
                </li>
            @endif

            @if($pagination->currentPage()+2 <= $pagination->lastPage()-2)
                ...
            @endif

{{--            @if($pagination->lastPage()-2 >= 3)--}}
{{--                <li class="pagination__item @if($pagination->currentPage() == $pagination->lastPage()-2) active @endif">--}}
{{--                    <a href="{{ $pagination->appends($get)->url($pagination->lastPage()-2) }}">--}}
{{--                        {{ $pagination->lastPage()-2 }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}
            @if($pagination->lastPage()-1 > 2)
                <li class="pagination__item @if($pagination->currentPage() == $pagination->lastPage()-1) active @endif">
                    <a href="{{ $pagination->appends($get)->url($pagination->lastPage()-1) }}">
                        {{ $pagination->lastPage()-1 }}
                    </a>
                </li>
            @endif
            @if($pagination->lastPage() > 2)
                <li class="pagination__item @if($pagination->currentPage() == $pagination->lastPage()) active @endif">
                    <a href="{{ $pagination->appends($get)->url($pagination->lastPage()) }}">
                        {{ $pagination->lastPage() }}
                    </a>
                </li>
            @endif

                {{--            <li class="next" @if($pagination->currentPage() == $pagination->lastPage()) disabled @endif>--}}
                {{--                <a href="{{ $pagination->appends($get)->nextPageUrl() }}">--}}
                {{--                    <picture><source srcset="{{ asset('img/next.svg') }}" type="image/webp"><img src="{{ asset('img/next.svg') }}" alt="next"></picture>--}}
                {{--                </a>--}}
                {{--            </li>--}}
                {{--            <li class="last" @if($pagination->currentPage() == $pagination->lastPage()) disabled @endif>--}}
                {{--                <a href="{{ $pagination->appends($get)->url($pagination->lastPage()) }}">--}}
                {{--                    <picture><source srcset="{{ asset('img/two-arrow2.svg') }}" type="image/webp"><img src="{{ asset('img/two-arrow2.svg') }}" alt="last"></picture>--}}
                {{--                </a>--}}
                {{--            </li>--}}
            </ul>
            <a href="{{ $pagination->appends($get)->nextPageUrl() }}" class="pagination__arrow pagination__arrow--next" @if($pagination->currentPage() == $pagination->lastPage()) disabled @endif>
                <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L2.34315 0.928932C1.95262 0.538408 1.31946 0.538408 0.928932 0.928932C0.538408 1.31946 0.538408 1.95262 0.928932 2.34315L6.58579 8L0.928932 13.6569C0.538408 14.0474 0.538408 14.6805 0.928932 15.0711C1.31946 15.4616 1.95262 15.4616 2.34315 15.0711L8.70711 8.70711ZM6 9H8V7H6V9Z" fill="#282C34"/>
                </svg>
            </a>
        </div>
{{--    </div>--}}
@endif
