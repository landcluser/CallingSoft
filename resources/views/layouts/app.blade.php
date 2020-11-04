<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="YouthFireIT">
    <meta name="apple-mobile-web-app-title" content="YouthFireIT">
    <meta name="theme-color" content="#282c30">
    <meta name="msapplication-navbutton-color" content="#282c30">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">
     <link rel="icon" type="image/png" sizes="200x200" href="{{asset('images/tipz.png')}}">
     <link rel="apple-touch-icon" type="image/png" sizes="200x200" href="{{asset('images/tipz.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('title', 'YouthfireIT Messenger')">
    @yield('seo')
    <title>@yield('title', 'YouthfireIT Messenger')</title>
    @include('layouts.cssMode')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @stack('css')
</head>
<body>
<wrapper class="d-flex flex-column">
    <nav id="RT_navbar" class="{{request()->is('messenger/*') && agent()->isMobile() ? 'NS' : ''}} navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            {{-- <img src="{{ asset('images/tipz.png') }}" width="30" height="30" class="d-inline-block align-top" alt="YouthfireIT Messenger"> --}}
            YouthfireIT Messenger
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="badge badge-pill badge-danger mr-n2" id="nav_mobile_total_count"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            @auth
                @include('layouts.nav.user')
            @else
                @include('layouts.nav.guest')
            @endif
        </div>
    </nav>
    <div class="fixed-top mt-5 pt-3">
        <div class="container">
            <div id="alert_container"></div>
        </div>
    </div>
@if(agent()->isMobile() && request()->is('messenger/*'))
    <main id="RT_main_section" class="pt-0 mt-3 flex-fill">
@else
    <main id="RT_main_section" class="{{request()->is('messenger*') ? 'pt-5' : 'py-5'}} mt-4 flex-fill">
@endif
        <div id="app">
            @yield('content')
        </div>
    </main>
    @if(!request()->is('messenger*'))
        @include('layouts.nav.footer')
    @endif
</wrapper>
@include('layouts.scripts')
</body>
</html>
