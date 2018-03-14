<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidebar.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
</head>
<body>
    <div id="app">
      @include('layouts.nav')


      <div class="wrapper">
          <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Header -->
           <div class="sidebar-header">
               <h3>Collapsible Sidebar</div>
           </div>

           <!-- Sidebar Links -->
           <ul class="list-unstyled components">
               <li class="active"><a href="#">Home</a></li>
               <li><a href="#">About</a></li>

               <li><!-- Link with dropdown items -->
                   <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                   <ul class="collapse list-unstyled" id="homeSubmenu">
                       <li><a href="#">Page</a></li>
                       <li><a href="#">Page</a></li>
                       <li><a href="#">Page</a></li>
                   </ul>

               <li><a href="#">Portfolio</a></li>
               <li><a href="#">Contact</a></li>
           </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
      </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
