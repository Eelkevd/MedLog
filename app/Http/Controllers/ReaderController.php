<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReaderController extends Controller
{
  //authentication requirement
  public function __construct()
  {
      $this->middleware('auth');
  }



    public function login()
    {
      return view('reader/login');
    }

    public function verify($verifyToken)
    {
        // find the correct diary by token
        $verifiedDiary = Reader::where('verifyToken', $verifyToken)->firstOrFail();
        $reader_id = $verifiedReader->id;

        // check to see if the time span is already been used


        // empty the token if the timespan has been passed
      //  $verifiedReader->update(['verifyToken' => null]);
//        return redirect('/reader/login')
//        ->with('error', 'Uw toegang is verlopen');

        return redirect('/reader/diary')
       ->with('succes', 'U kunt tijdelijk het dagboek inzien.');
    }

    public function show()
    {

    }

}
