<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'user Management System') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

        <!-- JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg ">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Toggle button -->
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'user Management System') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                                    
                    <!-- Left links -->
                    <div class="d-flex align-items-center">
                        @if (Route::has('login'))
                            <div>
                                @auth
                                    <a href="{{ route('user.profile') }}"> {{ Auth::user()->name }} </a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();">Log out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
            </div>
        </nav>
            <nav class="navbar sub-nav navbar-expand-lg ">
                <!-- Container wrapper -->
                <div class="container">
                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left links -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @can('is-admin')
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                            @endcan
                            </li>                                                  
                        </ul>

                    </div>
                </div>
            </nav> 
            
        <main class="conatiner">
            @include('partials.alerts')
            @yield('content')
        </main>
    </body>
</html>
