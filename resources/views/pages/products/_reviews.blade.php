<section class="reviews page-product__reviews position-relative">
    <div id="reviews" style="position: absolute; top: -150px;"></div>
    <div class="container">
        <div class="section__header reviews__header flex-column flex-md-row justify-content-center justify-content-md-between">
            <h2 class="section__title section__title--dark">Отзывы (<span>{{ $reviews->total() }}</span>)</h2>
            <div class="section__header-text d-block mt-3 mt-md-0">
                <button class="btn btn-outline-primary font-weight-semibold py-2 px-4" data-toggle="modal" data-target="#add-review">Оставить отзыв</button>
            </div>
        </div>
        <div class="section__content reviews__content bg-light rounded">
            @if(isset($reviews) and $reviews->count() > 0)
                <ul class="reviews__items">
                    @foreach($reviews as $review)
                        <li class="review reviews__item">
                            <div class="review__header mb-4 d-flex align-items-center justify-content-between">
                                <span>
                                    <b class="review__author">{{ $review->name }}</b>
                                    <span class="review__date">{{ $review->created_at->format('d.m.Y') }}</span>
                                </span>
                                <div class="review_rating">
                                   <span class="rating-group">
                                       @foreach([1,2,3,4,5] as $star)
                                           <label aria-label="{{ $star }} star" class="rating__label" for="rating-{{ $star }}">
                                               <i class="rating__icon rating__icon--star fas fa-star" @if($review->rating < $star) style="color:#ddd" @endif></i>
                                           </label>
                                       @endforeach
                                    </span>
                                </div>
                            </div>
                            <div class="review__content">
                                <div class="review__text mb-3">
                                    <p>{{ $review->comment }}</p>
                                </div>
        {{--                        <div class="review__advantages">--}}
        {{--                            <p class="mb-1"><b>Достоинства:</b></p>--}}
        {{--                            <p>Хороший материал на ощупь</p>--}}
        {{--                        </div>--}}
        {{--                        <div class="review__limitations">--}}
        {{--                            <p class="mb-1"><b>Недостатки:</b></p>--}}
        {{--                            <p>Хороший материал на ощупь</p>--}}
        {{--                        </div>--}}
                            </div>
                        </li>
                    @endforeach
                </ul>
                <br>
            @else
                <br>
                <p>Станьте первым, кто оставит отзыв</p>
                <br>
            @endif
        </div>
        @if(isset($reviews) and $reviews->count() > 0)
            <br>
            <div class="pagination catalog__pagination">
                @include('layouts._paginate',['pagination'=>$reviews])
            </div>
        @endif
    </div>
</section>
