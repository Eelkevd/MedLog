@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Homepage</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Je bent ingelogd.
                    <br />
                    <br /><strong>
                      Je dagboek is
                        {{ auth()->user()->verified() ? 'geactiveerd' : 'nog niet geactiveerd. Bekijk je email om je dagboek te activeren.' }}
                      </strong>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
