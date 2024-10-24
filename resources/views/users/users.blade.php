@extends('layouts.master')
@section('content')
    <div class="main-content mt-5">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">
                <div class="card mb-5">
                    <div class="card-header">
                        <span style="font-weight:600;font-size: 20px;">Authenticated Users Data</span>

                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered border-dark">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:5%; text-align:center;">#</th>
                                    <th scope="col" style="width:10%; text-align:center;">Name</th>
                                    <th scope="col" style="width:10%; text-align:center;">Email</th>
                                    <th scope="col" style="width:15%; text-align:center;">Created at</th>
                                    <th scope="col" style="width:10%; text-align:center;">Status</th>
                                    {{-- <th scope="col" style="width:20%; text-align:center;">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" style="text-align: center;">{{ $user->id }}</th>

                                        <td style="text-align: center;">{{ $user->name }}</td>

                                        <td style="text-align: center;">{{ $user->email }}
                                        </td>

                                        <td style="text-align: center;">{{ date('d-m-Y', strtotime($user->created_at)) }}
                                        </td>

                                        <td style="text-align: center;">{{ $user->role->name }}
                                        </td>


                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

                        {{-- {{$users->links()}} --}}

                    </div>
                </div>
            </div>

            <div class="col-2"></div>
        </div>
    </div>
@endsection
