<?php

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
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sort = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());;
        return view('overview', compact('sort','search', 'illnesses'));
    }

    public function search(Request $request)
    {
        $sortword = "nope";
        $keyword = $request->input('search');
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sort = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());;
        return view('overview', compact('sort','search', 'illnesses'));
    }

    public function sort(Request $request)
    {
        $sortword = $request->input('illness_id');
        $keyword = "nope";
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        $sort = Event::where('title', 'LIKE', '%' . $sortword . '%')->get();
        $illnesses = Illness::all()->where('user_id', Auth::id());;
        return view('overview', compact('sort', 'search', 'illnesses'));
   }


}
