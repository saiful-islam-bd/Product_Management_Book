@extends('layouts.master')
@section('content')
    <div class="main-content mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <span style="font-weight:600;font-size: 20px;">All Posts</span>

                        @can('trash', \App\Models\Post::class)
                        <a href="{{ route('posts.trashed') }}" class="btn btn-warning"
                        style="float: right; margin-right:10px;">Trashed</a>
                        @endcan

                        @can('create', \App\Models\Post::class)
                            <a href="{{ route('posts.create') }}" class="btn btn-primary"
                                style="float: right; margin-right:10px;">Create</a>
                        @endcan

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%; text-align:center;">#</th>
                                    <th scope="col" style="width:10%; text-align:center;">Image</th>
                                    <th scope="col" style="width:10%; text-align:center;">Title</th>
                                    <th scope="col" style="width:30%; text-align:center; justify-content:center;">
                                        Description</th>
                                    <th scope="col" style="width:10%; text-align:center;">Category</th>
                                    <th scope="col" style="width:15%; text-align:center;">Publish Date</th>
                                    <th scope="col" style="width:20%; text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row" style="text-align: center;">{{ $post->id }}</th>

                                        <td style="text-align: center;"><img src="{{ asset($post->image) }}" alt=""
                                                width="80" height="70"></td>

                                        <td style="text-align: center;">{{ $post->title }}</td>

                                        <td style="text-align: center;">{{ $post->description }}
                                        </td>

                                        <td style="text-align: center;">{{ $post->category->name }}</td>

                                        <td style="text-align: center;">{{ date('d-m-Y', strtotime($post->created_at)) }}
                                        </td>

                                        <td style="text-align: center;">

                                            <div class="d-flex">
                                                <div>
                                                    <a href="{{ route('posts.show', $post->id) }}"
                                                        class="btn btn-sm btn-primary me-1 text-white">Show</a>

                                                    @can('update', $post)
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                            class="btn btn-sm btn-success me-2">Edit</a>
                                                    @endcan

                                                </div>

                                                <div>
                                                    @can('delete', $post)
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" style="">Delete</button>
                                                    </form>
                                                    @endcan

                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $posts->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
