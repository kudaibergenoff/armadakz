<div class="header__bottom container">
    <nav class="categories header__categories">
        <div class="categories__show">
            <span>
                <span class="bars bars--small">
                    <span class="bars__bar"></span>
                    <span class="bars__bar"></span>
                    <span class="bars__bar"></span>
                </span>
                <span>Каталог</span>
            </span>
        </div>
        <div class="categories__main">
{{--            @dd($menuCatalogs->where('is_menu',true)->pluck('title'),$menuItems->where('is_menu',true)->pluck('title'))--}}
{{--            @dd($menuItems->where('title','Интердизайн'))--}}
            <ul>
                @foreach($menuCatalogs->where('is_menu',true) as $menuCatalog)
                    <li><a href="{{ route('catalogs',$menuCatalog->slug) }}">{{ $menuCatalog->menu_title }}</a></li>
                @endforeach
                @foreach($menuItems->where('is_menu',true)->sortBy('index') as $menuItem)
                    <li><a href="{{ route('item',$menuItem->slug) }}">{{ $menuItem->menu_title }}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
    <nav class="header__bottom-pages">
        <ul>
            <li><a href="{{ route('shops') }}">Магазины</a></li>
            <li><a href="{{ route('services') }}">Услуги</a></li>
            <li><a href="{{ route('ideas') }}">Идеи</a></li>
        </ul>
    </nav>
    <nav class="all-categories">
        <ul>
            @foreach($menuCatalogs->sortBy('index') as $menuCatalog)
                <li class="all-categories__main-item all-categories__main-item--has-children">
                    <a href="{{ route('catalogs',$menuCatalog->slug) }}" class="all-categories__main-item-wrap">
                        <div class="all-categories__main-item-icon">{!! $menuCatalog->svg !!}</div>
                        <span>{{ $menuCatalog->title }}</span>
                    </a>
                    <svg class="all-categories__main-item-arrow" width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.12828 5.57169L1.73193 0.177143C1.49514 -0.0590475 1.11151 -0.0590475 0.874124 0.177143C0.637336 0.413333 0.637336 0.796967 0.874124 1.03316L5.84244 5.99968L0.874722 10.9662C0.637934 11.2024 0.637934 11.586 0.874722 11.8228C1.11151 12.059 1.49574 12.059 1.73253 11.8228L7.12888 6.42826C7.36208 6.19451 7.36208 5.80484 7.12828 5.57169Z" fill="#2F2F2F"/>
                    </svg>
                    <div class="all-categories__subcategories">
                        <a href="{{ route('catalogs',$menuCatalog->slug) }}" class="all-categories__subcategories-title price__special ml-0">{{ $menuCatalog->title }}  </a>
                        <div class="all-categories__subcategories-items-wrap">
                            <ul class="all-categories__subcategories-main-ul">
                                @foreach($menuSubcatalogs->where('catalog_id',$menuCatalog->id) as $menuSubcatalog)
                                    <ul>
                                        <li><a href="{{ route('catalog',$menuSubcatalog->slug) }}" class="font-weight-semibold d-block">{{ $menuSubcatalog->title }}</a></li>
                                        @foreach($menuItems->where('subcatalog_id',$menuSubcatalog->id) as $menuItem)
                                            @if($loop->last)
                                                <li class="mb-3"><a href="{{ route('item',$menuItem->slug) }}">{{ $menuItem->title }}</a></li>
                                            @else
                                                <li><a href="{{ route('item',$menuItem->slug) }}">{{ $menuItem->title }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
