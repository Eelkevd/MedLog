<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{csrf_token()}}">
<<<<<<< HEAD

    <!-- Bootstrap CSS CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles van Laravel -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap glyphicons icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

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

    </div> <!-- end div app -->



      <!-- Scripts -->
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
=======
>>>>>>> Patient-5: added option to select an illness for a entry. Also added option that allows multiple symptomes to one entry. Modded and created migrations

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

<<<<<<< HEAD
  </body>
</html>
=======
</html>

<!-- <script>
	
	$('#btnIllness').on("click", function () {

		
    // evt.preventDefault();

    var illness = $('#illness').val();
    // alert(items);
    // var data = { 
    // 			// "_token": "{{ csrf_token() }}", 
    // 			type: type, 
    // 			items: items
    // 		};



    $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	})

    $.ajax({
        url: "/entries/create_illness",
        type: "POST",
        // data: { CSRF: getCSRFTokenValue(JSON.stringify(illness))},
        data: {
		        "_token": "{{ csrf_token() }}",
		        "illness": illness
        },
        cache: false,
        contentType: 'application/json; charset=utf-8',
        processData: false,
        success: function (response)
        {
            console.log(response);
        }
    });
});

</script> -->
>>>>>>> Patient-5: added option to select an illness for a entry. Also added option that allows multiple symptomes to one entry. Modded and created migrations
