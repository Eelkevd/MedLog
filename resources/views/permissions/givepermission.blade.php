<!-- View for the export page -->
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
                <!-- form for sadding readers -->
                <div class="card-header">
                    <h4>Voeg een nieuwe lezer toe</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/permissions/givepermission">
                        {{ csrf_field() }}
                        <div>
                            <p>
                                U kunt iemand tijdelijk leesrechten geven over uw medisch dagboek. Zo kunt u uw dokter of uw mantelzorger bijvoorbeeld
                                laten meekijken.<br />
                                Geef het emailadres op van de persoon die u als lezer wilt toevoegen.
                            </p>
                            <input type="text" name="email_reader" placeholder="emailadres van uw lezer" style="width:400px;">
                            <input type="submit" align="center" class="btn btn-primary" value="voeg lezer toe">
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @endauth
        </div>
    </div>
</div>
</div>
@endsection