@extends('backend.layouts.master')
@section('title', 'Blog Table')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title"><strong>Title:</strong> {{ $blog->title }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><strong>Subtitle:</strong>
                                                {{ $blog->subtitle }}</h6>
                                        </div>
                                        @php
                                            $blogImage = blogImage($blog->image, $blog);
                                        @endphp
                                        <img class="img-fluid" src="{{ $blogImage['src'] }}" alt="{{ $blogImage['alt'] }}">

                                        <div class="card-body">
                                            @php
                                                $authorImage = userImage($blog->user->image, $blog->user);
                                            @endphp

                                            <div class="d-flex align-items-center mb-2">
                                                <img src="{{ $authorImage['src'] }}" alt="{{ $authorImage['alt'] }}"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <h5 class="card-title mx-2 mb-0">{{ $blog->user->name }}</h5>
                                            </div>

                                            <h6 class="card-subtitle mb-2 text-muted"><strong>Category:</strong>
                                                {{ $blog->category->name }}</h6>
                                            <p class="card-text">{{ $blog->description }}</p>
                                            @foreach ($blog->tags as $tag)
                                                <strong>Tags:</strong>
                                                <span class="badge badge-primary">{{ ucfirst($tag->name) }}</span>
                                            @endforeach
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text d-inline"><small class="text-muted">Last updated
                                                    {{ $blog->updated_at->diffForHumans() }}</small>
                                            </p><a href="{{ route('dashboard.blogs.edit', $blog->slug) }}"
                                                class="card-link float-right"><small>Edit</small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Comments ({{ $blog->comments_count }})</h4>
                                            <div id="comments">
                                                @foreach ($blog->comments as $comment)
                                                    <div class="media border-bottom-1 pt-3 pb-3">
                                                        @php
                                                            $commenterImage = userImage(
                                                                $comment->user->image,
                                                                $comment->user,
                                                            );
                                                        @endphp
                                                        <img width="35" src="{{ $commenterImage['src'] }}"
                                                            alt="{{ $commenterImage['alt'] }}" class="mr-3 rounded-circle">
                                                        <div class="media-body">
                                                            <h5>{{ $comment->user->name }}</h5>
                                                            <p class="mb-0">{{ $comment->content }}</p>
                                                        </div><span
                                                            class="text-muted ">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
