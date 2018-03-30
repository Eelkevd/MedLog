<!-- View for the account page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    @guest
                    <!-- Show not logged in screen -->
                    <div class="col-md-6">
                        <label >{{ __('Please log in to see your account data.') }}</label>
                    </div>
                    @endguest

                    @if (!auth()->user()->roles('hulpverlener'))

                      <div class="col-md-6">
                          <label >{{ __('Je bent niet geregistreerd als lezer') }}</label>
                      </div>

                    @elseif (auth()->user()->roles('hulpverlener'))

                      <div class="card-header">
                        {{ __('Uw clienten') }}
                      </div>

                      <div class="card-body">
                        <form method="POST" action="readers/show{{ $reader->pluck('diary_id') }}">
                            @csrf
                        <!-- Choose the diary to read -->
                        @foreach($clients as $client)
                        <div class="form-group row">
                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Bekijk het dagboek van ') }}
                                  {{ $client->firstname }}
                              </button>
                            </div>
                        </div>

                            @endforeach


                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
