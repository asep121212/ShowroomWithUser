<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('/') }}client/css/style.css">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b6895b">
            <div class="container">
                <a class="navbar-brand fs-4 fst-italic" href="/"><span class="fw-bold">Kopi</span> Bubuk.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item fs-5">
                            <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('client.product.index') }}">Produk</a>
                        </li>
                        <li class="nav-item fs-5 ms-5 {{ Request::is('tentang-kami*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                        <li class="nav-item fs-5 ms-5 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill"></i>
                            </a>
                            @if (Route::has('login'))
                                <ul class="dropdown-menu">      
                                    @auth
                                        <li><a class="dropdown-item" href="{{ route('clientProfile.edit') }}">Edit Profile</a></li>
                                         <li><a class="dropdown-item" href="{{ route('client.pesanan.saya') }}">Pesanan Saya</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                        @if (Route::has('register'))
                                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    @endauth
                                </ul>
                            @endif
                        </li>

                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item fs-5">
                                    <a class="nav-link {{ Request::is('keranjang-saya*') ? 'active' : '' }}" href="{{ route('client.product.cart') }}"><i class="bi bi-cart3"></i></a>
                                </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
