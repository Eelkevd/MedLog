<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EntryController extends Controller
{
	public function home ()
	{
		return view ('entry');
	}

	public function store (Request $request) 
	{
		$request->validate([
            'name'  => 'required',
        ]);
	}
}