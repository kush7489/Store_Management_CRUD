<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;



    }

    .dashboard {
        display: flex;
        height: 100vh;
    }

    .main-container {
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        width: 100%;
        max-width: 500px;
        padding: 30px;
        background-color: white;
        box-shadow: 10px 4px 15px rgba(0, 0, 0, 0.9);
        border-radius: 8px;
    }

    .form-title {
        text-align: center;
        margin-bottom: 12px;
        color: #333;
    }

    .sidebar {
        min-width: 250px;
        max-width: 250px;
        background-color: #343a40;
        color: white;
    }

    .sidebar a {
        color: white;
    }

    .sidebar a:hover {
        background-color: #495057;
        text-decoration: none;
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">VidyaGXP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('add_category') }}">Add
                                Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Service</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest

                        @auth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Welcome
                                        {{ auth()->user()->email }}</a>
                                </li>
                            @endguest
                        @endauth

                    </ul>
                    <form class="d-flex" id="search-form" role="search">
                        @guest
                            <button class="btn btn-outline-success" type="submit"><a href="{{ route('login') }}"
                                    style="text-decoration: none">Login</a></button>
                        @endguest

                        @auth

                            <input class="form-control me-2" type="search" id="search-query"
                                placeholder="Search Products..." aria-label="Search">
                            <button class="btn btn-outline-success me-2 " type="submit">Search</button>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-success" type="submit"><a href="{{ route('logout') }}"
                                        style="text-decoration: none">Logout</a></button>
                            </form>

                        @endauth

                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="dashboard">
            <!-- Sidebar -->
            @yield('sidebar')

            <!-- Main Container -->


            @yield('dashboard_right_container')


        </div>
    </main>

    <footer>
        <center>
            <p>VidyaGXP &copy; 2024 </p>
        </center>
    </footer>
    <script>
        // Handle the search form submission
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const query = document.getElementById('search-query').value;

            // Send a GET request to the /search route with the query
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    // Update the product list with the search results
                    // let tableBody = '';
                    // data.forEach(product => {
                    //     tableBody += `
                //     <tr>
                //         <td>${product.id}</td>
                //         <td>${product.name}</td>
                //         <td>${product.desc}</td>
                //         <td>$${product.price}</td>
                //     </tr>
                // `;
                    // });
                    // document.querySelector('#products-list tbody').innerHTML = tableBody;
                    console.log(data);
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
