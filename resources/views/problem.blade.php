<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>{{ $problem->name }}</h1>
        <h2>Tags</h2>
        <ul>
            @foreach($problem->tags as $tag)
                <li> {{ $tag->name }} </li>
            @endforeach
        </ul>
         <h2>Sample Input</h2>
        <textarea readonly="true">{{ $problem->sample_input }}</textarea>
         <h2>Sample Output</h2>
        <textarea readonly="true">{{ $problem->sample_output }}</textarea>
         <h2>Judge Input</h2>
        <textarea readonly="true">{{ $problem->judge_input }}</textarea>
         <h2>Judge Output</h2>
        <textarea readonly="true">{{ $problem->judge_output }}</textarea>
    </body>
</html>
