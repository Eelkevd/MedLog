@extends ('layouts.master')

@section('content')

<div class="card">
	<div class="card-header">
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
				<input type="submit" align="center" class="btnSub" value="save">
			</div>
		</form>
	</div>
</div>
