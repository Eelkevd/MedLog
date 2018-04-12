<!-- View for the edit entries page -->
@extends ('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
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
                            <h5><center>Wijzig uw gebeurtenis</center></h5>
                            <center><em>Velden met een sterretje (*) zijn verplicht</em></center>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/entries/{id}/edit_entry">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $entry->id }}">
                                <!-- Edit illness-->
                                <div>
                                    <h5>Ziektebeeld *</h5>
                                    <select name="illness" value="{{ $entry->illness }}" class="form-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
                                        <option value="{{ $entry->illness }}"selected>{{ $entry->illness }}</option>
                                        @foreach($illnesses as $illness)
                                        <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                                        @endforeach()
                                    </select>
                                </div>
                                <hr>
                                <!-- Edit symptoms-->
                                <div>
                                    <label>Symptomen</label>
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
                                <!-- Edit date and time -->
                                <div>
                                    <label>Wanneer gebeurde het? <em><small>(optioneel)</small></em></label>
                                    <input type="date" name="timespan_date" value="{{ $entry->timespan_date }}"  class="form-control">
                                    <input type="time" name="timespan_time" value="{{ $entry->timespan_time }}"  class="form-control">
                                </div>
                                <hr>
                                <!-- Edit location -->
                                <div>
                                    <label>Waar gebeurde het? <em><small>(optioneel)</small></em></label></label>
                                    <input type="text" name="location" placeholder="locatie" value="{{ $entry->location }}"  class="form-control">
                                </div>
                                <hr>
                                <!-- Edit intensity -->
                                <div>
                                    <label>Hoe erg was het? <em><small>(optioneel)</small></em></label></label>
                                    <input type="range" name="intensity" min="1" value="{{ old('comments', $entry->intensity) }}" max="9" class="slider" id="intensityRange">
                                    <span id="intensityValue"></span>
                                </div>
                                <hr>
                                <!-- Edit complaint_time & dates -->
                                <div>
                                    <label>Klachtsduur <em><small>(optioneel)</small></em></label></label>
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
                                <!-- Edit medicines -->
                                <div>
                                    <label>Nam u medicijnen in vanwege de gebeurtenis? <em><small>(optioneel)</small></em></label>
                                    <div class="symptoms form-check">
                                        <ul class="list-unstyled">
                                            @foreach($medicines as $medicine)
                                            @if($medicine->deleted != 'removed')
                                            <li><label>
                                                <input type="checkbox" name="medicine[]" value="{{ $medicine->id }}"  enctype="multipart/form-data"  class="form-control">
                                                <span class="label-text">{{ $medicine->medicine }}</span>
                                            </label></li>
                                            @endif
                                            @endforeach()
                                        </ul>
                                    </div>
                                    <hr>
                                    <!-- Edit weather -->
                                    <div>
                                        <label>Weersomstandigheden <em><small>(optioneel)</small></em></label>
                                        <textarea name="weather"  class="form-control" placeholder="Omschrijving eventuele weersomstandigheden" >{{ $entry->weather }}</textarea>
                                    </div>
                                    <hr>
                                    <!-- Edit witness report -->
                                    <div>
                                        <label>Wat zagen anderen? <em><small>(optioneel)</small></em></label>
                                        <textarea name="witness_report" class="form-control" placeholder="Getuigenverklaringen" >{{ $entry->witness_report }}</textarea>
                                    </div>
                                    <hr>
                                    <!-- Edit comments -->
                                    <div>
                                        <label>Vrije ruimte <em><small>(optioneel)</small></em></label>
                                        <textarea name="comments" class="form-control" placeholder="Overige aantekeningen" >{{ $entry->comments }}</textarea>
                                    </div>
                                    <hr>
                                    <div>
                                        <input type="submit" class="btn btn-primary" value="Wijzigingen opslaan">
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
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
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo9.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 2)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo8.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 3)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo7.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 4)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo6.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 5)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo5.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 6)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo4.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 7)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo3.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 8)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo2.c.svg') }}" height="80" width="80">';
                                    }       if (this.value == 9)
                                    {
                                        sliderVal.innerHTML = '<img src="{{asset('/img/emo1.c.svg') }}" height="80" width="80">';
                                    }
                            }

                          </script>
  @endsection
