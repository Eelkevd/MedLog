<div class="panel-body">
	<div class="modal fade" id="medicine_pop" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Nieuwe medicatie</h4>
				</div>
				<div class="modal-body">
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
							<textarea name="side_effect" placeholder="Vul hier de mogelijke bijwerkingen in"></textarea>
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
							<input type="submit" align="center"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
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