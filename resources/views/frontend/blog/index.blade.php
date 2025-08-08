@extends('frontend.layouts.master')

@section('title', 'Blog')

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
            <h1>Blog</h1>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Posts Section -->
                <section id="blog-posts" class="blog-posts section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="row gy-4">

                            @foreach ($blogs as $blog)
                                <div class="col-lg-6">
                                    <article>

                                        <div class="post-img">
                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt=""
                                                class="img-fluid">
                                        </div>

                                        <h2 class="title">
                                            <a href="{{ route('blog.show', $blog->slug) }}">
                                                {{ substr($blog->title, 0, 40) }}{{ strlen($blog->title) > 40 ? '...' : '' }}
                                            </a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $blog->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2022-01-01">{{ date('M j, Y', strtotime($blog->created_at)) }}</time></a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                        href="blog-details.html">12 Comments</a></li>
                                            </ul>
                                        </div>

                                        <div class="content">
                                            <p>
                                                {{ substr($blog->content, 0, 150) }}
                                                @if (strlen($blog->content) > 150)
                                                    ...
                                                @endif
                                            </p>

                                            <div class="read-more">
                                                <a href="{{ route('blog.show', $blog->slug) }}">Read More</a>
                                            </div>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endforeach

                        </div><!-- End blog posts list -->

                    </div>

                </section>
                <!-- /Blog Posts Section -->

                <!-- Pagination 2 Section -->
                <section>
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </section>

                {{-- <section id="pagination-2" class="pagination-2 section">

                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <ul>
                                <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li>...</li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </section><!-- /Pagination 2 Section --> --}}

            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- Search Widget -->
                    <div class="search-widget widget-item">

                        <h3 class="widget-title">Search</h3>
                        <form action="">
                            <input type="text">
                            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                        </form>

                    </div>
                    <!--/Search Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">
                        <x-frontend.recent-blog />
                    </div>
                    <!--/Recent Posts Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <x-frontend.categories />

                    </div><!--/Categories Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

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

                    </div>
                    <!--/Tags Widget -->

                </div>

            </div>

        </div>
    </div>
@endsection
