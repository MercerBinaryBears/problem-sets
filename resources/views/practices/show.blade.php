@extends('layouts.main')

@section('content')
    <a href="/">Back</a>
    <ul>
    @foreach($problems as $problem)
        <li>
            <a href="/problems/{{ $problem->id }}">{{ $problem->name }}</a>
        </li>
    @endforeach
    </ul>
@endsection
