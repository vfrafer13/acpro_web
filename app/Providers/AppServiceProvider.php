<?php

namespace App\Providers;

use App\Event;
use App\Appointment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Input;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('time_free', function ($attribute, $value, $parameters, $validator) {

            $date = Carbon::createFromFormat('Y-m-d', $value);
            $time = Carbon::createFromTimeString(Input::get($parameters[0]));
            $time_end = Carbon::createFromTimeString(Input::get($parameters[1]));

            $date_start = $date->copy();
            $date_start->hour = $time->hour;
            $date_start->minute = $time->minute;
            $date_start->second = $time->second;

            $date_end = $date->copy();
            $date_end->hour = $time_end->hour;
            $date_end->minute = $time_end->minute;
            $date_end->second = $time_end->second;

            $eventInRange = (
                Event::whereBetween('date', [$date_start, $date_end])
                ->orWhereBetween('date_end', [$date_start, $date_end])
                ->count()
            );

            $appointmentInRange = (
                Appointment::whereBetween('date', [$date_start, $date_end])
                ->orWhereBetween('date_end', [$date_start, $date_end])
                ->count()
            );

            if ($eventInRange > 0 || $appointmentInRange > 0) {

                return false;
            }

            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
