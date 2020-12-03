<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
         
        <navbar home="{{ url('/') }}" toggle="{{ __('Toggle navigation') }}" title="{{ config('app.name', 'Laravel') }}">
            @guest
                <a class="font-weight-bold text-light text-decoration-none" href="/login"><i class="fas fa-sign-in-alt text-success pt-1 pr-1 "></i> Se connecter</a>
            @else
                <profile fn="{{Auth::user()->first_name}}" ln="{{Auth::user()->last_name}}" lo="/logout" lot="{{ __('Logout') }}" role="{{Auth::user()->role}}"></profile>
            @endguest
        </navbar>
        <div class="row">
        </div>
        
        <user-layout @guest connected="0" iscoach="0" @else connected="1" @if(Auth::user()->role == 1 || Auth::user()->role == 2) iscoach="1" @else iscoach="0" @endif @endguest>
            @yield('content')
        </user-layout>
    </div>
</body>
</html>