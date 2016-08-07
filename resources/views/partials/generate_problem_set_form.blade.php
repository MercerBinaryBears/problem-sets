<form class="grid" action="/random-practice" data-search-form="true">
    <label class="grid-25" for="tags">Tags</label>
    <select name="tags" class="grid-75" multiple="multiple" data-chosen="true">
    @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
    @endforeach
    </select>
    <button class="grid-100">Generate</button>
</form>
