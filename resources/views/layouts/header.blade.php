@if(Route::is('vendor.*'))
    @include('layouts._header_vendor')
@elseif(Route::is('admin.*'))
    @include('layouts._header_admin')
@else
    @include('layouts._header_user')
@endif
