@extends ('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
	<!-- form for submitting medical entry page -->
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
              <div class="card">
                <div class="card-header">
            			<h5><center>Medicijnen</center></h5>
            		</div>
            	</div>

            	<div class="card">
            		<div class="card-body">
            			<a href="/medicine/create_medicine" class="btn btn-info btn-md" style="width:200px;">Nieuw medicijn</a>
            		</div>
            	</div>
                <br>
            	<div class="card">
            		<div class="card-header">
            			<h5>Uw medicatie</h5>
            		</div>

            		<div class="card-body">
            			<!-- places all medicines from db -->
            			@foreach($medicines as $medicine)
            				<a href="{{ route('medicine.show', $medicine->id) }}">{{ $medicine -> medicine }}</a>
            				<hr>
            			@endforeach()
            		</div>
            	</div>
            	<br />
            	@endif
            	@endauth
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
