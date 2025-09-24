@extends('backend.layouts.master')
@section('title', 'Home')
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
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Blogs</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_blogs }}</h2>
                                <p class="text-white mb-0">Jan - March 2019</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Photos</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_photos }}</h2>
                                <p class="text-white mb-0">Jan - March 2019</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-photo"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Users</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_users }}</h2>
                                <p class="text-white mb-0">Jan - March 2019</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Categories</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_categories }}</h2>
                                <p class="text-white mb-0">Jan - March 2019</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-newspaper-o"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Blogs</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @php
                                                            $blogImage = blogImage($blog->image, $blog);
                                                        @endphp
                                                        <img class="rounded mr-2" width="30" height="30"
                                                            src="{{ $blogImage['src'] }}" alt="{{ $blogImage['alt'] }}">
                                                        {{ \Illuminate\Support\Str::limit($blog->title, 10) }}
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @php
                                                            $userImage = userImage($blog->user->image, $blog->user);
                                                        @endphp
                                                        <img class="rounded-circle mr-2" width="25" height="25"
                                                            src="{{ $userImage['src'] }}" alt="{{ $userImage['alt'] }}">
                                                        {{ $blog->user->name }}
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="badge badge-primary px-2">{{ $blog->is_published ? 'Published' : 'Draft' }}</span>
                                                </td>
                                                <td>{{ $blog->category->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Photos</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($photos as $photo)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <div class="d-flex">
                                                        @php
                                                            $photoImage = photoImage($photo->image, $photo);
                                                        @endphp
                                                        <img class="rounded mr-2" width="30" height="30"
                                                            src="{{ $photoImage['src'] }}" alt="{{ $photoImage['alt'] }}">
                                                        {{ \Illuminate\Support\Str::limit($photo->title, 10) }}
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @php
                                                            $userImage = userImage($photo->user->image, $photo->user);
                                                        @endphp
                                                        <img class="rounded-circle mr-2" width="25" height="25"
                                                            src="{{ $userImage['src'] }}" alt="{{ $userImage['alt'] }}">
                                                        {{ $photo->user->name }}
                                                    </div>
                                                </td>
                                                <td><span
                                                        class="badge badge-primary px-2">{{ $photo->is_published ? 'Published' : 'Draft' }}</span>
                                                </td>
                                                <td>{{ $photo->category->name }}</td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                @foreach ($random_users as $user)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    {{-- <img src="./images/users/8.jpg" class="rounded-circle" alt=""> --}}
                                    @php
                                        $userImage = userImage($user->image, $user);
                                    @endphp
                                    <img class="rounded-circle" width="100" height="100" src="{{ $userImage['src'] }}"
                                        alt="{{ $userImage['alt'] }}">
                                    <h5 class="mt-3 mb-1">{{ $user->name }}</h5>
                                    <p class="m-0">
                                        {{ \Faker\Factory::create()->jobTitle }}
                                    </p>
                                    <!-- <a href="javascript:void()" class="btn btn-sm btn-warning">Send Message</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
