<!-- View for the show page -->
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

                      <!-- add a check to see if the reader can read this specifiek diary -->

                      <div class="card-header">Dossier van
                        {{ $diary->user->firstname }}
                        @if(!empty( $diary->user->middlename ))
                          {{ $diary->user->middlename }}
                        @endif
                        {{ $diary->user->lastname }}
                      </div>

                      <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>datum</th>
                                <th>ziekte</th>
                                <th>symptomen</th>
                                <th>intensiteit</th>
                                <th>duur</th>
                                <th>herstel</th>
                                <th>opmerkingen</th>
                              </tr>
                            </thead>
                            <tbody>

                              <!-- Show entries -->
                              @foreach($diary->entries as $entry)
                              <tr>
                                <td width="110px"><b>{{ $entry->created_at }}</b></td>
                                <td>{{ $entry->illness->illness }}</td>
                                @foreach($entry->symptomes as $symptom)
                                  <td>{{ $symptom->symptom }}</td>
                                @endforeach
                                <td>{{ $entry->intensity }}</td>
                                <td>{{ $entry->complaint_time }}</td>
                                <td>{{ $entry->recoverytime_time }}</td>
                                <td>{{ $entry->comments }}</td>
                              </tr>
                              @endforeach


                        </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
