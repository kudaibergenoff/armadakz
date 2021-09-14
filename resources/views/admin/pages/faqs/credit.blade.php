@extends('_layout')

@section('title','ARMADA - Вопросы/Ответы' )

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
                    <form action="@isset($data){{ route('admin.faqs.update',$data->id) }}@else{{ route('admin.faqs.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="switch col-12 col-lg-3 mb-3">
                                @include('layouts.forms.switch',['name'=>'isActive','label'=>'Статус','on'=>'Активна','off'=>'Не активна'])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="mdb-main-label">Вид вопроса</label>
                                <select name="type" class="form-control" required>
                                    @foreach(['general'=>'общие вопросы','marketplace'=>'вопросы о маркетплейс'] as $typeKey=>$typeTitle)
                                        <option value="{{ $typeKey }}" @if(isset($data) and $data->type == $typeKey) selected @endif>{{ $typeTitle }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                @include('layouts.forms.input',['name'=>'title','label'=>'Вопрос','placeholder'=>'Вопрос','length'=>150,'required'=>true])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg mb-3">
                                @include('layouts.forms.textarea',['name'=>'description','class'=>'tinyMCE','label'=>'Ответ','placeholder'=>'Ответ','cols'=>30,'rows'=>15,'length'=>2000])
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


