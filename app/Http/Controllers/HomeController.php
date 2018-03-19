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
       $events = [];
       $data = Event::all();
       if($data->count()){
          foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->title,
                true,
                new \DateTime($value->start_date),
                new \DateTime($value->end_date.' +1 day')
            );
          }
       }

        $calendar = Calendar::addEvents($events);
        return view('homepage.home', compact('calendar'));
    }
}
