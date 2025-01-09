@extends('layout.main')

@section('dashboard_right_container')
    <div class="container main-container mt-4">
        <div class="form-container">
            <h2 class="form-title">Create an Account</h2>

            <form action="{{ route('register_data') }}" method='post'>
                @csrf
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="full-name" class="form-label">Full Name</label>
                    <input type="text" name="user_name" class="form-control" id="full-name" placeholder="John Doe"
                        required>
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="user_email" class="form-control" id="email"
                        placeholder="youremail@example.com" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_password" id="password"
                        placeholder="Enter your password" required>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="user_confirm_password" id="confirm-password"
                        placeholder="Confirm your password" required>
                </div>

                <!-- Terms and Conditions -->
                {{-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">I agree to the <a href="#">Terms of Service</a></label>
            </div> --}}

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="form-footer">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>  
@endsection
