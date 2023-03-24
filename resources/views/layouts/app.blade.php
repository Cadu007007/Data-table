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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
    <link href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.js"></script>
    <link href="https://cdn.datatables.net/select/1.2.6/css/select.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/select/1.2.6/js/dataTables.select.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <link href="https://sandbox.scoretility.com/static/js/Editor-1.8.1/css/editor.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://sandbox.scoretility.com/static/js/Editor-1.8.1/js/dataTables.editor.js"></script>
    <link rel=stylesheet type=text/css href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
    <!--
      <link rel=stylesheet type=text/css href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.structure.css">
      <link rel=stylesheet type=text/css href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.theme.css">
       -->
    <link rel=stylesheet type=text/css href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.css?v=1.10.18">
    <link rel=stylesheet type=text/css href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.jqueryui.css?v=1.5.2">
    <link rel=stylesheet type=text/css href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.jqueryui.css?v=3.2.5">
    <link rel=stylesheet type=text/css href="https://sandbox.scoretility.com/static/js/Editor-1.8.1/css/editor.jqueryui.css?v=1539093792">
    <link rel=stylesheet type=text/css href="https://cdn.datatables.net/select/1.2.6/css/select.jqueryui.css?v=1.2.6">
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.jqueryui.js?v=1.10.18"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.jqueryui.js?v=1.5.2"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.5/js/dataTables.fixedColumns.js?v=3.2.5"></script>
    <script src="https://sandbox.scoretility.com/static/js/Editor-1.8.1/js/editor.jqueryui.js"></script>
    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
