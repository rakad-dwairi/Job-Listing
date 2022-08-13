<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="{{ config('app.locale') }}">
    <!-- Title -->
    <title>{{ trans('panel.site_title') }}</title>
    <!-- SEO Tags -->
    <meta name="description" content="Dashboard, Code, Ideas, settings, laravel, bulma">
    <meta name="author" content="Code Ideas">
    <!-- Type Tags --> 
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Styles -->
    <link href="{{ asset('material/css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="material/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="material/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="material/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="material/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="material/img/favicon/safari-pinned-tab.svg" color="#54cc96">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="wrapper" id="app">
        <!--========Admin Loader============-->
        <div class="pageloader is-active"><span class="title">DashBoard</span></div>
        <!--========Admin Login layout============-->

            <main class="login-page">
                <img class="wave" src="{{ asset('material/img/wave.png') }}">
                @include('layouts.partials.alerts')
                <div class="login-page-child">
                    <div class="container">
                        <div class="columns-container">
                            <div class="columns is-centered is-vcentered">
                                <div class="column is-6">
                                    @yield('content')
                                </div>
                                <div class="column is-6">
                                    <img class="side-vector" src="{{ asset('material/img/bg.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
    <!-- Scripts -->
    <script src="{{ asset('/material/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
