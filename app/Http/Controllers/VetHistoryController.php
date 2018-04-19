<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\VetHistory;
use App\Dog;
use App\VetType;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class VetHistoryController extends Controller
{
    private $dogID;

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

        return View::make('vetHistory.index')
            ->with('dogs', $dogs);
    }

    public function dog_history($id)
    {
        $entries = Dog::find($id)->vetHistoryEntries;
        $vetTypes = VetType::all();
        $dog = Dog::find($id);

        return View::make('vetHistory.dog_history')
            ->with('entries', $entries)
            ->with('vetTypes', $vetTypes)
            ->with('dog', $dog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $types = VetType::pluck('name', 'id');
        $dog = Dog::find($id);

        return View::make('vetHistory.create')
            ->with('types', $types)
            ->with('dog', $dog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $vetHistory = new VetHistory;
        $vetHistory->dog_id     = Input::get('dog_id');
        $vetHistory->date       = Input::get('date');
        $vetHistory->type       = Input::get('type');
        $vetHistory->clinic     = Input::get('clinic');
        $vetHistory->description= Input::get('description');
        $vetHistory->save();

        return Redirect::to('vetHistory/history_entries/' . $vetHistory->dog_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vetHistory = VetHistory::find($id);
        $dogName = Dog::find($vetHistory->dog_id)->name;
        $vetTypes = VetType::all();

        return View::make('vetHistory.show')
            ->with('vetHistory', $vetHistory)
            ->with('vetTypes', $vetTypes)
            ->with('dogName', $dogName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vetHistory = VetHistory::find($id);
        $dog = Dog::find($vetHistory->dog_id);
        $types = VetType::pluck('name', 'id');

        return View::make('vetHistory.edit')
            ->with('vetHistory', $vetHistory)
            ->with('types', $types)
            ->with('dog', $dog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $vetHistory = VetHistory::find($id);
        $vetHistory->dog_id     = Input::get('dog_id');
        $vetHistory->date       = Input::get('date');
        $vetHistory->type       = Input::get('type');
        $vetHistory->clinic     = Input::get('clinic');
        $vetHistory->description= Input::get('description');
        $vetHistory->save();

        return Redirect::to('vetHistory/history_entries/' . $vetHistory->dog_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vetHistory = VetHistory::find($id);
        $vetHistory->delete();

        return Redirect::to('vetHistory');
    }

}
