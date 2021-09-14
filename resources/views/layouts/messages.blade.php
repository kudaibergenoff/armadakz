@if($errors->any() or session('success') or session('primary') or session('error'))
    @if(Route::is('seller.*','admin.*'))
        <div class="login__alert active">
            <div class="login__alert-wrap">
                <div class="mr-3 d-flex">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 0C3.80534 0 0 3.80534 0 8.5C0 13.1941 3.80534 17 8.5 17C13.1941 17 17 13.1947 17 8.5C17 3.80534 13.1941 0 8.5 0ZM8.5 15.9375C4.39239 15.9375 1.06252 12.6076 1.06252 8.5C1.06252 4.39239 4.39239 1.06252 8.5 1.06252C12.6076 1.06252 15.9375 4.39239 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="white"/>
                        <path d="M12.0748 11.3002L9.27615 8.50108L12.0588 5.74126C12.2687 5.53353 12.2687 5.19726 12.0588 4.99006C11.8495 4.78287 11.5095 4.78287 11.3002 4.99006L8.52124 7.74617L5.70083 4.92524C5.49151 4.71486 5.15153 4.71486 4.94222 4.92524C4.7329 5.13508 4.7329 5.47612 4.94222 5.68597L7.75839 8.50267L4.92627 11.3114C4.71696 11.5191 4.71696 11.8554 4.92627 12.0626C5.13559 12.2703 5.47557 12.2703 5.68542 12.0626L8.51378 9.25757L11.3167 12.0604C11.526 12.2708 11.866 12.2708 12.0753 12.0604C12.2841 11.8511 12.2841 11.5106 12.0748 11.3002Z" fill="white"/>
                    </svg>
                </div>
                <span>
                    @if(session('success'))
                        <div>{!! session()->get('success') !!}</div>
                    @elseif(session('primary'))
                        <div>{!! session()->get('primary') !!}</div>
                    @elseif(session('error'))
                        <div>{!! session()->get('error') !!}</div>
                    @elseif($errors->any())
                        @forelse($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @empty
                            <div>{!! session()->get('error') !!}</div>
                        @endforelse
                    @endif
                </span>
            </div>
        </div>
    @else
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#answe_messages').modal('show');
            });
        </script>
        <div class="modal fade applicationPost" id="answe_messages" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="@if(session('success')) {{ 'application__success' }} @elseif(session('error') or $errors->any()) {{ 'application__error' }} @endif">
                        <div class="d-flex justify-content-center flex-column align-items-center py-5">
                            @if(session('success'))
                                <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M68.4972 32.4279C69.9468 33.8775 69.9468 36.2273 68.4972 37.6762L43.6021 62.5721C42.1525 64.0209 39.8034 64.0209 38.3538 62.5721L26.5028 50.7203C25.0532 49.2714 25.0532 46.9216 26.5028 45.4728C27.9516 44.0232 30.3014 44.0232 31.7503 45.4728L40.9776 54.7001L63.249 32.4279C64.6986 30.9791 67.0484 30.9791 68.4972 32.4279V32.4279ZM95 47.5C95 73.7556 73.752 95 47.5 95C21.2444 95 0 73.752 0 47.5C0 21.2444 21.248 0 47.5 0C73.7556 0 95 21.248 95 47.5ZM87.5781 47.5C87.5781 25.3467 69.6504 7.42188 47.5 7.42188C25.3467 7.42188 7.42188 25.3496 7.42188 47.5C7.42188 69.6533 25.3496 87.5781 47.5 87.5781C69.6533 87.5781 87.5781 69.6504 87.5781 47.5Z" fill="#11B603"/>
                                </svg>
                            @elseif(session('error') or $errors->any())
                                <svg width="95" height="95" viewBox="0 0 95 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M47.5 0C21.2466 0 0 21.2446 0 47.5C0 73.7536 21.2446 95 47.5 95C73.7534 95 95 73.7554 95 47.5C95 21.2464 73.7554 0 47.5 0ZM47.5 87.5781C25.3487 87.5781 7.42188 69.653 7.42188 47.5C7.42188 25.3485 25.347 7.42188 47.5 7.42188C69.6513 7.42188 87.5781 25.347 87.5781 47.5C87.5781 69.6515 69.653 87.5781 47.5 87.5781Z" fill="#D60019"/>
                                    <path d="M63.7513 58.5033L52.748 47.5L63.7513 36.4967C65.2004 35.0475 65.2006 32.698 63.7515 31.2487C62.302 29.7994 59.9524 29.7995 58.5035 31.2487L47.5 42.252L36.4965 31.2487C35.0476 29.7994 32.6976 29.7994 31.2485 31.2487C29.7994 32.698 29.7994 35.0475 31.2487 36.4967L42.252 47.5L31.2487 58.5033C29.7994 59.9526 29.7992 62.3022 31.2485 63.7513C32.6982 65.2008 35.0478 65.2002 36.4965 63.7513L47.5 52.748L58.5035 63.7513C59.9522 65.2004 62.3022 65.2006 63.7515 63.7513C65.2008 62.302 65.2006 59.9524 63.7513 58.5033Z" fill="#D60019"/>
                                </svg>
                            @endif

                            <h5 class="text-center mt-4 w-100">
                                @if(session('success'))
                                    <div>{!! session()->get('success') !!}</div>
                                @elseif(session('error'))
                                    <div>{!! session()->get('error') !!}</div>
                                @elseif($errors->any())
                                    @forelse($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @empty
                                        <div>{!! session()->get('error') !!}</div>
                                    @endforelse
                                @endif
                            </h5>
                        </div>
                    </div>
                    <div class="modal-footer p-3">
                        <button type="button" class="button btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif


{{--@push('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $(window).on('load', function() {--}}
{{--            $('#myModal').modal('show');--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}
