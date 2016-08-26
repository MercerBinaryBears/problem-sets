@extends('layouts.main')

@section('styles')
    @parent
    @include('assets.chosen-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.min.css">
@endsection

@section('content')
        <div class="grid">
            <a class="grid-100" href="/">Back</a>
        </div>
        @include('partials.problem_search_form')

        <ul class="search-results">
        @foreach($search_results as $problem)
            <li>@include('partials.problem_listing')</li>
        @endforeach
        </ul>
@endsection
