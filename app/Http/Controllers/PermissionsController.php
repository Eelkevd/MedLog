<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Reader;
use App\Role;
use Illuminate\Support\Str;
use App\Mail;
use Illuminate\Support\Facades\Hash;

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
      if($reader = User::where('email', $email)
      ->first())
      {
        $reader_id = $reader->id;
      }
      // handle the emails
      if(!empty($reader_id))
      {
        // check if reader is 'hulpverlener'
        $hulpverlener = $user->roles()->findOrFail($reader_id);
        if(empty($hulpverlener))
        {
          // het emailadres is al in gebruik voor een normale gebruiker
          return redirect ('permissions')
          ->with('error', 'Dit email adres kan niet gebruikt worden. Geeft u a.u.b een ander emailadres op.');
        }
        else
        {
          // send email to invite to log in
          // add the user to the readers table
          $request->request->add([
            'user_id' => $reader_id
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
      }
      elseif(empty($reader_id))
      {
        // reader is new, send invitation to register

        // add a new user with this email adress to the table users
        // add him to to pivettable roles as hulpverlener
        $userName = Str::random(6);
        $wachtwoord = Str::random(8);
        $data = "Gebruikersnaam Lezer= " . $userName . "<br />" . "Wachtwoord Lezer = " . $wachtwoord;

        $reader = User::create([
              'username' => $userName,
              'email' => $email,
              'password' => Hash::make($wachtwoord),
              'verifyToken' => Str::random(40),
          ]);

        $reader_id = $reader->id;
        // Attach th role of the user in the pivot table role_user
        // Attach th role of the user in the pivot table role_user
        $reader->roles()->attach($reader_id, '2');
          // Send an email with a verification link which redirects using the token
        //  $reader->sendVerificationMail();

          return redirect ('permissions')
            ->with('succes', 'Inlog voor lezer aangemaakt en verzonden')
            ->with('data', $data );

        }
    }

  }
}
