{{-- @extends('layout.main')
@section('dashboard_right_container')
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <h1>My Store > Furniture</h1>

            <table>
                <thead>
                    <tr>
                        <th style="width:10%">Serial No.</th>
                        <th style="width:50%">Items</th>
                        <th style="width:40%">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Furniture</td>
                    <td>
                        <div style="display: flex">
                            <form action="{{ route('View_product') }}" method="get">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form> &nbsp;&nbsp;&nbsp;
                            <form action="{{ route('Add_product') }}" method="get">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> &nbsp;&nbsp;&nbsp;
                            <form action="{{ route('Back_from_category_view') }}" method="get">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-primary">Back</button>
                            </form> 
                            

                    </td>
        </div>

        </tbody>
        </table>

    </div>
    </div>
@endsection --}}


@extends('layout.main')
@section('dashboard_right_container')
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <h1>My Store > {{$category_name[0]['name']}} category</h1>
            @if ($category_items->isEmpty())
                <p>No Items in this category</p>
            @else
            {{-- for adding the new records  --}}
            {{-- <form action="{{ route('Add_product',(($category_items[0]['category_id'])))}}" method="get">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-success">Add New Items</button>
                 <div>{{$category_items->category_id}}</div>
            </form> &nbsp;&nbsp;&nbsp; --}}
            
                <table>
                    <thead>
                        <tr>
                            <th style="width:10%">Serial No.</th>
                            <th style="width:50%">Item Name</th>
                            <th style="width:50%">Item Model</th>
                            <th style="width:50%">Item Title</th>
                            <th style="width:50%">Item Description</th>
                            <th style="width:50%">Item Amount</th>
                            <th style="width:40%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category_items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                {{-- <td>{{ $item->category_id }}</td> --}}
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->model }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->short_desc }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>
                                    <div style="display: flex">
                                         

                                        <form action="{{ route('edit_category_item', $item->id) }}" method="get">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form> &nbsp;&nbsp;&nbsp;
                                        <form
                                            action="{{ route('delete_category_item', ['id1' => $item->id, 'id2' => $item->category_id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
        </table>

    </div>
    </div>
@endsection
