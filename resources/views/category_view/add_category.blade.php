@extends('layout.main')
@section('dashboard_right_container')
    <div class="container main-container mt-4">
        <div class="form-container">
            <h2 class="form-title">Add Category</h2>

            <form action="{{ route('Add_category') }}" method='post'>
                @csrf
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="full-name" class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="full-name"
                        placeholder="Enter category name" required>
                </div>



                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Add Category</button>
            </form>

        </div>
    </div>
@endsection
