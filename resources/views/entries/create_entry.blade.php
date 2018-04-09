@extends ('layouts.master')
<!-- View for the create_entry page -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">

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
        		<div class="card-header">
        			<h5><center>Nieuwe gebeurtenis voor in uw <br />medisch dagboek</center></h5>
              <p><center><em>Velden met een sterretje (*) zijn verplicht</em></center></p>
        		</div>
      		  <div class="card-body">
      			<form method="POST" action="/entries/create_entry">
      				{{ csrf_field() }}
      				<!-- places all illnesses from db -->
      				<div>
      					<h5>Onder welk ziektebeeld valt de gebeurtenis? *</h5>

                <div class="card-deck mb-4 text-center">
                  <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        Selecteer uw ziektebeeld
                        <div class="card-body nopadding">
                          @if (!$illnesses->isEmpty())
                					 <select class="custom-select custom-select-lg mb-3 form-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" name="illness" required>
                							<option selected></option>
                						@foreach($illnesses as $illness)
                							<option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                						@endforeach()
                					</select>
                        @else
                        <hr>
                        <small><em>U heeft nog geen ziektebeeld aangemaakt.</em></small>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="card mb-4 box-shadow">
                    <div class="card-header">
                      Of voeg eerst een nieuw ziektebeeld toe
                    </div>
                    <div class="card-body nopadding">
                      <button type="button" class="btn" data-toggle="modal" data-target="#illness_pop">Nieuw ziektebeeld</button>
            				</div>
                  </div>
                </div>
              </div>

              <hr>

      				<div class="card-header">
      					<h5>Welke symptomen had u?</h5>
              </div>
      					<!-- places all symptomes from db of that user -->
                <div class="symptoms form-check">
                  <ul class="list-unstyled">
                @foreach($symptomes as $symptom)

      						<li><label>
                    <input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
      						<span class="label-text">{{ $symptom->symptom }}</span>
                </label></li>
      					@endforeach
              </ul>
              </div>
              <br /><small><em>Staat uw symptoom er niet bij? Voeg deze dan toe met de onderstaande knop.</em></small>
                <button type="button" class="btn" data-toggle="modal" data-target="#symptom_pop">
                Nieuw symptoom
                <span class="oi oi-chevron-bottom"></span></button>
      				</div>
      				<hr>

              <div>
                Hoe erg was het?<br /><br />
                <input type="range" name="intensity" min="1" value="{{ old('intensity', '5')}};"  max="9" class="slider" id="intensityRange">
                <span id="intensityValue"></span>
              </div>
              <hr>

      				<div>
      					Wanneer gebeurde het?<br />
      					<input type="date" id='timespan_date' name="timespan_date" value="{{ old('timespan_date') }}" >
      					<input type="time" name="timespan_time" value="{{ old('timespan_time', 'now') }}">
      				</div>
      				<hr>




              <!-- Toggles the rest of the  form -->
              <div class="card">
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_optional_times">
                  Klik hier om tijden toe te voegen
                  <span class="oi oi-chevron-bottom"></span>
                </button>
                <div class="collapse" class="card-body"  id="form_optional_times">
        					<div>
        					Startdatum klacht <em><small>(optioneel)</small></em>
        					<br>
        					<input type="date" id='complaint_startdate' name="complaint_startdate" value="{{ old('complaint-startdate') }}">
        					<br>
        					<br>
        					Einddatum klacht <em><small>(optioneel)</small></em>
        					<br>
        					<input type="date" id='complaint_enddate' name="complaint_enddate" value="{{ old('complaint-enddate') }}">
        					<br>
        					<br>
        					Indien u een aanval had, hoe lang duurde deze? <em><small>(optioneel)</small></em>
        					<br>
        					<input type="time" name="complaint_time" value="{{ old('complaint-time') }}">
        				</div>
      				  <hr>
              </div>
            </div> <!-- end first toggle> -->
            <br />

            <div class="card">
              <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_optional">
                Klik hier om meer details toe te voegen
                <span class="oi oi-chevron-bottom"></span>
              </button>
              <div class="collapse" class="card-body"  id="form_optional">
                <div><br />
                  Waar gebeurde het? <em><small>(optioneel)</small></em><br />
                  <input type="text" class="form-control" name="location" placeholder="locatie" value="{{ old('location') }}">
                </div>
                <hr>

      				<div>
      					Nam u medicijnen in vanwege de gebeurtenis? <em><small>(optioneel)</small></em><br />

              @if (!$medicines->isEmpty())
              <div class="symptoms form-check">
                  <ul class="list-unstyled">
      					@foreach($medicines as $medicine)
                  @if($medicine->deleted != 'removed')
                  <li><label>
      						<input type="checkbox" name="medicine[]" value="{{ $medicine->id }}" enctype="multipart/form-data">
                  <span class="label-text">{{ $medicine->medicine }}</span></label></li>
                  @endif
      					@endforeach()
            @else
                  <label><br/><em>
                    <a href="/medicine" alt="maak een medicijn aan">
                    U heeft nog geen medicijnen aangemaakt.<br />
                    Voeg later alsnog een medicijn toe. </a>
                  </em>
                  </label>
            @endif
              </ul>
            </div>
      				</div>
      				<hr>
      				<div>
      					Wat waren de weersomstandigheden? <em><small>(optioneel)</small></em>
      					<textarea name="weather" placeholder="warm / koud" value="{{ old('weather') }}"></textarea>
      				</div>
      				<hr>
      				<div>
      					Wat zagen anderen? <em><small>(optioneel)</small></em>
      					<textarea name="witness_report" placeholder="..." value="{{ old('witness_report') }}"></textarea>
      				</div>
      				<hr>
            </div>
          </div> <!-- end second toggle -->
          <br />
              <div>
      					Vrije ruimte <em><small>(optioneel)</small></em><br />
      					<textarea name="comments" placeholder="" value="{{ old('comments') }}"></textarea>
      				</div>
      				<div>
                <br />
      					<input type="submit"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
      				</div>
      			</form>
      		</div>
          @include ('entries.create_symptom')
          @include ('entries.create_illness')

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
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo9.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 2)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo8.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 3)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo7.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 4)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo6.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 5)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo5.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 6)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo4.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 7)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo3.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 8)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo2.c.svg') }}" height="80" width="80">';
  		}  		if (this.value == 9)
  		{
  			sliderVal.innerHTML = '<img src="{{asset('/img/emo1.c.svg') }}" height="80" width="80">';
  		}
	}

</script>
@endif
@endauth
</div>
</div>
</div>
</div>
</div>
@endsection
