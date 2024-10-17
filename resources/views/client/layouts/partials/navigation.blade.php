<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
    <div class="container">
        <a class="navbar-brand fs-4 fst-italic text-light" href="/">
            <span class="fw-bold">Soetta </span> Motor.
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item fs-5">
                    <a class="nav-link {{ Request::is('products*') ? 'active' : '' }} text-light"
                        href="{{ route('client.product.index') }}">Produk</a>
                </li>
                @auth

                <li class="nav-item fs-5">
                    <a class="nav-link {{ Request::is('comments*') ? 'active' : '' }} text-light"
                        href="{{ route('comment') }}">Contact</a>
                </li>
                @endauth

                <li class="nav-item fs-5 ms-5 {{ Request::is('tentang-kami*') ? 'active' : '' }}">
                    <a class="nav-link text-light" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item fs-5 ms-5 dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark animate__animated animate__fadeIn">
                        @auth
                            <li><a class="dropdown-item" href="{{ route('clientProfile.edit') }}">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('client.pesanan.saya') }}">Pesanan Saya</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item fs-5">
                            <a class="nav-link {{ Request::is('keranjang-saya*') ? 'active' : '' }} text-light"
                                href="{{ route('client.product.cart') }}"><i class="bi bi-cart3"></i></a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        position: relative;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #f8f9fa;
        transform: translateY(-3px);
    }

    .navbar-nav .nav-link::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #f8f9fa;
        visibility: hidden;
        transform: scaleX(0);
        transition: all 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover::before {
        visibility: visible;
        transform: scaleX(1);
    }

    .dropdown-menu {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .dropdown-menu.show {
        opacity: 1;
    }

    .navbar-toggler {
        transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
        transform: rotate(90deg);
    }
</style>
