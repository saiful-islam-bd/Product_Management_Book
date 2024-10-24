@extends('layouts.master')
@section('content')
    <div class="main-content mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <span style="font-weight:600;font-size: 20px;">Trashed Posts</span>
                        <a href="{{ route('posts.index') }}" class="btn btn-info"
                            style="float: right; margin-right:10px;">All Posts</a>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary"
                            style="float: right; margin-right:10px;">Create</a>
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

                                                <a href="{{ route('posts.restore', $post->id) }}"
                                                    class="btn btn-sm btn-success me-2">Restore</a>

                                                <form action="{{ route('posts.force_delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item permanently?')">Delete</button>
                                                </form>

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


    <!-- Modal -->
    {{-- <div>
        <button data-bs-toggle="modal" data-bs-target="#force" class="btn btn-sm btn-danger">Delete</button>
    </div>
    <div class="modal fade" id="force" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-0" style="border-bottom: none;">
                    <h5 class="modal-title">Alert Messeage!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/uploads/1725772424_question (1).gif') }}" alt=""
                        style="width: 25%">
                    <p>Are you sure you want to delete this item permanently?
                    </p>
                </div>
                <div class="modal-footer" style="border-top: none;">

                    <form action="{{ route('posts.force_delete', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                    </form>



                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
