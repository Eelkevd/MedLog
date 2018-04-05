@extends ('layouts.master')

@section('content')

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

		<h4>Nieuwe hulpmiddelen</h4>
	</div>

	<div class="card-body">
		<form method="POST" action="/tool/create_tool">
			{{ csrf_field() }}
		    <div>
				<p>
				Voeg hier uw nieuwe hulpmiddel toe.
				</p>
				<input type="text" name="tool" placeholder="naam hulpmiddel" required>
			</div>
			<hr>
			<div>
				<p>Doel:</p>
				<textarea name="purpose" placeholder="Doel"></textarea>
			</div>
			<hr>
			<div>
				<p>Herkomst:</p>
				<textarea name="origin" placeholder="Waar komt het vandaan"></textarea>
			</div>
			<hr>
			<div>
				<p>Inleverdatum:</p>
				<p>Wanneer moet het ingeleverd worden?</p>
				<input type="date" name="return_date">
			</div>
			<hr>
			<div>
				<p>Prijs:</p>
				€<input type="number" name="price" step=".01">
			</div>
			<hr>
			<div>
				<p>Overige opmerkingen:</p>
				<textarea name="comment"></textarea>
			</div>
			<hr>
			<div>
				<input type="submit" align="center" class="btnSub" value="save">
			</div>
		</form>
	</div>
</div>
@endif
@endauth
@endsection
