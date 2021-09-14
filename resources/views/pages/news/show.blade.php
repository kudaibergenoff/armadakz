@extends('_layout')

@section('title','ARMADA - Блог')

@section('breadcrumb')
    @php
        $breadcrumbs[] = [  'route'=>route('home'),
                            'title'=>'Главная' ];
        $breadcrumbs[] = [  'route'=>route('news.index'),
                            'title'=>'Новости' ];
        $breadcrumbs[] = [  'route'=>route('news.show',['slug'=>$news->slug]),
                            'title'=>$news->title  ];
    @endphp
    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])
@endsection

@section('modals')
    <div class="modal fade" id="add-review" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оставить комментарий</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body add-review reviews__add-review pb-0">
                    <div class="application__success" style="display: none;">
                        <div class="d-flex justify-content-center flex-column align-items-center py-5">
                            <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M68.4972 32.4279C69.9468 33.8775 69.9468 36.2273 68.4972 37.6762L43.6021 62.5721C42.1525 64.0209 39.8034 64.0209 38.3538 62.5721L26.5028 50.7203C25.0532 49.2714 25.0532 46.9216 26.5028 45.4728C27.9516 44.0232 30.3014 44.0232 31.7503 45.4728L40.9776 54.7001L63.249 32.4279C64.6986 30.9791 67.0484 30.9791 68.4972 32.4279V32.4279ZM95 47.5C95 73.7556 73.752 95 47.5 95C21.2444 95 0 73.752 0 47.5C0 21.2444 21.248 0 47.5 0C73.7556 0 95 21.248 95 47.5ZM87.5781 47.5C87.5781 25.3467 69.6504 7.42188 47.5 7.42188C25.3467 7.42188 7.42188 25.3496 7.42188 47.5C7.42188 69.6533 25.3496 87.5781 47.5 87.5781C69.6533 87.5781 87.5781 69.6504 87.5781 47.5Z" fill="#11B603"/>
                            </svg>
                            <h5 class="text-center mt-4 w-65">Спасибо! Ваш отзыв отправлен.</h5>
                        </div>
                    </div>
                    <div class="application__error" style="display: none;">
                        <div class="d-flex justify-content-center flex-column align-items-center py-5">
                            <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M47.5 0C21.2466 0 0 21.2446 0 47.5C0 73.7536 21.2446 95 47.5 95C73.7534 95 95 73.7554 95 47.5C95 21.2464 73.7554 0 47.5 0ZM47.5 87.5781C25.3487 87.5781 7.42188 69.653 7.42188 47.5C7.42188 25.3485 25.347 7.42188 47.5 7.42188C69.6513 7.42188 87.5781 25.347 87.5781 47.5C87.5781 69.6515 69.653 87.5781 47.5 87.5781Z" fill="#D60019"/>
                                <path d="M63.7513 58.5033L52.748 47.5L63.7513 36.4967C65.2004 35.0475 65.2006 32.698 63.7515 31.2487C62.302 29.7994 59.9524 29.7995 58.5035 31.2487L47.5 42.252L36.4965 31.2487C35.0476 29.7994 32.6976 29.7994 31.2485 31.2487C29.7994 32.698 29.7994 35.0475 31.2487 36.4967L42.252 47.5L31.2487 58.5033C29.7994 59.9526 29.7992 62.3022 31.2485 63.7513C32.6982 65.2008 35.0478 65.2002 36.4965 63.7513L47.5 52.748L58.5035 63.7513C59.9522 65.2004 62.3022 65.2006 63.7515 63.7513C65.2008 62.302 65.2006 59.9524 63.7513 58.5033Z" fill="#D60019"/>
                            </svg>
                            <h5 class="text-center mt-4 w-65">Произошла неизвестная ошибка.</h5>
                        </div>
                    </div>

                    <form action="#" method="POST">
                        @csrf

                        <input type="hidden" name="news_id" value="{{ $news->id }}">
{{--                        <div class="d-flex align-items-center mb-4">--}}
{{--                            <span>Выберите оценку: </span>--}}
{{--                            <div class="review_rating ml-3">--}}
{{--                                <span class="rating-group">--}}
{{--                                    @foreach([1,2,3,4,5] as $star)--}}
{{--                                        <label aria-label="{{ $star }} star" class="mb-0 rating__label" for="add-review-{{ $star }}"><i class="rating__icon rating__icon--star fas fa-star"></i></label>--}}
{{--                                        <input class="rating__input" name="rating" id="add-review-{{ $star }}" value="{{ $star }}" type="radio" @if($loop->iteration == 4) checked @endif>--}}
{{--                                    @endforeach--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="md-form mt-0">
                            <input type="hidden" name="product_id" value="{{ $news->id }}">
                            <input type="text" name="name" placeholder="Ваше имя" required class="form-control">
                            <input type="text" name="email" placeholder="E-mail" required class="form-control">
                            <textarea name="text" placeholder="Комментарий" rows="5" required class="mt-3 md-textarea form-control"></textarea>
                        </div>
                        <div class="my-3">
                            <div class="application__error-messages color--accent" style="display: none"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-3">
                    <button type="button" class="button btn-primary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="button btn-success">Отправить</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="article page-news__article container">
        <div class="article__wrap">
            <article class="article__left-side">
                <header class="article__header">
                    <h2 class="page-title article__title">{{ $news->title }}</h2>
                    <div class="article__info border-top border-bottom">
                        <span>
                            <span class="article__date d-inline-flex align-items-center">
                                <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5938 0.9375H10.0312V0H9.09375V0.9375H2.90625V0H1.96875V0.9375H1.40625C0.630844 0.9375 0 1.56834 0 2.34375V10.5938C0 11.3692 0.630844 12 1.40625 12H10.5938C11.3692 12 12 11.3692 12 10.5938V2.34375C12 1.56834 11.3692 0.9375 10.5938 0.9375ZM11.0625 10.5938C11.0625 10.8522 10.8522 11.0625 10.5938 11.0625H1.40625C1.14778 11.0625 0.9375 10.8522 0.9375 10.5938V4.40625H11.0625V10.5938ZM11.0625 3.46875H0.9375V2.34375C0.9375 2.08528 1.14778 1.875 1.40625 1.875H1.96875V2.8125H2.90625V1.875H9.09375V2.8125H10.0312V1.875H10.5938C10.8522 1.875 11.0625 2.08528 11.0625 2.34375V3.46875Z" fill="#575757"/>
                                    <path d="M2.71875 5.39062H1.78125V6.32812H2.71875V5.39062Z" fill="#575757"/>
                                    <path d="M4.59375 5.39062H3.65625V6.32812H4.59375V5.39062Z" fill="#575757"/>
                                    <path d="M6.46875 5.39062H5.53125V6.32812H6.46875V5.39062Z" fill="#575757"/>
                                    <path d="M8.34375 5.39062H7.40625V6.32812H8.34375V5.39062Z" fill="#575757"/>
                                    <path d="M10.2188 5.39062H9.28125V6.32812H10.2188V5.39062Z" fill="#575757"/>
                                    <path d="M2.71875 7.26562H1.78125V8.20312H2.71875V7.26562Z" fill="#575757"/>
                                    <path d="M4.59375 7.26562H3.65625V8.20312H4.59375V7.26562Z" fill="#575757"/>
                                    <path d="M6.46875 7.26562H5.53125V8.20312H6.46875V7.26562Z" fill="#575757"/>
                                    <path d="M8.34375 7.26562H7.40625V8.20312H8.34375V7.26562Z" fill="#575757"/>
                                    <path d="M2.71875 9.14062H1.78125V10.0781H2.71875V9.14062Z" fill="#575757"/>
                                    <path d="M4.59375 9.14062H3.65625V10.0781H4.59375V9.14062Z" fill="#575757"/>
                                    <path d="M6.46875 9.14062H5.53125V10.0781H6.46875V9.14062Z" fill="#575757"/>
                                    <path d="M8.34375 9.14062H7.40625V10.0781H8.34375V9.14062Z" fill="#575757"/>
                                    <path d="M10.2188 7.26562H9.28125V8.20312H10.2188V7.26562Z" fill="#575757"/>
                                </svg>
                                <span>{{ $news->created_at }}</span>
                            </span>
                        </span>
                        <span class="article__comments ml-4 d-inline-flex align-items-center">
                            <svg class="mr-2" width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.7512 -0.0566406H2.23511C1.24016 -0.0566406 0.430664 0.752697 0.430664 1.74781V7.57146C0.430664 8.56433 1.23664 9.37239 2.2287 9.37591V12.0186L6.02657 9.37591H11.7512C12.7462 9.37591 13.5557 8.56641 13.5557 7.57146V1.74781C13.5557 0.752697 12.7462 -0.0566406 11.7512 -0.0566406V-0.0566406ZM12.7866 7.57146C12.7866 8.14232 12.3222 8.60687 11.7512 8.60687H5.78529L2.99775 10.5466V8.60687H2.23511C1.66418 8.60687 1.19971 8.14232 1.19971 7.57146V1.74781C1.19971 1.17679 1.66418 0.712402 2.23511 0.712402H11.7512C12.3222 0.712402 12.7866 1.17679 12.7866 1.74781V7.57146Z" fill="#575757"/>
                                <path d="M3.94336 2.66064H10.0427V3.42969H3.94336V2.66064Z" fill="#575757"/>
                                <path d="M3.94336 4.30127H10.0427V5.07031H3.94336V4.30127Z" fill="#575757"/>
                                <path d="M3.94336 5.94189H10.0427V6.71094H3.94336V5.94189Z" fill="#575757"/>
                            </svg>
                            <span>Комментарии: <b>{{ $comments->count() }}</b></span>
                        </span>
{{--                        <span class="article__time d-inline-flex align-items-center">--}}
{{--                            <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M6 0C2.69166 0 0 2.69166 0 6C0 9.30834 2.69166 12 6 12C9.30834 12 12 9.30834 12 6C12 2.69166 9.30834 0 6 0ZM6 11.25C3.1051 11.25 0.750003 8.8949 0.750003 6C0.750003 3.1051 3.1051 0.750003 6 0.750003C8.8949 0.750003 11.25 3.1051 11.25 6C11.25 8.8949 8.8949 11.25 6 11.25V11.25Z" fill="#575757"/>--}}
{{--                                <path d="M6.375 2.25H5.625V6.15526L7.98486 8.51512L8.51513 7.98485L6.375 5.84472V2.25Z" fill="#575757"/>--}}
{{--                            </svg>--}}
{{--                            <span>Время чтения: <b>10 минут</b></span>--}}
{{--                        </span>--}}
                    </div>
                </header>
                <div class="article__content">
                    {!! $news->text !!}
                </div>
                <footer class="article__footer pt-4 border-top">
                    <div class="article__share">
                        <span class="mr-3">Поделиться:</span>
                        <ul class="d-flex align-items-center">
                            <li class="mr-3">
                                <a href="https://plus.google.com/share?url={{ url()->full() }}">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 30C23.28 30 30 23.28 30 15C30 6.72 23.28 0 15 0C6.72 0 0 6.72 0 15C0 23.28 6.72 30 15 30ZM20.3538 13.9287H22.5012V11.7825H24.6487V13.93H26.7775V16.0775H24.6487V18.225H22.5012V16.0775H20.3538V13.9287ZM15.745 9.4525L13.7125 11.425C11.1125 8.88375 6.05375 10.735 6.05375 14.9937C6.05375 20.77 14.2525 21.165 14.9637 16.4937H10.7238V13.9175H17.795C18.5975 18.1125 15.8888 22.5 10.7238 22.5V22.5012C6.5625 22.5012 3.2225 19.1438 3.2225 15C3.22375 8.3275 11.1387 5.17375 15.745 9.4525V9.4525Z" fill="#F44336"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a href="https://www.facebook.com/sharer.php?u={{ url()->full() }}&t={{ $news->title }}">
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.5 30C24.0604 30 31 23.2843 31 15C31 6.71573 24.0604 0 15.5 0C6.93959 0 0 6.71573 0 15C0 23.2843 6.93959 30 15.5 30Z" fill="#3B5998"/>
                                        <path d="M19.3964 15.5873H16.6306V25.393H12.4402V15.5873H10.4473V12.1412H12.4402V9.91119C12.4402 8.31648 13.223 5.81934 16.6679 5.81934L19.7719 5.8319V9.17694H17.5198C17.1504 9.17694 16.6309 9.35556 16.6309 10.1163V12.1444H19.7625L19.3964 15.5873Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a href="http://vk.com/share.php?url={{ url()->full() }}&title={{ $news->title }}&description={!! Str::limit($news->description, 100, '...') !!}&image={{ $news->image ?? asset('img/logo.png') }}&noparse=true">
                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.5 30C24.0604 30 31 23.2843 31 15C31 6.71573 24.0604 0 15.5 0C6.93959 0 0 6.71573 0 15C0 23.2843 6.93959 30 15.5 30Z" fill="#4D76A1"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9143 21.579H16.1309C16.1309 21.579 16.4984 21.5399 16.686 21.3442C16.8587 21.1645 16.8531 20.8271 16.8531 20.8271C16.8531 20.8271 16.8294 19.2473 17.587 19.0147C18.3338 18.7856 19.2929 20.5415 20.3094 21.2167C21.0781 21.7276 21.6622 21.6156 21.6622 21.6156L24.3802 21.579C24.3802 21.579 25.802 21.4942 25.1278 20.4123C25.0726 20.3238 24.7352 19.6121 23.107 18.1494C21.4027 16.6186 21.631 16.8662 23.6839 14.2183C24.9342 12.6057 25.434 11.6211 25.2779 11.1994C25.1289 10.7978 24.2094 10.904 24.2094 10.904L21.1491 10.9224C21.1491 10.9224 20.9222 10.8925 20.754 10.9898C20.5896 11.0853 20.4838 11.3077 20.4838 11.3077C20.4838 11.3077 19.9994 12.5556 19.3534 13.6169C17.9907 15.8563 17.4458 15.9745 17.2231 15.8354C16.705 15.5114 16.8344 14.5335 16.8344 13.8389C16.8344 11.6687 17.1745 10.7639 16.1721 10.5296C15.8394 10.4518 15.5946 10.4005 14.7438 10.3922C13.6519 10.3812 12.7277 10.3954 12.2044 10.6435C11.8562 10.8085 11.5876 11.1762 11.7512 11.1973C11.9535 11.2235 12.4116 11.3168 12.6545 11.6369C12.9681 12.0497 12.957 12.9771 12.957 12.9771C12.957 12.9771 13.1372 15.5317 12.5362 15.8491C12.1237 16.0667 11.5578 15.6223 10.3429 13.5907C9.7204 12.55 9.25041 11.3997 9.25041 11.3997C9.25041 11.3997 9.15978 11.1847 8.99814 11.0698C8.80197 10.9305 8.52788 10.8861 8.52788 10.8861L5.6198 10.9045C5.6198 10.9045 5.18324 10.9163 5.02298 11.1C4.88041 11.2634 5.01166 11.6013 5.01166 11.6013C5.01166 11.6013 7.28839 16.7561 9.86629 19.3538C12.2301 21.7354 14.9143 21.579 14.9143 21.579Z" fill="white"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="mr-3">
                                <a href="https://twitter.com/share?url={{ url()->full() }}&text={{ $news->title }}&hashtags=my_hashtag">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.0008 29.9997C23.285 29.9997 30.0007 23.2841 30.0007 14.9999C30.0007 6.71567 23.285 0 15.0008 0C6.71665 0 0.000976562 6.71567 0.000976562 14.9999C0.000976562 23.2841 6.71665 29.9997 15.0008 29.9997Z" fill="#55ACEE"/>
                                        <path d="M24.1883 10.78C23.5455 11.065 22.854 11.2578 22.1289 11.3439C22.8692 10.9003 23.4374 10.1984 23.7056 9.36067C23.0128 9.77165 22.2452 10.0698 21.4288 10.2305C20.7748 9.53394 19.843 9.09863 18.8111 9.09863C16.8314 9.09863 15.2257 10.7043 15.2257 12.684C15.2257 12.965 15.2575 13.2386 15.319 13.5012C12.3393 13.3517 9.69724 11.9244 7.92874 9.75453C7.62018 10.284 7.44317 10.9003 7.44317 11.5573C7.44317 12.8009 8.07661 13.8988 9.03813 14.5416C8.45068 14.5231 7.89746 14.3619 7.41429 14.0926C7.41403 14.1079 7.41402 14.1231 7.41402 14.1381C7.41402 15.8753 8.65042 17.3243 10.2903 17.6534C9.98976 17.7358 9.67237 17.7793 9.34589 17.7793C9.11434 17.7793 8.89 17.7572 8.67128 17.7154C9.12744 19.1395 10.4513 20.1762 12.0206 20.2053C10.7933 21.1671 9.2475 21.7401 7.56724 21.7401C7.27846 21.7401 6.99236 21.7233 6.7124 21.6899C8.29827 22.7076 10.1833 23.3009 12.208 23.3009C18.8028 23.3009 22.4093 17.8376 22.4093 13.0993C22.4093 12.9439 22.4059 12.7891 22.3989 12.6356C23.1 12.1303 23.7078 11.499 24.1883 10.78Z" fill="#F1F2F2"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </article>
            <aside class="article__sidebar"></aside>
        </div>
    </section>

    <section class="reviews page-news__reviews">
        <div class="container p-0 px-md-3">
            <div class="section__header flex-wrap justify-content-center justify-content-md-between">
                <h2 class="section__title section__title--dark">Комментарии (<span>{{ $comments->total() }}</span>)</h2>
                <div class="section__header-text d-block">
                    <button class="btn btn-outline-primary font-weight-semibold py-2 px-4 reviews__add-button mt-3 mt-md-0" data-toggle="modal" data-target="#add-review">Оставить комментарий</button>
                </div>
            </div>
            <form action="{{ route('newsComments.store') }}" class="was-validated reviews__add my-4" method="POST">
                @csrf

                <input type="hidden" name="news_id" value="{{ $news->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() ?? null }}">
                <div class="md-form mt-3">
                    <input type="text" name="name" id="name" class="form-control" value="{{ isset(Auth::user()->info) ? Auth::user()->info->fio : null }}" required>
                    <label for="materialContactFormName">Имя</label>
                </div>
                <div class="md-form">
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email ?? null }}" required>
                    <label for="materialContactFormEmail">E-mail</label>
                </div>
                <div class="md-form">
                    <textarea name="text" id="text" class="form-control md-textarea" rows="3" required></textarea>
                    <label for="materialContactFormMessage">Отзыв</label>
                </div>
                <button class="button btn-outline ml-auto" type="submit">Отправить</button>
            </form>
            @if(isset($comments) and $comments->count() > 0)
                <div class="section__content reviews__content bg-light rounded">
                    <ul class="reviews__items">
                        @foreach($comments as $comment)
                            <li class="review reviews__item">
                                <div class="review__header mb-4 d-flex align-items-center justify-content-between">
                                <span>
                                    <b class="review__author">{{ $comment->name }}</b>
                                    <span class="review__date d-none d-md-inline">{{ $comment->created_at }}</span>
                                </span>
                                </div>
                                <div class="review__content">
                                    <div class="review__text">
                                        {!! $comment->text !!}
                                    </div>
                                </div>
                                <span class="review__date d-block d-md-none">{{ $comment->created_at }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div class="pagination catalog__pagination">
                    @include('layouts._paginate',['pagination'=>$comments])
                </div>
            @endif
        </div>
    </section>
@endsection

@push('metas')
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $news->title }}">
    <meta property="og:description" content="{!! Str::limit($news->description, 100, '...') !!}">
    <meta property="og:image" content="{{ $news->image ?? asset('img/logo.png') }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-news/news.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-news/news-min.js') }}"></script>,

    <script>
        let applicationModal = $('#add-review');

        $.each(applicationModal, function () {
            let $this = $( this );
            let applicationModalForm = $( this ).find('form');
            let applicationModalSuccess = $( this ).find('.application__success');
            let applicationFooter = $( this ).find('.modal-footer');
            let applicationModalError = $( this ).find('.application__error');
            let applicationModalSubmitButton = $( this ).find('button[type="submit"]');
            let errorList = $( this ).find('.application__error-messages');

            $( this ).find('button[type="submit"]').on('click', function (e) {
                e.preventDefault();

                $.ajax({
                    url:     '{{ route('newsComments.store') }}',
                    type:     "POST",
                    data: $this.find('input, select, textarea'),
                    beforeSend: function() {
                        applicationModalSubmitButton.css({
                            'opacity' : '.5'
                        });

                        applicationModalSubmitButton.attr('disabled', 'disabled')
                    },

                    success: function(response) {
                        applicationModalForm.slideUp(200);
                        applicationFooter.slideUp(200);
                        applicationModalSuccess.slideDown(200);

                        applicationModalSubmitButton.css({
                            'opacity' : '1'
                        });

                        applicationModalSubmitButton.attr('disabled', 'none');

                        setTimeout(function () {
                            applicationModalSuccess.slideUp(200);
                            applicationModalForm.slideDown(200);
                            applicationFooter.slideDown(200);
                        }, 2000)
                    },
                    error: function(xhr, status, error) {
                        let err = JSON.parse(xhr.responseText);

                        applicationModalSubmitButton.css({
                            'opacity' : '1'
                        });

                        applicationModalSubmitButton.attr('disabled', 'none');

                        if(err) {

                            errorList.html('');

                            $.each(err.errors, function () {
                                errorList.append('<p class="mb-0">' + $( this )[0] + '</p>').stop('true').slideDown(200);
                            });

                            // setTimeout(function () {
                            //     errorList.stop('true').slideUp(200);
                            // }, 3000)
                        } else {
                            applicationModalForm.slideUp(200);
                            applicationModalError.slideDown(200);

                            // setTimeout(function () {
                            //     applicationModalError.slideUp(200);
                            //     applicationModalForm.slideDown(200);
                            // }, 2000)
                        }
                    }
                });
            })
        })
    </script>
@endpush


