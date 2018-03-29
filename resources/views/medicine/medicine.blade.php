@extends ('layouts.master')

@section('content')

	<!-- form for submitting medical entry page -->

	<div class="card">
		<div class="card-header">
			<h4>Medicijnen</h4>
		</div>

		<div class="card-body">
			<p>Beheer hier uw medicijnen.</p>
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
			<select name="medicine" class="medform-control{{ $errors->has('medicine') ? ' is-invalid' : '' }}" required>
					<option selected></option>
				@foreach($medicines as $medicine)
					<option value="{{ $medicine->id }}">{{ $medicine->medicine }}</option>
				@endforeach()
			</select>
		</div>
	</div>

