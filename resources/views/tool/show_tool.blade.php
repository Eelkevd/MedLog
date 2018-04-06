<!-- View for the show tool page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hulpmiddel pagina</div>

                <!-- check to see if user of page is guest, reader, user or validated user.
                      Only let validated user throug -->
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
                                <td><b>{{ __('Hulpmiddel nummer: ') }}</b></td>
                                <td>{{ $tool->id }}</td>
                              </tr>

                              <!-- Show name -->
                              <tr>
                                <td><b>{{ __('Naam: ') }}</b></td>
                                <td>{{ $tool->tool }}</td>
                              </tr>

                              <!-- Show purpose -->
                              <tr>
                                <td><b>{{ __('Doel: ') }}</b></td>
                                <td>{{ $tool->purpose }}</td>
                              </tr>

                              <!-- Show origin -->
                              <tr>
                                <td><b>{{ __('Leverancier: ') }}</b></td>
                                <td>{{ $tool-> origin}}</td>
                              </tr>

                              <!-- Show expire date -->
                              <tr>
                                  <td><b>{{ __('Inleverdatum: ') }}</b></td>
                                  <td>{{ $tool-> return_date }}</td>
                              </tr>

                              <!-- Show price -->
                              <tr>
                                  <td><b>{{ __('Prijs: ') }}</b></td>
                                  <td>€{{ $tool-> price }}</td>
                              </tr>

                              <!-- Show comment -->
                              <tr>
                                  <td><b>{{ __('Overig: ') }}</b></td>
                                  <td>{{ $tool-> comment }}</td>
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
