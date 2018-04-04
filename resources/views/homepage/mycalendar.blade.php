<!-- View for the calendar page -->
@extends('layouts.htmlheader_index')

 <script src="{{asset('js/app.js')}}"></script>

@section ('content')

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

        <hr>
        <!-- Buttons to go to homepage of create event page-->
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <form action="{{ action('HomeController@index') }}" >
                    <button type="submit" class="btn btn-primary">Welkomspagina</button>
                </form><hr>
                <form action="{{ action('EventController@create') }}" >
                    <button type="submit" class="btn btn-primary">Zet een afspraak in je kalender</button>
                </form>
            </div>
        </div>

        <hr>

                    <div class="container">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            Jouw kalender
                            </div>

                            <div class="panel-body" >
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                            </div>
                        </div>
                    </div>
        @endif
<script>

  $('#calendar').fullCalendar({
    defaultView: 'month',
    defaultDate: '2018-03-12',
    eventColor: 'green',
    });
  
</script>
@endauth

@endsection
