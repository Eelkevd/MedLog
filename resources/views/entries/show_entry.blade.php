<!-- View for the show page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dagboek pagina</div>
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

                      @elseif (!(auth()->user()->diary()))
                      <div class="card-body">
                              <div class="alert alert-danger">
                                <br /><strong>
                                  U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
                                      </strong>
                              </div>
                      </div>

                      @else
                      <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>

                                <!-- Show entry id -->
                              <tr>
                                <td><b>{{ __('Dagboek pagina nummer: ') }}</b></td>
                                <td>{{ $entry->id }}</td>
                              </tr>

                              <!-- Show date -->
                              <tr>
                                <td><b>{{ __('Datum: ') }}</b></td>
                                <td>{{ $entry->timespan_date }}</td>
                              </tr>

                              <!-- Show time  -->
                              <tr>
                                <td><b>{{ __('Tijd: ') }}</b></td>
                                <td>{{ $entry->timespan_time }}</td>
                              </tr>

                              <!-- Show illness-->
                              <tr>
                                <td><b>{{ __('Ziekte: ') }}</b></td>
                                <td>{{ $entry->illness }}</td>
                              </tr>

                              <!-- Show symptoms-->
                              <tr>
                                <td><b>{{ __('Symptoom: ') }}</b></td>
                                <td>  @foreach($entry->symptomes as $symptom)
                                    {{ $symptom->symptom }}
                                    {{ __(', ')}}
                                  @endforeach</td>
                              </tr>

                              <!-- Show intensity -->
                              <tr>
                                <td><b>{{ __('Intensiteit: ') }}</b></td>
                                <td>{{ $entry-> intensity}}</td>
                              </tr>

                              <!-- Show location -->
                              <tr>
                                  <td><b>{{ __('Locatie: ') }}</b></td>
                                  <td>{{ $entry-> location}}</td>
                              </tr>

                              <!-- Show klachtsduur -->
                              <tr>
                                  <td><b>{{ __('Klachtsduur: ') }}</b></td>
                                  <td>{{ $entry-> complaint_time}}</td>
                              </tr>

                              <!-- Show hersteltijd -->
                              <tr>
                                  <td><b>{{ __('Hersteltijd: ') }}</b></td>
                                  <td>{{ $entry-> recoverytime_time}}</td>
                              </tr>

                              <!-- Show medicatie -->
                              <tr>
                                  <td><b>{{ __('Medicatie: ') }}</b></td>
                                  <td>@foreach($entry->medicines as $medicine)
                                      {{ $medicine->medicine }}
                                      {{ __(', ')}}
                                    @endforeach</td>
                              </tr>

                              <!-- Show weer-->
                              <tr>
                                  <td><b>{{ __('Weer: ') }}</b></td>
                                  <td>{{ $entry-> weather}}</td>
                              </tr>

                              <!-- Show getuigen verslagen-->
                              <tr>
                                  <td><b>{{ __('Getuigen verslagen: ') }}</b></td>
                                  <td>{{ $entry-> witness_report}}</td>
                              </tr>

                              <!-- Show overig-->
                              <tr>
                                  <td><b>{{ __('Overig: ') }}</b></td>
                                  <td>{{ $entry-> comments}}</td>
                              </tr>



                        </table>

                        <!-- Button to go to edit page of users account data-->
                        <div class="form-group row mb-0">
                            <em><a href="{{ route('entries.edit', $entry->id) }}">Pas pagina aan</a></em>
                        </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
