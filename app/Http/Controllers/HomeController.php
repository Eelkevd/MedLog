<?php

// Controller of the home section
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Calendar;
use App\Event;
use App\Entry;

class HomeController extends Controller
{
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
        $search = Event::where('title', 'LIKE', '%' . $keyword . '%')->get();

        // haal de vijf laatste afspraken op en negeer de dagboekentries van vandaag (entry_id=0)
        $events = Event::appointments();

        // Haal de vijf recentste dagboekentries op
        $entries = Entry::recentEntries();

        return view('homepage.home', compact('search', 'events', 'entries'));
    }
}
