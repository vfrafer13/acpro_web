<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Http\Requests;
use App\EventHistory;
use App\Event;
use App\Dog;
use Carbon\Carbon;
use DB;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class EventHistoryController extends Controller
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
        $dogs = Dog::all();

        return View::make('eventHistory.index')
            ->with('dogs', $dogs);
    }

    public function dog_history($id)
    {
        $entries = Dog::find($id)->eventHistoryEntries;
        $dog = Dog::find($id);
        $events = Event::all()->pluck('name', 'id');
        $eventTypes = Event::all()->pluck('type', 'id');
        $types = EventType::all()->pluck('name', 'id');
        $eventDates = Event::all()->pluck('date', 'id');

        return View::make('eventHistory.dog_history')
            ->with('entries', $entries)
            ->with('types', $types)
            ->with('eventTypes', $eventTypes)
            ->with('eventDates', $eventDates)
            ->with('dog', $dog)
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $dog = Dog::find($id);
        $events = $dog->events->where('date', '<', Carbon::today()->toDateString())
            ->pluck('full_name', 'id');

        return View::make('eventHistory.create', compact('id', 'events', 'eventDates'))
            ->with('dog', $dog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
        ]);

        $eventHistory = new EventHistory;
        $eventHistory->dog_id       = Input::get('dog_id');
        $eventHistory->event_id     = Input::get('event_id');
        $eventHistory->notes        = Input::get('notes');
        $eventHistory->save();

        return Redirect::to('eventHistory/history_entries/' . $eventHistory->dog_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $eventHistory = EventHistory::find($id);
        $dog = Dog::find($eventHistory->dog_id);
        $event = Event::find($eventHistory->event_id);
        $eventType = EventType::find($event->type);

        return View::make('eventHistory.show')
            ->with('eventHistory', $eventHistory)
            ->with('event', $event)
            ->with('dog', $dog)
            ->with('eventType' , $eventType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $eventHistory = EventHistory::find($id);
        $dog = Dog::find($eventHistory->dog_id);
        $event = Event::find($eventHistory->event_id);


        return View::make('eventHistory.edit',compact('id', 'events', 'eventDates'))
            ->with('dog', $dog)
            ->with('event', $event)
            ->with('eventHistory', $eventHistory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $eventHistory = EventHistory::find($id);
        $eventHistory->dog_id       = Input::get('dog_id');
        $eventHistory->event_id     = Input::get('event_id');
        $eventHistory->notes        = Input::get('notes');
        $eventHistory->save();

        return Redirect::to('eventHistory/history_entries/' . $eventHistory->dog_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $eventHistory = EventHistory::find($id);
        $eventHistory->delete();

        return Redirect::to('eventHistory');
    }
}
