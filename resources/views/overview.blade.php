<!-- View for the overview page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">


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

                          @elseif(!(auth()->user()->diary))
                          <div class="card-body">
                                  <div class="alert alert-danger">
                                    <br /><strong>
                                      U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
                                          </strong>
                                  </div>
                          </div>

                          @else
                          <div class="card">
                            <div class="card-header">
                        <h5><center>Uw dagboek overzicht</center></h5></div>

                        <table class="table table-striped">
                            <tbody>
                            @foreach($entries as $entry)
                            <tr>
                              <td>
                                <b> {{ $entry->illness }}</b>
                                <br />
                                @if(!empty($entry->timespan_date))
                                  Datum: {{ $entry -> timespan_date }}
                                @endif
                                <br />
                              Symptoom:
                              @foreach($entry->symptomes as $symptom)
                                {{ $symptom->symptom }}
                                {{ __(', ')}}
                              @endforeach
                              <br />
                              Intensiteit:
                              {{ $entry->intensity }}
                            </td>
                            <td>
                            <a href="{{ route('entries.show', $entry->id) }}" class="btn btn-info btn-md" style="margin-top:15%;">
                              Bekijk deze gebeurtenis
                            </a>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
  @endif
  @endauth

@endsection
