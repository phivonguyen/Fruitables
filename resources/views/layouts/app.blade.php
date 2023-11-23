<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    {{-- Login --}}
        <link rel="icon" type="image/png" href="{{asset("assets/images/icons/favicon.ico")}}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/animate/animate.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/css-hamburgers/hamburgers.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/animsition/css/animsition.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/select2/select2.min.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/daterangepicker/daterangepicker.css")}}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{asset("assets/css/util.css")}}">
        <link rel="stylesheet" type="text/css" href="{{asset("assets/css/main.css")}}">
    <!--===============================================================================================-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!--===============================================================================================-->
	    <script src="{{asset("assets/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/vendor/animsition/js/animsition.min.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/vendor/bootstrap/js/popper.js")}}"></script>
        <script src="{{asset("assets/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/vendor/select2/select2.min.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/vendor/daterangepicker/moment.min.js")}}"></script>
        <script src="{{asset("assets/vendor/daterangepicker/daterangepicker.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/vendor/countdowntime/countdowntime.js")}}"></script>
    <!--===============================================================================================-->
        <script src="{{asset("assets/js/main.js")}}"></script>
</body>
</html>
