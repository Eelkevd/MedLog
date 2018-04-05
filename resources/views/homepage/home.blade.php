<!-- View for the home page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-body">

            <!-- check to see if the user is a reader -->
            @if (auth()->user()->reader())
            <div class="alert alert-success">
              <strong>
                Welkom lezer!<br/>
                Heeft u een uitnodiging ontvangen om een dagboek te lezen?<br />
                Dan kunt u dit dagboek lezen via de knop 'Clienten'.
              </strong></p>
            </div>

          <!-- check to see if the user has verified their enmailadres -->
            @elseif (!(auth()->user()->verified()) && !(auth()->user()->reader()))
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

      <p><center>Welcome bij MedLog, jouw persoonlijk medisch dagboek!</center></p>

      <div class="card-deck mb-3 text-center">



        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Komende afspraken</h4>
          </div>
          @if(!empty($events))
          @foreach($events as $event)
          <div class="my-0 card-body nopadding">
            <h4><small class="text-muted">{{ $event -> title }}</small></h4>
            <ul class="list-unstyled">
              <li>{{ $event -> start_date }}</li>
              <li>{{ $event -> start_date }}</li>
            </ul>
            <hr>
          </div>
        @endforeach
        @else
          <div class="my-0 card-body">
            <h5 class="card-title"><small class="text-muted">Hier komen uw vijf meest recente aankomende afspraken te staan</small>
            </h5>
          </div>
        @endif
      </div>

      <!-- vijf meest recente entries in het dagboek -->
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Laatste gebeurtenissen</h4>
        </div>
        @if(!empty($entries))
          @foreach($entriess as $entry)
          <div class="card-body">
            <h5 class="card-title"><small class="text-muted">{{ $entry -> illness }}</small></h5>
            <ul class="list-unstyled mt-3 mb-4">
              <li>{{ $entry -> timespan_date }}</li>
            </ul>
          </div>
        @endforeach
        @else
          <div class="card-body">
            <h5 class="card-title"><small class="text-muted">Hier komen uw vijf laatste gebeurtenissen te staan</small></h5>
          </div>
        @endif
    </div>



</div>
              <div class="card">
                  <div class="card-header">Home
                  </div>
                  <div class="card-body">
                    <form action="{{ action('EventController@index') }}" >
                        <button type="submit">Bekijk je kalender</button>
                    </form><br>

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
              </div><br>



              <br>
              @endif
          </div>
        </div>
    </div>
</div>
@endsection
