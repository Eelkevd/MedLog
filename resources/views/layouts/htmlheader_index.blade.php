<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Our own flavicon -->
    <link rel="icon" type="/img/ico" href="img/favicon.ico"/>
    <!-- Open Icons -->
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <!-- Bootstrap CSS CDN-->
<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Styles van Laravel -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
  </head>
  <body>
        <div id="container">
            <!-- Top Menu -->
            @include('layouts.sidebar')
            <div id="content">
              @yield('content')
            </div>
        </div>
  </body>
</html>
