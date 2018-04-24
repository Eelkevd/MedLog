<!-- View for the home page -->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- check to see if the user has verified their enmailadres -->
                    @if (!(auth()->user()->verified()) && !(auth()->user()->reader()))
                    <!-- else user is gebruiker en heeft nog niet geverificeerd -->
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <br /><strong>
                            Hartelijk dank voor uw registratie!<br />
                            Voor u verder kunt gaan, moet u uw email verificeren. <br />
                            Bekijk uw email om uw account te activeren.
                            </strong>
                        </div>
                    </div>
                    @elseif (auth()->user()->verified())
                    @if (session('succes'))
                    <div class="card-body">
                        <div class="alert alert-success">
                            {{ session('succes') }}
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h5><center>Zoek in uw kalender</center></h5>
                        </div>
                        <div class="card-body">
                            <form method="GET" action="{{ action('EventController@search') }}" >
                                <input type="text" name="search" placeholder="Zoekopdracht" class="form-control">
                                <button type="submit" class="btn btn-primary btn-md" style="margin-top: 5px;">zoek op afspraak of ziektebeeld</button>
                            </form><br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><b>Resultaten:</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($search as $event)
                                    <tr>
                                        <td>
                                            {{ $event -> title }} <br>
                                            @if ($event->event_time)
                                            {{ date('g:i', strtotime($event ->event_time))}} <br>
                                            @else
                                            Geen tijd geselecteerd <br>
                                            @endif
                                            {{ date('d-m-Y', strtotime($event ->start_date ))}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{ $search->links() }}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection