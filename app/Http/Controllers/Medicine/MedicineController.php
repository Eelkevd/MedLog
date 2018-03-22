<?php

namespace App\Http\Controllers\Medicine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    // function to redirect to the medicine homepage
    public function home()
    {
    	return view ('medicine/medicine_home');
    }

    // function to store new medication into the database
    public function store(Request $request)
    {
    	$request['user_id'] = Auth::id();
		// dd($request);
		$request->validate([
            'medicine'  => 'required',
        ]);
		$illness = Medicine::create(request(['user_id', 'medicine']));

    	return redirect ('medicine/medicine_home');
    }
}
