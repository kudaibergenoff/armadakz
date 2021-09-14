@extends('_layout')

@section('title','ARMADA - добавить(изменить) статью' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title">Добавить статью</h2>
                    </div>
                    <form action="@isset($blog){{ route('admin.blogs.update',$blog->id) }}@else{{ route('admin.blogs.store') }}@endisset" class="change-shop pb-4 border-bottom" method="POST" enctype="multipart/form-data">
                        @isset($blog) @method('PATCH') @endisset
                        @csrf
                        <div class="row align-items-center">
                            <div class="col-12 col-md-auto">
                                <div class="md-form">
                                    <span>Изображение</span>
                                    <label class="cabinet center-block">
                                        <figure>
                                            <img src="https://user.gadjian.com/static/images/personnel_boy.png" class="gambar img-responsive img-thumbnail" />
                                            <figcaption><i class="fa fa-camera"></i></figcaption>
                                        </figure>
                                        <input type="file" class="item-img file center-block" name=""/>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md row">
                                <div class="col-12 col-lg-6">
                                    <div class="md-form">
                                        <label>Заголовок</label>
                                        <input type="text" name="title" class="form-control" placeholder="Заголовок">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="md-form">
                                        <label>SEO заголовок</label>
                                        <input type="text" name="seo-title" class="form-control" placeholder="SEO заголовок">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <select class="mdb-select md-form" name="rubric" searchable="Поиск">
                                        <option value="" disabled selected>Выберите</option>
                                        <option value="1">Вариант 1</option>
                                        <option value="2">Вариант 2</option>
                                        <option value="3">Вариант 3</option>
                                    </select>
                                    <label class="mdb-main-label">Рубрика</label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="md-form">
                                        <label>Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="md-form">
                                        <label>Пользователь</label>
                                        <input type="text" name="user" class="form-control" placeholder="Пользователь">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg">
                                <label>Текст</label>
                                <textarea name="text" id="" cols="30" rows="11" class="tinyMCE"></textarea>
                            </div>
                            <div class="col-12 col-lg">
                                <div class="form-group">
                                    <label>Пред. текст</label>
                                    <textarea class="form-control" name="pre-text" rows="12"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label>SEO описание</label>
                                    <textarea class="form-control" name="seo-description" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label>SEO keywords</label>
                                    <textarea class="form-control" name="seo-keywords" rows="8"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label>Теги</label>
                                    <textarea class="form-control" name="tags" rows="8"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="switch">
                            <label>Опубликовать</label><br>
                            <label>
                                Нет
                                <input type="checkbox" name="status" checked>
                                <span class="lever"></span>
                                Да
                            </label>
                        </div>

                        <button type="submit" class="mt-5 button btn-primary">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/page-vendor-area/vendor-area.min.css') }}">
    <!-- Crippie -->
    <link rel="stylesheet" href="{{ asset('libs/croppie/croppie.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
    <!-- Croppie -->
    <script src="{{ asset('libs/croppie/croppie.min.js') }}"></script>
@endpush


