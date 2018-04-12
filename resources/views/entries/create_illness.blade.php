<!-- illness form -->
<!-- Pop-up version -->
<div class="panel-body">
	<!-- <a  data-toggle="modal" data-target="#illness_pop">Nieuw ziektebeeld</a> -->
	<div class="modal fade" id="illness_pop" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal">&times</button> -->
					<h4 class="modal-title">Nieuw ziektebeeld</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="/entries/create_illness" id="form_illness">
						{{ csrf_field() }}
						<div>
							<p>Uw medisch dagboek wordt geordend per ziektebeeld, bijvoorbeeld 'griep', 'ADHD' of 'epilepsie'.
								Voeg uw eigen ziektebeeld toe.
							</p>
							<input type="text" class="form-control" name="illness" placeholder="naam ziektebeeld">
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