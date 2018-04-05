
<!doctype html>
<html lang="en">
<head>
  	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Includes csrf-token -->
    <meta name="csrf-token" content="QKPiclZ9JpCH9FGMIs6vnyxagnIRvxPvmMc2hPMT">

    <!-- Link to npm css and js -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <script type="text/javascript" src="http://127.0.0.1:8000/js/app.js"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/sidebar.css">

    <!-- Our own flavicon -->
    <link rel="icon" type="/img/ico" href="/img/favicon.ico">
    <title>MedLog - Jouw medisch dagboek</title>
</head>

<body>

    <div id="container">
        <!-- Top Menu -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
   <!-- Header -->
  <div class="title_app">
    <a href="http://127.0.0.1:8000/home" class="navbar-brand">
      <img src="http://127.0.0.1:8000/img/MedLogo.svg" class="d-inline-block align-top logo" alt="logo MedLog. Also return home button">
      Jouw medisch dagboek
    </a>
  </div>

  <!-- responsive button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav" style="position: absolute; bottom:0; right:0px;">

    <!-- menu items -->
                   <li class="nav-item active">
            <a class="nav-link" href="/entries">Nieuwe gebeurtenis <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbar2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Dagboek</a>
               <div class="dropdown-menu" aria-labelledby="navbar2Dropdown">
                 <a class="dropdown-item" href="/overview">Overzicht</a>
                 <a href="/export" class="dropdown-item">Exporteer</a>
                 <a href="/permissions" class="dropdown-item">Meelezers</a>
                 <div class="dropdown-divider"></div>
                 <a href="/entries" class="dropdown-item">Nieuw</a>
              </div>
          </li>
            <li class="nav-item">
               <a href="/home/mycalendar" class="nav-link">Kalender</a>
            </li>

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Middelen
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="/medicine">Medicijnen</a>
                 <a class="dropdown-item" href="/tool">Hulpmiddelen</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="AboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Account
               </a>
               <div class="dropdown-menu" aria-labelledby="AboutDropdown">
                 <a class="dropdown-item" href="/account">Uw gegevens</a>
                 <a class="dropdown-item" href="/thema">Uw thema</a>
                 <a class="dropdown-item" href="/about">Over MedLog</a>
              </div>
            </li>


        <!-- Authentication Links -->
          <li class="nav-item">
          <div class="">
              <a class="nav-link" href="http://127.0.0.1:8000/logout"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" style="display: none;">
                  <input type="hidden" name="_token" value="QKPiclZ9JpCH9FGMIs6vnyxagnIRvxPvmMc2hPMT">              </form>
          </div>
      </li>

      </ul>
    </div>
</nav>

        <div id="content">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">

	               <!-- form for submitting medical entry page -->
                 <div class="card">
                   <!-- Toggles the illness form -->
              	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_illness">Nieuw ziektebeeld</button>
              	<div class="collapse" class="card-body"  id="form_illness">
              		<div class="card-header">
              			<h4>Nieuw onderwerp van aandoening</h4>
              		</div>
              		<div class="card-body">
              			<form method="POST" action="/entries/create_illness">
              			<input type="hidden" name="_token" value="QKPiclZ9JpCH9FGMIs6vnyxagnIRvxPvmMc2hPMT">
              			    <div>
              					<p>
              					Maak hier een nieuw (aandoening) onderwerp aan voor uw medisch dagboek. Bijvoorbeeld: gebroken been, migraine, malaria.
              					</p>
              					<p>
              					Heeft u al een onderwerp in gedachten? Ga dan verder naar het volgende onderwerp.
              					</p>
              					<input type="text" name="illness" placeholder="naam aandoening">
              					<input type="submit" align="center" class="btnSub" value="ok">
              				</div>
              			</form>
              		</div>
              	</div>
              </div>
              <br />

              <div class="card">
              	<!-- Toggles the symptom form -->
              	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_symptom">Nieuw symptoom</button>
              	<div class="collapse" class="card-body"  id="form_symptom">
              		<div class="card-header">
              			<h4>Nieuwe symptomen</h4>
              		</div>
              		<div class="card-body">
              			<form method="POST" action="/entries/create_symptom">
              				<input type="hidden" name="_token" value="QKPiclZ9JpCH9FGMIs6vnyxagnIRvxPvmMc2hPMT">
              				<div>
              					<p>
              						Maak hier symptomen aan voor uw medisch dagboek. Bijvoorbeeld: koorts, uitslag, hoofdpijn.
              					</p>
              					<p>
              						Heeft u geen nieuwe symptomen? Ga dan verder naar het volgende onderwerp.
              					</p>
              					<input type="text" name="symptom" placeholder="naam symptoom">
              					<input type="submit" align="center" class="btnSub" value="ok">
              				</div>
              			</form>
              		</div>
              	</div>
              </div>
              </div>
                <br />
          	<div class="card">
          		<div class="card-header">
          			<h4>Medisch Dagboek</h4> <p>Velden met een sterretje (*) zijn verplicht</p>
          		</div>

      		<div class="card-body">
      			<form method="POST" action="/entries/create_entry">
      				<input type="hidden" name="_token" value="QKPiclZ9JpCH9FGMIs6vnyxagnIRvxPvmMc2hPMT">
      				<!-- places all illnesses from db -->
      				<div>
      					<h5>Aandoening: *</h5>
      					<select name="illness" class="medform-control" required>
      							<option selected></option>
      													<option value="Migraine">Migraine</option>
      													<option value="Griep">Griep</option>
      													<option value="Keelontsteking">Keelontsteking</option>
      													<option value="CP">CP</option>
      													<option value="Verkoudheid">Verkoudheid</option>
      											</select>
      				</div>
      				<hr>
      				<div>
      					<p>Symptomen:</p>
      					<!-- places all symptomes from db -->
      											<input type="checkbox" name="symptom[]" value="1" enctype="multipart/form-data">
      						<label for="subscribeNews">hoofdpijn</label>
      											<input type="checkbox" name="symptom[]" value="2" enctype="multipart/form-data">
      						<label for="subscribeNews">koorts</label>
      											<input type="checkbox" name="symptom[]" value="3" enctype="multipart/form-data">
      						<label for="subscribeNews">loopneus</label>
      											<input type="checkbox" name="symptom[]" value="4" enctype="multipart/form-data">
      						<label for="subscribeNews">oorpijn</label>
      											<input type="checkbox" name="symptom[]" value="5" enctype="multipart/form-data">
      						<label for="subscribeNews">buikpijn</label>
      											<input type="checkbox" name="symptom[]" value="6" enctype="multipart/form-data">
      						<label for="subscribeNews">duizelig</label>
      											<input type="checkbox" name="symptom[]" value="7" enctype="multipart/form-data">
      						<label for="subscribeNews">hartkloppingen</label>
      											<input type="checkbox" name="symptom[]" value="8" enctype="multipart/form-data">
      						<label for="subscribeNews">bewusteloosheid</label>
      									</div>
      				<hr>
      				<div>
      					<p>Wanneer gebeurde het:</p>
      					<input type="date" id='timespan_date' name="timespan_date">
      					<input type="time" name="timespan_time" value="now">
      				</div>
      				<hr>
      				<div>
      					<p>Waar gebeurde het:</p>
      					<input type="text" name="location" placeholder="locatie">
      				</div>
      				<hr>
      				<div>
      					<p>Intensiteit</p>
      					<input type="range" name="intensity" min="1" value="5" max="9" class="slider" id="intensityRange">
      					<span id="intensityValue"></span>
      				</div>
      				<hr>
      				<div>
      					<p>Klachtsduur</p>
      					Startdatum klacht
      					<br>
      					<input type="date" id='complaint_startdate' name="complaint_startdate">
      					<br>
      					<br>
      					Einddatum klacht
      					<br>
      					<input type="date" id='complaint_enddate' name="complaint_enddate">
      					<br>
      					<br>
      					Tijd
      					<br>
      					<input type="time" name="complaint_time">
      				</div>
      				<hr>
      				<div>
      					<p>Hersteltijd</p>
      					<input type="time" name="recoverytime_time"> (Tijd)
      				</div>
      				<hr>
      				<div>
      					<p>Medicatie</p>
      									</div>
      				<hr>
      				<div>
      					<p>Weer</p>
      					<textarea name="weather" placeholder="Omschrijving eventuele weersomstandigheden"></textarea>
      				</div>
      				<hr>
      				<div>
      					<p>Wat zagen anderen?</p>
      					<textarea name="witness_report" placeholder="Getuigenverklaringen"></textarea>
      				</div>
      				<hr>
      				<div>
      					<p>Overig</p>
      					<textarea name="comments" placeholder="Overige aantekeningen"></textarea>
      				</div>
      				<div>
      					<p>Sla mijn dagboek op</p>
      					<input type="submit" value="Opslaan">
      				</div>
      			</form>
      		</div>
      	</div>

<script>

	// Function to determine current date
	Date.prototype.toDateInputValue = (function() {
	    var local = new Date(this);
	    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
	    return local.toJSON().slice(0,10);
	})

	// Places current date into input 'date' fields
	document.getElementById('timespan_date').value = new Date().toDateInputValue();

	// Function to keep pagescroll unchanged on buttonclick
    $('a.btnSub').click(function(e)
        {
            e.preventDefault();
        });

    // Function to determine current time
    $(function(){
		$('input[type="time"][value="now"]').each(function(){
		    var d = new Date(),
		        h = d.getHours(),
		        m = d.getMinutes();
		    if(h < 10) h = '0' + h;
		    if(m < 10) m = '0' + m;
		    $(this).attr({
		      'value': h + ':' + m
    		});
  		});
	});

	var sliderBar = document.getElementById('intensityRange');
	var sliderVal = document.getElementById('intensityValue');
	sliderVal.innerHTML = sliderBar.value;

	sliderBar.oninput = function() {
  	sliderVal.innerHTML = this.value;
  		if (this.value == 1)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo1.c.svg" height="80" width="80">';
  		}  		if (this.value == 2)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo2.c.svg" height="80" width="80">';
  		}  		if (this.value == 3)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo3.c.svg" height="80" width="80">';
  		}  		if (this.value == 4)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo4.c.svg" height="80" width="80">';
  		}  		if (this.value == 5)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo5.c.svg" height="80" width="80">';
  		}  		if (this.value == 6)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo6.c.svg" height="80" width="80">';
  		}  		if (this.value == 7)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo7.c.svg" height="80" width="80">';
  		}  		if (this.value == 8)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo8.c.svg" height="80" width="80">';
  		}  		if (this.value == 9)
  		{
  			sliderVal.innerHTML = '<img src="http://127.0.0.1:8000/img/emo9.c.svg" height="80" width="80">';
  		}
	}

</script>
        </div>
<br />
<br />
    </div>

  <!-- implement the default theme -->

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

    </body>
</html>
