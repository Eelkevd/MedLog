<!-- View for the login and register page -->
@extends('layouts.htmlheader_index')

@section('content')

    <!-- Button to go to about us page-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <strong>
                      Een medisch dosier in eigen hand begint met MedLog.
                    </strong><br />
                    <br />
                      <ul class="index">
                        <li>Organiseer uw dagboek zoals u dat zelf wilt met je eigen ziektebeelden en symptomen</li>
                        <li>Houdt uw afspraken overzichtelijk bij in de kalender</li>
                        <li>Voeg uw behandelaars en naasten toe als meelezers</li>
                        <li>Sorteer en exporteer uw dagboek als pdf</li>
                        <li>Kies uw eigen thema, bijvoorbeeld "Hoog Contrast" voor als moeite de pagina te lezen</li>
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
                                  <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mailadres') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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

                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                          {{ __('Wachtwoord vergeten?') }}
                                      </a>
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
                        Kies 'gebruiker' om een eigen dagboek aan te maken.
                          <br />
                          Kies 'hulpverlener' om een dagboek in te zien.
                          <br />
                          <em>{{ __('Velden met een * zijn verplicht') }}</em>
                        </div>
                        <div class="card-body">
                          <form method="POST" action="{{ route('register') }}">
                              @csrf

                              <!-- Register form choose role -->
                              <div class="form-group row">
                                  <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Ik ben een: ') }}</label>

                                  <div class="col-md-6">
                                    <select id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{ old('role') }}" required>
                                      @foreach($roles as $id=>$role)
                                        <option value="{{ $id }}">{{ $role }} </option>
                                      @endforeach
                                    </select>

                                      @if ($errors->has('role'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('role') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form username-->
                              <div class="form-group row">
                                  <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Gebruikersnaam *') }}</label>

                                  <div class="col-md-6">
                                      <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                      @if ($errors->has('username'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('username') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form firstname-->
                              <div class="form-group row">
                                  <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam *') }}</label>

                                  <div class="col-md-6">
                                      <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                      @if ($errors->has('firstname'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('firstname') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form middlename-->
                              <div class="form-group row">
                                  <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                                  <div class="col-md-6">
                                      <input id="middlename" type="text" class="form-control{{ $errors->has('middlename') ? ' is-invalid' : '' }}" name="middlename" value="{{ old('middlename') }}" autofocus>

                                      @if ($errors->has('middlename'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('middlename') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form lastname-->
                              <div class="form-group row">
                                  <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam *') }}</label>

                                  <div class="col-md-6">
                                      <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                      @if ($errors->has('lastname'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('lastname') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form street-->
                              <div class="form-group row">
                                  <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Straatnaam *') }}</label>

                                  <div class="col-md-6">
                                      <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" required autofocus>

                                      @if ($errors->has('street'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('street') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form house number-->
                              <div class="form-group row">
                                  <label for="housenumber" class="col-md-4 col-form-label text-md-right">{{ __('Huisnummer *') }}</label>

                                  <div class="col-md-6">
                                      <input id="housenumber" type="number" class="form-control{{ $errors->has('housenumber') ? ' is-invalid' : '' }}" name="housenumber" value="{{ old('housenumber') }}" required>

                                      @if ($errors->has('housenumber'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('housenumber') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form house number suffix-->
                              <div class="form-group row">
                                  <label for="housenumbersuffix" class="col-md-4 col-form-label text-md-right">{{ __('Huisnummer Toevoeging') }}</label>

                                  <div class="col-md-6">
                                      <input id="housenumbersuffix" type="text" class="form-control{{ $errors->has('housenumbersuffix') ? ' is-invalid' : '' }}" name="housenumbersuffix" value="{{ old('housenumbersuffix') }}">

                                      @if ($errors->has('housenumbersuffix'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('housenumbersuffix') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form town-->
                              <div class="form-group row">
                                  <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Woonplaats *') }}</label>

                                  <div class="col-md-6">
                                      <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" name="town" value="{{ old('town') }}" required autofocus>

                                      @if ($errors->has('town'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('town') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form postal code-->
                              <div class="form-group row">
                                  <label for="postalcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode *') }}</label>

                                  <div class="col-md-6">
                                      <input id="postalcode" type="text" class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" name="postalcode" value="{{ old('postalcode') }}" required>

                                      @if ($errors->has('postalcode'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('postalcode') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form email-->
                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mailadres *') }}</label>

                                  <div class="col-md-6">
                                      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                          <span class="invalid-feedback">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <!-- Register form confirm email-->
                              <div class="form-group row">
                                  <label for="email-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal E-Mailadres *') }}</label>

                                  <div class="col-md-6">
                                      <input id="email-confirm" type="email" class="form-control" name="email_confirmation" required>
                                  </div>
                              </div>

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
                                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Herhaal Wachtwoord *') }}</label>

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
