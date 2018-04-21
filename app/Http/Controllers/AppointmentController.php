<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Appointment;
use App\Dog;
use Carbon\Carbon;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $appointments = Appointment::all();

        return View::make('appointments.index')
            ->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $dogs = Dog::all()->pluck('full_name', 'id');
        return View::make('appointments.create', compact('id', 'dogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $appointment = new Appointment;
        $appointment->dog_id        = Input::get('dog_id');
        $date = Input::get('date');
        $time = Input::get('time');
        $date = Carbon::createFromTimestamp(strtotime($date . $time . ":00"));
        $appointment->date          = $date;
        $appointment->address       = Input::get('address');
        $appointment->save();

        return Redirect::to('appointments');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);

        return View::make('appointments.show')
            ->with('appointment', $appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $dogs = Dog::all()->pluck('full_name', 'id');
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $appointment->date);
        $time = $date->format('H:m:s');

        return View::make('appointments.edit', compact('id', 'dogs'))
            ->with('appointment', $appointment)
            ->with('date', $date)
            ->with('time', $time);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $appointment = Appointment::find($id);
        $appointment->dog_id        = Input::get('dog_id');
        $date_db = Carbon::createFromFormat('Y-m-d H:i:s', $appointment->date);
        $date = Input::get('date', $date_db->format('Y-m-d'));
        $time = Input::get('time', $date_db->format('H:i'));
        $date = Carbon::createFromTimestamp(strtotime($date . $time));
        $appointment->date          = $date;
        $appointment->address       = Input::get('address');
        $appointment->save();

        return Redirect::to('appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();

        return Redirect::to('appointments');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
