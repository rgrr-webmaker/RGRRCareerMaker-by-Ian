@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="padding: 20px; max-width: 500px; margin: 0 auto;">
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" name="remember" value="1"> Remember me
            </label>
        </div>

        <button type="submit" style="padding: 10px 20px;">Login</button>
    </form>

    <p style="margin-top: 20px;">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>

    <div style="margin-top: 30px; padding: 20px; background: #f0f0f0;">
        <h3>Test Accounts</h3>
        <p><strong>Student:</strong> student@test.com / password</p>
        <p><strong>Employer:</strong> employer@test.com / password</p>
    </div>
</div>
@endsection
