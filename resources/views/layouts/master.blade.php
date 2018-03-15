<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title> MedLog </title>

    </head>


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