@extends ('layouts.master')


    	
<!--     	<form>
    		
    		<input type="text" name="illness">
    		<input type="text" name="symptom">
    		<input type="submit" name="submit">

    	</form> -->

	<form method="POST" action="/entry/create_illness">

			{{ csrf_field() }}

		    <div>

				<input type="text" name="illness" placeholder="naam aandoening"> <br />
				<br />
				<input type="submit" align="center" value="submit">

			</div>

	</form>

	<form method="POST" action="/entry/create_symptom">

			{{ csrf_field() }}

		    <div>

				<input type="text" name="symptom" placeholder="naam symptom"> <br />
				<br />
				<input type="submit" align="center" value="submit">

			</div>

	</form>