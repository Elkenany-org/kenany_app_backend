<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ asset('dashboard/assets/css/login2.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="parent clearfix">

        <div class="bg-illustration">
            <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="login">
            <div class="container">
                <h1> {{TranslationHelper::translate('login_to_access_account' , 'admin')}} </h1>
                <div class="login-form">
                    <form method="POST" action="{{ route('admin.login.action') }}">
                        @csrf

                        <input type="text" id="email" class="@error('email') is-invalid @enderror" 
                        placeholder="{{TranslationHelper::translate('email' , 'admin')}}" 
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                        @enderror

                        <input type="password" id="password" 
                         placeholder="{{TranslationHelper::translate('password' , 'admin')}}"  class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="remember-form">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span for="remember">{{TranslationHelper::translate('remember_me' , 'admin')}}</span>
                        </div>

                        <button type="submit" >{{TranslationHelper::translate('login' , 'admin')}}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>
