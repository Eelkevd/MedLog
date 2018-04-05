<!-- View for the export page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


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
            <div class="card">        
            <div class="card-header">Exporteer al je gegevens</div>
            <div class="card-body">
                <form method="POST" action="/export/getPDF">
                {{ csrf_field() }}
                <input type="submit" value="Download al je gegevens als pdf" /><br>
                </form>
            </div>
          </div><br><br>

          <div class="card">
            <div class="card-header">Exporteer je gegevens van ziekte</div>
            <div class="card-body">
                <form method="POST" action="/export/getillnessPDF">
                {{ csrf_field() }}
                Exporteer je gegevens van de ziekte:
                <br />
                <select name="illness" class="medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
      							<option selected></option>
      						@foreach($illnesses as $illness)
      							<option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
      						@endforeach()
      					</select>
                <!-- <input type="text" name="illness" required/> -->
                <input type="submit" value="Download als pdf" /><br>
                </form>
            </div>
          </div><br><br>

          <div class="card">
            <div class="card-header">Exporteer je gegevens in tijdsperiode</div>
              <div class="card-body">
                <form method="POST" action="/export/getdatePDF">
                {{ csrf_field() }}
                Exporteer je gegevens in de periode van:
                <br/>
                <input type="text" name="start_date" class="date" required/><br>
                Exporteer je gegevens in de periode tot en met:<br>
                <input type="text" name="end_date" class="date" required/>
                <input type="submit" value="Download als pdf" /><br>
                </form>

                <script>
                    $('.date').datepicker({
                        autoclose: true,
                        dateFormat: "yy-mm-dd"
                    });
                </script>
              </div>
          </div><br><br>

          @endif
          @endauth
        </div>
    </div>
</div>
@endsection
