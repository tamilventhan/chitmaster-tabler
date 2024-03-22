<!doctype html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- CSS files -->
    @vite('resources/js/app.js')
</head>
<body class=" border-top-wide border-primary d-flex flex-column">
<div class="page page-center">
    @yield('content')
</div>

    @stack('scripts')<script>
        var passwordField = document.getElementById('password');
        var showPassword = document.getElementById('showPassword');
        var hidePassword = document.getElementById('HidePassword');
        var confirmPasswordField = document.getElementById('confirmPassword');
        var showConfirmPassword = document.getElementById('showConfirmPassword');
        var hideConfirmPassword = document.getElementById('HideConfirmPassword');
    
        showPasswordToggle.addEventListener('click', function(event) {
            event.preventDefault();
            togglePasswordVisibility(passwordField, showPassword, hidePassword);
        });
    
        showConfirmPasswordToggle.addEventListener('click', function(event) {
            event.preventDefault();
            togglePasswordVisibility(confirmPasswordField, showConfirmPassword, hideConfirmPassword);
        });
    
        function togglePasswordVisibility(passwordField, showButton, hideButton) {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                showButton.classList.add('d-none');
                hideButton.classList.remove('d-none');
            } else if (passwordField.type === 'text') {
                passwordField.type = 'password';
                showButton.classList.remove('d-none');
                hideButton.classList.add('d-none');
            }
        }
    </script>    
</body>
</html>
