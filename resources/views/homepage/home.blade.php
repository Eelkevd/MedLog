
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welkom</div>

                <div class="card-body">
                  <form action="{{ action('EventController@index') }}" >
                      <button type="submit">Bekijk je kalender</button>
                  </form><br>
                  <form action="{{ action('EventController@create') }}" >
                      <button type="submit">Zet een afspraak in je kalender</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
