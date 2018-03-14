<form method="POST" action="/entries/create_illness">

		{{ csrf_field() }}

	    <div>

			<input type="text" name="illness" placeholder="naam aandoening"> <br />
			<br />
			<input type="submit" align="center" value="submit">

		</div>

</form>