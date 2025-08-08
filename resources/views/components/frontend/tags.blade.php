<h3 class="widget-title">Tags</h3>
<ul>
    @foreach ($tags as $tag)
        <li>
            <a href="{{ route('tag.show', $tag->slug) }}">
                {{ ucfirst($tag->name) }}
            </a>
        </li>
    @endforeach

</ul>
