@extends('backend.layouts.master')
@section('title', 'Blog Table')
@section('styles')
    <link href="{{ asset('assets/backend/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard.blogs.index') }}">Blog</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($blog->image == null)
                                                        <img src="{{ asset('assets/default_images/placeholder.png') }}"
                                                            alt="Default Image" width="60" class="rounded">
                                                    @else
                                                        <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                                            alt="{{ $blog->title }}" width="60" class="rounded">
                                                    @endif
                                                    {{-- <img src="{{ $blog->image ? asset('uploads/blogs/' . $blog->image) : asset('assets/default_images/placeholder.png') }}"
                                                        alt="{{ $blog->title }}" width="60" class="rounded"> --}}

                                                </td>
                                                <td>
                                                    <img src="{{ $blog->user->image ? asset('uploads/users/' . $blog->user->image) : asset('assets/default_images/user.jpg') }}"
                                                        alt="{{ $blog->user->name }}" width="40"
                                                        class="rounded-circle mr-2">
                                                    {{ $blog->user->name }}
                                                </td>
                                                <td>
                                                    <strong>
                                                        <a href="{{ route('dashboard.blogs.show', $blog->slug) }}">
                                                            {{ \Illuminate\Support\Str::limit($blog->title, 30) }}
                                                        </a>
                                                    </strong>
                                                </td>
                                                <td>{{ \Illuminate\Support\Str::limit($blog->subtitle, 30) }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($blog->description, 30) }}</td>
                                                <td>{!! $blog->is_published
                                                    ? "<span class='badge badge-success'>Published</span>"
                                                    : "<span class='badge badge-danger'>Unpublished</span>" !!}</td>
                                                </td>
                                                <td>{{ $blog->category->name }}</td>
                                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('dashboard.blogs.edit', $blog->slug) }}"
                                                            class="btn btn-primary btn-sm mr-1">Edit</a>
                                                        <form action="{{ route('dashboard.blogs.destroy', $blog->slug) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/backend/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
