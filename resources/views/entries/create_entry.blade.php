<!-- View for the create_entry page -->
@extends ('layouts.master')

@section('content')

<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <!-- check to see if user of page is guest, reader, user or validated user.
        Only let validated user throug -->
        @guest
        <!-- Show not logged in screen -->
        <div class="card-body">
          <div class="alert alert-danger">
            <br /><strong>{{ __('Please log in to see your account data.') }}
          </div>
        </div>
        @endguest

        @auth
          @if (!(auth()->user()->verified()))
          <div class="card-body">
              <div class="alert alert-danger">
                <br /><strong>
                  Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
                      </strong>
              </div>
          </div>

          @elseif (!(auth()->user()->diary()))
          <div class="card-body">
            <div class="alert alert-danger">
              <br /><strong>
                U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
              </strong>
            </div>
          </div>

          @else

	         <!-- form for submitting medical entry page -->
            <div class="card">
            @include ('entries.create_illness')
              </div>
              <br />
              <div class="card">
                @include ('entries.create_symptom')
              </div>
                <br />
	<div class="card">
		<div class="card-header">
			<h4 align="center">Nieuwe gebeurtenis</h4> <p align="center">Alleen velden met een sterretje (*) zijn verplicht</p>
		</div>

		<div class="card-body">
			<form method="POST" action="/entries/create_entry">
				{{ csrf_field() }}
				<!-- places all illnesses from db -->
				<div>
					<!-- <input type="search" name="q" class="form-control" placeholder="Search" autocomplete="off"> -->
					<h5>Ziektebeeld *</h5>
					<p>Kies hier het onderwerp van uw gebeurtenis:</p>
					<select name="illness" class="medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
							<option selected></option>
						@foreach($illnesses as $illness)
							<option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
						@endforeach()
					</select>
				</div>
				<hr>
				<div>
					<h5>Symptomen</h5>
					<p>Selecteer hier de betreffende symptomen:</p>
					<!-- places all symptomes from db -->
					@foreach($symptomes as $symptom)
						<input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
						<label for="subscribeNews">{{ $symptom->symptom }}</label>
					@endforeach()
				</div>
				<hr>
				<div>
					<h5>Wanneer gebeurde het</h5>
					<p>Kies hier de datum en/of tijd wanneer het gebeurde:</p>
					<input type="date" id='timespan_date' name="timespan_date">
					<input type="time" name="timespan_time" value="now">
				</div>
				<hr>
				<div>
					<h5>Waar gebeurde het</h5>
					<p>Waar bevond u zich toen het gebeurde?</p>
					<input type="text" name="location">
				</div>
				<hr>
				<div>
					<h5>Intensiteit</h5>
					<p>Hoe ervaarde u de gebeurtenis?</p>
					<input type="range" name="intensity" min="1" value="5" max="9" class="slider" id="intensityRange">
					<span id="intensityValue"></span>
				</div>
				<hr>
				<div>
					<h5>Klachtsduur</h5>
					<p>Hoelang heeft de gebeurtenis geduurd?</p>
					<p> Heeft het maar een paar minuten geduurd? OF een paar uur? Of gingen er verschillende dagen overheen?</p>
					Van:
					<br>
					<input type="date" id='complaint_startdate' name="complaint_startdate">
					<br>
					<br>
					Tot: 
					<br>
					<input type="date" id='complaint_enddate' name="complaint_enddate">
					<br>
					<br>
					In uren en minuten:
					<br>
					<input type="time" name="complaint_time">
				</div>
				<hr>
				<div>
					<h5>Hersteltijd</h5>
					<p>Hoelang duurde het om te herstellen?</p>
					<input type="time" name="recoverytime_time"> (Tijd)
				</div>
				<hr>
				<div>
					<h5>Medicatie</h5>
					<p>Hier kunt u eventueel uw medicatie selecteren die bij deze gebeurtenis hoort</p>
					@foreach($medicines as $medicine)
						<input type="checkbox" name="medicine[]" value="{{ $medicine->id }}" enctype="multipart/form-data">
						<label for="subscribeNews">{{ $medicine->medicine }}</label>
					@endforeach()
				</div>
				<hr>
				<div>
					<h5>Weersomstandigheden</h5>
					<p>Wat waren de weersomstandigheden toen het gebeurde?</p>
					<textarea name="weather"></textarea>
				</div>
				<hr>
				<div>
					<h5>Wat zagen anderen?</h5>
					<p>Hier kunt u beschrijven wat anderen mensen zagen toen het gebeurde</p>
					<textarea name="witness_report"></textarea>
				</div>
				<hr>
				<div>
					<h5>Opmerkingen</h5>
					<p>Overige opmerkingen die u over deze gebeurtenis kwijt wilt</p>
					<textarea name="comments"></textarea>
				</div>
				<hr>
				<div>
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
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo1.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 2)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo2.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 3)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo3.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 4)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo4.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 5)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo5.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 6)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo6.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 7)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo7.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 8)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo8.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 9)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo9.c.svg') }}" height="80" width="80">';
  		}
	}


	// $('#illness_search').autocomplete({
 //      source : '{!!URL::route('autocomplete')!!}',
 //      minlenght:1,
 //      autoFocus:true,
 //      select:function(e,ui){
 //        alert(ui);
 //      }
 //    });

</script>
@endif
@endauth
@endsection
