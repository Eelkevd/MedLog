<!-- View for the overview page -->
@extends('layouts.master')

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

                          @elseif(!(auth()->user()->diary))
                          <div class="card-body">
                                  <div class="alert alert-danger">
                                    <br /><strong>
                                      U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
                                          </strong>
                                  </div>
                          </div>

                          @else

                  Dagboek overzicht</div>
                <div class="card-body">
                  <h3><center>Zoekfuncties</center></h3><br>
                  <!-- Search function to search in events -->
                  <form method="GET" action="{{ action('OverviewController@search') }}" >
                      <input type="text" name="search" placeholder="Zoekopdracht">
                      <button type="submit">Zoek in je dagboek</button>
                  </form><br>

                  <!-- sort function to sort by illness-->
                  <form method="GET" id="illnessform" action="{{ action('OverviewController@sortillness') }}" >
                  <select form= 'illnessform' name="illness" class="sort_illness">
                      <option value="" selected disabled hidden>Kies ziekte</option>
                    @foreach($illnesses as $illness)
                      <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                    @endforeach()
                  </select>
                  <button type="submit">Sorteer je dagboek op ziekte</button>
                  </form>
                  <br>

                  <!-- sort function to sort by intensity-->
                  <form method="GET" id="intensityform" action="{{ action('OverviewController@sortintensity') }}" >
                  <select form= 'intensityform' name="intensity" class="sort_intensity">
                      <option value="" selected disabled hidden>Kies intensiteit</option>
                    @foreach($entries as $entry)
                      <option value="{{ $entry->intensity }}">{{ $entry->intensity }}</option>
                    @endforeach()
                  </select>
                  <button type="submit">Sorteer je dagboek op intensiteit</button>
                  </form>
                  <br>

                <!-- result of searchfield -->
                @foreach($search as $entry)
                  <div class="card">
                    <div class="card-header">
                    Ziekte:
                    <b> {{ $entry -> illness }}</b>
                    @if(!empty($entry->timespan_date))
                      {{ __(', ')}}
                      Datum: {{ $entry -> timespan_date }}
                    @endif
                  </div>
                  <div class="card-body">
                    Symptoom:
                    @foreach($entry->symptomes as $symptom)
                      {{ $symptom->symptom }}
                      {{ __(', ')}}
                    @endforeach
                    <br>
                    Intensiteit:
                    {{ $entry->intensity }}
                    <br>
                    <em><a href="{{ route('entries.show', $entry->id) }}">Bekijk pagina</a></em>
                    </div>
                  </div>
                  <br>
                @endforeach

                <!-- view if user has sort by illness -->
                @foreach($sortillness as $entry)
                  <div class="card">
                    <div class="card-header">
                    Ziekte:
                    <b> {{ $entry -> illness }}</b>
                    @if(!empty($entry->timespan_date))
                      {{ __(', ')}}
                      Datum: {{ $entry -> timespan_date }}
                    @endif
                  </div>
                  <div class="card-body">
                    Symptoom:
                    @foreach($entry->symptomes as $symptom)
                      {{ $symptom->symptom }}
                      {{ __(', ')}}
                    @endforeach
                    <br>
                    Intensiteit:
                    {{ $entry->intensity }}
                    <br>
                    <em><a href="{{ route('entries.show', $entry->id) }}">Bekijk pagina</a></em>
                    </div>
                  </div>
                  <br>
                @endforeach

                <!-- result when user sorts on intensity -->
                @foreach($sortintensity as $entry)
                  <div class="card">
                    <div class="card-header">
                    Ziekte:
                    <b> {{ $entry -> illness }}</b>
                    @if(!empty($entry->timespan_date))
                      {{ __(', ')}}
                      Datum: {{ $entry -> timespan_date }}
                    @endif
                  </div>
                  <div class="card-body">
                    Symptoom:
                    @foreach($entry->symptomes as $symptom)
                      {{ $symptom->symptom }}
                      {{ __(', ')}}
                    @endforeach
                    <br>
                    Intensiteit:
                    {{ $entry->intensity }}
                    <br>
                    <em><a href="{{ route('entries.show', $entry->id) }}">Bekijk pagina</a></em>
                    </div>
                  </div>
                  <br>
                @endforeach

                <br /><br />



                  <h3><center>Uw gehele overzicht</center></h3>
                    @foreach($entries as $entry)
                    <div class="card">
                      <div class="card-header">
                      Ziekte:
                      <b> {{ $entry->illness }}</b>
                      @if(!empty($entry->timespan_date))
                        {{ __(', ')}}
                        Datum: {{ $entry -> timespan_date }}
                      @endif
                    </div>
                    <div class="card-body">
                      Symptoom:
                      @foreach($entry->symptomes as $symptom)
                        {{ $symptom->symptom }}
                        {{ __(', ')}}
                      @endforeach
                      <br>
                      Intensiteit:
                      {{ $entry->intensity }}
                    <br>
                    <em><a href="{{ route('entries.show', $entry->id) }}">Bekijk pagina</a></em>
                    </div>
                  </div>
                  <br>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
  </div>
  @endif
  @endauth

@endsection
