<!-- Pop-up version -->
<div class="panel-body">
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
								'hoge bloeddruk', 'ademhalingsproblemen' en 'darmklachten' willen aanmaken.
							</p>
							<input type="text" class="form-control" name="symptom" placeholder="naam symptoom">
							<input type="submit" align="center" class="btn btn-primary" value="Voeg toe">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button"  data-dismiss="modal">Terug</button>
				</div>
			</div>
		</div>
	</div>
</div>
