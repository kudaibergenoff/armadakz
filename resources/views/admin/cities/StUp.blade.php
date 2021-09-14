<div class="modal fade" id="modal{{ $modalName }}edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="was-validated" method="POST" action="@isset($item) {{ route('admin.cities.update',$item->id) }} @else {{ route('admin.cities.store') }} @endisset">
                @isset($item) @method('PATCH') @endisset
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@isset($item) Изменить @else Добавить @endisset город</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            @include('admin.include.form.input',['data'=>'title_ua','lang'=>'ua','label'=>'Название города','length'=>175,'required'=>1])
                        </div>
                        <div class="col-6 mb-3">
                            @include('admin.include.form.input',['data'=>'title_ru','lang'=>'ru','label'=>'Название города','length'=>175,'required'=>1])
                        </div>
                    </div>
                </div>
                    <div class="modal-footer clearfix">
                        <div class="mr-5 float-left">
                            <input type="checkbox" name="isActive" @if(isset($item) and $item->isActive == 1) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                        <button type="submit" class="btn btn-outline-primary float-right">
                            Сохранить
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
@php $modalName = null; $item = null; @endphp
