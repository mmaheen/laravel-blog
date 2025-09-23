@extends('backend.layouts.master')
@section('title', 'Edit Blog')

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

        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Blog</h4>
                            <div class="basic-form">
                                <form action="{{ route('dashboard.blogs.update', $blog->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-rounded"
                                                value="{{ $blog->title }}" name="title" placeholder="Title"
                                                id="title">
                                            @error('title')
                                                <span class="text-danger mx-2">* {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="subtitle" class="col-sm-2 col-form-label">Sub Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-rounded" name="subtitle"
                                                value="{{ $blog->subtitle }}" placeholder="Subtitle" id="subtitle">
                                            @error('subtitle')
                                                <span class="text-danger mx-2">* {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control h-150px" rows="5" name="description" id="description">{{ $blog->description }}</textarea>
                                            @error('description')
                                                <span class="text-danger mx-2">* {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="custom-select mr-sm-2" name="category_id" id="category_id">
                                                <option selected="selected" value="{{ $blog->category->id }}">
                                                    {{ $blog->category->name }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger mx-2">* {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label for="is_published" class="col-form-label col-sm-2 pt-0">Publish
                                                Status</label>
                                            <div class="col-sm-10">
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="is_published" value="1"
                                                        {{ $blog->is_published ? 'checked' : '' }}> Published</label>
                                                <label class="radio-inline mr-3">
                                                    <input type="radio" name="is_published" value="0"
                                                        {{ !$blog->is_published ? 'checked' : '' }}> Unpublished</label>
                                                @error('is_published')
                                                    <span class="text-danger mx-2">* {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="image">
                                                    <label class="custom-file-label" for="image">Choose image</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                            <span class="text-danger mx-2">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label for="tags" class="col-form-label col-sm-2 pt-0">
                                                Tags
                                            </label>
                                            <div class="col-sm-10">
                                                @foreach ($tags as $tag)
                                                    <label class="form-check-label mr-4">
                                                        <input type="checkbox" class = "form-check-input" name="tags[]"
                                                            value="{{ $tag->id }}"
                                                            {{ $blog->tags->contains($tag->id) ? 'checked' : '' }}>
                                                        {{ ucfirst($tag->name) }}</label>
                                                @endforeach

                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
