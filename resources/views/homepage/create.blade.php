<!-- View for the create event page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

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


                <div class="card-header">
                  <h4>Maak afspraak</h4> <p>Velden met een sterretje (*) zijn verplicht</p></div>
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

            @endif
            @endauth
        </div>
    </div>
</div>
@endsection
