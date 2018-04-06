	<!-- Toggles the illness form -->
	<div class="card">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#form_illness">Nieuw ziektebeeld</button>
	<div class="collapse" class="card-body"  id="form_illness">
		<div class="card-header">
			<h4>Nieuw onderwerp van aandoening</h4>
		</div>
		<div class="card-body">
			<form method="POST" action="/entries/create_illness">
			{{ csrf_field() }}
			    <div>
					<p>
					Maak hier een nieuw (aandoening) onderwerp aan voor uw medisch dagboek. Bijvoorbeeld: gebroken been, migraine, malaria.
					</p>
					<p>
					Heeft u al een onderwerp in gedachten? Ga dan verder naar het volgende onderwerp.
					</p>
					<input type="text" name="illness" placeholder="naam aandoening">
					<input type="submit" align="center" class="btnSub" value="ok">
				</div>
			</form>
		</div>
	</div>
</div>

<div id="scrollable-dropdown-menu">
  <input class="typeahead" type="text" placeholder="ziektebeeld">
</div>


<script type="text/javascript">

$(document).ready(function(){
    // Constructs the suggestion engine
    var countries = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // The url points to a json file that contains an array of country names
        prefetch: 'data/ziektebeelden.json'
    });

    // Initializing the typeahead with remote dataset without highlighting
    $('#scrollable-dropdown-menu .typeahead').typeahead(null, {
        name: 'countries',
        source: countries,
        limit: 10 /* Specify max number of suggestions to be displayed */
    });
});

</script>
