<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SymptomController extends Controller
{

	public function store (Request $request) 
	{
		$request->validate([
            'symptom'  => 'required',
        ]);

        return view ('entry');
	}
}