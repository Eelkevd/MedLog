<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Illness;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class IllnessController extends Controller
{
	// public function create(Illness $illness)
 //   	{
 //   	    return view('entry');
 //   	}

	public function store (Request $request) 
	{
		$request->validate([
            'illness'  => 'required',
        ]);
		$illness = Illness::create(request(['illness']));
        return view ('entry');
	}
}