<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/competitions/{competition}/pdf', function($competition) {
    return Response::download($competition->full_path);
});

Route::get('/problems/{problem}/pdf', function($problem) {
    return $problem->name;
});

Route::get('/problems/{problem}', function($problem) {
    return view('problem', ['problem' => $problem]);
});
