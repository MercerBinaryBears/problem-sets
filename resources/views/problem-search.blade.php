@extends('layouts.main')

@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.1/chosen.min.css">
@endsection

@section('content')
        <form action="/problems">
            <label>Name <input name="name" type="text" value="{{ $searched_name }}" /></label>
            <br/>
            <label>
                Tags
                <select name="tags" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $searched_tags) ? "selected=selected" : null }} >{{ $tag->name }}</option>
                @endforeach
                </select>
            </label>
            <br/>
            <button>Search</button>
        </form>
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
    <script>
        $('[name=tags]').chosen();
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
