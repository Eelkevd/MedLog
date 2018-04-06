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
            @include ('entries.create_illness')
              <br />
            @include ('entries.create_symptom')
                <br />

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
      					<h5>Ziektebeeld: *</h5>

      					 <select class="custom-select custom-select-lg mb-3 medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
      							<option selected></option>
      						@foreach($illnesses as $illness)
      							<option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
      						@endforeach()
      					</select>
      				</div>
      				<hr>
      				<div>
      					Selecteer de symptomen die u had:<br />
      					<!-- places all symptomes from db -->
                <div class="symptoms form-check">
                  <ul class="list-unstyled">
                @foreach($symptomes as $symptom)

      						<li><label>
                    <input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
      						<span class="label-text">{{ $symptom->symptom }}</span>
                </label></li>
      					@endforeach()
              </ul>
              </div>
      				</div>
      				<hr>

              <div>
                Hoe erg was het?<br /><br />
                <input type="range" name="intensity" min="1" value="5" max="9" class="slider" id="intensityRange">
                <span id="intensityValue"></span>
              </div>
              <hr>

      				<div>
      					Wanneer gebeurde het?<br />
      					<input type="date" id='timespan_date' name="timespan_date">
      					<input type="time" name="timespan_time" value="now">
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
        					<input type="date" id='complaint_startdate' name="complaint_startdate">
        					<br>
        					<br>
        					Einddatum klacht <em><small>(optioneel)</small></em>
        					<br>
        					<input type="date" id='complaint_enddate' name="complaint_enddate">
        					<br>
        					<br>
        					Indien u een aanval had, hoe lang duurde deze? <em><small>(optioneel)</small></em>
        					<br>
        					<input type="time" name="complaint_time">
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
                <div>
                  Waar gebeurde het? <em><small>(optioneel)</small></em><br />
                  <input type="text" name="location" placeholder="locatie">
                </div>
                <hr>

      				<div>
      					Nam u medicijnen in vanwege de gebeurtenis? <em><small>(optioneel)</small></em><br />
      					@foreach($medicines as $medicine)
                  @if($medicine->deleted != 'removed')
      						<input type="checkbox" name="medicine[]" value="{{ $medicine->id }}" enctype="multipart/form-data">
      						<label for="subscribeNews">{{ $medicine->medicine }}</label>
                  @endif
      					@endforeach()
      				</div>
      				<hr>
      				<div>
      					Wat waren de weersomstandigheden? <em><small>(optioneel)</small></em>
      					<textarea name="weather" placeholder="warm / koud"></textarea>
      				</div>
      				<hr>
      				<div>
      					Wat zagen anderen? <em><small>(optioneel)</small></em>
      					<textarea name="witness_report" placeholder="..."></textarea>
      				</div>
      				<hr>
            </div>
          </div> <!-- end second toggle -->
<br />
              <div>
      					Vrije ruimte <em><small>(optioneel)</small></em><br />
      					<textarea name="comments" placeholder=""></textarea>
      				</div>
      				<div>
                <br />
      					<input type="submit"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
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
