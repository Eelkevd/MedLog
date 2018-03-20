@if (count($errors))

	<div class="errorForm">

		<div class="alert">

			<ul>

				@foreach ($errors->all() as $error)

				<li> {{$error}} </li>

				@endforeach

			</ul>

		</div>

	</div>

@endif