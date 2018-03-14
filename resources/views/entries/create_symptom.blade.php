<form method="POST" action="/entries/create_symptom">

	{{ csrf_field() }}

	<div>
		<h3>Symptomen</h3>
		Creëer een nieuw symptoom:
		<br />
		<input type="text" name="symptom" placeholder="naam symptom"> 
		<input type="submit" align="center" value="ok">
	</div>

</form>

