@extends ('layouts.master')

@section('content')

	<!-- form for submitting medical entry page -->

	<div class="card">
		<div class="card-header">
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
@endsection
