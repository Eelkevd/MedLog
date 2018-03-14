<form method="POST" action="/entries/create_illness">

		{{ csrf_field() }}

	    <div>
	    	<h3>Onderwerp ziekte/aandoening</h3>
			Creëer een nieuw onderwerp:
			<br />
			<input type="text" name="illness" placeholder="naam aandoening">
			<input type="submit" align="center" value="ok">
		</div>

</form>