<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Illness;
use Illuminate\Support\Facades\Auth;

class IllnessController extends Controller
{
	//authentication requirement
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function store (Request $request) 
	{

		// dd($request);
		$request->validate([
            'illness'  => 'required',
        ]);
		$illness = Illness::create(request(['illness']));
        return redirect ('entries');
	}
}