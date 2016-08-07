@extends('layouts.main')

@section('styles')
    @parent
    @include('assets.chosen-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.min.css">
@endsection

@section('content')
        <a href="/">Back</a>
        @include('partials.problem_search_form')

        <ul class="search-results">
        @foreach($search_results as $problem)
            <li>
                <a href="/problems/{{ $problem->id }}">{{ $problem->name }}</a>
            </li>
        @endforeach
        </ul>
@endsection
