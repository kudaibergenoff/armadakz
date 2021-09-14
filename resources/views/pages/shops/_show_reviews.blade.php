<div class="shop-reviews modal fade" id="reviews" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="exampleModalLabel">Отзывы</h5>
                <div class="d-flex align-items-center">
                    <button class="shop-reviews__button button btn-outline-primary font-weight-semibold py-2 px-4 mr-4" data-toggle="modal" data-target="#add-review">Оставить отзыв</button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body px-4 py-0">
                <div class="shop-reviews__list">
                    <ul class="reviews__items list-style-none pl-0">
                        @if(isset($reviews) and $reviews->count() > 0)
                            @foreach($reviews as $review)
                                <li class="review reviews__item border-bottom py-4">
                                    <div class="review__header mb-4 d-flex align-items-center justify-content-between">
                                        <span>
                                            <b class="review__author">{{ $review->name }}</b>
                                            <span class="review__date d-none d-md-inline">{{ $review->created_at->format('d.m.Y') }}</span>
                                        </span>
                                        <div class="review_rating">
                                            <span class="rating-group">
                                                @foreach([1,2,3,4,5] as $star)
                                                    <label aria-label="{{ $star }} stars" class="rating__label" for="review-0-rating-{{ $star }}">
                                                        <i class="rating__icon rating__icon--star fas fa-star" @if($review->rating < $star) style="color:#ddd" @endif></i>
                                                    </label>
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="review__content">
                                        <div class="review__text mb-3">
                                            {!! $review->comment !!}
                                        </div>
                                        {{--                                            <div class="review__advantages">--}}
                                        {{--                                                <p class="mb-1"><b>Достоинства:</b></p>--}}
                                        {{--                                                <p>Хороший материал на ощупь</p>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="review__limitations">--}}
                                        {{--                                                <p class="mb-1"><b>Недостатки:</b></p>--}}
                                        {{--                                                <p>Хороший материал на ощупь</p>--}}
                                        {{--                                            </div>--}}
                                    </div>
                                    <span class="review__date d-block d-md-none">{{ $review->created_at->format('d.m.Y') }}</span>
                                </li>
                            @endforeach
                        @else
                            <li class="review reviews__item border-bottom py-4">
                                <div class="review__content">
                                    <div class="review__text mb-3">
                                        <p>У данного магазина отзывов пока нет</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <form action="{{ route('productReview') }}" class="shop-reviews__add-new" style="display: none;" method="POST">
                    @csrf
                    <div class="d-flex align-items-center my-4">
                        <span>Выберите оценку: </span>
                        <div class="review_rating ml-3">
                            <span class="rating-group">
                                @foreach([1,2,3,4,5] as $star)
                                    <label aria-label="{{ $star }} star" class="mb-0 rating__label" for="add-review-{{ $star }}"><i class="rating__icon rating__icon--star fas fa-star"></i></label>
                                    <input class="rating__input" name="rating" id="add-review-{{ $star }}" value="{{ $star }}" type="radio" @if($loop->iteration == 4) checked @endif>
                                @endforeach
                            </span>
                        </div>
                    </div>
                    <div class="md-form mt-0">
                        <input type="hidden" name="store_id" value="{{ $shop->id }}">
                        <input type="text" name="name" placeholder="Ваше имя" required class="form-control">
                        <input type="email" name="email" placeholder="E-mail" required class="form-control">
                        {{--                            <input type="phone" name="email" placeholder="E-mail" required class="form-control">--}}
                        <textarea name="comment" placeholder="Коментарий" rows="5" required class="mt-3 md-textarea form-control"></textarea>
                        <button type="submit" class="button btn-accent">Отправить</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer p-3">
                <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
