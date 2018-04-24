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
