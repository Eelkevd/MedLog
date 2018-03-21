<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // First check if user is logged in
        $this->middleware('auth');
        // Alternatives:
        // $this->middleware('auth', ['only' => 'index']);
        // $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        $keyword = "nope";
        $start = date('Y-m-d');
        $end ="5999-12-31";
        $events = Event::whereBetween('start_date', array(
          $start,
          $end
        ))->take(5)->orderBy('start_date')->get();
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();
        return view('homepage.home', compact('events', 'search'));
    }
}
