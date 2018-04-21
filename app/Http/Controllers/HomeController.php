<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Event;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment = Appointment::where('date', '>', Carbon::today()->toDateString())
            ->orderBy('date', 'asc')->first();

        $event = Event::where('date', '>', Carbon::today()->toDateString())
            ->orderBy('date', 'asc')->first();

        $url = "http://api.openweathermap.org/data/2.5/weather?lat=20.97&lon=-89.62&units=metric&APPID=89018a629c04216da71381425d73eb43";


        $contents = file_get_contents($url);
        $clima=json_decode($contents);
        $temp = $clima->main->temp;
        $temp_max=$clima->main->temp_max;
        $icon=$clima->weather[0]->icon.".png";

        return view('pages/home')
            ->with('appointment', $appointment)
            ->with('event', $event)
            ->with('temp', $temp)
            ->with('temp_max', $temp_max)
            ->with('icon', $icon);
    }
}
