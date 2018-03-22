<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles van Laravel -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap glyphicons icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our own flavicon -->
    <link rel="icon" type="img/ico" href="img/favicon.ico">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

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

      <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <!--  initialize the plugin for the sidebar and use some of its options -->
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- Popper CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Custom Scroller Js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
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

<!-- implement the contrast theme -->
@if (Auth::user()->theme === 'contrast')

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
