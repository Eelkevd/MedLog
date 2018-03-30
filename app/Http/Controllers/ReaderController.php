<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\Encryptable;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Reader;
use App\Diary;
use App\User;


class ReaderController extends Controller
{
  use Encryptable;

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
      // get the person that is logged in (reader)
      $reader_id= Auth::id();
      // get the diaries and than the owners of those $diaries
      // find where reader is allowed to read
      $user = User::with('userDiaries', 'userDiaries.user')->find($reader_id);
      // get the diaries
      $diaries = $user->userDiaries;
      //$user->userDiaries->user->firstname
      return view('readers/index', compact('diaries'));
    }

    public function show($client)
    {

    }
}
