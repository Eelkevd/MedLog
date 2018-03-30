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

      <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <div id="content">
          @include('layouts.nav')

          @yield('content')
        </div>

      </div> <!-- end div wrapper -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                 theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                // open or close navbar
                $('#sidebar').toggleClass('active');
                // close dropdowns
                $('.collapse.in').toggleClass('in');
                // and also adjust aria-expanded attributes we use for the open/closed arrows
                // in our CSS
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

        });
     </script>



<!-- implement the default theme -->
@if (!(Auth::user()->theme ))

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
            'font-size': '2em',
        })
          $('#sidebar, .sidebar-header').css({
             'background-color': 'black',
         })
           $('p').css({
               'color': 'black',
           })
           $('.btn').css({
               'background-color': 'black',
               'font-size': '1em',
           })
           $('.download').css({
               'color': 'black',
           })
           $('.article').css({
               'background-color': 'white',
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
           'background-color': 'pink',
            'font-color': 'black',
        })
          $('#sidebar, .sidebar-header').css({
             'background-color': 'purple',
         })
           $('p').css({
               'color': 'black',
           })
           $('.btn').css({
               'background-color': 'purple',
           })
           $('.download').css({
               'color': 'black',
           })
           $('.article').css({
               'background-color': 'white',
               'color': 'black',
           })
           ;
       });
     </script>

@endif

  </body>
</html>
