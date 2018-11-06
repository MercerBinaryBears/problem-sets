<?php

use \App\Problem;
use \App\Tag;

Route::get('/', function () {
    return view('index', [
        'tags' => Tag::all()
    ]);
});

Route::get('/problems{format?}', function($format = null) {
    $tags = Tag::all();

    $query = Problem::query()
        // goofy clause to make laravel not bug out...
        ->where('problems.id', '>', -1);

    if(Request::get('name', '') !== '') {
        $query->where('problems.name', 'like', '%' . Request::get('name') . '%');
    }

    $tag_ids = [];

    if(Request::get('tags', '') !== '') {
        $tag_ids = array_map('intval', explode(',', Request::get('tags')));
        $query->hasTags($tag_ids);
    }

    $query->with('tags');

    $query->orderBy('problems.name');

    $search_results = $query->get();

    if($format === '.json') {
        return $search_results;
    }

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

Route::get('/competitions/{competition}/pdf', function($competition) {
    return Response::pdf($competition->full_path, "competition{$competition->id}.pdf");
});

Route::get('/problems/{problem}', function($problem) {
    return view('problems.show', ['problem' => $problem]);
});

Route::get('/practice/{problems}/', function($problems) {
    // the url to the pdf
    $pdf_path = '/practice/' . implode(',', $problems->lists('id')->toArray()) . '/pdf';
    return view('practices.show', ['problems' => $problems, 'pdf_path' => $pdf_path]);
});

Route::get('/practice/{problems}/pdf', function($problems) {
    // generate the needed pdf (if it's not there)
    $practice_path = storage_path('practice_cache') . '/practice_' . implode('_', $problems->lists('id')->toArray()) . '.pdf';

    if(!file_exists($practice_path)) {
        $input_files = $problems->lists('full_path')->toArray();
        App::make('\App\Services\PdfService')->join($input_files, $practice_path);
    }

    return Response::pdf($practice_path);
});

Route::get('/problem_sets/{problem_set}/pdf', function($problem_set) {
    return Response::pdf($problem_set->full_path);
});

Route::get('/random-practice', function() {
    $query = Problem::query();
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

Route::get('/practice-builder', function() {
    return view('practices.builder');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::post('/login', function() {
    $user = getenv('ADMIN_USER');
    $password = getenv('ADMIN_PASSWORD');

    if($user === false || $password === false) {
        return Redirect::to('/login');
    }

    $user_input = Request::get('username');
    $password_input = Request::get('password');

    if($user_input == $user && $password_input == $password) {
        Session::put('admin', true);
        return Redirect::to('/admin');
    }

    return Redirect::to('/login');
});
