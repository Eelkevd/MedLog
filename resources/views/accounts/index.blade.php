<!-- View for the account page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account</div>
                    @guest
                    <!-- Show not logged in screen -->
                    <div class="col-md-6">
                        <label >{{ __('Please log in to see your account data.') }}</label>
                    </div>

                    @else
                    <!-- Show users account data -->
                    @include('accounts/account')

                    <!-- Button to go to edit page of users account data-->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form action="{{ action('AccountController@edit') }}" >
                                <button type="submit" class="btn btn-info btn-md">Wijzig account data</button>
                            </form>
                        </div>
                    </div>

                    <br />
                    <!-- Button to go to edit page of users account data-->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <form action="{{ route('password.request') }}">
                                <button name="reset" type="submit" class="btn btn-info btn-md">{{ __('Wachtwoord wijzigen') }}</button>
                            </form>
                        </div>
                    </div>

                    @endguest
            </div>
        </div>
    </div>
</div>
@endsection
