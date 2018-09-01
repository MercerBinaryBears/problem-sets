<h2>
    <a href="/problems/{{ $problem->id }}">
    {{ $problem->name }}
    </a>
</h2>
<h3>Tags</h3>
<ul>
@foreach($problem->tags as $tag)
    <li>
        <a href="/problems?tags={{ $tag->id }}">{{ $tag->name }}</a>
    </li>
@endforeach
</ul>
