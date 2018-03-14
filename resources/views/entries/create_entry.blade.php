@extends ('layouts.master')

    	@include ('entries.create_illness')

    	of 
		<select>
			@foreach($illnesses as $illness)
				<option value="{{ $illness->id }}">{{ $illness->illness }}</option>
			@endforeach()
		</select>

		@include ('entries.create_symptom')

		<p>
			Selecteer uw bijbehorende symptomen:
		</p>

		@foreach($symptomes as $symptom)

		     <input type="checkbox" name="subscribe[]" value="{{ $symptom->id }}">
			 <label for="subscribeNews">{{ $symptom->symptom }}</label>

		@endforeach()

