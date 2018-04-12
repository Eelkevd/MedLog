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
@elseif (auth()->user()->roles('hulpverlener'))
<div class="card-body">
    <div class="alert alert-danger">
        <br /><strong>
        U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
        </strong>
    </div>
</div>
@else