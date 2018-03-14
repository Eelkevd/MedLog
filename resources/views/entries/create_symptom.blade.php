<form method="POST" action="/entries/create_symptom">

	{{ csrf_field() }}

	<div>

		<input type="text" name="symptom" placeholder="naam symptom"> <br />
		<br />
		<input type="submit" align="center" value="submit">

	</div>

</form>

