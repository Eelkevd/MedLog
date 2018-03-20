@extends ('layouts.layout')

@section ('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Kalender</div>

                        <div class="card-body">
                          <form action="{{ action('HomeController@index') }}" >
                              <button type="submit">Terug</button>
                          </form><br>
                          <form action="{{ action('EventController@create') }}" >
                          <button type="submit">Zet een afspraak in je kalender</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
        <!doctype html>
        <html lang="en">
        <head>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
        </head>

        <body>
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
        </body>
        </html>
@endsection
