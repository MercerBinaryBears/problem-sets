@extends('layouts.main')

@section('content')
        <h1>{{ $problem->name }}</h1>
        <h2>Tags</h2>
        <div class="grid">
        @foreach($problem->tags as $tag)
            <div class="tag grid-25"> {{ $tag->name }} </div>
        @endforeach
        </div>
        <div class="grid">
            <div class="grid-50">
                 <h2>Sample Input</h2>
                <textarea readonly="true">{{ $problem->sample_input }}</textarea>
            </div>
            <div class="grid-50">
                 <h2>Sample Output</h2>
                <textarea readonly="true">{{ $problem->sample_output }}</textarea>
            </div>
            <div class="grid-50">
                <h2>Judge Input</h2>
                <textarea readonly="true">{{ $problem->judge_input }}</textarea>
            </div>
            <div class="grid-50">
                <h2>Judge Output</h2>
                <textarea readonly="true">{{ $problem->judge_output }}</textarea>
            </div>
        </div>
@endsection
