@extends ('layouts.master')

@section('content')

	@include ('medicine.create_medicine')

	<div class="card">
		<div class="card-header">
			<h4>Medisch Dagboek</h4> <p>Velden met een sterretje (*) zijn verplicht</p>
		</div>

		<div class="card-body">
			<form method="POST" action="/entries/create_entry">
				{{ csrf_field() }} 
				<!-- places all illnesses from db -->
				<div>
					<h5>Aandoening: *</h5>

				</div>
				<hr>		
			</form>
		</div>
	</div>
@endsection