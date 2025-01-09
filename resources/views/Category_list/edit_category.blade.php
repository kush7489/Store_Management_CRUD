@extends('layout.main')
@section('dashboard_right_container')
    <div class="container main-container mt-4">
        <div class="form-container">
            <h2 class="form-title">Add Items</h2>

            <form action="{{ route('edit_category_item.submit',$category_item->id) }}" method='post'>
                @csrf
                @method('PATCH')
                <!-- Name Field -->
                <div class="mb-1">
                    <label for="full-name" class="form-label">Product Name</label>
                    <input type="text" name="p_name" class="form-control" id="full-name" placeholder="Enter product name" value="{{old('p_name',$category_item->name)}}"
                        required>
                </div>

                <!-- Email Field -->
                <div class="mb-1">
                    <label for="email" class="form-label">Product Model</label>
                    <input type="text" name="p_model" class="form-control" id="email"
                        placeholder="Enter product model name" value="{{old('p_model',$category_item->model)}}" required>
                </div>
                <input type="hidden" name="category_id" value="{{$category_item->category_id}}"
                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="p_title" id="password"
                        placeholder="Enter product title" value="{{old('p_title',$category_item->title)}}" required>
                </div>

                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Short Desc</label>
                    <input type="text" class="form-control" name="p_desc" id="password"
                        placeholder="Enter short description" value="{{old('p_desc',$category_item->short_desc)}}" required>
                </div>

                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Product Amount</label>
                    <input type="text" class="form-control" name="p_amount" id="password"
                        placeholder="Enter product amount" value="{{old('p_amount',$category_item->ampunt)}}" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update Product</button>
            </form>

        </div>
    </div>
@endsection
