<section class="categories page-catalog__categories">
    <div class="container">
        <ul class="categories__items row justify-content-center">
            @forelse($items as $item)
                <li class="category categories__item col-6 col-md-4 col-lg-3">
                    <a href="{{ route('item',$item->slug) }}">
                        <div class="category__wrap">
                            <div class="category__header">
                                <div class="category__image">
                                    <img src="{{ $item->getImages() }}" alt="{{ $item->title }}">
                                </div>
                            </div>
                            <div class="category__content text-center">
                                <h4 class="category__title">{{ $item->title }}</h4>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                {{-- @foreach($products as $product)
                    @include('pages.home.__card',['item'=>$product,'col'=>true])
                @endforeach --}}
            @endforelse
        </ul>

        {{-- @empty(!$products)
            @include('layouts._paginate',['pagination'=>$products])
        @endempty --}}
        
    </div>
</section>
