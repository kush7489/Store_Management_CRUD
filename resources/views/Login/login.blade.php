@extends('layout.Main')
@section('dashboard_right_container')
    <div class="container main-container">
        <div class="form-container">
            <h2 class="form-title">Login to Your Account</h2>

            <form action="{{ route('login_data') }}" method="post">
                <!-- Email Field -->
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="user_email"
                        placeholder="youremail@example.com" required>
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="user_password"
                        placeholder="Enter your password" required>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <div class="form-footer">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </div>
@endsection
