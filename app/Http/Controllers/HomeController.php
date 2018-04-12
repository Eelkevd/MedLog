<?php

namespace App\Http\Controllers;
// Controller of the home section

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Entry;

class HomeController extends Controller
{
    /**
     * authentication requirement
     *
     * @return  void
     */
    public function __construct()
    {
        // First check if user is logged in
        $this->middleware('auth');
    }

    /**
     * Function to show homepage
     *
     * @return view
     */
    public function index()
    {
        $user = Auth::user();
        $keyword = "nope";
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();

        // Get the last five appoinments and don't show the diary entries of today (entry_id=0)
        $events = Event::appointments();

        // Get the five most recent diary entries
        $entries = Entry::recentEntries();

        return view('homepage.home', compact('search', 'events', 'entries'));
    }
}
