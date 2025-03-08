<!DOCTYPE html>
<html class="html-login" lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/main.scss'])
    <title>Avengers Server</title>
</head>

<body class="body-login">
    <div class="login">
        <div class="login-img"></div>
        <div class="login-form">
            <div class="login-form-blanxart">
                <div class="login-form-blanxart-logo"></div>
                <h1 class="login-form-blanxart-name">Avengers Team</h1>
            </div>
            <div>
                <form class="login-form-content" action="{{ route('custom-login') }}" method="POST">
                    {{-- <form class="login-form-content" action="#" method="POST"> --}}
                    @csrf
                    <div class="login-form-unit">
                        <input class="login-form-input" type="text" id="name" autocomplete="off" name="name"
                            required placeholder="">
                        <label class="login-form-label" for="name">Avenger Name</label>
                        @if ($errors->has('name'))
                            <span class="msg-error">The Avenger name is required.</span>
                        @endif
                    </div>
                    <div class="login-form-unit">
                        <input class="login-form-input" type="password" id="password" name="password"
                            autocomplete="off" required placeholder="">
                        <label class="login-form-label" for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="msg-error">The password is required.</span>
                        @endif
                    </div>
                    <div class="recover-password"><a href="">Forgot your password?</a></div>
                    <button class="button-login medionegrita" type="submit">Submit</button>
                    <div class="error">
                        @if (session('error'))
                            <span class="msg-error">{{ session('error') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
