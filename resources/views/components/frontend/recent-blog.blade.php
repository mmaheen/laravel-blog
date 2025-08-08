<h3 class="widget-title">Recent Posts</h3>

@foreach ($blogs as $recent_blog)
    <div class="post-item">
        <img src="{{ asset('uploads/blogs/' . $recent_blog->image) }}" alt="" class="flex-shrink-0">
        <div>
            <h4>
                <a href="{{ route('blog.show', $recent_blog->slug) }}">
                    {{ \Illuminate\Support\Str::limit($recent_blog->title, 50) }}
                </a>
            </h4>
            <time datetime="2020-01-01">{{ $recent_blog->created_at->format('M d, Y') }}</time>
        </div>
    </div>
@endforeach
