@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div style="padding: 20px; max-width: 500px; margin: 0 auto;">
    <h1>Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="role">I am a:</label>
            <select id="role" name="role" required style="width: 100%; padding: 5px;" onchange="toggleRoleFields()">
                <option value="">Select Role</option>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
            </select>
        </div>

        <div id="student-fields" style="display: none; margin-bottom: 15px;">
            <label for="university">University:</label>
            <input type="text" id="university" name="university" value="{{ old('university') }}" style="width: 100%; padding: 5px;">
        </div>

        <div id="employer-fields" style="display: none; margin-bottom: 15px;">
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" style="width: 100%; padding: 5px;">
        </div>

        <button type="submit" style="padding: 10px 20px;">Register</button>
    </form>

    <p style="margin-top: 20px;">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
</div>

<script>
function toggleRoleFields() {
    const role = document.getElementById('role').value;
    const studentFields = document.getElementById('student-fields');
    const employerFields = document.getElementById('employer-fields');

    if (role === 'student') {
        studentFields.style.display = 'block';
        employerFields.style.display = 'none';
        document.getElementById('university').required = true;
        document.getElementById('company_name').required = false;
    } else if (role === 'employer') {
        studentFields.style.display = 'none';
        employerFields.style.display = 'block';
        document.getElementById('university').required = false;
        document.getElementById('company_name').required = true;
    } else {
        studentFields.style.display = 'none';
        employerFields.style.display = 'none';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleRoleFields();
});
</script>
@endsection
