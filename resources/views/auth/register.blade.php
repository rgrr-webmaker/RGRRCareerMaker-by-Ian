@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-emerald-600 to-green-600 flex items-center justify-center shadow-sm">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Create Account</h1>
            <p class="text-slate-600">Join today</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="John Doe">
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="you@example.com">
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       required
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="••••••••">
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Confirm Password</label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       required
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="••••••••">
            </div>

            <!-- Role Selection -->
            <div>
                <label for="role" class="block text-sm font-medium text-slate-700 mb-2">I am a:</label>
                <select id="role"
                        name="role"
                        required
                        onchange="toggleRoleFields()"
                        class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    <option value="">Select Role</option>
                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                </select>
            </div>

            <!-- Student Fields -->
            <div id="student-fields" style="display: none;">
                <label for="university" class="block text-sm font-medium text-slate-700 mb-2">University</label>
                <input type="text"
                       id="university"
                       name="university"
                       value="{{ old('university') }}"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="University Name">
            </div>

            <!-- Employer Fields -->
            <div id="employer-fields" style="display: none;">
                <label for="company_name" class="block text-sm font-medium text-slate-700 mb-2">Company Name</label>
                <input type="text"
                       id="company_name"
                       name="company_name"
                       value="{{ old('company_name') }}"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"
                       placeholder="Company Name">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                Create Account
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-slate-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-700 transition-colors duration-150">
                    Login here
                </a>
            </p>
        </div>
    </div>
</div>

<script>
function toggleRoleFields() {
    const role = document.getElementById('role').value;
    const studentFields = document.getElementById('student-fields');
    const employerFields = document.getElementById('employer-fields');
    const universityInput = document.getElementById('university');
    const companyInput = document.getElementById('company_name');

    if (role === 'student') {
        studentFields.style.display = 'block';
        employerFields.style.display = 'none';
        universityInput.required = true;
        companyInput.required = false;
    } else if (role === 'employer') {
        studentFields.style.display = 'none';
        employerFields.style.display = 'block';
        universityInput.required = false;
        companyInput.required = true;
    } else {
        studentFields.style.display = 'none';
        employerFields.style.display = 'none';
        universityInput.required = false;
        companyInput.required = false;
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleRoleFields();
});
</script>
@endsection
