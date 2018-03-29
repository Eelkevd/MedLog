<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Diary;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Str;
use App\Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => 'required',
            'username' => 'required|string|unique:users|max:35',
            'firstname' => 'required|string|max:35',
            'middlename' => 'max:35',
            'lastname' => 'required|string|max:35',
            'street' => 'required|string|max:35',
            'housenumber' => 'required|digits_between:1,5',
            'housenumbersuffix' => 'max:10',
            'town' => 'required|string|max:35',
            'postalcode' => 'required|max:6|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/|min:6',
            'email' => 'required|string|email|max:35|unique:users|confirmed',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     * fill the token field in users to signify unverificated user
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user = User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'street' => $data ['street'],
            'housenumber' => $data ['housenumber'],
            'housenumbersuffix' => $data ['housenumbersuffix'],
            'town' => $data ['town'],
            'postalcode' => $data ['postalcode'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verifyToken' => Str::random(40),
        ]);
        // Attach th role of the user in the pivot table role_user
        $user->roles()->attach($data['role']);
        // Send an email with a verification link which redirects using the token
        $user->sendVerificationMail();
        return $user;
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    // add a role to the registration view in order to show the option to register as a reader
    public function showRegistrationForm()
    {
      // checked, returns names of roles
      $roles=\App\Role::orderBy('name')->pluck('name', 'id');
      return view('auth.login', compact('roles'));
    }
}
