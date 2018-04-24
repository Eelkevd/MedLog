<!-- View for the account page -->
@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                <!-- Show not logged in screen -->
                <div class="col-md-6">
                    <label >{{ __('Please log in to see your account data.') }}</label>
                </div>
                @endguest
                @if (!auth()->user()->roles('hulpverlener'))
                <div class="col-md-6">
                    <label >{{ __('Je bent niet geregistreerd als lezer') }}</label>
                </div>
                @elseif (auth()->user()->roles('hulpverlener'))
                <div class="card-header">
                    {{ __('Uw clienten') }}
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Show the clients -->
                        @foreach (auth()->user()->reader() as $reader)
                        <tr>
                            <td><b>{{ __('Clientnaam') }}</b></td>
                            <td><a href="readers/diary"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection