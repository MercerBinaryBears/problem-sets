@extends('layouts.main')
    
@section('styles')
    @parent
    @include('assets.chosen-styles')
@endsection

@section('content')
<div class="grid">
    <div class="grid-50">
        <h2>Search Problems</h2>
        @include('partials.problem_search_form', ['searched_name' => '', 'searched_tags' => []])
    </div>
    <div class="grid-50">
        <h2>Generate Problem Set</h2>
        @include('partials.generate_problem_set_form')
    </div>
</div>
@endsection

@section('scripts')
    @include('assets.chosen-scripts')
@endsection
