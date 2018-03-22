<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Our own flavicon -->
    <link rel="icon" type="img/ico" href="img/favicon.ico">
    <!-- Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles van Laravel -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
</head>
<body>
  <!-- View for the login page (landing page) -->
      <div class="content">
          <div class="title m-b-md">
              <h1><img src="{{asset('img/MedLogo.svg')}}" height="150" width="220"> </h1>
              <h2>jouw medisch dagboek</h2>
          </div>
      </div>

      @yield('content')
    </div>
    </body>
  </html>
