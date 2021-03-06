<?php

namespace App\Http\Controllers;
// Controller of the event section

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Calendar;
use App\Event;

class EventController extends Controller
{
    /**
     * Show aboutus page/view
     *
     * @return view
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Requires data from database to fill in and show calendar
     *
     * @return view
     */
    public function index()
    {
        $user = Auth::user();
        $events = [];
        $data = $user->events;

        if($data->count())
        {
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
        return view('homepage.mycalendar', compact('calendar'));
    }

    /**
    * goes to create a new event page/view
    *
    * @return view
    */
    public function create()
    {
        return view('homepage.create');
    }

    /**
    * adds new event to the event database to show later in calendar
    *
    * @param  Request
    * @return Redirect
    */
    public function store(Request $request)
    {
        // add the user_id to the request array
        $user_id = Auth::id();
        $request->request->add(['user_id' => $user_id]);

        // send the request information through the model to store
        Event::create($request->all());
            $events = [];
            $request->validate([
            'title' => 'required',
            'start_date' => 'required'
        ]);

        $data = Event::all();
        if($data->count())
        {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    $value->description,
                    new \DateTime($value->start_date),
                    new \DateTime($value->start_date)
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        return redirect('home/mycalendar')->with(compact('calendar'));
    }

    /**
     * searches all titles of events in database with keyword in text
     *
     * @param  Request
     * @return view
     */

    public function search(Request $request)
    {
        $user = Auth::user();
        if($user->diary)
        {
            $keyword = $request->input('search');
            $search = $user->events()->where('title', 'LIKE', '%' . $keyword . '%')->paginate(5);;
            return view('homepage.search', compact('search'));
        }
    }
}
