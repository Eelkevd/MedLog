<!-- Page for creating new tools -->
@extends ('layouts.master')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<!-- check to see if user of page is guest, reader, user or validated user.
					Only let validated user throug -->
					@guest
					<!-- Show not logged in screen -->
					<div class="col-md-6">
						<label >{{ __('Please log in to see your account data.') }}</label>
					</div>
					@endguest
					@auth
					@if (!(auth()->user()->verified()))
					<div class="card-body">
						<div class="alert alert-danger">
							<br /><strong>
							Je dagboek is nog niet geactiveerd. Bekijk je email om je dagboek te activeren.
							</strong>
						</div>
					</div>
					@elseif (!(auth()->user()->diary()))
					<div class="card-body">
						<div class="alert alert-danger">
							<br /><strong>
							U heeft geen dagboek. Registreer als Gebruiker om een dagboek aan te maken.
							</strong>
						</div>
					</div>
					@else
					<h4>Wijzig uw hulpmiddel</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="/tool/{id}/edit_tool">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $tool->id }}">
						<div>
							<label>Naam van uw hulpmiddel</label>
							<input type="text" class="form-control" name="tool" value="{{ $tool->tool }}" required>
						</div>
						<hr>
						<div>
							<label>Doel <em><small>(optioneel)</small></em></label>
							<textarea name="purpose" >{{ $tool->purpose }}</textarea>
						</div>
						<hr>
						<div>
							<label>Leverancier <em><small>(optioneel)</small></em></label>
							<textarea name="origin" >{{ $tool->origin }}</textarea>
						</div>
						<hr>
						<div>
							<label>Lever- of vervangingsdatum <em><small>(optioneel)</small></em></label>
							<input type="date" value="{{ $tool->return_date }}" name="return_date">
						</div>
						<hr>
						<div>
							<label>Prijs <em><small>(optioneel)</small></em></label>
							€  <input type="number" value="{{ $tool->price }}" name="price" step=".01">
						</div>
						<hr>
						<div>
							<label>Vrije ruimte <em><small>(optioneel)</small></em></label>
							<textarea name="comment">{{ $tool->comment }}</textarea>
						</div>
						<hr>
						<div>
							<input type="submit" align="center"  class="btn btn-info btn-md" style="width:200px;" value="Opslaan">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endauth
@endsection