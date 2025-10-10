@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-[#D9E9CF]">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
            <p class="text-gray-600">Join JobFinder today</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           required
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="John Doe">
                </div>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="you@example.com">
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="••••••••">
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="••••••••">
                </div>
            </div>

            <!-- Role Selection -->
            <div>
                <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">I am a:</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <select id="role"
                            name="role"
                            required
                            onchange="toggleRoleFields()"
                            class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none appearance-none bg-white">
                        <option value="">Select Role</option>
                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Student Fields -->
            <div id="student-fields" style="display: none;">
                <label for="university" class="block text-sm font-semibold text-gray-700 mb-2">University</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <input type="text"
                           id="university"
                           name="university"
                           value="{{ old('university') }}"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="University Name">
                </div>
            </div>

            <!-- Employer Fields -->
            <div id="employer-fields" style="display: none;">
                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">Company Name</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <input type="text"
                           id="company_name"
                           name="company_name"
                           value="{{ old('company_name') }}"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="Company Name">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                Create Account
            </button>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-[#96A78D] hover:text-[#B6CEB4] transition-colors duration-300">
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

        // Add smooth animation
        studentFields.style.animation = 'slideIn 0.3s ease-out';
    } else if (role === 'employer') {
        studentFields.style.display = 'none';
        employerFields.style.display = 'block';
        universityInput.required = false;
        companyInput.required = true;

        // Add smooth animation
        employerFields.style.animation = 'slideIn 0.3s ease-out';
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

<style>
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
