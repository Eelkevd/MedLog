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
      // $diaries = Auth::user()->with('userDiaries', 'userDiaries.user');
      // dd($diaries);
      $reader_id= Auth::id();
      $user = User::with('userDiaries', 'userDiaries.user')->find($reader_id);
      dd($user);

      //$user->userDiaries->user->firstname

      return view('readers/index', compact('reader', 'clients', 'name'));
    }

    public function show($client)
    {

    }
}
