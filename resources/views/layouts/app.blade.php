<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#343a40">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="description" content="Sander de Vos — Software engineer, DevOps en informatiebeveiliging.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@sdevos16">
    <meta name="twitter:title" content="{{ config('app.name', 'Soved') }}">
    <meta name="twitter:description" content="Sander de Vos — Software engineer, DevOps en informatiebeveiliging.">
    <meta name="twitter:image" content="{{ asset('img/DSC_0029.JPG') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Soved') }}</title>

    <!--
    © 2018 Sander de Vos
    -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
