<!-- form for submitting new illnesses -->

<div class="card">
	
	<div class="card-header">
		<h4>Nieuw onderwerp van aandoening</h4>
	</div>

	<button type="button" data-toggle="collapse" data-target="#form_illness">Nieuw</button>
	<div class="collapse" class="card-body"  id="form_illness">
		<form method="POST" action="/entries/create_illness">
			{{ csrf_field() }}
		    <div>
				<p>
				Maak hier een nieuw (aandoening) onderwerp aan voor uw medisch dagboek. Bijvoorbeeld: gebroken been, migraine, malaria.
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