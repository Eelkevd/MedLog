<!-- Page for creating new medicines -->

@extends ('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

		<h4>Nieuwe Medicatie</h4>
	</div>

	<div class="card-body">
		<form method="POST" action="/medicine/create_medicine">
			{{ csrf_field() }}
		    <div>
				<p>
				Voeg hier uw nieuwe medicatie toe.
				</p>
				<input type="text" name="medicine" placeholder="naam medicijn" required>
			</div>
			<hr>
			<div>
				<p>Dosering:</p>
				<textarea name="dose" placeholder="Dosering"></textarea>
			</div>
			<hr>
			<div>
				<p>Doel:</p>
				<textarea name="purpose" placeholder="Doel"></textarea>
			</div>
			<hr>
			<div>
				<p>Mogelijke bijwerkingen:</p>
				<textarea name="side_effects" placeholder="Vul hier de mogelijke bijwerkingen in"></textarea>
			</div>
			<hr>
			<div>
				<p>Houdbaarheidsdatum:</p>
				<p>Tot wanneer is het medicijn houdbaar?</p>
				<input type="date" name="expire_date">
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
				<input type="submit" align="center"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
			</div>
		</form>
	</div>
</div>
@endif
@endauth
@endsection
