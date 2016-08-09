<?php

Route::get('/', function () {
    return view('index', [
        'tags' => \App\Tag::all()
    ]);
});

Route::get('/problems', function() {
    $tags = \App\Tag::all();

    $query = \App\Problem::query();

    if(Request::get('name', '') !== '') {
        $query->where('problems.name', 'like', '%' . Request::get('name') . '%');
    }

    $tag_ids = [];

    if(Request::get('tags', '') !== '') {
        $tag_ids = array_map('intval', explode(',', Request::get('tags')));
        $query->hasTags($tag_ids);
    }

    $search_results = $query->get();

    return view('problems.all', [
        'search_results' => $search_results,
        'tags' => $tags,
        'searched_tags' => $tag_ids,
        'searched_name' => Request::get('name'),
    ]);
});

Route::get('/problems/{problem}/pdf', function($problem) {
    return Response::pdf($problem->full_path, "problem{$problem->id}.pdf");
});

Route::get('/problems/{problem}', function($problem) {
    return view('problems.show', ['problem' => $problem]);
});

Route::get('/practice/{problems}/', function($problems) {
    // generate the needed pdf (if it's not there)
    $practice_path = storage_path('practice_cache') . '/practice_' . implode('_', $problems->lists('id')->toArray()) . '.pdf';

    if(!file_exists($practice_path)) {
        $input_files = $problems->lists('full_path')->toArray();
        App::make('\App\Services\PdfService')->join($input_files, $practice_path);
    }

    return view('practices.show', ['problems' => $problems, 'practice_path' => $practice_path]);
});

Route::get('/random-practice', function() {
    $query = \App\Problem::query();
    if(Request::get('tags', '') !== '') {
        $tag_ids = array_map('intval', explode(',', Request::get('tags')));
        $query->hasTags($tag_ids);
    }

    $problem_count = intval(Request::get('problem_count', 3));

    $problem_ids = $query->inRandomOrder()
        ->take($problem_count)
        ->get()
        ->lists('id');

    $problems_string = implode(',', $problem_ids->toArray());

    return Redirect::to("/practice/${problems_string}");
});
