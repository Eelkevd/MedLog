<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Illness;

class AutoCompleteController extends Controller

{

    public function index()

    {
    	return view('zoek');
    }

    public function ajaxData(Request $request){

        $query = $request->get('query','');

        $illnesses = Illness::where('illness','LIKE','%'.$query.'%')->get();

        return response()->json($illnesses);

	}

}
