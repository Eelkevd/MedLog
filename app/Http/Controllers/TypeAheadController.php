<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Illness;

class TypeAheadController extends Controller

{

    public function index()

    {
    	return view('typeahead');
    }



}
