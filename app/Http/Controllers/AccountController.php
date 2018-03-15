<?php

// Controller of the account section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
}