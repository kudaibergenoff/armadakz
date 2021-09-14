@extends('_layout')

@section('title','ARMADA - Редактировать видео' )

@section('content')
    <section class="vendor page-vendor-area__vendor container-fluid pl-0">
        <div class="d-flex">
            @include('admin._layouts.left_menu')
            <div class="vendor__content flex-grow-1 vendor__content--products">
                @include('admin._layouts.header')
                <div class="shops orders vendor__shops pt-4 pb-3 p-xxl-3 pt-xxl-5 pr-0">
                    <div class="orders__header justify-content-between">
                        <h2 class="page-title orders__title"></h2>
                    </div>
                    <form action="@isset($data){{ route('admin.videos.update',$data->id) }}@else{{ route('admin.videos.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'is_active','label'=>'Статус','on'=>'Активно','off'=>'Не активно'])
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    @include('layouts.forms.input',['name'=>'title','id'=>'title','label'=>'Название','placeholder'=>'Название','length'=>150,'required'=>true])
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    @include('layouts.forms.input',['name'=>'url','type'=>'url','label'=>'Ссылка на видео','placeholder'=>'Ссылка на видео','length'=>150,'required'=>true])
                                </div>
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
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>
@endpush


