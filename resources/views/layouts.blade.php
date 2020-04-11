<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css">
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </head>
    <body>
        @section('menu')
            <section class="navbar">
                <nav class="nav">
                    <ul class="nav-list">
                        <li class="logo"><a href="#"><span class="nav-text">ggScore</span><i class="fa fa-angle-double-right"></i></a></li>
                        <li class="nav-link"><a href="/"><i class="fa fa-home"></i><span class="nav-text">Главная</span></a></li>
                        <li class="nav-link"><a href=""><i class="fa fa-gamepad"></i><span class="nav-text">Матчи</span></a></li>
                        <li class="nav-link"><a href=""><i class="fa fa-users"></i><span class="nav-text">Команды</span></a></li>
                        <li class="nav-link"><a href=""><i class="fa fa-user"></i><span class="nav-text">Игроки</span></a></li>
                        <li class="nav-link"><a href=""><i class="fa fa-trophy"></i><span class="nav-text">Турниры</span></a></li>
                        <li><a href=""><i class="fa fa-moon-o"></i></a></li>
                    </ul>
                </nav>
            </section>
        @show
        @yield('content')
    </body>
</html>