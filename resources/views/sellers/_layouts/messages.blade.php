@if($errors->any() or session('success') or session('primary') or session('error'))
    <div class="alert @if(session('success')) alert-success @elseif(session('primary')) alert-primary @elseif($errors->any() or session('error')) alert-danger @endif alert-dismissible fade show mb-0" role="alert">
        @if(session('success'))
            {!! session()->get('success') !!}
        @elseif(session('primary'))
            {!! session()->get('primary') !!}
        @elseif(session('error'))
            {!! session()->get('error') !!}
        @elseif($errors->any())
            @forelse($errors->all() as $error)
                {{ $error }}
            @empty
                {!! session()->get('error') !!}
            @endforelse
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
