@if(session('success') or session('primary') or session('error'))
    <div class="alert @if(session('success')) alert-success @elseif(session('primary')) alert-primary @elseif(session('error')) alert-error @endif alert-dismissible fade show mb-0" role="alert">
        @if(session('success'))
            {!! session()->get('success') !!}
        @elseif(session('primary'))
            {!! session()->get('primary') !!}
        @elseif(session('error'))
            {!! session()->get('error') !!}
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
