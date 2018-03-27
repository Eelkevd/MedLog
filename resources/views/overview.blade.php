<!-- View for the overview page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dagboek overzicht</div>
                <div class="card-body">
                  <form method="GET" action="{{ action('OverviewController@search') }}" >
                      <input type="text" name="search" placeholder="Zoekopdracht">
                      <button type="submit">Zoek in je dagboek</button>
                  </form><br>

                  <form method="GET" id="illnessform" action="{{ action('OverviewController@sortillness') }}" >
                  <select form= 'illnessform' name="illness" class="sort_illness">
                      <option value="" selected disabled hidden>Kies ziekte</option>
                    @foreach($illnesses as $illness)
                      <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                    @endforeach()
                  </select>
                  <button type="submit">Sorteer je dagboek</button>
                  </form>
                  <br>

                @foreach($search as $event)
                  <b>Datum</b>
                  {{ $event -> start_date }}<br>
                  <b>Ziekte</b>
                  {{ $event -> title }} <br>
                  <b>Symptoom</b><br><br>
                @endforeach

                @foreach($sortillness as $event)
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
