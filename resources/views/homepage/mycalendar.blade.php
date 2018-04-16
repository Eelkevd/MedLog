<!-- View for the calendar page -->
@extends('layouts.master')
@section ('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- check to see if user of page is guest, reader, user or validated user.
                    Only let validated user throug -->
                    @guest
                    <!-- Show not logged in screen -->
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <br /><strong>
                            {{ __('Please log in to see your account data.') }}
                            </strong>
                        </div>
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
                    <h5><center>Uw kalender</center></h5>
                </div>
                <!-- Toggles form to insert new appointment-->
                <div class="card">
                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_event">
                    Klik hier om een afspraak toe te voegen
                    <span class="oi oi-chevron-bottom"></span>
                    </button>
                    <div class="collapse" class="card-body"  id="form_event">
                        <div class="card-header">
                            <h4>Maak afspraak</h4> <p>Velden met een sterretje (*) zijn verplicht</p>
                        </div>
                        <div class="card-body">
                            <form action= "/home/store_event" method="post">
                                {{ csrf_field() }}
                                Afspraak:  *
                                <br />
                                <textarea class="form-control" name="title" required/></textarea>
                                <br />
                                Datum:   *
                                <br />
                                <input type="text" name="start_date" class="date" required/>
                                <br />
                                Tijd:
                                <br />
                                <input type="time" name="event_time" id="event_time" class="time"><br><br>
                                <input type="submit" class="btn btn-primary" value="Opslaan" /><br>
                            </form>
                            <script>
                            $('.date').datepicker({
                            autoclose: true,
                            dateFormat: "yy-mm-dd"
                            });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- end toggle -->
                <br />
                <div class="card">
                    <div class="panel panel-primary">
                        <div class="panel-body" >
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endauth
@endsection