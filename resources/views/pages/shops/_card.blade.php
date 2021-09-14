<li class="shop-card catalog__shop col-6 col-xl-4">
    <div class="shop-card__wrap">
        <div class="shop-card__image">
            <img src="{{ $item->getImages(0,'mini_img') }}" alt="{{ $item->title }}">
            <img src="{{ $item->getImages(0,'logo') }}" class="shop-card__logo" alt="{{ $item->title }}">
        </div>
        <div class="shop-card__content">
            <div>
                <h4 class="shop-card__title">
                    <a href="{{ route('shop',['slug'=>$item->slug]) }}">{{ $item->title }}</a>
                    @if ($item->is_Armada === 1)
                        {{-- <span style="background-color: red; color: white; padding: 3px 5px;">комплекс</span> --}}
                        <img src="{{ asset('img/shops/armada-i.png') }}" alt="" width="15" height="15">
                    @endif
                </h4>
                <p>{{ $item->mini_desc }}</p>
{{--                <ul class="shop-card__categories mt-2 mb-3">--}}
{{--                    <li>Cтолы</li>--}}
{{--                    <li>стулья</li>--}}
{{--                </ul>--}}
                @if(isset($item->block) or isset($item->intersection) or isset($item->butik))
                    <p class="shop-card__address my-3">
                        @for($i = 0; $i < max(count($item->block),count($item->intersection),count($item->butik)); $i++)
                            <div>
                                @isset($item->block[$i])Блок {{ $item->block[$i] }}, @endisset
                                @isset($item->intersection[$i])Ряд {{ $item->intersection[$i] }}, @endisset
                                @isset($item->butik[$i])Бутик {{ $item->butik[$i] }} @endisset
                            </div>
                        @endfor
                    </p>
                @endif
                @if(isset($item->location))
                    <p class="shop-card__address my-3">
                        {{ $item->location }}
                    </p>
                @endif
                @isset($item->phones)
                    <ul class="shop-card__phones my-3">
                        @forelse($item->phones as $phone)
                            @if ($phone != null)
                                <li class="shop-card__phone">
                                    <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.12209 8.64126C8.73005 8.25348 8.24062 8.25348 7.85107 8.64126C7.55392 8.93647 7.25676 9.23169 6.96461 9.5319C6.8847 9.61446 6.81728 9.63197 6.71989 9.57693C6.52761 9.47186 6.32285 9.3868 6.13807 9.27171C5.27657 8.72882 4.55492 8.03082 3.91566 7.24525C3.59853 6.85497 3.31636 6.43717 3.11909 5.96683C3.07914 5.87176 3.08663 5.80921 3.16404 5.73166C3.46119 5.44395 3.75085 5.14874 4.04301 4.85352C4.45004 4.44323 4.45004 3.96288 4.04052 3.55008C3.80829 3.31491 3.57606 3.08475 3.34383 2.84958C3.10411 2.6094 2.86688 2.36673 2.62467 2.12906C2.23262 1.74628 1.7432 1.74628 1.35365 2.13156C1.054 2.42677 0.766834 2.72949 0.46219 3.0197C0.180019 3.28739 0.0376849 3.61513 0.00771985 3.99791C-0.0397248 4.62086 0.112598 5.20878 0.327347 5.78169C0.766834 6.96755 1.43605 8.02081 2.24761 8.98651C3.34383 10.2925 4.6523 11.3257 6.18302 12.0712C6.87221 12.4065 7.58638 12.6642 8.36297 12.7067C8.89735 12.7367 9.36181 12.6016 9.73387 12.1838C9.98858 11.8986 10.2757 11.6384 10.5454 11.3657C10.945 10.9604 10.9475 10.4701 10.5504 10.0698C10.076 9.59195 9.59903 9.1166 9.12209 8.64126Z"
                                              fill="#E0001A"/>
                                        <path d="M8.64434 6.64741L9.56576 6.4898C9.42093 5.64169 9.0214 4.87363 8.41461 4.26319C7.77286 3.62023 6.9613 3.21493 6.06735 3.08984L5.9375 4.01801C6.62919 4.11558 7.25846 4.42831 7.75538 4.92617C8.22483 5.39651 8.53197 5.99194 8.64434 6.64741Z"
                                              fill="#E0001A"/>
                                        <path d="M10.0868 2.63439C9.02307 1.56862 7.67714 0.895638 6.19137 0.687988L6.06152 1.61616C7.34503 1.79629 8.50867 2.37921 9.4276 3.29737C10.2991 4.1705 10.8709 5.2738 11.0782 6.48718L11.9996 6.32956C11.7574 4.92355 11.0957 3.64763 10.0868 2.63439Z"
                                              fill="#E0001A"/>
                                    </svg>
                                    <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                </li>
                            @endif
                            @if($loop->iteration == 3)
                                @break
                            @endif
                        @empty
                        @endforelse
                    </ul>
                @endisset
            </div>
            <div class="shop-card__footer">
                @if ($item->is_Armada === 1)
                <a href="{{ route('scheme',['store'=>$item->slug]) }}" class="shop-card__map my-3 text-uppercase">
                    <span class="text-underline">Посмотреть на схеме
                        <svg width="16" height="8" viewBox="0 0 16 8" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.3536 4.35355C15.5488 4.15829 15.5488 3.84171 15.3536 3.64645L12.1716 0.464466C11.9763 0.269204 11.6597 0.269204 11.4645 0.464466C11.2692 0.659728 11.2692 0.976311 11.4645 1.17157L14.2929 4L11.4645 6.82843C11.2692 7.02369 11.2692 7.34027 11.4645 7.53553C11.6597 7.7308 11.9763 7.7308 12.1716 7.53553L15.3536 4.35355ZM0 4.5H15V3.5H0V4.5Z"
                                  fill="#169BD5"/>
                        </svg>
                    </span>
                </a>
                @endif
                <a href="{{ route('shop',['slug'=>$item->slug]) }}" class="shop-card__link button btn-outline-primary">В магазин</a>
            </div>
        </div>
    </div>
</li>
