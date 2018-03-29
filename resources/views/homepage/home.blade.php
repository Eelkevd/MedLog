<!-- View for the home page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-body">

            <!-- check to see if the user is a reader -->
            @if (auth()->user()->roles('hulpverlener'))
            <div class="alert alert-success">
              <strong>
                Welkom lezer!<br/>
                Heeft u een uitnodiging ontvangen om een dagboek te lezen?<br />
                Gebruik dan het wachtwoord dat u heeft ontvangen om het dagboek te openen.
                <br /><br />
                <p>
                Let op! Elk dagboek is slechts voor een bepaalde tijd in te zien.
              </strong></p>
            </div>


          <!-- check to see if the user has verified their enmailadres -->
            @elseif (!(auth()->user()->verified()))
                <div class="alert alert-danger">
                  <br /><strong>
                    Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
                        </strong>
                </div>

              @else

                @if (session('succes'))
                        <div class="alert alert-success">
                            {{ session('succes') }}
                        </div>
                @endif


              </div>
              <div class="card">
                  <div class="card-header">Home</div>
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
              </div><br><br>
              @endif
          </div>
        </div>
    </div>
</div>
@endsection
