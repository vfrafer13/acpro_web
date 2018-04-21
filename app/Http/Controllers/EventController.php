<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\Carbon;
use App\Event;
use App\EventType;
use App\Dog;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Event::all();

        return View::make('events.index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $dogs = Dog::all();
        $types = EventType::pluck('name', 'id');
        return View::make('events.create', compact('id', 'types', 'dogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $event = new Event;
        $event->name           = Input::get('name');

        $date_input = Input::get('date');
        $time = Input::get('time');
        $time_end = Input::get('time_end');

        $date_end = Carbon::createFromTimestamp(strtotime($date_input . $time_end));
        $date = Carbon::createFromTimestamp(strtotime($date_input . $time . ":00"));

        $event->date           = $date;
        $event->date_end       = $date_end;
        $event->address        = Input::get('address');
        $event->type           = Input::get('type');
        $event->save();

        $checked_items = Input::get('dogs');
        $event->dogs()->attach($checked_items);

        return Redirect::to('events');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $type = EventType::find($event->type);
        $dogs = $event->dogs;
        $type_name = $type->name;

        return View::make('events.show', compact('type_name'))
            ->with('event', $event)
            ->with('dogs', $dogs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $types = EventType::pluck('name', 'id');
        $dogs = Dog::all();
        $checked = Event::find($id)->dogs;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $event->date);
        $time = $date->format('H:m:s');
        $time_end = Carbon::createFromFormat('Y-m-d H:i:s', $event->date_end);
        $time_end = $time_end->format('H:i');

        $items = array();
        foreach($checked as $id=>$checked_item) {
            $items[] = $checked_item->id;
        }

        return View::make('events.edit', compact('id', 'types', 'items'))
            ->with('event', $event)
            ->with('date', $date)
            ->with('time', $time)
            ->with('time_end', $time_end)
            ->with('dogs', $dogs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $event = Event::find($id);
        $event->name           = Input::get('name');

        $date_db = Carbon::createFromFormat('Y-m-d H:i:s', $event->date);

        $date_input = Input::get('date', $date_db->format('Y:m:d'));
        $time = Input::get('time', $date_db->format('H:i'));

        $date_end_db = Carbon::createFromFormat('Y-m-d H:i:s', $event->date_end);
        $time_end = Input::get('time_end', $date_end_db->format('H:i'));

        $date = Carbon::createFromTimestamp(strtotime($date_input . $time));
        $date_end = Carbon::createFromTimestamp(strtotime($date_input . $time_end));

        $event->date           = $date;
        $event->date_end       = $date_end;
        $event->address        = Input::get('address');
        $event->type           = Input::get('type');
        $event->save();

        $checked_items = Input::get('dogs');
        $event->dogs()->sync($checked_items);

        return Redirect::to('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return Redirect::to('events');
    }
}
