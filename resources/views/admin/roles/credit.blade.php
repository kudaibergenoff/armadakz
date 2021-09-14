@extends('_layout')

@section('title','ARMADA - изменить(создать) роль' )

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
                    <form action="@isset($data){{ route('admin.roles.update',$data->id) }}@else{{ route('admin.roles.store') }}@endisset" class="change-shop pb-4 border-bottom was-validated" method="POST"  enctype="multipart/form-data">
                        @isset($data) @method('PATCH') @endisset
                        @csrf

                        <div class="row">
                            <div class="col-4 col-lg mb-3">
                                @include('layouts.forms.input',['name'=>'title','label'=>'Название','placeholder'=>'Название','length'=>50,'required'=>true])
                            </div>
                        </div>
                        <div class="row">
                            @php
                                $arr = $data->permissions->map(function($i) {return $i->id;});
                            @endphp
                            <ul>
                                @forelse ($permissions as $group_name => $permission)
                                    <li>
                                        <input type="checkbox" id="{{$group_name}}" class="permission-group">
                                        <label for="{{$group_name}}">{{\Illuminate\Support\Str::title(str_replace('_',' ', $group_name))}}</label>

                                        <ul>
                                            @foreach ($permission as $item)
                                            <li>
                                                <input type="checkbox" id="permission-{{$item->id ?? ''}}" name="permissions[{{$item->id ?? ''}}]" value="{{$item->id ?? ''}}" class="the-permission" @if(in_array($item->id,$arr->toArray())) checked @endif>
                                                <label  for="permission-{{$item->id ?? ''}}">{{ $item->display_name ?? '' }}</label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @empty
                                    
                                @endforelse
                            </ul>
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
    <style>
        ul{
            list-style: none;
        }
        [type=checkbox]:checked, [type=checkbox]:not(:checked){
            opacity: 1;
            pointer-events: all;
            position: absolute;
            margin-left: -20px;
            margin-top: 7px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/dest/page-vendor-area/vendor-area-min.js') }}"></script>

    <script>

        // Validation
        let form = $('form.was-validated');

        form.on('submit', function (e) {
            let editorContent = tinymce.get('description').getContent();
            if (editorContent.length < 20)
            {
                e.preventDefault();

                $('.description .invalid-feedback').css({'display':'block'})
                $('.tox-tinymce').css({
                    'border-color' : '#dc3545'
                });
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".description").offset().top - 100
                }, 1000);
            }
        })
    </script>

    <script>
        $('document').ready(function () {

            $('.permission-group').on('change', function(){
                $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
            });

            // $('.permission-select-all').on('click', function(){
            //     $('ul.permissions').find("input[type='checkbox']").prop('checked', true);
            //     return false;
            // });

            // $('.permission-deselect-all').on('click', function(){
            //     $('ul.permissions').find("input[type='checkbox']").prop('checked', false);
            //     return false;
            // });

            function parentChecked(){
                $('.permission-group').each(function(){
                    var allChecked = true;
                    $(this).siblings('ul').find("input[type='checkbox']").each(function(){
                        if(!this.checked) allChecked = false;
                    });
                    $(this).prop('checked', allChecked);
                });
            }

            parentChecked();

            $('.the-permission').on('change', function(){
                parentChecked();
            });
        });
    </script>
@endpush


