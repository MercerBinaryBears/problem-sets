@extends('layouts.main')

@section('styles')
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.6.0/styles/monokai-sublime.min.css">
@stop

@section('scripts')
@parent
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.6.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@stop

@section('content')
        <div class="grid">
            <a class="grid-100" href="/problems/">Back</a>
            <h1 class="grid-100">{{ $problem->name }}</h1>
            <div class="grid grid-50">
                <iframe class="grid-100" height="350" src="/problems/{{ $problem->id }}/pdf"></iframe>
                <a class="grid-100" target="_blank" href="/problems/{{ $problem->id }}/pdf">View Full</a>
            </div>
            <div class="grid-50">
                <h2 class="grid-100" >Tags</h2>
                <ul>
                @foreach($problem->tags as $tag)
                    <li> {{ $tag->name }} </li>
                @endforeach
                </ul>
            </div>
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
                <a href="/problems/{{ $problem->id }}/data/input">Download Input</a>
            </div>
            <div class="grid-50">
                <h2>Judge Output</h2>
                <textarea readonly="true">{{ $problem->judge_output }}</textarea>
                <a href="/problems/{{ $problem->id }}/data/output">Download Output</a>
            </div>
            @foreach($problem->solutions as $solution)
            <div class="grid-100">
                <pre><code class="{{ $solution->slug }}">{{ $solution->code }}</code></pre>
            </div>
            @endforeach
        </div>
@endsection
