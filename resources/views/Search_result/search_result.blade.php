@extends('layout.main')
@section('sidebar')
    <div class="sidebar p-3">
        <h4></h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add_category') }}">Add Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>
@endsection
@section('dashboard_right_container')
    <div class="content">
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">My App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-4">
            <h1>My Store</h1>
            @if ($data->isEmpty())
                <p>No Category</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th style="width:10%">Serial No.</th>
                            <th style="width:50%">Category</th>
                            <th style="width:40%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div style="display: flex">
                                        <form action="{{ route('View_product', $item->id) }}" method="get">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-primary">View</button>
                                        </form> &nbsp;&nbsp;&nbsp;
                                        <form action="{{ route('Add_product', $item->id) }}" method="get">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-success">Add Product</button>
                                        </form> &nbsp;&nbsp;&nbsp;
                                        <form action="{{ route('delete_category', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete Category</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        </tbody>
        </table> --}}

        <h1>This is search result</h1>

    </div>
    
@endsection
