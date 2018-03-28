<!-- form for submitting new medicines -->

<div class="card">
	<div class="card-header">
		<h4>Nieuw onderwerp van aandoening</h4>
	</div>

	<div class="card-body">
		<form method="POST" action="/entries/create_illness">
			{{ csrf_field() }}
		    <div>
				<p>
				Voeg hier uw nieuwe medicatie toe.
				</p>
				<p>
				Heeft u al een onderwerp in gedachten? Ga dan verder naar het volgende onderwerp.
				</p>
				<input type="text" name="illness" placeholder="naam aandoening">
				<input type="submit" align="center" class="btnSub" value="ok">
			</div>
		</form>
	</div>
</div>