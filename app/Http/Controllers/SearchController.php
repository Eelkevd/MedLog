<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illness;


class SearchController extends Controller
{
  public function find(Request $request)
  {
    return view('typeahead')->with(Illness::search($request->get('q'))->get());
  }

}
