<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Includes csrf-token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Link to npm css and js -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <!-- Our own flavicon -->
    <link rel="icon" type="/img/ico" href="/img/favicon.ico">
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

<!-- implement the default theme -->
@if (Auth::user()->theme === 'default')

     <script>
     src="jquery-3.3.1.min.js"
     $().ready(function() {

         $('body').css({
           'font-color': 'black',
        })
          $('#sidebar, .sidebar-header').css({
             'background-color': '#7386D5',
         })
           $('p').css({
               'color': 'black',
           })
           $('.btn').css({
               'background-color': '7386D5',
           })
           $('.download').css({
               'color': 'black',
           })
           $('.article').css({
               'background-color': 'white',
               'color': '7386D5',
           })
           ;
       });

@elseif (Auth::user()->theme === 'contrast')
     <script>
       src="jquery-3.3.1.min.js"
       $().ready(function() {
         $('body').css({
            'font-size': '1.5em',
        })
        $('nav').css({
           'max-width': '1000px',
           'background-image': 'none',
       })
       $('nav ul').css({
          'background-color': 'black',
          'max-width':'1000px',
          'margin': '0',
       })
       $('#container').css({
          'max-width': '1000px',
        })
        $('p').css({
           'color': 'black',
         })
       ;
   });
     </script>

@elseif (Auth::user()->theme === 'vrolijk')

     <script>
       src="jquery-3.3.1.min.js"
       $().ready(function() {
         $('body').css({
           'background-color': 'rgba(121, 93, 143, 0.6)',
            'font-color': 'black',
        })
        $('.container').css({
           'background-color': 'pink',
         })
           $('p').css({
               'color': 'black',
           })
           $('.btn').css({
               'background-color': 'purple',
           })
           ;
       });
     </script>

@endif

  </body>
</html>
