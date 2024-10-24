<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <nav class="navbar " style="background: #ddd;">
        <div class="container-fluid">
            <a href="{{ route('posts.index') }}" class="navbar-brand" style="font-weight: 700;">Products App</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-dark" type="submit">Search</button>
            </form>
            <a href="{{ Route('posts.index') }}" style="text-decoration:none; color:black; font-weight:700;">All
                Posts</a>

            <style>

                .dropdown {
                    position: relative;
                    display: inline-block;
                }

                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    min-width: 110px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                    border-radius: 4px;
                }

                .dropdown-content a {
                    color: #000;
                    padding: 12px 30px;
                    text-decoration: none;
                    display: block;
                }

                .dropdown-content a:hover {
                    background-color: rgb(34, 33, 33);
                    color: #fff;
                }

                .dropdown:hover .dropdown-content {
                    display: block;
                }

                .logout {
                    border: none;
                    background: #f9f9f9;
                    padding: 5px 18px 8px 17px;
                    margin: 0px 5px 8px 12px;
                }

                .logout:hover {
                    background-color: rgb(219, 9, 9);
                    color: white;
                    border-radius: 4px;
                }
            </style>
            <div class="dropdown">
                <a href="" style="text-decoration:none; color:black;"><i class="fa-solid fa-user"></i>
                    {{ Auth::user()->name }}</a>

                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">Profile</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" class="logout" value="Logout">

                    </form>
                </div>
            </div>


            <a href="{{ route('users-data') }}" style="margin-right: 20px; text-decoration:none; color:black;"><i
                    class="fa-solid fa-users"></i> All Users</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
