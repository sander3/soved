<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#343a40">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="description" content="Sander de Vos — Software engineer, DevOps en informatiebeveiliging.">

    <meta name="og:title" content="Sander de Vos — Software engineer, DevOps en informatiebeveiliging.">
    <meta name="og:type" content="website">
    <meta name="og:image" content="{{ asset('img/DSC_0029.JPG') }}">
    <meta name="og:url" content="{{ url()->current() }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <script type="text/javascript" nonce="{{ csp_nonce() }}">
      var _paq = _paq || [];
      _paq.push(['disableCookies']);
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//matomo.sander.sh/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '1']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//matomo.sander.sh/piwik.php?idsite=1&amp;rec=1" style="border:0;" alt="" /></p></noscript>
</body>
</html>
