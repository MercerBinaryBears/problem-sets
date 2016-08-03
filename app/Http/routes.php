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

Route::get('/competition-problem-sets/{id}/pdf', function($id) {
    $problem_set = App\CompetitionProblemSet::find($id);
    if($problem_set === null) {
        abort(404);
    }

    return Response::download($problem_set->full_path);
});

Route::get('/problems/{id}/pdf', function($id) {
    $problem = App\Problem::find($id);
    if($problem === null) {
        abort(404);
    }

    return $problem->name;
});

Route::get('/problems/{id}', function($id) {
    $problem = App\Problem::find($id);
    if($problem === null) {
        abort(404);
    }

    return view('problem', ['problem' => $problem]);
});
