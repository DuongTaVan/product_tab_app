<!DOCTYPE html>

<html lang="en">

<head>

    <title>{{ config('shopify-app.app_name') }}</title>

    <meta charset="UTF-8">

    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">-->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
    <link href="{{ secure_asset('/css/backend/v2/main.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('/css/backend/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/css/docs.css')}}"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/css/pygments-manni.css')}}"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/icon-fonts/elusive-icons-2.0.0/css/elusive-icons.min.css')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
    <link rel="stylesheet" href="{{ secure_asset('/bootstrap-iconpicker-1.10.0/icon-fonts/map-icons-2.1.0/css/map-icons.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css"/>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- Bootstrap CDN -->
{{--    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>--}}
    <!-- Bootstrap-Iconpicker Bundle -->
{{--    <script type="text/javascript" src="{{ secure_asset('/bootstrap-iconpicker-1.10.0/dist/js/bootstrap-iconpicker.bundle.min.js')}}"></script>--}}
</head>
<body>


