<h3 class="widget-title">Recent Posts</h3>

@foreach ($blogs as $blog)
    <div class="post-item">
        <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt="" class="flex-shrink-0">
        <div>
            <h4>
                <a href="{{ route('blog.show', $blog->slug) }}">
                    {{ \Illuminate\Support\Str::limit($blog->title, 45) }}
                </a>
            </h4>
            <time datetime="{{ $blog->created_at->format('Y-m-d') }}">{{ $blog->created_at->format('M d, Y') }}</time>
        </div>
    </div>
    <!-- End recent post item-->
@endforeach
