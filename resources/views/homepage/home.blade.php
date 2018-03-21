<!-- View for the home page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-body">
              @if (!(auth()->user()->verified()))
                  <div class="alert alert-danger">
                    <br /><strong>
                      Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
                          </strong>
                  </div>

              @else
              <div class="card">
                  <div class="card-header">Kalender</div>
                  <div class="card-body">
                    <form action="{{ action('EventController@index') }}" >
                        <button type="submit">Bekijk je kalender</button>
                    </form><br>
                    <form action="{{ action('EventController@create') }}" >
                        <button type="submit">Zet een afspraak in je kalender</button>
                    </form><br>
                    <form method="GET" action="{{ action('EventController@search') }}" >
                        <input type="text" name="search" placeholder="Zoekopdracht">
                        <button type="submit">zoek in je kalender</button>
                    </form><hr>

                  <b>Zoekresultaten:</b><br>
                  @foreach($events as $event)
                    {{ $event -> title }} <br>
                    {{ $event -> start_date }} <br><br>
                  @endforeach
                  </div>
              </div>
              @endif
          </div>
        </div>
    </div>
</div>
@endsection
