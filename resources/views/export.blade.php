<!-- View for the export page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Exporteer je gegevens van ziekte</div>
            <div class="card-body">
                <form method="POST" action="/export/illness">
                {{ csrf_field() }}
                Exporteer je gegevens van de ziekte:
                <br />
                <input type="text" name="ziekte" required/>
                <input type="submit" value="Download als pdf" /><br>
                </form>
            </div>
          </div><br><br>

          <div class="card">
            <div class="card-header">Exporteer je gegevens in tijdsperiode</div>
              <div class="card-body">
                <form method="POST" action="/export/period">
                {{ csrf_field() }}
                Exporteer je gegevens in de periode van:
                <br />
                <input type="text" name="start_date" class="date" required/><br>
                Exporteer je gegevens in de periode tot:<br>
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
          </div>
        </div>
    </div>
</div>
@endsection
