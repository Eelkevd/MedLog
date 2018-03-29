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
                                <td>{{ $entry->illness_id }}</td>
                              </tr>

                              <!-- Show intensity -->
                              <tr>
                                <td><b>{{ __('Intensiteit: ') }}</b></td>
                                <td>{{ $entry-> intensity}}</td>
                              </tr>

                              <!-- Show location -->
                              <tr>
                                  <td><b>{{ __('Locatie: ') }}</b></td>
                                  <td>{{ $entry-> location }}</td>
                              </tr>
                        </table>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
