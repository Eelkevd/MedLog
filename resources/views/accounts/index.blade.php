<!-- View for the account page -->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card">
                        <div class="card-header">
                            <h5><center>Uw gegevens</center></h5>
                            @guest
                            <!-- Show not logged in screen -->
                            <div class="col-md-6">
                                <label >{{ __('Please log in to see your account data.') }}</label>
                            </div>
                            @endguest
                            @if (auth()->user()->reader())
                            {{ __('Account van betrokkene: ') }}
                            {{ $user -> firstname }}
                            {{ __(' ') }}
                            {{ $user -> middlename }}
                            {{ __(' ') }}
                            {{ $user -> lastname }}
                        </div>
                        @elseif (!(auth()->user()->reader()))
                        <p><center>{{ __('Medisch dagboek van :  ') }}
                        {{ $user -> middlename }}
                        {{ __(' ')}}
                        {{ $user -> lastname }}</center></p>
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
                <!-- Button to go to edit page of users account data-->
                <div class="card-body">
                    @include('accounts/account')
                    <form action="{{ action('AccountController@edit') }}" >
                        <button type="submit" class="btn btn-primary btn-md" style="margin-top: 5px;">Wijzig gegevens</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection