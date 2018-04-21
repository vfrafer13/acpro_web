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
        $weather=json_decode($contents);
        $temp = $weather->main->temp;
        $icon=$weather->weather[0]->icon.".png";
        $coordinates = $this->getCoordinates($appointment->address);

        return view('pages/home')
            ->with('appointment', $appointment)
            ->with('event', $event)
            ->with('temp', $temp)
            ->with('icon', $icon)
            ->with('coordinates', $coordinates);
    }

    private function getCoordinates($address) {
        $address = str_replace(" ", "+", $address);
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";

        $response = file_get_contents($url);

        $json = json_decode($response,TRUE);

        $coordinates = array();

        try {

            $coordinates[] = $json['results'][0]['geometry']['location']['lat'];
            $coordinates[] = $json['results'][0]['geometry']['location']['lng'];

        } catch (\Exception $e) {

            $coordinates[] = 20.9758206;
            $coordinates[] = -89.634933;
            $coordinates[] = 10;
        }



        return $coordinates;
    }

}
