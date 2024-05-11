<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/login.css') }}" rel="stylesheet" type="text/css" />
    <style>
        * , h1 , label{
           font-family: cairo;
        }
        input {
            direction: rtl;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="background-wrap">
        <div class="background"></div>
    </div>

    <form id="accesspanel" method="POST" action="{{ route('admin.login.action') }}">
        @csrf
        <h1 id="litheader" style="font-family: cairo;"> الكنانى </h1>
        <div class="inset">
            <p style="margin-bottom: 20px">
                <input type="text" id="email" class="@error('email') is-invalid @enderror" 
                placeholder="{{TranslationHelper::translate('email' , 'admin')}}" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color:red">{{ $message }}</strong>
                </span>
                @enderror
            </p>
            <p style="margin-bottom: 10px">
                <input type="password" id="password"  
                placeholder="{{ TranslationHelper::translate('password' , 'admin') }}" 
                class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </p>
            <div style="text-align: center;direction:rtl">
                <div class="checkboxouter">
                    <input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}> 
                    <label class="checkbox"></label>
                </div>
                <label for="remember" style="padding: 0 5px;"> {{ TranslationHelper::translate('remember_me' , 'admin') }} </label>
            </div>
            <input class="loginLoginValue" type="hidden" name="service" value="login" />
        </div>
        <p class="p-container">
            <input type="submit" name="Login" id="go" value="{{TranslationHelper::translate('login' , 'admin')}}">
        </p>
    </form>

</body>
</html>
