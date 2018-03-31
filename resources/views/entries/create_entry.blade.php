<!-- View for the create_entry page -->
@extends ('layouts.master')

@section('content')

<!-- check to see if user of page is guest, reader, user or validated user.
      Only let validated user throug -->
      @guest
      <!-- Show not logged in screen -->
      <div class="col-md-6">
          <label >{{ __('Please log in to see your account data.') }}</label>
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

    @include ('entries.create_illness')
    <br>
    @include ('entries.create_symptom')
    <br>
	<div class="card">
		<div class="card-header">
			<h4>Medisch Dagboek</h4> <p>Velden met een sterretje (*) zijn verplicht</p>
		</div>

		<div class="card-body">
			<form method="POST" action="/entries/create_entry">
				{{ csrf_field() }}
				<!-- places all illnesses from db -->
				<div>
					<h5>Aandoening: *</h5>
					<select name="illness" class="medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
							<option selected></option>
						@foreach($illnesses as $illness)
							<option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
						@endforeach()
					</select>
<!-- 					@if ($errors->has('illness_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('illness_id') }}</strong>
                        </span>
                 	@endif -->
<!-- 					@include('layouts.error')	 -->
				</div>
				<hr>
				<div>
					<p>Symptomen:</p>
					<!-- places all symptomes from db -->
					@foreach($symptomes as $symptom)
						<input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
						<label for="subscribeNews">{{ $symptom->symptom }}</label>
					@endforeach()
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
					<input type="time" name="complaint_time"> (Tijd)
				</div>
				<hr>
				<div>
					<p>Hersteltijd</p>
					<input type="time" name="recoverytime_time"> (Tijd)
				</div>
				<hr>
				<div>
					<p>Medicatie</p>
					<input type="checkbox" name="medA" value="medA" enctype="multipart/form-data">
					<label for="subscribeNews">MEDICATIE A</label>
					<input type="checkbox" name="medA" value="medA" enctype="multipart/form-data">
					<label for="subscribeNews">MEDICATIE B</label>
					<input type="checkbox" name="medA" value="medA" enctype="multipart/form-data">
					<label for="subscribeNews">MEDICATIE C</label>
				</div>
				<hr>
				<div>
					<p>Weer</p>
					<textarea name="weather" placeholder="Omschrijving eventuele weersomstandigheden"></textarea>
				</div>
				<hr>
				<div>
					<p>Getuigen verslagen</p>
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

</script>
@endif
@endauth
@endsection
