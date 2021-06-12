<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KinoPoshuk</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('/fonts/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('js/ie-support/html5.js') }}"></script>
    <script src="{{ asset('js/ie-support/respond.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <style type="text/css">
        .dropdown-toggle{
            height: 40px;
            width: 400px !important;
        }
    </style>
</head>

<body>

<div id="app">
    <header class="site-header">
        <div class="container">
            <a href="index.html" id="branding">
                <img src="/logo.png" alt="" class="logo">
                <div class="logo-copy">
                    <h1 class="site-title"><b>KinoПошук</b></h1>
                    <small class="site-description">Знайди своє кіно</small>
                </div>
            </a> <!-- #branding -->

            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    @if( auth()->check() )
                        <li class="menu-item"><a class="nav-link" href="/home">Привіт, {{ auth()->user()->name }}</a>
                        </li>
                    @endif
                    <li class="menu-item current-menu-item"><a href="/">Головна</a></li>

                    @if( auth()->check() )
                        <li class="menu-item"><a class="nav-link" href="/chats">Чат</a></li>
                        <li class="menu-item"><a class="nav-link" href="/logout">Вихід</a></li>
                    @else
                        <li class="menu-item"><a class="nav-link" href="/login">Вхід</a></li>
                        <li class="menu-item"><a class="nav-link" href="/register">Регестрація</a></li>
                    @endif
                </ul> <!-- .menu -->
            </div>

        </div>
    </header>
    <main class="main-content">
        <div class="container">
            <div class="page">
                @yield('main')
            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="colophon"></div>
        </div>
    </footer>
</div>

<!-- Default snippet for navigation -->
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function () {
        $('select').selectpicker();
    });
</script>


<!-- Default snippet for navigation -->
<script src="{{ mix('js/app.js') }}" defer></script>

</body>
