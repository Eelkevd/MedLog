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
        return view('accounts.index', compact('users'));    
    }  
    
}