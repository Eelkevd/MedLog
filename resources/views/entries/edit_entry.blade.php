<!-- View for the edit entries page -->
@extends ('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                      <div class="card">
                        <div class="card-header">
                          <h4>Aanpassen van Medisch Dagboek</h4> <p>Velden met een sterretje (*) zijn verplicht</p>
                        </div>

                        <div class="card-body">
                          <form method="POST" action="/entries/{id}/edit_entry">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $entry->id }}">

                            <!-- Edit illness-->
                            <div>
                              <h5>Aandoening: *</h5>
                              <select name="illness" value="{{ $entry->illness }}" class="medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
                                  <option value="{{ $entry->illness }}"selected>{{ $entry->illness }}</option>
                                @foreach($illnesses as $illness)
                                  <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                                @endforeach()
                              </select>
                            </div>
                            <hr>

                            <!-- Edit symptoms-->
                            <div>
                              <p>Symptomen:</p>
                              @foreach($symptomes as $symptom)
                                <input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
                                <label for="subscribeNews">{{ $symptom->symptom }}</label>
                              @endforeach()
                            </div>
                            <hr>

                            <!-- Edit date and time -->
                            <div>
                              <p>Wanneer gebeurde het:</p>
                              <input type="date" name="timespan_date" value="{{ $entry->timespan_date }}">
                              <input type="time" name="timespan_time" value="{{ $entry->timespan_time }}">
                            </div>
                            <hr>

                            <!-- Edit location -->
                            <div>
                              <p>Waar gebeurde het:</p>
                              <input type="text" name="location" placeholder="locatie" value="{{ $entry->location }}">
                            </div>
                            <hr>

                            <!-- Edit intensity -->
                            <div>
                              <p>Intensiteit</p>
                              <input type="range" name="intensity" min="1" value="{{ $entry->intensity }}" max="9" class="slider" id="intensityRange">
                              <span id="intensityValue"></span>
                            </div>
                            <hr>

                            <!-- Edit complaint_time & dates -->
                            <div>
                              <p>Klachtsduur</p>
                              Startdatum klacht
                              <br>
                              <input type="date" id='complaint_startdate' name="complaint_startdate" value="{{ $entry->complaint_startdate }}">
                              <br>
                              <br>
                              Einddatum klacht
                              <br>
                              <input type="date" id='complaint_enddate' name="complaint_enddate" value="{{ $entry->complaint_enddate }}">
                              <br>
                              <br>
                              Tijd
                              <br>
                              <input type="time" name="complaint_time" value="{{ $entry->complaint_time }}">
                            </div>
                            <hr>

                            <!-- Edit recovery time -->
                            <div>
                              <p>Hersteltijd</p>
                              <input type="time" name="recoverytime_time" value="{{ $entry->recovery_time }}"> (Tijd)
                            </div>
                            <hr>

                            <!-- Edit medicines -->
                            <div>
                              <p>Medicatie</p>
                              @foreach($medicines as $medicine)
                                <input type="checkbox" name="medicine[]" value="{{ $medicine->id }}"  enctype="multipart/form-data">
                                <label for="subscribeNews">{{ $medicine->medicine }}</label>
                              @endforeach()
                            </div>
                            <hr>

                            <!-- Edit weather -->
                            <div>
                              <p>Weer</p>
                              <textarea name="weather" placeholder="Omschrijving eventuele weersomstandigheden" >{{ $entry->weather }}</textarea>
                            </div>
                            <hr>

                            <!-- Edit witness report -->
                            <div>
                              <p>Getuigen verslagen</p>
                              <textarea name="witness_report" placeholder="Getuigenverklaringen" >{{ $entry->witness_report }}</textarea>
                            </div>
                            <hr>

                            <!-- Edit comments -->
                            <div>
                              <p>Overig</p>
                              <textarea name="comments" placeholder="Overige aantekeningen" >{{ $entry->comments }}</textarea>
                            </div>
                            <hr>
                            <div>
                              <p>Sla mijn dagboek op</p>
                              <input type="submit" value="Opslaan">
                            </div>
                          </form>
                        </div>
                      </div>

                      <script>
                      // Function to keep pagescroll unchanged on buttonclick
                        $('a.btnSub').click(function(e)
                            {
                                e.preventDefault();
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
            </div>
        </div>
    </div>
  @endsection
