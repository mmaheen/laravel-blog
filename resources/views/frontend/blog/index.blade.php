@extends('frontend.layouts.master')
@section('title', 'Blogs')
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
                                            <div class="ratio ratio-4x3">
                                                <img src="{{ asset('uploads/blogs/' . $blog->image) }}" alt=""
                                                    class="img-fluid">
                                            </div>

                                        </div>

                                        <h2 class="title">
                                            <a href="{{ route('blog.show', $blog->slug) }}">
                                                {{ \Illuminate\Support\Str::limit($blog->title, 50) }}
                                            </a>
                                        </h2>

                                        <div class="meta-top">
                                            <div class="row">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <a
                                                        href="{{ route('blogs.by.author', $blog->user->id) }}">{{ $blog->user->name }}</a>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="{{ route('blogs.by.date', $blog->created_at->format('Y-m-d')) }}"><time
                                                            datetime="2022-01-01">{{ $blog->created_at->format('M d, Y') }}</time></a>
                                                </div>
                                                <div class="col-6 d-flex align-items-center"><i class="bi bi-chat-dots"></i>
                                                    <a href="#">12 Comments</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="content">
                                            <p>
                                                {{ \Illuminate\Support\Str::limit($blog->description, 100) }}
                                            </p>

                                            <div class="read-more">
                                                <a href="{{ route('blog.show', $blog->slug) }}">Read More</a>
                                            </div>
                                        </div>

                                    </article>
                                </div>
                                <!-- End post list item -->
                            @endforeach

                        </div>
                        <!-- End blog posts list -->

                    </div>

                </section><!-- /Blog Posts Section -->

                <!-- Pagination 2 Section -->
                <section id="pagination-2" class="pagination-2 section">

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

                </section><!-- /Pagination 2 Section -->

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

                    </div><!--/Search Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">

                        <h3 class="widget-title">Recent Posts</h3>

                        <div class="post-item">
                            <img src="{{ asset('assets/frontend') }}/img/blog/blog-post-square-1.webp" alt=""
                                class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('blog.show', ['id' => 1]) }}">Nihil blanditiis at in nihil autem</a>
                                </h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="{{ asset('assets/frontend') }}/img/blog/blog-post-square-2.webp" alt=""
                                class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('blog.show', ['id' => 1]) }}">Quidem autem et impedit</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="{{ asset('assets/frontend') }}/img/blog/blog-post-square-3.webp" alt=""
                                class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('blog.show', ['id' => 1]) }}">Id quia et et ut maxime similique
                                        occaecati ut</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="{{ asset('assets/frontend') }}/img/blog/blog-post-square-4.webp" alt=""
                                class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('blog.show', ['id' => 1]) }}">Laborum corporis quo dara net para</a>
                                </h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                        <div class="post-item">
                            <img src="{{ asset('assets/frontend') }}/img/blog/blog-post-square-5.webp" alt=""
                                class="flex-shrink-0">
                            <div>
                                <h4><a href="{{ route('blog.show', ['id' => 1]) }}">Et dolores corrupti quae illo quod
                                        dolor</a></h4>
                                <time datetime="2020-01-01">Jan 1, 2020</time>
                            </div>
                        </div><!-- End recent post item-->

                    </div><!--/Recent Posts Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <h3 class="widget-title">Categories</h3>
                        <ul class="mt-3">
                            <li><a href="#">General <span>(25)</span></a></li>
                            <li><a href="#">Lifestyle <span>(12)</span></a></li>
                            <li><a href="#">Travel <span>(5)</span></a></li>
                            <li><a href="#">Design <span>(22)</span></a></li>
                            <li><a href="#">Creative <span>(8)</span></a></li>
                            <li><a href="#">Educaion <span>(14)</span></a></li>
                        </ul>

                    </div><!--/Categories Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <h3 class="widget-title">Tags</h3>
                        <ul>
                            <li><a href="#">App</a></li>
                            <li><a href="#">IT</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Mac</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Office</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">Studio</a></li>
                            <li><a href="#">Smart</a></li>
                            <li><a href="#">Tips</a></li>
                            <li><a href="#">Marketing</a></li>
                        </ul>

                    </div><!--/Tags Widget -->

                </div>

            </div>

        </div>
    </div>

@endsection
