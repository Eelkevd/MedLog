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

						  @elseif (auth()->user()->roles('hulpverlener'))
						  <div class="card-body">
						          <div class="alert alert-danger">
						            <br /><strong>
						              U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
						                  </strong>
						          </div>
						  </div>

						  @else

			<h4>Medicijnen</h4>
		</div>
	</div>
	<br>
	<div class="card">
		<div class="card-header">
			<h5>Nieuwe medicatie toevoegen</h5>
		</div>

		<div class="card-body">
			<p>Voeg nieuwe medicatie toe</p>
			<a href="/medicine/create_medicine">Nieuw</a>
		</div>
	</div>
    <br>
	<div class="card">
		<div class="card-header">
			<h5>Medicatie</h5>
		</div>

		<div class="card-body">
			<!-- places all medicines from db -->
			<p>Klik op een medicijn om de gegevens te bekijken</p>
			@foreach($medicines as $medicine)
				<a href="{{ route('medicine.show', $medicine->id) }}">{{ $medicine -> medicine }}</a>
				<hr>
			@endforeach()
		</div>
	</div>
	@endif
	@endauth
@endsection
