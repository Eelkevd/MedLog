@extends ('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <!-- form for submitting medical entry page -->
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
                        <div class="card-header">
                            <h5><center>Medicijnen</center></h5>
                        </div>
                    </div>
                    <div class="card">
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_medicine">
                        Voeg een nieuw medicijn toe
                        <span class="oi oi-chevron-bottom"></span>
                        </button>
                        <div class="collapse" class="card-body"  id="form_medicine">
                            <div class="card-header">
                                <h4>Nieuw medicijn</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/medicine/create_medicine">
                                    {{ csrf_field() }}
                                    <div class="input-group mb-3">
                                        <label>Naam nieuw medicijn</label>
                                        <input type="text" class="form-control" name="medicine" placeholder="Hoe heet het medicijn?" aria-label="naam medicijn" aria-describedby="basic-addon2" required>
                                    </div>
                                    <hr>
                                    <div>
                                        <label>Dosering <em><small>(optioneel)</small></em></label>
                                        <textarea name="dose" placeholder="Hoe vaak moet u het medijn innemen?"></textarea>
                                    </div>
                                    <hr>
                                    <div>
                                        <label>Doel <em><small>(optioneel)</small></em></label>
                                        <textarea name="purpose" placeholder="Waar gebruikt u het medicijn voor?"></textarea>
                                    </div>
                                    <hr>
                                    <div>
                                        <label>Bijwerkingen <em><small>(optioneel)</small></em></label>
                                        <textarea name="side_effect" placeholder="Heeft u last van bijwerkingen?"></textarea>
                                    </div>
                                    <hr>
                                    <div>
                                        <label>Prijs <em><small>(optioneel)</small></em><br /></label>
                                        €  <input type="number" name="price" step=".01">
                                    </div>
                                    <hr>
                                    <div>
                                        <label>Vrije ruimte <em><small>(optioneel)</small></em></label>
                                        <textarea name="comment"></textarea>
                                    </div>
                                    <hr>
                                    <div>
                                        <input type="submit" align="center"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h5>Uw huidige medicatie</h5>
                        </div>
                        {{ $medicines->links() }}
                        <div class="card-body">
                            <a href="">Nieuwe medicatie?</a>
                            <!-- places all medicines from db -->
                            @foreach($medicines as $medicine)
                            @if($medicine->deleted != 'removed')
                            <a href="{{ route('medicine.show', $medicine->id) }}">{{ $medicine -> medicine }}</a>
                            <hr>
                            @endif
                            @endforeach()
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection