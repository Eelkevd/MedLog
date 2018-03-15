@extends('layouts.app')

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
                    <!-- Show username -->
                    <div class="show-group row">
                        <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Gebruikersnaam:') }}</label>
                            <div class="col-md-6">
                            <output id="username" type="username" name="username"></output>
                            </div>
                    </div>
            
                    <!-- Show email -->
                    <div class="show-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mailadres:') }}</label>
                            <div class="col-md-6">
                            <output id="email" type="email" name="email"></output>
                            </div>
                    </div>
                
                    <!-- Show firstname -->
                    <div class="show-group row">
                        <label for="firstname" class="col-sm-4 col-form-label text-md-right">{{ __('Voornaam:') }}</label>
                            <div class="col-md-6">
                            <output id="firstname" type="firstname" name="firstname"></output>
                            </div>
                    </div>
                
                    <!-- Show middlename -->
                    <div class="show-group row">
                        <label for="middlename" class="col-sm-4 col-form-label text-md-right">{{ __('Tussenvoegsel:') }}</label>
                            <div class="col-md-6">
                            <output id="middlename" type="middlename" name="middlename"></output>
                            </div>
                    </div>
                
                    <!-- Show lastname -->
                    <div class="show-group row">
                        <label for="lastname" class="col-sm-4 col-form-label text-md-right">{{ __('Achternaam:') }}</label>
                            <div class="col-md-6">
                            <output id="lastname" type="lastname" name="lastname"></output>
                            </div>
                    </div>
                
                    <!-- Show BSN -->
                    <div class="show-group row">
                        <label for="bsn" class="col-sm-4 col-form-label text-md-right">{{ __('Burger service nummer:') }}</label>
                            <div class="col-md-6">
                            <output id="bsn" type="bsn" name="bsn"></output>
                            </div>
                    </div>
                
                    <!-- Show street -->
                    <div class="show-group row">
                        <label for="street" class="col-sm-4 col-form-label text-md-right">{{ __('Straat:') }}</label>
                            <div class="col-md-6">
                            <output id="street" type="street" name="street"></output>
                            </div>
                    </div>
                
                    <!-- Show housenumber -->
                    <div class="show-group row">
                        <label for="housenumber" class="col-sm-4 col-form-label text-md-right">{{ __('Huisnummer:') }}</label>
                            <div class="col-md-6">
                            <output id="housenumber" type="housenumber" name="housenumber"></output>
                            </div>
                    </div>
                
                    <!-- Show housenumbersuffix -->
                    <div class="show-group row">
                        <label for="housenumbersuffix" class="col-sm-4 col-form-label text-md-right">{{ __('Huisnummer toevoeging:') }}</label>
                            <div class="col-md-6">
                            <output id="housenumbersuffix" type="housenumbersuffix" name="housenumbersuffix"></output>
                            </div>
                    </div>
                
                    <!-- Show town -->
                    <div class="show-group row">
                        <label for="town" class="col-sm-4 col-form-label text-md-right">{{ __('Woonplaats:') }}</label>
                            <div class="col-md-6">
                            <output id="town" type="town" name="town"></output>
                            </div>
                    </div>
                
                    <!-- Show postal code -->
                    <div class="show-group row">
                        <label for="postalcode" class="col-sm-4 col-form-label text-md-right">{{ __('Postcode:') }}</label>
                            <div class="col-md-6">
                            <output id="postalcode" type="postalcode" name="postalcode"></output>
                            </div>
                    </div>
                    @endguest
            </div>
        </div>
    </div>
</div>
@endsection