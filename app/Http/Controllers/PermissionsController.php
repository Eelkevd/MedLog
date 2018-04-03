<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Reader;

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
      $diary = $user->diary->id;
      // check if the emailadres already excists in users
      $email = $request->email_reader;
      // make the request array
      $request->request->add([
        'timeframe' => 24,
        'diary_id' => $diary,
        'email' => $email,
        'password' => 'password'
      ]);

      // check if the reader already excists
      $reader = User::where('email', $email)
      ->firstOrFail();
      $reader_id = $reader->id;
      // handle the emails
      if(!empty($reader_id))
      {
        // check if reader is 'hulpverlener'
        // if so : send email to invite to log in
        // if not : give error , ask for different emailadres

        $request->request->add([
          'user_id' => $reader_id,
        ]);
        // add the entry into the tabel READERS entries
        $permission = Reader::create(request([
          'user_id',
          'timeframe',
          'diary_id',
          'email',
          'password'
        ]));

        return redirect ('permissions')
        ->with('succes', 'Nieuwe lezer toegevoegd');

      }
      else
      {
        // reader is new, send invitation to register

        // add a new user with this email adress to the table users
        // add him to to pivettable roles as hulpverlener
        $userName = Str::random(6);
        $wachtwoord = Str::random(8);

        $user = User::create([
              'username' => $userName,
              'email' => $email,
              'password' => Hash::make($wachtwoord),
              'verifyToken' => Str::random(40),
          ]);
          // Attach th role of the user in the pivot table role_user
          $user->roles()->attach($data['role']);
          // Send an email with a verification link which redirects using the token
          $user->sendVerificationMail();
          return $user;


        return redirect ('/')
        ->with('succes', 'Inlog voor lezer aangemaakt en verzonden');

      }

  }
}
}
