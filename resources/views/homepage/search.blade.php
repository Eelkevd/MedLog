<!-- View for the home page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-body">

          <!-- check to see if the user has verified their enmailadres -->
            @if (!(auth()->user()->verified()) && !(auth()->user()->reader()))
            <!-- else user is gebruiker en heeft nog niet geverificeerd -->
            <div class="alert alert-danger">
              <br /><strong>
                Hartelijk dank voor uw registratie!<br />
                Voor u verder kunt gaan, moet u uw email verificeren. <br />
                Bekijk uw email om uw account te activeren.
                    </strong>
            </div>

            @elseif (auth()->user()->verified())
              @if (session('succes'))
                      <div class="alert alert-success">
                          {{ session('succes') }}
                      </div>
              @endif

      </div>

              <div class="card">
                  <div class="card-header">Zoek in uw kalender
                  </div>
                  <div class="card-body">
                    <form method="GET" action="{{ action('EventController@search') }}" >
                        <input type="text" name="search" placeholder="Zoekopdracht">
                        <button type="submit">zoek op afspraak of ziektebeeld</button>
                    </form><br>

                    <b>Resultaten:</b><br><br>
                    @foreach($search as $event)
                      {{ $event -> title }} <br>
                      {{ $event -> start_date }} <br><br>
                    @endforeach

                  </div>
              </div>
              <br>
              <br>
              @endif
          </div>
        </div>
    </div>
</div>
@endsection
