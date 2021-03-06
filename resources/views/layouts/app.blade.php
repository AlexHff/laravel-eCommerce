<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ecezon - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/storage/icons/logo.png" alt="logo" height="32" width="auto">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories') }}"><img src="/storage/icons/categories.png" alt="categories" height="18" width="18"> {{ __('Categories') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('deals') }}"><img src="/storage/icons/deals.png" alt="deals" height="18" width="18"> {{ __("Today's deals") }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories') }}"><img src="/storage/icons/categories.png" alt="categories" height="18" width="18"> {{ __('Categories') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('deals') }}"><img src="/storage/icons/deals.png" alt="deals" height="18" width="18"> {{ __("Today's deals") }}</a>
                            </li>
                            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('seller'))
                            <li class="nav-item">
                                <a class="nav-link" href="/sell"><img src="/storage/icons/sell.png" alt="sell" height="18" width="18"> {{ __('Sell') }}</a>
                            </li>
                            @endif
                        @endguest
                    </ul>

                    <!-- Search bar -->
                    <form class="form-inline my-2 my-lg-0 mx-2" method="POST" action="{{ route('items.search') }}">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.show') }}">{{ Cart::count() }} <img src="/storage/icons/shopping-cart.png" alt="cart" height="18" width="18"></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="/users/{{ auth()->user()->id }}">
                                         {{ __('Account') }}
                                     </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (isset(auth()->user()->background_image))
            <main class="py-4" style="background: url({{ auth()->user()->background_image }})">
                @yield('content')
            </main>
        @else
            <main class="py-4">
                @yield('content')
            </main>
        @endif
    </div>
    <footer class="container" style="text-align:center">
    <p>&copy; 2019 Ecezon.com, Inc. or its affiliates</p>
    </footer>
</body>
</html>
