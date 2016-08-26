@extends('layouts.main')

@section('content')
    <a href="/">Back</a>
    <ul>
    @foreach($problems as $problem)
        <li>@include('partials.problem_listing')</li>
    @endforeach
    </ul>
    <a target="_blank" href="{{ $pdf_path }}">View PDF</a>
@endsection
