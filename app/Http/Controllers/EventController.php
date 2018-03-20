<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Calendar;
use App\Event;

class EventController extends Controller
{
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
      return view('homepage.mycalendar', compact('calendar'));
    }

    public function create()
    {
      return view('homepage.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        $events = [];
        $data = Event::all();
        if($data->count()){
          foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->title,
                $value->description,
                new \DateTime($value->start_date),
                new \DateTime($value->end_date)
            );
          }
        }

        $calendar = Calendar::addEvents($events);
        return redirect('home/mycalendar')->with(compact('calendar'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $events = Event::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('homepage.home', compact('events'));
   }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        //
    }
}
