@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Blog Details</li>
                </ol>
            </nav>
            <h1>Blog Details</h1>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container" data-aos="fade-up">

                        <article class="article">

                            <div class="hero-img" data-aos="zoom-in">
                                @php
                                    $blogImage = blogImage($blog->image, $blog->title);
                                @endphp
                                <img src="{{ $blogImage['src'] }}" alt="{{ $blogImage['alt'] }}" class="img-fluid"
                                    loading="lazy">
                                <div class="meta-overlay">
                                    <div class="meta-categories">
                                        <a href="{{ route('blogs.by.category', $blog->category->slug) }}"
                                            class="category">{{ ucfirst($blog->category->name) }}</a>
                                        <span class="divider">•</span>
                                        <span class="reading-time">
                                            <i class="bi bi-clock"></i>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                <div class="content-header">
                                    <h1 class="title">
                                        {{ $blog->title }}
                                    </h1>

                                    <div class="author-info">
                                        <div class="author-details">
                                            {{-- <img src="{{ asset('uploads/users/' . $blog->user->image) }}" alt="Author"
                                                class="author-img"> --}}
                                            @php
                                                $authorImage = userImage($blog->user->image, $blog->user->name);
                                            @endphp
                                            <img src="{{ $authorImage['src'] }}" alt="{{ $authorImage['alt'] }}"
                                                class="author-img">
                                            <div class="info">
                                                <h4>{{ ucfirst($blog->user->name) }}</h4>
                                                <span class="role">Senior Web Developer</span>
                                            </div>
                                        </div>
                                        <div class="post-meta">
                                            <span class="date"><i class="bi bi-calendar3"></i>
                                                {{ $blog->created_at->format('M d, Y') }}</span>
                                            <span class="divider">•</span>
                                            <span class="comments"><i class="bi bi-chat-text"></i>
                                                {{ $blog->comments_count }} Comments</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="content">
                                    <p class="lead">
                                        {{ $blog->subtitle }}
                                    </p>

                                    <p>
                                        {{ $blog->description }}
                                    </p>

                                </div>

                                <div class="meta-bottom">
                                    <div class="tags-section">
                                        <h4>Related Topics</h4>
                                        <div class="tags">
                                            @foreach ($blog->tags as $tag)
                                                <a href="{{ route('blogs.by.tag', $tag->slug) }}"
                                                    class="tag">{{ ucfirst($tag->name) }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="share-section">
                                        <h4>Share Article</h4>
                                        <div class="social-links">
                                            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                            <a href="#" class="copy-link" title="Copy Link"><i
                                                    class="bi bi-link-45deg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </div>
                </section>
                <!-- /Blog Details Section -->

                <!-- Blog Comments Section -->
                <section id="blog-comments" class="blog-comments section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="blog-comments-4">
                            <div class="comments-header">
                                <h3 class="title">Community Feedback</h3>
                                <div class="comments-stats">
                                    <span class="count">{{ $blog->comments_count }}</span>
                                    <span class="label">Comments</span>
                                </div>
                            </div>

                            <div class="comments-container">
                                @foreach ($blog->comments as $comment)
                                    <div class="comment-thread">
                                        <div class="comment-box">
                                            <div class="comment-wrapper">
                                                <div class="avatar-wrapper">
                                                    @php
                                                        $commenterImage = userImage(
                                                            $comment->user->image,
                                                            $comment->user->name,
                                                        );
                                                    @endphp
                                                    <img src="{{ $commenterImage['src'] }}"
                                                        alt="{{ $commenterImage['alt'] }}" loading="lazy">
                                                    <span class="status-indicator"></span>
                                                </div>

                                                <div class="comment-content">
                                                    <div class="comment-header">
                                                        <div class="user-info">
                                                            <h4>{{ $comment->user->name }}</h4>
                                                            <span class="time-badge">
                                                                <i class="bi bi-clock"></i>
                                                                {{ $comment->created_at->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                        <div class="engagement">
                                                            <span class="likes">
                                                                <i class="bi bi-heart"></i>
                                                                {{-- placeholder for likes count --}}
                                                                {{ $comment->id }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="comment-body">
                                                        <p>
                                                            {{ $comment->content }}
                                                        </p>
                                                    </div>

                                                    <div class="comment-actions">
                                                        <button class="action-btn like-btn" aria-label="Like comment">
                                                            <i class="bi bi-heart"></i>
                                                            <span>Like</span>
                                                        </button>
                                                        <button class="action-btn reply-btn"
                                                            aria-label="Reply to comment">
                                                            <i class="bi bi-chat"></i>
                                                            <span>Reply</span>
                                                        </button>
                                                        <button class="action-btn share-btn" aria-label="Share comment">
                                                            <i class="bi bi-share"></i>
                                                            <span>Share</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </section><!-- /Blog Comments Section -->

                <!-- Blog Comment Form Section -->
                <section id="blog-comment-form" class="blog-comment-form section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <form method="post" role="form">

                            <div class="form-header">
                                <h3>Leave a Comment</h3>
                                <p>Your email address will not be published. Required fields are marked *</p>
                            </div>

                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label for="name">Full Name *</label>
                                        <input type="text" name="name" id="name"
                                            placeholder="Enter your full name" required="">
                                        <span class="error-text">Please enter your name</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" name="email" id="email"
                                            placeholder="Enter your email address" required="">
                                        <span class="error-text">Please enter a valid email address</span>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group">
                                        <label for="website">Website</label>
                                        <input type="url" name="website" id="website"
                                            placeholder="Your website (optional)">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group">
                                        <label for="comment">Your Comment *</label>
                                        <textarea name="comment" id="comment" rows="5" placeholder="Write your thoughts here..." required=""></textarea>
                                        <span class="error-text">Please enter your comment</span>
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit">Post Comment</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </section><!-- /Blog Comment Form Section -->

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

                        <x-frontend.recent-post />

                    </div><!--/Recent Posts Widget -->

                    <!-- Categories Widget -->
                    <div class="categories-widget widget-item">

                        <x-frontend.categories />

                    </div><!--/Categories Widget -->

                    <!-- Tags Widget -->
                    <div class="tags-widget widget-item">

                        <x-frontend.tags />

                    </div><!--/Tags Widget -->

                </div>

            </div>

        </div>
    </div>
@endsection
