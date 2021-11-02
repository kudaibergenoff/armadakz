<section class="categories page-catalog__categories">
    <div class="container">
        <ul class="categories__items row justify-content-center">
            @forelse($subcatalogs as $subcatalog)
                @if($items->where('subcatalog_id',$subcatalog->id)->count() > 0)
                    <li class="category categories__item col-6 col-md-4 col-lg-3">
                        <div class="category__wrap">
                            <div class="category__header">
                                <div class="category__image">
                                    <img src="{{ $subcatalog->getImages() }}" alt="{{ $subcatalog->title }}">
                                </div>
                            </div>
                            <div class="category__content">
                                <h4 class="category__title">
                                    <a href="{{ route('subcatalog',$subcatalog->slug) }}">
                                        {{ $subcatalog->title }}
                                    </a>
                                </h4>
                                <ul class="category__subcategories">
                                    @foreach($items->where('subcatalog_id',$subcatalog->id) as $item)
                                        <li class="category__subcategory">
                                            <a href="{{ route('item',$item->slug) }}">{{ $item->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endif
            @empty

            @endforelse
        </ul>
    </div>
</section>
