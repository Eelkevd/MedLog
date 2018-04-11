<!-- Controller of the medicine section -->

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medicine;
use App\Diary;

class MedicineController extends Controller
{
	/**
     * authentication requirement
     *
     * @return  void
     */
	public function __construct()
	{
      $this->middleware('auth');
  	}

  	/**
  	 * Function to go to te medicine page on nav btn click
  	 * 
  	 * @return view
  	 */
	public function home()
	{
		$user = Auth::user();
		$medicines = $user->diary->medicines()->paginate(5);
		return view('medicine/medicine', compact('medicines'));
	}

	/**
	 * Function to delete a medicine
	 * 
	 * @param  int
	 * @return redirect
	 */
	public function delete($id)
	{
		if (Auth::check())
		{
			Medicine::where('id', $id)->update(['deleted' => 'removed']);
		}
		return redirect()->action('MedicineController@home');
	}

	/**
	 * Function to go to the create new medicine page
	 * 
	 * @return view
	 */
	public function create()
	{
		return view('medicine/create_medicine');
	}

	/**
	 * Function to store newly created medicine into the db
	 * 
	 * @param  Request
	 * @return redirect
	 */
	public function store(Request $request)
	{
		// Check if user is logged in
		if (Auth::check())
		{
			// find the corresponding diary
			$user = Auth::user();

			// add the diary_id to the request array
			$request->request->add(['diary_id' => $user->diary->id]);

			// add the entry into the tabel entries
			$medicine = Medicine::create(request([
				'medicine',
				'dose',
				'purpose',
				'side_effect',
				'expire_date',
				'price',
				'comment'
			]));
			$medicine->diaries()->attach($request->diary_id);
			return redirect ('medicine');
		}
	}

	/**
	 * Function to show selected medicine
	 * 
	 * @param  int
	 * @return [type]
	 */
	public function show($id)
	{
		$medicine= Medicine::findOrFail($id);
    	return view('medicine.show_medicine', compact('medicine'));
	}

	/**
	 * returns the selected medicine view you want to edit
	 * 
	 * @param  int
	 * @return view
	 */
	public function editmedicine($id)
	{
		$medicine= Medicine::findOrFail($id);
		return view('medicine.edit_medicine', compact( 'medicine', 'id'));
	}

	/**
	 * updates the medicine in the db
	 * 
	 * @param  Request
	 * @return redirect
	 */
	public function store_update (Request $request)
	{
		// Check if the user is logged in
		if (Auth::check())
		{
			// find the corresponding diary
			$id = $request->id;
			$medicine = Medicine::findOrFail($id);
			$medicinenumber = $medicine->id;
			$updated_medicine = Medicine::where('id', $id)->update(request([
				'medicine', 
				'dose', 
				'purpose',
				'side_effect',
				'price', 
				'comment'
			]));
		}
		return redirect()->action('MedicineController@home');
	}
}
