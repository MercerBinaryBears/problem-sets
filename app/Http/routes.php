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

Route::get('/problems/{id}/pdf', function($id) {
    $problem = App\Problem::find($id);
    if($problem === null) {
        // TODO: Make this a 404
        throw new Exception('Not Found');
    }

    return $problem->name;
});

Route::get('/problems/{id}', function($id) {
    $problem = App\Problem::find($id);
    if($problem === null) {
        // TODO: Make this a 404
        //throw new Exception('Not Found');
        $problem = new App\Problem(['name' => 'Test']);
    }

    return view('problem', ['problem' => $problem]);
});
