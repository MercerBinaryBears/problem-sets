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

Route::get('/practice/{practice}/pdf', function($practice) {
    return Response::pdf($practice->full_path, "practice{$practice->id}.pdf");
});

Route::get('/random-practice', function() {
    $query = \App\Problem::query();
    if(Request::get('tags', '') !== '') {
        $tag_ids = array_map('intval', explode(',', Request::get('tags')));
        $query->hasTags($tag_ids);
    }

    $problem_count = intval(Request::get('problem_count', 3));
    $all_problems = $query->get();
    $problem_count = min($problem_count, $all_problems->count());
    return $all_problems->random($problem_count);
});
