<?php

namespace App\Http\Controllers;
// Controller of the account section 

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
    /**
     * authentication requirement
     *
     * @return  void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    use Encryptable;

    /**
     * Function to go to index page with users id if logged in
     *
     * @param  string
     * @return view
     */
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

    /**
     * Function to show edit page of users data
     *
     * @param  string
     * @return view
     */
    public function edit(User $user)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        return view('accounts.edit', compact('user'));
    }

    /**
     * Function to update the database with the new edit data
     *
     * @param  Request
     * @return view
     */
    public function update(Request $request)
    {
        $id = Auth::id();

        // Validate new edit data of user
        $request->validate([
            'email' => 'required|string|max:190|unique:users,email,'.$id,
            // 'middlename' => 'max:190',
            // 'email' => 'required|string|email|max:190|confirmed|unique:users,email,'.$id,
        ]);

        // Update new edit data of user in database
        User::where('id', $id)->update([
            // 'firstname' => encrypt($request['firstname']),
            // 'middlename' => encrypt($request['middlename']),
            // 'lastname' => encrypt($request['lastname']),
            'email' => $request['email'],
        ]);

        $user = User::findOrFail($id);
        return view('accounts.index', compact('user'));
    }
}
