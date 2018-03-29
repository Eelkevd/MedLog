<!-- View for the overview page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dagboek overzicht</div>
                <div class="card-body">
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

                @foreach($entries as $entry)
                  <b>Datum</b>
                  {{ $entry -> timespan_date }}<br>
                  <b>Ziekte</b>
                  {{ $entry -> illness_id }} <br>
                  <a href="{{ route('entries.show', $entry->id) }}">Bekijk pagina</a><br><br>
                @endforeach

                @foreach($sortillness as $event)
                  <b>Datum</b>
                  {{ $event -> start_date }}<br>
                  <b>Ziekte</b>
                  {{ $event -> title }} <br>
                  <b>Symptoom</b><br><br>
                @endforeach

                @foreach($sortintensity as $event)
                  <b>Datum</b>
                  {{ $event -> start_date }}<br>
                  <b>Ziekte</b>
                  {{ $event -> title }} <br>
                  <b>Symptoom</b><br><br>
                @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
