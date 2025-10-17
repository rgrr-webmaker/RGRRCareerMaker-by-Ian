@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gradient-to-br from-emerald-600 to-green-600 flex items-center justify-center shadow-sm">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Welcome Back</h1>
            <p class="text-slate-600">Sign in to your account</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

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

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox"
                       id="remember"
                       name="remember"
                       value="1"
                       class="w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                <label for="remember" class="ml-2 text-sm text-slate-700">Remember me for 30 days</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                Sign In
            </button>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-slate-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-emerald-600 hover:text-emerald-700 transition-colors duration-150">
                    Register here
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
