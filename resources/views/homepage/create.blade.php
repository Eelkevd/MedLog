@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Maak afspraak</div>
                    <div class="card-body">
                        <form action= "/home/store_event" method="post">
                        {{ csrf_field() }}
                        Afspraak:
                        <br />
                        <input type="text" name="title" />
                        <br /><br />
                        <!-- Afspraak beschrijving:
                        <br />
                        <textarea name="description"></textarea>
                        <br /><br /> -->
                        Wanneer:
                        <br />
                        <input type="text" name="start_date" class="date" />
                        Tot:
                        <input type="text" name="end_date" class="date" />
                        <input type="submit" value="Opslaan" /><br>
                        </form>

                        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
                        <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
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
