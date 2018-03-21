<?php

// Controller of the account section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Traits\Encryptable;
use App\User;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    use Encryptable;
    // Function to go to index page with users id if logged in
    public function index(User $user)
    {
        // Check if the user is logged in
        if (Auth::check())
        {
          $id = Auth::id();
          $user = User::findOrFail($id);
          return view('accounts.index', compact ('user'));
        }
    }

    // Function to show edit page of users data
    public function edit(User $user)
    {
      $id = Auth::id();
      $user = User::findOrFail($id);
      return view('accounts.edit', compact('user'));
    }

    // Function to update the database with the new edit data
    public function update(Request $request)
    {
        $id = Auth::id();

        // Validate new edit data of user
        $request->validate([
            'username' => 'required|string|max:190|unique:users,username,'.$id,
            'firstname' => 'required|string|max:190',
            'middlename' => 'max:190',
            'lastname' => 'required|string|max:190',
            'street' => 'required|string|max:190',
            'housenumber' => 'required|digits_between:1,5',
            'housenumbersuffix' => 'max:10',
            'town' => 'required|string|max:190',
            'postalcode' => 'required|max:6|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/|min:6',
            'email' => 'required|string|email|max:190|confirmed|unique:users,email,'.$id,
        ]);

        // Update new edit data of user in database
        User::where('id', $id)->update([
            'username' => $request['username'],
            'firstname' => encrypt($request['firstname']),
            'middlename' => encrypt($request['middlename']),
            'lastname' => encrypt($request['lastname']),
            'street' => encrypt($request ['street']),
            'housenumber' => encrypt($request ['housenumber']),
            'housenumbersuffix' => encrypt($request ['housenumbersuffix']),
            'town' => encrypt($request ['town']),
            'postalcode' => encrypt($request ['postalcode']),
            'email' => $request['email'],
        ]);

        $user = User::findOrFail($id);
        return view('accounts.index', compact('user'));

    }

}
