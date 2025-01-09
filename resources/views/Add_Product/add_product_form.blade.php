@extends('layout.main')
@section('dashboard_right_container')
    <div class="container main-container mt-4">
        <div class="form-container">
            <h2 class="form-title">Add Items</h2>

            <form action="{{ route('Add_product.submit') }}" method='post'>
                @csrf
                <!-- Name Field -->
                <div class="mb-1">
                    <label for="full-name" class="form-label">Product Name</label>
                    <input type="text" name="p_name" class="form-control" id="full-name" placeholder="Enter product name"
                        required>
                </div>

                <!-- Email Field -->
                <div class="mb-1">
                    <label for="email" class="form-label">Product Model</label>
                    <input type="text" name="p_model" class="form-control" id="email"
                        placeholder="Enter product model name" required>
                </div>
                <input type="hidden" name="category_id" value="{{$category->id}}"
                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="p_title" id="password"
                        placeholder="Enter product title" required>
                </div>

                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Short Desc</label>
                    <input type="text" class="form-control" name="p_desc" id="password"
                        placeholder="Enter short description" required>
                </div>

                <!-- Password Field -->
                <div class="mb-1">
                    <label for="password" class="form-label">Product Amount</label>
                    <input type="text" class="form-control" name="p_amount" id="password"
                        placeholder="Enter product amount" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </form>

        </div>
    </div>
@endsection
