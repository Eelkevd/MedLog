<!-- View for the export page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                <input type="text" name="illness" required/>
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

          <div class="card">
            <div class="card-header">Exporteer je medicijnen en hulpmiddelen</div>
            <div class="card-body">

            </div>
          </div><br><br>


        </div>
    </div>
</div>
@endsection
