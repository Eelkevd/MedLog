<?php

namespace App\Http\Controllers;
// Controller of the permission section

use Auth;
use App\User;
use App\Reader;
use App\Role;
use Illuminate\Support\Str;
use App\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    /**
     * @return void
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
    public function index()
    {
        $user = Auth::user();
        $permissions = $user->diary->reader()
          ->with('user')
          ->get();

        return view('permissions/index', compact('permissions'));
    }

    /**
     * Function to go to the create new medicine page
     *
     * @return view
     */
    public function create()
    {
    	return view('permissions/givepermission');
    }

    /**
     * Function to go to the create new medicine page
     *
     * @param  int
     * @return redirect
     */
    public function delete($id)
    {
        $diary = Auth::user()->diary()->first();
        $reader = Reader::where('user_id', $id)->get();
        $selectedReader = $reader
            ->where('diary_id', $diary->id)
            ->first();
        // delete from Readers tabble but not from the User tabel
        $selectedReader->delete();

        return redirect('permissions/')
            ->with('danger', 'Lezer verwijderd');
    }

    /**
     * Function to store the reader persmission into the db
     *
     * @param  Request
     * @return redirect
     */
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
            if($reader = User::where('email', $email)->first())
            {
                $reader_id = $reader->id;
            }
            // handle the emails
            if(!empty($reader_id))
            {
            // the reader is already a user
            // check if reader is 'hulpverlener'
                $reader = User::where('email', $email)->first();
                $reader_id = $reader->id;
                $role = DB::table('roles')
                    ->select('roles.*')
                    ->join('role_user', 'roles.id', '=', 'role_user.role_id')
                    ->where('role_user.user_id', $reader_id)
                    ->first();
                if($role->slug == 'gebruiker')
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
                    // add the entry into the tabel READERS
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
                // add a new user with this email adress to the table users
                $userName = Str::random(6);
                $wachtwoord = Str::random(8);
                $dataUsername = "Gebruikersnaam = " . $userName;
                $dataPassword = "Wachtwoord = " . $wachtwoord;

                $reader = User::create([
                      'username' => $userName,
                      'firstname' => '..',
                      'lastname' => '..',
                      'email' => $email,
                      'password' => Hash::make($wachtwoord),
                      'verifyToken' => Str::random(40),
                ]);
                // get the new id of this user
                $reader_id = $reader->id;
                // Attach the role of the user in the pivot table role_user
                $reader->roles()->attach('1');
                // add the new user_id to the request array
                $request->request->add([
                    'user_id' => $reader_id
                ]);
                // add the reader into the tabel READERS
                $permission = Reader::create(request([
                    'user_id',
                    'timeframe',
                    'diary_id',
                    'email',
                    'password'
                ]));

                //generate a password for the new users
                User::sendWelcomeEmail($reader);

                return redirect ('permissions')
                    ->with('succes', 'Inlog voor lezer aangemaakt en verzonden')
                    ->with('dataM', $email)
                    ->with('dataU', $dataUsername )
                    ->with('dataW', $dataPassword);
            }
        }
    }
}
