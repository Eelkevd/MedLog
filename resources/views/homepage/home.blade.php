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
                Voor u verder kunt gaan, moet u uw email verifiëren. <br />
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

      <h5><center>Welkom bij MedLog, uw persoonlijk medisch dagboek!</center></h5>
      Creëer uw eigen medisch dossier. Begin door een nieuwe gebeurtenis aan te maken.
      Voeg onder andere een ziektebeeld en symptomen toe.
      U kunt vervolgens meelezers toevoegen en u kunt uw dagboek downloaden als pdf.
      Zo heeft u uw medische geschiedenis altijd bij de hand!
      <br /><br />

      <div class="card-deck mb-4 text-center">
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Komende afspraken</h4>
          </div>
          @if (!$events->isEmpty())
            @foreach($events as $event)
            <div class="card-body nopadding">
              <h4><small class="text-muted">{{ $event -> title }}</small></h4>
              <ul class="list-unstyled mt-3 mb-4">
                <li>{{ date('d-m-Y', strtotime($event ->start_date ))}}</li>
              </ul>
              <hr>
            </div>
            @endforeach
          @else
          <div class="card-body nopadding">
            <h4><small class="text-muted">U heeft nog geen afspraken in uw kalender gezet.</small></h4>

          <ul class="list-unstyled mt-3 mb-4">
            <li>Maak uw eerste afspraak aan</li>
          </ul>
          <hr>
        </div>
          @endif

      </div>

      <!-- vijf meest recente entries in het dagboek -->
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Laatste gebeurtenissen</h4>
        </div>
          @if (!$entries->isEmpty())
            @foreach($entries as $entry)
            <div class="card-body nopadding">
              <h4 class="card-title"><small class="text-muted">
                <a href="{{ route('entries.show', $entry->id) }}" alt="bekijk deze gebeurtenis">
                {{ $entry -> illness }}

                </small></h4>
              <ul class="list-unstyled mt-3 mb-4">
                <li>{{ date('d-m-Y', strtotime($entry-> timespan_date ))}}</li>
              </ul>
              </a>
              <hr>
            </div>
          @endforeach
        @else
        <div class="card-body nopadding">
          <h4 class="card-title"><small class="text-muted">
            U heeft nog geen gebeurtenissen in uw dagboek gezet.
            </small></h4>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Maak uw eerste gebeurtenis aan</li>
            </ul>
            <hr>
          </div>
        @endif
    </div>
  </div>

              <div class="card">
                  <div class="card-header">Zoek in uw kalender
                  </div>
                  <div class="card-body">
                    <form method="GET" action="{{ action('EventController@search') }}" >
                        <input type="text" name="search" placeholder="Zoekopdracht" class="form-control">
                        <button type="submit" class="btn btn-primary">zoek op afspraak of ziektebeeld</button>
                    </form><br>

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
