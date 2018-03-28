@extends ('layouts.master')

@section('content')

	<!-- form for submitting medical entry page -->

    @include ('entries.create_medicine')
    <br>
    @include ('entries.create_aid')
    <br>
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
					<select name="illness_id" class="medform-control{{ $errors->has('illness_id') ? ' is-invalid' : '' }}" required>
							<option selected></option>
						@foreach($illnesses as $illness)
							<option value="{{ $illness->id }}">{{ $illness->illness }}</option>
						@endforeach()
					</select>
<!-- 					@if ($errors->has('illness_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('illness_id') }}</strong>
                        </span>
                 	@endif -->
<!-- 					@include('layouts.error')	 -->
				</div>
				<hr>
				<div>
					<p>Symptomen:</p>
					<!-- places all symptomes from db -->
					@foreach($symptomes as $symptom)
						<input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
						<label for="subscribeNews">{{ $symptom->symptom }}</label>
					@endforeach()
				</div>