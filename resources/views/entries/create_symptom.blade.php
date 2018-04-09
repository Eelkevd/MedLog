<!-- form for submitting new symptom -->

	<!-- Pop-up version -->
<div class="panel-body">
	<!-- <a  data-toggle="modal" data-target="#illness_pop">Nieuw ziektebeeld</a> -->
<div class="modal fade" id="symptom_pop" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Nieuw symptoom</h4>
			</div>
			<div class="modal-body">

			<form method="POST" action="/entries/create_symptom">
				{{ csrf_field() }}
				<div>
					<p>
						Maak hier symptomen aan voor uw medisch dagboek.
						Als u als ziektebeeld cholesterol heeft, zult u bijvoorbeeld de symptomen
'hoge bloeddruk', 'ademhalingsproblemen', en 'darmkklachten' willen aanmaken.
					</p>
					<input type="text" class="form-control" name="symptom" placeholder="naam symptoom">
					<input type="submit" align="center" class="btn btn-primary" value="Voeg toe">
				</div>
			</form>

			</div>
			<div class="modal-footer">
				<button type="button"  data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Toggle version -->
<!-- <div class="card"> -->
	<!-- Toggles the symptom form -->
<!-- 	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_symptom">Nieuw symptoom</button>
>>>>>>> feature/pop-up-feature
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
</div> -->
