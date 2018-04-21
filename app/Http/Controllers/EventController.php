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
        $date = Input::get('date');
        $time = Input::get('time');
        $date = Carbon::createFromTimestamp(strtotime($date . $time . ":00"));
        $event->date           = $date;
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
        $items = array();
        foreach($checked as $id=>$checked_item) {
            $items[] = $checked_item->id;
        }

        return View::make('events.edit', compact('id', 'types', 'items'))
            ->with('event', $event)
            ->with('date', $date)
            ->with('time', $time)
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
        $date = Input::get('date', $date_db->format('Y:m:d'));
        $time = Input::get('time', $date_db->format('H:i'));
        $date = Carbon::createFromTimestamp(strtotime($date . $time));
        $event->date           = $date;
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
