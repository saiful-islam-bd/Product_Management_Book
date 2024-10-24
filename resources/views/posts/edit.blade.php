@extends('layouts.master')
@section('content')
    <div class="main-content mt-5">
        <div class="row">
            <div class="col-1"></div>

            <div class="col-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <span style="font-weight:600;font-size: 20px;">Edit Post</span>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary"
                            style="float: right; margin-right:10px;">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="border border-1 p-2 mb-2" style="width: 15%;">
                                    <img src="{{ asset($post->image) }}" alt="" width="120" height="100">
                                </div>
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" id=""
                                    placeholder="Title">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Select Category</label>
                                <select name="category_id" class="form-select" aria-label="Default select example">

                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control" aria-label="With textarea" placeholder="Description" rows="4">{{ $post->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-1"></div>

        </div>
    </div>
@endsection
