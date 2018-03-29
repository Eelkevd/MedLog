<!-- View for the show page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Medicijn pagina</div>
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
                                <td><b>{{ __('Medicijn nummer: ') }}</b></td>
                                <td>{{ $medicine->id }}</td>
                              </tr>

                              <!-- Show name -->
                              <tr>
                                <td><b>{{ __('Naam: ') }}</b></td>
                                <td>{{ $medicine->medicine }}</td>
                              </tr>

                              <!-- Show dose  -->
                              <tr>
                                <td><b>{{ __('Dosering: ') }}</b></td>
                                <td>{{ $medicine->dose }}</td>
                              </tr>

                              <!-- Show purpose -->
                              <tr>
                                <td><b>{{ __('Doel: ') }}</b></td>
                                <td>{{ $medicine->purpose }}</td>
                              </tr>

                              <!-- Show side effects -->
                              <tr>
                                <td><b>{{ __('Bijwerkingen: ') }}</b></td>
                                <td>{{ $medicine-> side_effect}}</td>
                              </tr>

                              <!-- Show expire date -->
                              <tr>
                                  <td><b>{{ __('Houdbaarheidsdatum: ') }}</b></td>
                                  <td>{{ $medicine-> expire_date }}</td>
                              </tr>

                              <!-- Show price -->
                              <tr>
                                  <td><b>{{ __('Prijs: ') }}</b></td>
                                  <td>{{ $medicine-> price }}</td>
                              </tr>

                              <!-- Show comment -->
                              <tr>
                                  <td><b>{{ __('Overig: ') }}</b></td>
                                  <td>{{ $medicine-> comment }}</td>
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
