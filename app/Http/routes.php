<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/problems', function() {
    $tags = \App\Tag::all();

    $query = \App\Problem::where('problems.name', 'like', '%' . Request::get('name') . '%');

    $tag_ids = [];

    if(Request::get('tags') !== '') {
        $tag_ids = array_map('intval', explode(',', Request::get('tags')));
        $query->join('problem_tag', 'problems.id', '=', 'problem_tag.problem_id')
            ->whereIn('tag_id', $tag_ids)
            ->groupBy('problem_id')
            ->havingRaw("count(*) <= " . count($tag_ids))
            ->select('problems.*');
    }

    $search_results = $query->get();

    return view('problem-search', [
        'search_results' => $search_results,
        'tags' => $tags,
        'searched_tags' => $tag_ids,
        'searched_name' => Request::get('name'),
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
