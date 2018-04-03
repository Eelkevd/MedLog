<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class PermissionsController extends Controller
{

  // Authentication requirement
  public function __construct()
  {
    $this->middleware('auth');
  }

  // Function to go to te medicine page on nav btn click
  public function index()
  {
    $user = Auth::user();
    $permissions = $user->diary->reader()
      ->with('user')
      ->get();

    return view('permissions/index', compact('permissions'));
  }

    // Function to go to the create new medicine page
  	public function create()
  {
  	return view('permissions/givepermission');
  }

  // Function to store the reader persmission into the db
	public function store(Request $request)
	{
		// Check if user is logged in
		if (Auth::check())
		{

			// find the corresponding user
			$user = Auth::user();
			// add the user in the request array
      $request->request->add(['user_id' => $user->id]);
      // add the entry into the tabel entries
			$permission = Reader::create(request([
				'user_id',
				'reader_id',
			]));

			return redirect ('permissions');
    }
  }
}
