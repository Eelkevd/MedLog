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
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_tool">
                  Voeg een nieuw hulpmiddel toe
                  <span class="oi oi-chevron-bottom"></span>
                </button>
                <div class="collapse" class="card-body"  id="form_tool">
              		<div class="card-header">
										<h4>Nieuw hulpmiddel</h4>
									</div>
<br>
									<div class="card-body">
										<form method="POST" action="/tool/create_tool">
											{{ csrf_field() }}

												<div class="input-group mb-3">
													<label>Naam van het hulpmiddel</label>
													<br />
													<input type="text" name="tool" class="form-control" placeholder="Hoe heet het hulpmiddel?" required>
												</div>
											<hr>
											<div class="input-group mb-3">
												<label>Doel van het hulpmiddel <em><small>(optioneel)</small></em></label>
												<textarea name="purpose" placeholder="Waar gebruikt u het voor?"></textarea>
											</div>
											<hr>
											<div class="input-group mb-3">
												<label>Leverancier <em><small>(optioneel)</small></em></label>
												<textarea name="origin" placeholder="Waar komt het vandaan?"></textarea>
											</div>
											<hr>
											<div class="input-group mb-3">
												<label>Lever of onderhoudsdatum <em><small>(optioneel)</small></em></label>
												<br>
												<input type="date" name="return_date">
											</div>
											<hr>
											<div class="input-group mb-3">
												<label>Prijs <em><small>(optioneel)</small></em></label>
												€  <input type="number" name="price" step=".01">
											</div>
											<hr>
											<div class="input-group mb-3">
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
									<h5>Uw huidige hulpmiddellen</h5>
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
