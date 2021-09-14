<label for="slug">Slug</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <div class="input-group-text" style="height: 38px;">
            <input class="form-check-input" type="checkbox" name="is_slug" id="is_slug" @if(isset($data) and $data->is_slug == true) checked @endif>
            <label class="form-check-label" for="is_slug"></label>
        </div>
    </div>
    @include('layouts.forms.input',['name'=>'slug','id'=>'slug','placeholder'=>'Slug','length'=>150,'required'=>true,'other'=>'disabled readonly'])
</div>

@push('scripts')
    {{--  Slug generation  --}}
    <script>
        $('#title').change(function(e) {
            $.get('{{ route('admin.checkSlug') }}',
                { 'title': $(this).val() },
                function( data ) {
                    $('#slug').val(data.slug);
                }
            );
        });
    </script>

    {{--  Slug checkbox  --}}
    <script>
        let slugInput = $('input[name="slug"]');
        let slugCheckbox = $('input[name="is_slug"]');

        slugCheckbox.on('input', function () {
            if( $( this ).is(':checked') ) {
                slugInput.removeAttr('disabled readonly')
            } else {
                slugInput.attr('disabled', 'disabled');
                slugInput.attr('readonly', 'readonly')
            }
        });
    </script>
@endpush
