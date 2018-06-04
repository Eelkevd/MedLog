<!-- View for the login and register page -->
@extends('layouts.htmlheader_index')

@section('content')

    <!-- Button to go to about us page-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <strong>Een medisch dossier in eigen hand begint bij MedBoek.</strong>
                    <br />
                    <br />
                        <ul class="index">
                            <li>Organiseer uw dagboek zoals u dat zelf wilt met uw eigen ziektebeelden en symptomen.</li>
                            <li>Houd uw afspraken overzichtelijk bij in de kalender.</li>
                            <li>Voeg uw behandelaars en mantelzorgers toe als meelezers.</li>
                            <li>Sorteer en download uw dagboek als pdf.</li>
                            <li>Kies uw eigen layout, bijvoorbeeld "Hoog Contrast".</li>
                        </ul>
                    </div>
                </div>
                <br />
                <!-- Login form -->
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Login form email-->
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Gebruikersnaam') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- Login form password-->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>
                                <div class="col-md-6">
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Onthoud mij') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <!-- Registration form -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Registreer
                      </div>
                      <div class="card-body">
                          <em>{{ __('Velden met een * zijn verplicht') }}</em>
                        </div>
                        <div class="card-body">
                          <form method="POST" action="{{ route('register') }}">
                              @csrf
                              <!-- Register form password-->
                              <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord *') }}</label>

                                  <div class="col-md-6">
                                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                      <div class="col-md">
                                        <em>
                                        {{ __('(minimaal 6 tekens: minimaal 1 kleine letter en hoofdletter, 1 cijfer en 1 speciaal teken)') }}
                                      </em>
                                    </div>
                                      @if ($errors->has('password'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form confirm password-->
                              <div class="form-group row">
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal wachtwoord *') }}</label>

                                  <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>
                              </div>

                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Registreer') }}
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
