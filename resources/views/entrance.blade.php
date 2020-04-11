@extends('layouts')
@section('title', 'Авторизация пользователя')
@section('menu')

@endsection
@section('content')
    <div class=entrance-registration-wrapper>
        <form name="auth" method="POST">
            {{ csrf_field() }}
            <ul class="entrance-registration">
                <li class="entrance-registration_item"><a href="" class="entrance-registration_link__active"><i class="fas fa-key"></i>Авторизация</a></li>
                <li class="entrance-registration_item"><a href="" class="entrance-registration_link"><i class="fas fa-user-edit"></i>Регистрация</a></li>
            </ul>
            <div class="login">
                <i class="far fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="E-mail" required pattern="([A-z0-9_.-]{1,})@([A-z0-9_.-]{1,}).([A-z]{2,8})">
                <i class="require-field"></i>
            </div>
            <div class="password">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Пароль" required pattern="[A-z0-9_]{1,}">
                <i class="require-field"></i>
            </div> 
            <label for="remember-me">
                <input type="checkbox" name="remember-me" id="remember-me">
                <i class="far fa-square"></i><span>Запомнить меня</span>
            </label>   
            <input type="submit" value="Войти">
            <div class="remember-password">
                <a href="" class="remember-password_link">Вспомнить пароль</a>
            </div>
            @isset($message)
                {{ $message }}
            @endisset
        </form>
    </div>   
@endsection