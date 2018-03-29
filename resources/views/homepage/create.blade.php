<!-- View for the create event page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4>Maak afspraak</h4> <p>Velden met een sterretje (*) zijn verplicht</p></div>
                    <div class="card-body">
                        <form action= "/home/store_event" method="post">
                        {{ csrf_field() }}
                        Afspraak:  *
                        <br />
                        <input type="text" name="title" required/>
                        <br /><br />
                        Wanneer:   *
                        <br />
                        <input type="text" name="start_date" class="date" required/>
                        Tot:
                        <input type="text" name="end_date" class="date" />
                        <input type="submit" value="Opslaan" /><br>
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
