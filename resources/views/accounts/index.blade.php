<!-- View for the account page -->
@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @guest
                    <!-- Show not logged in screen -->
                    <div class="col-md-6">
                        <label >{{ __('Please log in to see your account data.') }}</label>
                    </div>
                    @endguest

                    @if (auth()->user()->reader())

                      {{ __('Account van betrokkene: ') }}
                      {{ $user -> username }}
                      </div>

                      @elseif (!(auth()->user()->reader()))

                        {{ __('Medisch dagboek van :  ') }}
                        {{ $user -> username }}
                        </div>


                    @elseif (!(auth()->user()->verified()))
                    </div>
                      <div class="card-body">
                              <div class="alert alert-danger">
                                <br /><strong>
                                  Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
                                      </strong>
                              </div>
                      </div>

                    @endif

                      <!-- Show users account data -->
                      @include('accounts/account')

                </div>

                      <!-- Button to go to edit page of users account data-->
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <form action="{{ action('AccountController@edit') }}" >
                                  <button type="submit" class="btn btn-info btn-md">Wijzig account data</button>
                              </form>
                          </div>
                      </div>

              <br />
              <br />
              <div class="card">
                <div class="card-header">Thema van uw layout</div>
                      <!-- layouts buttons to choose a theme -->
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                          <!-- Show present theme -->
                          <tr>
                            <td><b>{{ __('Uw huidige thema') }}</b></td>
                            <td><b>
                              @if (auth()->user()->theme === null)
                                U heeft nog geen thema gekozen.
                              @else
                                {{ $user -> theme }}
                              @endif
                            </b>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              Reset het thema naar de originele website:
                            </td>

                          <!-- Button to go to edit page of users account data-->
                              <td>
                                  <form action="{{ action('ThemeController@update') }}" >
                                      {{ csrf_field() }}
                                      <input type="hidden" name="contrast" value="default">
                                      <button type="submit" class="btn btn-info btn-md" style="width:200px;">Default</button>
                                  </form>
                              </td>
                          </tr>

                          <tr>
                            <td>
                              Kies voor een hoger contrast en grotere lettertype:
                            </td>

                          <!-- Button to go to edit page of users account data-->
                              <td>
                                  <form action="{{ action('ThemeController@update_contrast') }}" >
                                      {{ csrf_field() }}
                                      <input type="hidden" name="contrast" value="contrast">
                                      <button type="submit" class="btn btn-info btn-md" style="width:200px;">Hoog contrast</button>
                                  </form>
                              </td>
                          </tr>

                          <tr>
                            <td>
                              Kies voor een kleurig thema:
                            </td>

                          <!-- Button to go to edit page of users account data-->
                              <td>
                                  <form action="{{ action('ThemeController@update_vrolijk') }}" >
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info btn-md" style="width:200px;">Vrolijk</button>
                                  </form>
                              </td>
                          </tr>



                      </table>

                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
