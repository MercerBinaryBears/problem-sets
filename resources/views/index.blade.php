@extends('layouts.main')
    
@section('styles')
    @parent
    @include('assets.chosen-styles')
@endsection

@section('content')
<div class="grid">
    <div class="grid-33">
        Hey
    </div>
    <div class="grid-33">
        <h2>Search Problems</h2>
        @include('partials.problem_search_form', ['searched_name' => '', 'tags' => \App\Tag::all(), 'searched_tags' => []])
    </div>
    <div class="grid-33">
        Hey
    </div>
</div>
@endsection

@section('scripts')
    @include('assets.chosen-scripts')
@endsection
