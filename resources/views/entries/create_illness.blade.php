	<!-- Toggles the illness form -->
	<div class="card">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_illness">
		Voeg een nieuw ziektebeeld toe
		<span class="oi oi-chevron-bottom"></span></button>
	<div class="collapse" class="card-body"  id="form_illness">
		<div class="card-header">
		<h4>Nieuw ziektebeeld</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="/entries/create_illness">
			{{ csrf_field() }}
				<div class="input-group mb-3">
					Uw medisch dagboek wordt geordend per ziektebeeld.
					Zo kunt u snel sorteren welke dagboekpagina's u wilt zien, bijvoorbeeld per ziektebeeld 'griep', 'ADHD', of 'hoge bloeddruk'.
					U kunt hier zelf uw ziektebeelden aanmaken.
					<br /><br />
					<input type="text" class="form-control" name="illness" placeholder="naam ziektebeeld" aria-label="naam ziektebeeld" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">Voeg toe</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>
