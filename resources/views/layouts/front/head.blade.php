<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thehhfn | helping hand foundation nepa</title>
    {!! SEO::generate() !!}
    <link rel="stylesheet" href="{{asset('resources/front/css/style.css')}}">
    @yield('page-specific-css')
    <link rel="stylesheet" href="{{asset('resources/front/css/bootstrap.min.css')}}">
    </script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset("resources/front/css/font-awesome/all.min.css")}}">
    <script src="{{asset("resources/front/js/font-awesome/all.min.js")}}" crossorigin="anonymous"></script>
    @if(getSetting('SETTING_RECAPTCHA_SITE_KEY'))
        {!! htmlScriptTagJsApi() !!}
    @endif
    @if(getSetting("SETTING_CUSTOM_HEADER_SCRIPTS"))
       {!! getSetting("SETTING_CUSTOM_HEADER_SCRIPTS") !!}
    @endif
</head>

<body>
<div class="container-fluid">
