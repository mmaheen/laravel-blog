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
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td><img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                                        alt="{{ $blog->title }}" width="60"></td>
                                                <td>
                                                    <img src="{{ asset('uploads/users/' . $blog->user->image) }}"
                                                        alt="{{ $blog->user->name }}" width="40"
                                                        class="rounded-circle mr-2">
                                                    {{ $blog->user->name }}
                                                </td>
                                                <td>{{ \Illuminate\Support\Str::limit($blog->title, 30) }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($blog->subtitle, 30) }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($blog->description, 30) }}</td>
                                                <td>{{ $blog->is_published ? 'Published' : 'Unpublished' }}</td>
                                                <td>{{ $blog->category->name }}</td>
                                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                            <th>Created At</th>
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
