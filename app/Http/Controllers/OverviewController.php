<?php

// Controller of the overview section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Entry;
use App\Symptom;
use App\Illness;

class OverviewController extends Controller
{
    // authentication requirement
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to show overview page with all diary entries
    public function index()
    {
        $sortword = "nope";
        $keyword = "";
        $currentdate = date("Y-m-d H:i:s");
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')
                       ->where('start_date', '<=' ,$currentdate)->orderBy('start_date', 'DESC')->get();
        $sortillness = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $sortintensity = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        $entries = Entry::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness','search', 'illnesses', 'sortintensity', 'entries'));
    }

    // function to make search function work
    public function search(Request $request)
    {
        $sortword = "nope";
        $keyword = $request->input('search');
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sortillness = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $sortintensity = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        $entries = Entry::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness','search', 'illnesses', 'sortintensity', 'entries'));
    }

    // function to make search function work
    public function chronological()
    {
        $sortword = "nope";
        $keyword = "";
        $currentdate = date("Y-m-d H:i:s");
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')
                       ->where('start_date', '<=' ,$currentdate)->orderBy('start_date', 'ASC')->get();
        $sortillness = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $sortintensity = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        $entries = Entry::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness','search', 'illnesses', 'sortintensity', 'entries'));
    }

    // function to make sort function for illnesses work
    public function sortillness(Request $request)
    {
        $sortword = $request->input('illness');
        $keyword = "nope";
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sortillness = Event::all()->where('title', $sortword);
        $sortintensity = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        $entries = Entry::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness', 'search', 'illnesses', 'sortintensity', 'entries'));
   }

   // function to make sort function for illnesses work
   public function sortintensity(Request $request)
   {
       $illness_id = DB::table('entries')->select('illness_id')->where('intensity', $request->input('intensity'))->first();
       $illness_name = DB::table('illnesses')->select('illness')->where('id', $illness_id->illness_id)->first();
       $keyword = "nope";
       $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
       $sortintensity = Event::all()->where('title', $illness_name->illness);
       $sortillness = Event::all()->where('title', $keyword);
       $illnesses = Illness::all()->where('user_id', Auth::id());
       $entries = Entry::all()->where('user_id', Auth::id());
       return view('overview', compact('sortillness', 'search', 'illnesses', 'sortintensity', 'entries'));
  }
}
