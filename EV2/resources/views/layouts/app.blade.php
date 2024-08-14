<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Terrasol') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!--CSS Adminlte-->
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">


    <!--Font icon-->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <!-- Scripts -->

</head>
<body class="login-page BackGradient" id="BackGradient">

    <!-- Errores -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
    @endif

<div id="app"class="login-box">
    <div class="card card-outline card-primary">
            @yield('content')     
    </div>
</div>
<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>

</body>
</html>
