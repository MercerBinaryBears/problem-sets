<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/problems', function() {
    $tags = \App\Tag::all();

    $tag_ids = explode(',', Request::get('tags'));

    // select problems.* from problems inner join problem_tag on problems.id = problem_id where tag_id in (1, 2) group by problem_id having count(*) = 2;

    $search_results = \App\Problem::where('problems.name', 'like', '%' . Request::get('name') . '%')
        ->get();

    return view('problem-search', [
        'search_results' => $search_results,
        'tags' => $tags,
    ]);
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
