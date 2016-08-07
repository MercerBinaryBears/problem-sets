@extends('layouts.main')

@section('content')
    <a href="/">Back</a>
    <ul>
    @foreach($problems as $problem)
        <li>{{ $problem->name }}</li>
    @endforeach
    </ul>
@endsection
