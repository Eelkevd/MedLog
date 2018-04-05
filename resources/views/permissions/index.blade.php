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

                    <div class="card-body">
                      @if(!(Session::has('dataU')))
                      <div class="alert alert-primary">
                      U kunt iemand tijdelijk leesrechten geven over uw medisch dagboek. Zo kunt u uw dokter bijvoorbeeld
                        laten meekijken, of uw mantelzorger.<br />
                      </div>
                      @endif
                      @if(Session::has('succes'))
                        <div class="alert alert-success">
                          {{ Session::get('succes') }}
                        </div>
                      @endif
                      @if(Session::has('dataU'))
                          <div class="alert alert-danger">
                            {{ __('Uw lezer kan inloggen op MedLog met onderstaande gegevens.')}}
                            <br />
                          {{ __('U kunt onderstaande gegevens naar uw lezer sturen:')}}
                          <br /><br />
                            {{ Session::get('dataU') }}
                            <br />
                            {{ __('Emailadres: ') }}
                            {{ Session::get('dataM') }}
                            <br />
                            {{ Session::get('dataW') }}
                          </div>
                        @endif  
                        @if(Session::has('danger'))
                              <div class="alert alert-danger">
                                {{ Session::get('danger') }}
                              </div>
                      @endif
                      <table class="table table-striped">
                          <thead>
                            <tr>
                              <th colspan="3">{{ __('Uw heeft de volgende mensen toestemming gegeven uw dagboek in te zien: ') }}</th>

                            </tr>
                          </thead>
                          <tbody>

                            @if (!empty($permissions))
                              <!-- Show reader name -->
                              @foreach($permissions as $permission)

                              <tr>
                                  <td><b>{{ __('Naam: ') }}</b></td>
                                  <td>{{ $permission -> user -> firstname }}
                                    @if (!empty( $permission -> user -> middlename ))
                                      {{ $permission -> user -> middlename }}
                                    @endif
                                       {{ $permission -> user -> lastname }}</td>
                                  <td>{{ $permission -> user -> email }}</td>
                                  <td>
                                    <form method="POST" action="/permissions/delete/{{ $permission->user->id }}">                                      {{ csrf_field() }}
                                        <span class="glyphicon glyphicon-trash">
                                        @method('DELETE')
                                        <input type="submit" align="center" class="btnSub" value="Verwijder">
                                      </span>
                                    </form>
                                  </td>
                              </tr>
                              @endforeach
                            @else
                             <tr>
                               <td>U heeft nog geen lezers</td>
                             </tr>
                            @endif
                            </tbody>
                         </table>
                     </div>
                   </div>

                   <br />
                   <div class="card">
                     <!-- form for sadding readers -->
                     	<div class="card-header">
                        @if(Session::has('error'))
                          <div class="alert alert-danger">
                            {{ Session::get('error') }}
                          </div>
                        @endif
                     		<strong>Voeg een nieuwe lezer toe</strong><br />
                        Geef het emailadres op van de persoon die u als lezer wilt toevoegen.
                     	</div>

                     	<div class="card-body">
                     		<form method="POST" action="/permissions/givepermission">
                     			{{ csrf_field() }}
                     		    <div>
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
