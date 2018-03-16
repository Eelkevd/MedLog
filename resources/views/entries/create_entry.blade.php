@extends ('layouts.master')



@section('content')

    	@include ('entries.create_illness')

    	@include ('entries.create_symptom')


	<h2>MedLogger formulier</h2>
	<form method="POST" action="/entries/create_entry">

		{{ csrf_field() }}

			Ziekte:
			<select name="illness_id">
				@foreach($illnesses as $illness)
					<option value="{{ $illness->id }}">{{ $illness->illness }}</option>
				@endforeach()
			</select>

			<p>Selecteer uw bijbehorende symptomen:</p>

			@foreach($symptomes as $symptom)

			     <input type="checkbox" name="symptom[]" value="{{ $symptom->id }}" enctype="multipart/form-data">
				 <label for="subscribeNews">{{ $symptom->symptom }}</label>

			@endforeach()

		<input type="submit" value="submit">
	</form>

@endsection

