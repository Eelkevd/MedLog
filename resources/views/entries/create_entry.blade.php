@extends ('layouts.master')

    	@include ('entries.create_illness')

		@include ('entries.create_symptom')

		@foreach($symptomes as $symptom)

		     <input type="checkbox" name="subscribe[]" value="{{ $symptom->id }}">
			 <label for="subscribeNews">{{ $symptom->symptom }}</label>

		@endforeach()

