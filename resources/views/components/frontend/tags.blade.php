<h3 class="widget-title">Tags</h3>
<ul>
    @foreach ($tags as $tag)
        <li><a href="#">{{ ucfirst($tag->name) }}</a></li>
    @endforeach
</ul>
