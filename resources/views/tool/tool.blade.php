@extends ('layouts.master')

@section('content')

	<!-- form for submitting medical entry page -->
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
								<div class="card-header">
									<h5><center>Hulpmiddelen</center></h5>
								</div>
							</div>

							<div class="card">
								<div class="card-body">
									<a href="/tool/create_tool" class="btn btn-info btn-md" style="width:200px;">Nieuw hulpmiddel</a>
								</div>
							</div>
						    <br>
							<div class="card">
								<div class="card-header">
									<h5>Uw hulpmiddellen</h5>
								</div>
								<div class="card-body">
									<!-- places all tools from db -->
									@foreach($tools as $tool)
										<a href="{{ route('tool.show', $tool->id) }}">{{ $tool -> tool }}</a>
										<hr>
									@endforeach()
								</div>
							</div>
							<br />
							@endif
							@endauth
						</div>
						</div>
					</div>
				</div>
			</div>

@endsection
