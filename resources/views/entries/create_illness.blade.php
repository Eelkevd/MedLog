
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
						<p>Uw medisch dagboek wordt geordend per ziektebeeld, bijvoorbeeld 'griep', 'ADHD', of 'hoge bloeddruk'.
						Voeg uw eigen ziektebeelden toe.
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

<!-- Toggle version -->
<!-- 	<div class="card">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_illness">Nieuw ziektebeeld</button>
>>>>>>> feature/pop-up-feature
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
					<br /><br />
					<input type="text" class="form-control" name="illness" placeholder="naam ziektebeeld" aria-label="naam ziektebeeld" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<button type="submit" class="btn btn-primary">Voeg toe</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</div> -->
