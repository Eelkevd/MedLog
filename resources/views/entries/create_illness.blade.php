	<!-- Toggles the illness form -->
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_illness">Nieuw ziektebeeld</button>
	<div class="collapse" class="card-body"  id="form_illness">
		<div class="card-header">
			<h4>Nieuw onderwerp van aandoening</h4>
		</div>
		<div class="card-body">
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
