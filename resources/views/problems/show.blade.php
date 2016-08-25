@extends('layouts.main')

@section('content')
        <a href="/problems/">Back</a>
        <h1>{{ $problem->name }}</h1>
        <h2>Tags</h2>
        <div class="grid">
        @foreach($problem->tags as $tag)
            <div class="tag grid-25"> {{ $tag->name }} </div>
        @endforeach
        </div>
        @include('partials.pdf_preview', ['path' => "/problems/{$problem->id}/pdf" ])
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
            @foreach($problem->solutions as $solution)
            <div class="grid-100">
                <pre><code class="{{ $solution->slug }}">{{ $solution->code }}</code></pre>
            </div>
            @endforeach
        </div>
@endsection
