<?php

// Controller of the overview section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Symptom;
use App\Illness;

class OverviewController extends Controller
{
    // authentication requirement
    public function __construct()
    {
        $this->middleware('auth');
    }

    // function to show overview page
    public function index()
    {
        $sortword = "nope";
        $keyword = "";
        $currentdate = date("Y-m-d H:i:s");
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->where('start_date', '<=' ,$currentdate)->get();
        $sortillness = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness','search', 'illnesses'));
    }

    public function search(Request $request)
    {
        $sortword = "nope";
        $keyword = $request->input('search');
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sortillness = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness','search', 'illnesses'));
    }

    public function sortillness(Request $request)
    {
        $sortword = $request->input('illness');
        $keyword = "nope";
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sortillness = Event::all()->where('title', $sortword);
        $illnesses = Illness::all()->where('user_id', Auth::id());
        return view('overview', compact('sortillness', 'search', 'illnesses'));
   }
}
