<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/problems', function() {
    $tags = \App\Tag::all();
    $search_results = \App\Problem::all();

    return view('problem-search', ['search_results' => $search_results, 'tags' => $tags]);
});

Route::get('/competitions/{competition}/pdf', function($competition) {
    return Response::download($competition->full_path);
});

Route::get('/problems/{problem}/pdf', function($problem) {
    return Response::download($problem->full_path);
});

Route::get('/problems/{problem}', function($problem) {
    return view('problem', ['problem' => $problem]);
});

Route::get('/practice/{practice}/pdf', function($practice) {
    return Response::download($practice->full_path);
});
