
@extends('layouts.master')

@section('content')
<div class="container">
    
<!--
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homepage</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
-->

    <div class="panel panel-primary">
        <div class="panel-heading">
            MY Calender    
        </div>

        <div class="panel-body" >
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
</div>
@endsection
