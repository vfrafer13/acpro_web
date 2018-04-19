<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Http\Requests;
use App\Dog;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dogs = Dog::all();

        return View::make('dogs.index')
            ->with('dogs', $dogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $abilities = Ability::pluck('name', 'id');
        return View::make('dogs.create', compact('id', 'abilities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $dog = new Dog;
        $dog->name       = Input::get('name');
        $dog->owner      = Input::get('owner');
        $dog->breed      = Input::get('breed');
        $dog->age        = Input::get('age');
        $dog->weight     = Input::get('weight');
        $dog->physicalDescription   = Input::get('physicalDescription');
        $dog->gender     = Input::get('gender');
        $dog->save();

        $checked_items = Input::get('abilities');
        $dog->abilities()->attach($checked_items);

        return Redirect::to('dogs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $dog = Dog::find($id);

        return View::make('dogs.show')
            ->with('dog', $dog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $dog = Dog::find($id);
        $abilities = Ability::pluck('name', 'id');
        $checked = Dog::find($id)->abilities;
        $items = array();
        foreach($checked as $id=>$checked_item) {
            $items[] = $checked_item->id;
        }

        return View::make('dogs.edit', compact('id', 'abilities'))
            ->with('dog', $dog)
            ->with('items', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $dog = Dog::find($id);
        $dog->name       = Input::get('name');
        $dog->breed      = Input::get('breed');
        $dog->age        = Input::get('age');
        $dog->weight     = Input::get('weight');
        $dog->physicalDescription   = Input::get('physicalDescription');
        $dog->gender     = Input::get('gender');
        $dog->owner      = Input::get('owner');

        $dog->save();

        $checked_items = Input::get('abilities');
        $dog->abilities()->sync($checked_items);

        return Redirect::to('dogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $dog = Dog::find($id);
        $dog->delete();

        return Redirect::to('dogs');
    }
}
