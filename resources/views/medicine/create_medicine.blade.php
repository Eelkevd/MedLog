<!-- form for submitting new illnesses -->

<div class="card">
	<div class="card-header">
		<h4>Nieuwe medicatie</h4>
	</div>

	<div class="card-body">
		<form method="POST" action="/medicine/create_medicine">
			{{ csrf_field() }}
		    <div>
				<p>
				Maak hier een nieuw (aandoening) onderwerp aan voor uw medisch dagboek. Bijvoorbeeld: gebroken been, migraine, malaria.
				</p>
				<p>
				Heeft u al een onderwerp in gedachten? Ga dan verder naar het volgende onderwerp.
				</p>
				<input type="text" name="medicine" placeholder="naam aandoening">
				<input type="submit" align="center" class="btnSub" value="ok">
			</div>
		</form>
	</div>
</div>