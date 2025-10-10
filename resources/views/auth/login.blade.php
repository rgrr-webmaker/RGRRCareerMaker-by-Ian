@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-[#D9E9CF]">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h1>
            <p class="text-gray-600">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

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

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox"
                       id="remember"
                       name="remember"
                       value="1"
                       class="w-4 h-4 rounded border-gray-300 text-[#96A78D] focus:ring-[#B6CEB4] focus:ring-2 transition-all duration-300">
                <label for="remember" class="ml-2 text-sm text-gray-700">Remember me for 30 days</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                Sign In
            </button>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold text-[#96A78D] hover:text-[#B6CEB4] transition-colors duration-300">
                    Register here
                </a>
            </p>
        </div>
    </div>

    <!-- Test Accounts -->
    <div class="mt-6 bg-gradient-to-br from-[#D9E9CF]/40 to-[#B6CEB4]/20 backdrop-blur-sm rounded-2xl p-6 border border-[#D9E9CF]">
        <h3 class="font-bold text-gray-800 mb-3 flex items-center">
            <svg class="w-5 h-5 mr-2 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Test Accounts
        </h3>
        <div class="space-y-2 text-sm">
            <div class="bg-white/60 rounded-lg p-3">
                <p class="font-semibold text-gray-700 mb-1">Student Account</p>
                <p class="text-gray-600"><span class="font-medium">Email:</span> student@test.com</p>
                <p class="text-gray-600"><span class="font-medium">Password:</span> password</p>
            </div>
            <div class="bg-white/60 rounded-lg p-3">
                <p class="font-semibold text-gray-700 mb-1">Employer Account</p>
                <p class="text-gray-600"><span class="font-medium">Email:</span> employer@test.com</p>
                <p class="text-gray-600"><span class="font-medium">Password:</span> password</p>
            </div>
        </div>
    </div>
</div>
@endsection
