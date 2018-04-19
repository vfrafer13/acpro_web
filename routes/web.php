<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('vetHistory/history_entries/{id}', 'VetHistoryController@dog_history');
Route::get('vetHistory/entry_detail/{id}', 'VetHistoryController@show');
Route::get('vetHistory/entry/{id}/edit', 'VetHistoryController@edit');
Route::get('vetHistory/history_entries/{id}/create', 'VetHistoryController@create');

Route::get('eventHistory/history_entries/{id}', 'EventHistoryController@dog_history');
Route::get('eventHistory/entry_detail/{id}', 'EventHistoryController@show');
Route::get('eventHistory/entry/{id}/edit', 'EventHistoryController@edit');
Route::get('eventHistory/history_entries/{id}/create', 'EventHistoryController@create');

Route::resource('dogs', 'DogController');
Route::resource('appointments', 'AppointmentController');
Route::resource('events', 'EventController');
Route::resource('users', 'UserController');
Route::resource('eventHistory', 'EventHistoryController');
Route::resource('vetHistory', 'VetHistoryController');

Route::get('vetHistory/{vetHistory}', function () {
    return redirect('vetHistory/');
});
Route::get('vetHistory/{vetHistory}/edit', function () {
    return redirect('vetHistory/');
});
Route::get('vetHistory/create', function () {
    return redirect('vetHistory/');
});

Route::get('eventHistory/{eventHistory}', function () {
    return redirect('eventHistory/');
});
Route::get('eventHistory/{eventHistory}/edit', function () {
    return redirect('eventHistory/');
});
Route::get('eventHistory/create', function () {
    return redirect('eventHistory/');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
