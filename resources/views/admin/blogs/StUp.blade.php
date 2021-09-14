@extends('admin._layout')

@section('content')
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <a href="{{ route('admin.blogs.index') }}" class="text-primary mr-2" >
                                <i class="fas fa-angle-double-left"></i>
                            </a>

                            <span class="font-weight-bold">@isset($item) Редактирование @else Добавление @endisset презентации</span>

                            <div class="card-tools">
                                <!-- Свёртывание -->
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-tooltip="tooltip" data-html="true" title="Свернуть таблицу"><i class="fas fa-minus"></i></button>
                                <!-- Максимальный размер -->
                                <button type="button" class="btn btn-tool" data-card-widget="maximize" data-tooltip="tooltip" data-html="true" title="Развернуть таблицу"><i class="fas fa-expand"></i></button>
                                <!-- Закрытие -->
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-tooltip="tooltip" data-html="true" title="Закрыть таблицу"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="was-validated" action="@isset($item) {{ route('admin.blogs.update',['blog'=>$item->id]) }} @else {{ route('admin.blogs.store') }} @endisset" method="POST" enctype="multipart/form-data">
                                @isset($item) @method('PATCH') @endisset
                                @csrf

                                <input type="hidden" name="status" value="1">
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        @include('admin.include.form.image',['data'=>'image','label'=>'Название','length'=>180,'required'=>1])
                                    </div>
                                    <div class="col-9">
                                        <div class="row">
{{--                                            <div class="col-12 mb-3">--}}
{{--                                                <label for="category">Категория <span class="text-danger" data-tooltip="tooltip" title="Обязательное поле">*</span></label>--}}
{{--                                                <select class="mb-3 form-control select2 select2-hidden-accessible" id="category" name="category_id" style="width: 100%;" data-select2-id="category_id" tabindex="-1" aria-hidden="true" required>--}}
{{--                                                    <option value="" selected readonly>Сделайте выбор</option>--}}
{{--                                                    @foreach($categories->where('parent_id',null) as $parent)--}}
{{--                                                        <option value="{{ $parent->id }}" disabled readonly>{{ $loop->iteration }}. {{ $parent->title_ru }}</option>--}}
{{--                                                        @foreach($categories->where('parent_id',$parent->id) as $category)--}}
{{--                                                            <option value="{{ $category->id }}" @isset($item) @if($item->category_id == $category->id) selected @endif @endisset>{{ $loop->parent->iteration }}.{{ $loop->iteration }}. {{ $category->title_ru }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-6 mb-3">--}}
{{--                                                <label for="status">Статус документа</label>--}}
{{--                                                <select class="browser-default custom-select" id="status" name="status" required>--}}
{{--                                                    <option value="0" @if(isset($item) and $item->status == 0) selected @endif>Документ ещё не проверен</option>--}}
{{--                                                    <option value="1" @if(isset($item) and $item->status == 1) selected @endif>Документ проверен</option>--}}
{{--                                                    <option value="2" @if(isset($item) and $item->status == 2) selected @endif>Документ забракован</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
                                            <div class="col-12 mb-3">
                                                @include('admin.include.form.input',['data'=>'title_ua','lang'=>'ua','label'=>'Название','length'=>180,'required'=>1])
                                            </div>
                                            <div class="col-12 mb-3">
                                                @include('admin.include.form.input',['data'=>'title_ru','lang'=>'ru','label'=>'Название','length'=>180,'required'=>1])
                                            </div>
{{--                                            <div class="col-8 mb-3">--}}
{{--                                                @include('admin.include.form.file',['data'=>'file','label'=>'Файл','required'=>1])--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 mb-3">--}}
{{--                                                <label for="status">Язык документа</label>--}}
{{--                                                <select class="browser-default custom-select" id="lang" name="lang" required>--}}
{{--                                                    @foreach(['ua'=>'українська','ru'=>'русский','en'=>'english'] as $lang=>$langName)--}}
{{--                                                        <option value="{{ $lang }}" @if(isset($item) and $item->lang == $lang) selected @endif>{{ $langName }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-2 mb-3">--}}
{{--                                                @include('admin.include.form.input',['data'=>'price','type'=>'number','label'=>'Цена (грн.)','length'=>5,'max'=>'99999'])--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        @include('admin.include.form.textarea',['data'=>'description_ua','lang'=>'ua','label'=>'Описание документа','length'=>2000])
                                    </div>
                                    <div class="col-6 mb-3">
                                        @include('admin.include.form.textarea',['data'=>'description_ru','lang'=>'ru','label'=>'Описание документа','length'=>2000])
                                    </div>
                                </div>

                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-outline-primary float-right">
                                        Сохранить
                                    </button>
                                    <div class="mr-5 float-right">
                                        <input type="checkbox" name="isActive" @if(isset($item) and $item->isActive == 1) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
