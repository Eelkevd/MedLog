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

                    @if (!(auth()->user()->reader()))

                      <div class="col-md-6">
                          <label >{{ __('Je bent niet geregistreerd als lezer') }}</label>
                      </div>

                    @elseif (auth()->user()->reader())

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
                          @foreach ($diaries as $diary)
                          <tr>
                            <td><b>{{ __('Clientnaam') }}</b></td>
                            <td><a href="readers/show">This will be a link with diary id = 
                            {{ $diary->id }}
                            </a></td>
                          </tr>
                          @endforeach

                        </table>

                    @endif

            </div>
        </div>
    </div>
</div>
@endsection
