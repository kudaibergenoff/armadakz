<div class="modal fade" id="news" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новости компании</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid modal-body">
                <ul class="row mb-0 p-0 list-style-none">
                    @if(isset($news) and $news->count() > 0)
                        @foreach($news as $new)
                            <li class="news-card news-card--md news__news-card col-12 col-md-6">
                                <article class="news-card__wrap">
                                    <header class="news-card__image">
                                        <img src="{{ $new->getImages() }}" alt="News image">
                                        <div class="news-card__date">{{ $new->created_at->format('d.m.Y') }}</div>
                                    </header>
                                    <footer class="news-card__content">
                                        <div>
                                            <a href="{{ route('news.show',$new->slug) }}">
                                                <h4 class="news-card__title">{{ $new->title }}</h4>
                                            </a>
                                            <p class="news-card__short-desc">{{ $new->description }}</p>
                                        </div>
                                    </footer>
                                </article>
                            </li>
                        @endforeach
                    @else
                        <li class="news-card news-card--md news__news-card col-12 col-md-6">
                            <article class="news-card__wrap">
                                <footer class="news-card__content">
                                    <div>
                                        <p class="news-card__short-desc">У данного магазина новостей пока нет</p>
                                    </div>
                                </footer>
                            </article>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="modal-footer p-3">
                <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
