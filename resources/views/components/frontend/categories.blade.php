<h3 class="widget-title">Categories</h3>
<ul class="mt-3">
    @foreach ($categories as $category)
        <li>
            <a href="#">{{ $category->name }}
                <span>({{ $category->blogs_count }})</span>
            </a>
        </li>
    @endforeach
</ul>
