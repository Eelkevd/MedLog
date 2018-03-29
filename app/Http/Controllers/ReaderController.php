<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reader;
use App\Diary;

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

    // get all diaries that are available to the reader
    public function index()
    {
      // get id of reaer
      $id = Auth::id();
      // start array
      $diaries = [];
      // check reader table to see which diary id the reader can watch
      $diary_id = Reader::where('user_id', $id)->pluck('diary_id');
      // get the diaries with the verified diary ids.
      $diaries = Diary::findOrFail($diary_id);
      // get name of corresponding clients
      

      return view('readers/index', compact('diaries'));
    }

}
