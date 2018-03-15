<?php

// Controller of the account section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AccountController extends Controller
{
    public function index(User $user)
    {
        $userid = Auth::id();
		$users = DB::table('users')->where ('id', $userid)->get();
        return view('accounts.index', compact('users'));
    }  
    
    public function show(User $user)
	{
        $userid = Auth::id();
		$users = DB::table('users')->where ('id', $userid)->get();
		return view('accounts.account', compact('users'));
	}
    
    public function edit(User $user)
    {
        $userid = Auth::id();
		$users = DB::table('users')->where ('id', $userid)->get();
        return view('accounts.edit', compact('users'));
    }  
    
    public function update(Request $request)
    {
        $userid = Auth::id();
        
        $request->validate([
            'username' => 'required|string|max:190|unique:users,username,'.$userid,
            'firstname' => 'required|string|max:190',
            'middlename' => 'max:190',
            'lastname' => 'required|string|max:190',
            'bsn' => 'required|digits_between:8,9|unique:users,bsn,'.$userid,
            'street' => 'required|string|max:190',
            'housenumber' => 'required|digits_between:1,5',
            'housenumbersuffix' => 'max:10',
            'town' => 'required|string|max:190',
            'postalcode' => 'required|max:6|regex:/^[1-9][0-9]{3}[\s]?[A-Za-z]{2}$/|min:6',
            'email' => 'required|string|email|max:190|confirmed|unique:users,email,'.$userid,
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%@]).*$/|confirmed',
        ]);
          
        User::where('id', $userid)->update([
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'bsn' => $request['bsn'],
            'street' => $request ['street'],
            'housenumber' => $request ['housenumber'],
            'housenumbersuffix' => $request ['housenumbersuffix'],
            'town' => $request ['town'],
            'postalcode' => $request ['postalcode'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $users = DB::table('users')->where ('id', $userid)->get();
        return view('home', compact('users'));    
    }  
    
}