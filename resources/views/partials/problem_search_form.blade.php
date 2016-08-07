<form class="grid" action="/problems" data-search-form="true">
    <label class="grid-25" for="name">Name</label>
    <input id="name" class="grid-75" name="name" type="text" value="{{ $searched_name }}" />
    <label class="grid-25" for="tags">Tags</label>
    <select name="tags" class="grid-75" multiple="multiple" data-chosen="true">
    @foreach($tags as $tag)
        <option value="{{ $tag->id }}" {{ in_array($tag->id, $searched_tags) ? "selected=selected" : null }} >{{ $tag->name }}</option>
    @endforeach
    </select>
    <button class="grid-100">Search</button>
</form>
@include('assets.chosen-scripts')
<script src="/build/js/search-form.js"></script>
