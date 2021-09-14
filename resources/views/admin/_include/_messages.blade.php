@if(session('success'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-default-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
    </div>
@endif

@if($errors->any() )
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-default-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

@if(isset($pageError))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-default-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! $pageError !!}
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! session()->get('error') !!}
                </div>
            </div>
        </div>
    </div>
@endif

