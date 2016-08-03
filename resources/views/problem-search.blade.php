<!DOCTYPE>
<html>
    <body>
        <form action="/problems">
            <label>Name <input name="name" type="text" /></label>
            <br/>
            <label>
                Tags
                <select name="tags" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
                </select>
            </label>
            <br/>
            <button>Search</button>
        </form>
        <ul class="search-results">
        @foreach($search_results as $problem)
            <li>
                <a href="/problems/{{ $problem->id }}/pdf">{{ $problem->name }}</a>
            </li>
        @endforeach
        </ul>
    </body>
</html>
