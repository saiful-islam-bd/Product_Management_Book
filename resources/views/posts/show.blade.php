@extends('layouts.master')
@section('content')
    <div class="main-content mt-5">
        <div class="row">
            <div class="col-1"></div>

            <div class="col-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <span style="font-weight:600;font-size: 20px;">Show Post</span>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary"
                            style="float: right; margin-right:10px;">Back</a>
                    </div>

                    <div class="card-body ps-5 pe-5">
                        <div class="text-center">
                            <img src="{{ asset($post->image) }}" alt="Image" style="width: 400px; height:400px;">
                        </div>
                        <div class="p-4">
                            <p style="margin-bottom: 0rem;"><span style="font-weight: 600;">Title:</span>
                                {{ $post->title }}</p>
                            <p style="margin-bottom: 0rem;"><span style="font-weight: 600;">Category:</span>
                                {{ $post->category->name }}</p>
                            <p style="margin-bottom: 0rem;"><span style="font-weight: 600;">Published at:</span>
                                {{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                            <p style="margin-bottom: 0rem;"><span style="font-weight: 600;">Description:</span>
                                {{ $post->description }}</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-1"></div>
        </div>
    </div>
@endsection
