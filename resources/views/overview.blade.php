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

                  <form method="GET" id="illnessform" action="{{ action('OverviewController@sort') }}" >
                  <select form= 'illnessform' name="illness_id" class="sort_illness">
                      <option selected></option>
                    @foreach($illnesses as $illness)
                      <option value="{{ $illness->id }}">{{ $illness->illness }}</option>
                    @endforeach()
                  </select>
                  <button type="submit">Sorteer je dagboek op ziekte</button>
                  </form>
                  <br>

                  <form method="GET" id="intensityform" action="{{ action('OverviewController@sort') }}" >
                  <select form= 'intensityform' name="intensity_id" class="sort_intensity">
                      <option selected></option>
                    @foreach($entries as $entry)
                      <option value="{{ $illness->intensity }}">{{ $entry->entry }}</option>
                    @endforeach()
                  </select>
                  <button type="submit">Sorteer je dagboek op intentsiteit</button>
                  </form>
                  <br>

                  <form method="GET" id="dateform" action="{{ action('OverviewController@sort') }}" >
                  <select form= 'dateform' name="date_id" class="sort_date">
                      <option selected value="chronologically">Laatste dagboek post bovenaan</option>
                      <option value="nonchronologically">Eerste dagboek post bovenaan</option>
                  </select>
                  <button type="submit">Sorteer je dagboek op datum</button>
                  </form>
                  <br>

                @foreach($search as $event)
                  <b>Datum</b>
                  {{ $event -> start_date }}<br>
                  <b>Ziekte</b>
                  {{ $event -> title }} <br>
                  <b>Symptoom</b><br><br>
                @endforeach

                @foreach($sort as $event)
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
