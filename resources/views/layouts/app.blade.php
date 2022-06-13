<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
            <div class="container">

                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                    @can('isAdmin')
                        <hr id="oki" class="oki perpendicular-line" style="background: #E5E5E5; width: 5%; transform: rotate(90deg); ">

                        <ul class="navbar-nav me-auto">
                            <!-- Dodano listę uzytkowników -->
                            <li class="nav-item active end">
                                <a class="nav-link" href="{{route('users.index')}}">
                                    {{ __('Lista użytkowników') }}
                                </a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('products.index')}}">
                                    {{ __('Lista produktów') }}
                                </a>
                            </li>


                            <li class="nav-item active end">
                                <a class="nav-link" href="{{route('categories.index')}}">
                                    {{ __('Lista kategorii') }}
                                </a>
                            </li>
                        </ul>
                    @endcan

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->



                        @auth
                            <a class="nav-link big isDisable" role="button" href="{{route('cart.index')}}">
                                <i class="fas fa-shopping-basket"></i> Koszyk
                            </a>
                        @endauth

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Załóż konto') }}</a>
                                </li>
                            @endif
                        @else




                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="{{route('users.show',  Auth::user()->id)}}">
                                                <i class="fas fa-user"></i> Profil użytkownika
                                            </a>

                                            @if(Auth::user()->role == 'user')
                                            <a class="dropdown-item" href="{{route('users.edit',  Auth::user()->id)}}">
                                                <i class="fa-solid fa-pen-to-square"></i> Edytuj profil
                                            </a>
                                            @endif

                                            <a class="dropdown-item " href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> {{ __('Wyloguj się') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css-files')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        @yield('javascript')
    </script>

    @yield('js-files')

</body>
</html>
