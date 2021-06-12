<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>KinoPoshuk</title>
    <!-- Loading third party fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('/fonts/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('js/ie-support/html5.js') }}"></script>
    <script src="{{ asset('js/ie-support/respond.js') }}"></script>
    <![endif]-->

    <link href="https://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
</head>

<body>
<div id="site-content">
    <header class="site-header">
        <div class="container">
            <a id="branding">
                <img src="/logo.png" alt="" class="logo">
                <div class="logo-copy">
                    <h1 class="site-title"><b> KiноПошук </b></h1>
                    <small . class="site-description">Знайди своє кіно</small>
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
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg ">
                            <form action="{{ route('searchname') }}" method="GET" class="search-form">
                                <input type="text" id="s" name="s" placeholder="Пошук..." class="active">
                                <button type="submit" class="btn btn-primary"><span class="fa fa-search"
                                                                                    aria-hidden="true"></span></button>
                            </form>

                            <form action="{{ route('searchfilter') }}" method="GET" class="search-form">
                                <button type="button"
                                        class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class=" dropdown-menu dropdown-menu-right" role="menu">

                                    <div class="filters">
                                        <label for="category" class="text-dark">Додаткові параметри пошуку
                                            кінофільмів:</label>
                                        <select name="generesId" id="input">
                                            <option value="0">Жанр</option>
                                            @foreach (\App\Models\Generes::select ('g_id','g_name')->orderby('g_name','asc')->get() as $generes)
                                                <option value="{{ $generes->g_id }}" {{ $generes->g_id == $selectedId['generesId'] ? 'selected' : '' }}>
                                                    {{ $generes['g_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div style="margin-top: 5px;">
                                            <select name="countryId" id="input">
                                                <option value="0">Країна</option>
                                                @foreach (\App\Models\Film::select('f_country')->orderby('f_country','asc')->distinct()->get() as $fcountry)
                                                    <option value="{{ $fcountry->f_country }}" {{ $fcountry->f_country == $selectedId['countryId'] ? 'selected' : '' }}>
                                                        {{ $fcountry['f_country'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <select name="yearId" id="input">
                                                <option value="0">Рік</option>
                                                @foreach (\App\Models\Film::select('f_year')->orderby('f_year','desc')->distinct()->get() as $fyear)
                                                    <option value="{{ $fyear->f_year }}" {{ $fyear->f_year == $selectedId['yearId'] ? 'selected' : '' }}>
                                                        {{ $fyear['f_year'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <input style="margin-top: 15px;" type="text" id="s" name="s"
                                                   placeholder="актери/режисери" class="active">
                                            <button><i class="fa fa-search"></i></button>
                                            <a href="/" class="btn btn-danger">Очистити</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </ul> <!-- .menu -->
            </div>
        </div>

    </header>
    <main class="main-content">
        <div class="container">
            <div class="page">

                @yield('main_content')

            </div>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="colophon"></div>
        </div> <!-- .container -->
    </footer>

</div>


<script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
