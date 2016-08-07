@extends('layouts.main')

@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.min.css">
@endsection

@section('content')
        @include('partials.problem_search_form')

        <ul class="search-results">
        @foreach($search_results as $problem)
            <li>
                <a href="/problems/{{ $problem->id }}">{{ $problem->name }}</a>
            </li>
        @endforeach
        </ul>
@endsection

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.jquery.min.js"></script>
    <script src="/build/js/autowire-chosen.js"></script>
    <script>
        $('form').on('submit', function() {
            var query = {
                name: $('[name=name]').val(),
                tags: $('[name=tags]').val().join(',')
            }

            var url = window.location.pathname + '?' + $.param(query);
            window.location = url;

            return false;
        });
    </script>
@endsection
