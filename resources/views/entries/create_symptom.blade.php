<!-- form for submitting new symptom -->
<div class="card">
	<!-- Toggles the symptom form -->
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_symptom">
		Voeg een nieuw symptoom toe
		<span class="oi oi-chevron-bottom"></span>
	</button>
	<div class="collapse" class="card-body"  id="form_symptom">
		<div class="card-header">
			<h4>Nieuwe symptomen</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="/entries/create_symptom">
				{{ csrf_field() }}
				<div class="input-group mb-3">
					Per ziektebeeld kunt u diverse symptomen toevoegen.
					Heeft u bijvoorbeeld griep gehad? Dan zult u waarschijnlijk de symptomen 'koorts', 'verstopte neus' en 'moe' aanmaken.
					<br />
					<input type="text" class="form-control" name="symptom" placeholder="naam symptoom"  aria-label="naam symtoom" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">Voeg toe</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
