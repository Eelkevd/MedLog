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

      <div class="card">
          <div class="card-header">Welcome bij MedLog, jouw persoonlijk medisch dagboek!
          </div>
          <div class="col-md-2">
            <div class="card-body">
              <!-- Aankomende afspraken -->
                <ul class="collapse list-unstyled">
                  @foreach($events as $event)
                    @if($events == null)
                        <li>
                        {{ $event -> title }} <br>
                        {{ $event -> start_date }} <br><br>
                      </li>
                    @else
                        <li>Hier komen uw vijf meest recente aankomende afspraken te staan</li>
                    @endif
                  @endforeach
                </ul>
              </div>
        </div>
        <div class="col-md-2">
          <div class="card-body">
            <!-- vijf meest recente entries in het dagboek -->
            <ul>
              <li>dagboek 1</li>
            </ul>
          </div>
        </div>




              <div class="card">
                  <div class="card-header">Home
                  </div>
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
