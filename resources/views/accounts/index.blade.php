<!-- View for the account page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @guest
                    <!-- Show not logged in screen -->
                    <div class="col-md-6">
                        <label >{{ __('Please log in to see your account data.') }}</label>
                    </div>
                    @endguest

                    @if (auth()->user()->reader())

                      {{ __('Account van betrokkene: ') }}
                      {{ $user -> username }}
                      </div>

                      @elseif (!(auth()->user()->reader()))

                        {{ __('Medisch dagboek van :  ') }}
                        {{ $user -> username }}
                        </div>


                    @elseif (!(auth()->user()->verified()))
                    </div>
                      <div class="card-body">
                              <div class="alert alert-danger">
                                <br /><strong>
                                  Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
                                      </strong>
                              </div>
                      </div>

                    @endif

                      <!-- Show users account data -->
                      @include('accounts/account')

                </div>

                      <!-- Button to go to edit page of users account data-->
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <form action="{{ action('AccountController@edit') }}" >
                                  <button type="submit" class="btn btn-info btn-md">Wijzig account data</button>
                              </form>
                          </div>
                      </div>

              
@endsection
