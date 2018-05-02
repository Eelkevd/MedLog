<!-- illness remove form -->
<!-- Pop-up version -->
<div class="panel-body">
	<!-- <a  data-toggle="modal" data-target="#illness_pop">verwijder ziektebeeld uit lijst</a> -->
	<div class="modal fade" id="illness_remove_pop" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <button type="button" class="close" data-dismiss="modal">&times</button> -->
					<h4 class="modal-title">Nieuw ziektebeeld</h4>
				</div>
				<div class="modal-body">
					<form method="POST" action="/entries/delete_illness" id="form_illness">
						{{ csrf_field() }}
						<div>
							<p> Verwijder een eerder toegevoegd ziektebeeld uit uw kieslijst van ziektebeelden
							</p>
                            <div class="card-body nopadding">
                                @if (!$illnesses->isEmpty())
                                <select class="custom-select custom-select-lg mb-3 form-control{{ $errors->has('illness') ? ' is-invalid' : '' }}" name="illness" required>
                                    <option selected></option>
                                    @foreach($illnesses as $illness)
                                    <option value="{{ $illness->illness }}">{{ $illness->illness }}</option>
                                    @endforeach()
                                </select>
                                @else
                                <hr>
                                <small><em>U heeft nog geen ziektebeeld aangemaakt.</em></small>
                                @endif
                            </div>
							<input type="submit" align="center" class="btn btn-primary" value="Verwijder">
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
