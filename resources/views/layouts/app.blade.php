<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Chicker') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('message'))
    <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/images/chicker-logo.jpg" alt="chicker-logo" height="50" class="mr-2">
                    Chicker
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="mr-5">
                            <form class="form-inline my-2 my-lg-0" method="POST" role="search" action="{{ route('chicks.search') }}">
                                @csrf
                                <input class="form-control mr-sm-2" type="search" name="q" placeholder="Rechercher" aria-label="Search">
                                <button class="btn btn-outline-warning my-2 my-sm-0 text-secondary" type="submit">Rechercher</button>
                            </form>
                        </li>

                        <li class="nav-item dropdown ml-5">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ auth()->user()->chickname }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <span class="sidebarsResponsive">
                                    <a href="{{ route('home') }}" class="ml-4 text-dark">
                                        Accueil<br>
                                    </a>

                                    <a href="{{ route('explore') }}" class="ml-4 text-dark">
                                        Explorer<br>
                                    </a>

                                    <a href="{{ route('profile', $user = auth()->user()->chickname) }}" class="ml-4 text-dark">
                                        Profil
                                    </a>

                                </span>


                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                            <div class="row sidebarsResponsive">
                                <div class="col-12">

                                    <h6 class="text-secondary"><b>Abonnements</b></h6>

                                    <ul class="list-unstyled d-flex">

                                        @forelse (auth()->user()->follows as $users)

                                        <li class="mr-3 text-center">

                                            <a href="{{ route('profile', $users) }}">
                                                <img src="{{ $users->avatar }}" alt="" height="80" class="rounded-circle">

                                                <p class="text-dark">{{ $users->chickname }}</p>
                                            </a>

                                        </li>

                                        @empty
                                        <p>Aucun abonnement</p>

                                        @endforelse

                                    </ul>
                                </div>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>