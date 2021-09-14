@extends('_layout')

@section('title',"ARMADA - личный кабинет пользователя" )

{{--@section('breadcrumb')--}}
{{--    @php--}}
{{--        $breadcrumbs[] = [  'route'=>route('home'),--}}
{{--                            'title'=>'Главная' ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',$product->catalog->slug),--}}
{{--                            'title'=>$product->catalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('catalog',['catalog_slug'=>$product->catalog->slug,'subcatalog_slug'=>$product->subcatalog->slug]),--}}
{{--                            'title'=>$product->subcatalog->title ];--}}
{{--        $breadcrumbs[] = [  'route'=>route('product',$product->slug),--}}
{{--                            'title'=>$product->title ?? 'Информация о продукте' ];--}}
{{--    @endphp--}}
{{--    @include('layouts.breadcrumb',['breadcrumbs'=>$breadcrumbs])--}}
{{--@endsection--}}

@section('content')
    <div class="container page-user-area__content">
        <div class="row">
            @include('users.include.left_menu')
            <div class="col-12 col-lg-9">
                <p class="page-title">Личные данные</p>
                @include('users.info._personal')
                @include('users.info._contact')
                @include('users.info._address')
{{--                @include('users.info._login')--}}
{{--                @include('users.info._additional')--}}
                @include('users.info._social_and_delete')
                <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button btn-outline-dark d-block d-sm-inline mt-5 mx-auto mx-sm-0">Выйти из профиля</button>
                <a href="{{ route('password.request') }}" class="button btn-outline-dark d-block d-sm-inline mt-5 mx-auto mx-sm-0">Сменить пароль</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-user-area/user-area.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-user-area/user-area-min.js') }}"></script>
    {{-- inputmask --}}
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/mask-form.js') }}"></script>

    <script>
        // Datepicker

        {
            $('[data-toggle="datepicker"]').datepicker({
                language: 'ru_RU',
                format: 'dd.mm.YYYY',
                days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                daysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                daysMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
            });
        }
    </script>

    <script>
        // User edit input

        {
            let userBlock = $('.user-block');

            $.each(userBlock, function () {
                let $userBlock = $( this );
                let editButton = $( this ).find('.user-block__edit');
                let inputs = $( this ).find('.user-block-info__value > *:not(span)');

                editButton.on('click', function (e) {
                    let $editButton = $( this );
                    e.preventDefault();
                    let form = $( this ).parents('.user-block__wrap');
                    if( $( this ).hasClass('active') ) {
                        // AJAX save

                        let applicationModalForm = $userBlock.find('form');
                        let applicationWrapper = $userBlock.find('.user-block__wrapper');
                        let applicationRoute = applicationModalForm.attr('action');
                        let applicationSuccess = $userBlock.find('.user-block__success');
                        let applicationError = $userBlock.find('.user-block__error');
                        let errorList = $userBlock.find('.user-block__error-list');

                        e.preventDefault();

                        applicationModalForm.validate();

                        if(applicationModalForm.valid()) {
                            $.ajax({
                                url:     applicationRoute,
                                type:     "POST",
                                data: $userBlock.find('input, select, textarea'),
                                beforeSend: function() {
                                    $editButton.find('span').text('Сохранение...');
                                    $editButton.css({
                                        'opacity':'.5'
                                    });
                                },
                                success: function(response) {
                                    applicationSuccess.addClass('active');
                                    applicationWrapper.addClass('user-block__wrapper--success');

                                    setTimeout(function () {
                                        applicationSuccess.removeClass('active');
                                        applicationWrapper.removeClass('user-block__wrapper--success');
                                    }, 2000)

                                    $editButton.css({
                                        'opacity':'1'
                                    });
                                    $editButton.removeClass('active');
                                    $editButton.find('span').text('Редактировать');

                                    $.each(inputs, function () {
                                        let currentValue = $( this ).siblings('span');

                                        if( $( this ).children().is('select') ) {
                                            currentValue.text($( this ).find('option:selected').text());
                                        } else if($( this ).val() === '') {
                                            currentValue.text('Не указано');
                                        } else {
                                            currentValue.text($( this ).val());
                                        }

                                        if( $( this ).hasClass('user-block-info__value--no-change') ) {
                                            return;
                                        }

                                        else if( $( this ).hasClass('user-block-info__value--password') ) {
                                            currentValue.fadeIn(200);

                                            setTimeout(() => {
                                                let cloneInput = $( this )
                                                    .clone()
                                                    .attr({
                                                        'name':'current-password',
                                                        'placeholder':'Текущий пароль'
                                                    })
                                                    .insertBefore($( this ))
                                                    .fadeOut(200);

                                                $( this ).fadeOut(200);
                                            }, 200)
                                        }

                                        else {
                                            $( this ).fadeOut(200);

                                            setTimeout(() => {
                                                currentValue.fadeIn(200);
                                            }, 200)
                                        }
                                    })
                                },
                                error: function(xhr, status, error) {
                                    $editButton.css({
                                        'opacity':'1'
                                    });

                                    let err = JSON.parse(xhr.responseText);

                                    if(err) {
                                        errorList.html('');

                                        $.each(err.errors, function () {
                                            errorList.append('<p class="mb-0">' + $( this )[0] + '</p>').stop('true').slideDown(200);
                                        });

                                        setTimeout(function () {
                                            errorList.stop('true').slideUp(200);
                                        }, 3000)
                                    } else {
                                        applicationError.addClass('active');
                                        applicationWrapper.addClass('user-block__wrapper--error');

                                        setTimeout(function () {
                                            applicationError.removeClass('active');
                                            applicationWrapper.removeClass('user-block__wrapper--error');
                                        }, 2000)
                                    }
                                }
                            })
                        }
                    } else {
                        $( this ).addClass('active');
                        $( this ).find('span').text('Сохранить');

                        $.each(inputs, function () {
                            let currentValue = $( this ).siblings('span');

                            if( $( this ).hasClass('user-block-info__value--no-change') ) {
                                return;
                            }

                            else if( $( this ).hasClass('user-block-info__value--password') ) {
                                currentValue.fadeOut(200);

                                setTimeout(() => {
                                    let cloneInput = $( this )
                                        .clone()
                                        .attr({
                                            'name':'current-password',
                                            'placeholder':'Текущий пароль'
                                        })
                                        .insertBefore($( this ))
                                        .fadeIn(200);

                                    $( this ).fadeIn(200);
                                }, 200)
                            }

                            else {
                                currentValue.fadeOut(200);

                                setTimeout(() => {
                                    $( this ).fadeIn(200);
                                }, 200)
                            }
                        })
                    }
                })
            })
        }
    </script>
@endpush


