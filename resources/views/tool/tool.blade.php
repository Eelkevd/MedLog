@extends ('layouts.master')

@section('content')

	<!-- form for submitting medical entry page -->

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

			<h4>Hulpmiddelen</h4>
		</div>
	</div>
	<br>
	<div class="card">
		<div class="card-header">
			<h5>Nieuwe hulpmiddelen toevoegen</h5>
		</div>

		<div class="card-body">
			<p>Voeg nieuwe hulpmiddelen toe</p>
			<a href="/tool/create_tool">Nieuw</a>
		</div>
	</div>
    <br>
	<div class="card">
		<div class="card-header">
			<h5>Hulpmiddel</h5>
		</div>

		<div class="card-body">
			<!-- places all tools from db -->
			<p>Klik op een hulpmiddel om de gegevens te bekijken</p>
			@foreach($tools as $tool)
				<a href="{{ route('tool.show', $tool->id) }}">{{ $tool -> tool }}</a>
				<hr>
			@endforeach()
		</div>
	</div>
	@endif
	@endauth
@endsection
