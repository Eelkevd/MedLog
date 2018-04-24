<!-- View for the export page -->
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
                        <div class="card-header"><h5><center>Download uw dagboek</center></h5>
                        </div>
                    
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">Selecteer een ziektebeeld om te downloaden</div>
                            <div class="card-body">
                                <form method="POST" action="/export/getillnessPDF">
                                    {{ csrf_field() }}
                                    <select name="illness" class="form-control medform-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" required>
                                        <option selected></option>
                                        @foreach($illnesses as $illness)
                                        <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                                        @endforeach()
                                    </select>
                                    <input type="submit" class="btn btn-primary" style="margin-top: 5px;" value="Download" /><br>
                                </form>
                            </div>
                        </div><br>
                        <div class="card">
                            <div class="card-header">Download je gebeurtenissen in de periode:</div>
                            <div class="card-body">
                                <form method="POST" action="/export/getdatePDF">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="start_date" class="date form-control" placeholder="vanaf" required/>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="end_date" class="date form-control" placeholder="tot en met"required/>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" style="margin-top: 5px;" value="Download" /><br>
                                </form>
                                <script>
                                $('.date').datepicker({
                                autoclose: true,
                                dateFormat: "yy-mm-dd"
                                });
                                </script>
                            </div>
                        </div><br>
                        <div class="card">
                            <div class="card-header">Download al jouw gebeurtenissen</div>
                            <div class="card-body">
                                <form method="POST" action="/export/getPDF">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary btn-md" value="Download" /><br>
                                </form>
                            </div>
                        </div>
                    </div>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection