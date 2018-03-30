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

                      @foreach($diaries as $diary)
                      <div class="card-body">
                        <form method="POST" action="readers/show{{ $diary->id }}">
                            @csrf
                        <!-- Choose the diary to read -->
                        <div class="form-group row">
                            <div class="col-md-2">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Bekijk het dagboek van ') }}
                                  {{ $diary->user->firstname }}
                              </button>
                            </div>
                        </div>
                      </div>
                            @endforeach


                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
