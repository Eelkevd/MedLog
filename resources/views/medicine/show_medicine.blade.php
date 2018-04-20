<!-- View for the show page -->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
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
                        <div class="card-header">
                            <h5><center>Medicijn pagina</center></h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <!-- Button to delete page of medicine -->
                                        <a href="{{ route('medicine.delete', $medicine->id) }}" onclick="return confirm('Weet je zeker dat je dit medicijn wilt verwijderen?')" ><span class="oi oi-trash icon"></span></a>
                                        <a href="{{ route('medicine.edit', $medicine->id) }}" ><span class="oi oi-pencil icon"></span></a>
                                    </th>
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
                                    <td>{{ $medicine->side_effect}}</td>
                                </tr>
                                <!-- Show price -->
                                <tr>
                                    <td><b>{{ __('Prijs: ') }}</b></td>
                                    <td>€{{ $medicine->price }}</td>
                                </tr>
                                <!-- Show comment -->
                                <tr>
                                    <td><b>{{ __('Overig: ') }}</b></td>
                                    <td>{{ $medicine->comment }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection