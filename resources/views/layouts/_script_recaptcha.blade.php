@if(Route::is('register','home','contacts'))
    <!-- googleRecaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdMCNMZAAAAAAm8B2dBh7Lvxt05aSr5J0GQpud8"></script>

    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdMCNMZAAAAAAm8B2dBh7Lvxt05aSr5J0GQpud8', { action: 'register' }).then(function(_token) {
                if(_token) {
                    document.getElementById('recaptcha').value = _token;
                }
            });
        });
    </script>
@endif
