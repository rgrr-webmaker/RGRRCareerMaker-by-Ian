@extends('layouts.app')

@section('title', 'Welcome to JobFinder')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center py-16 px-4">
        <div class="mb-8 inline-block">
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] rounded-full blur-2xl opacity-30 animate-pulse"></div>
                <div class="relative w-24 h-24 mx-auto bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] rounded-full flex items-center justify-center shadow-2xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <h1 class="text-5xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-[#96A78D] via-[#B6CEB4] to-[#96A78D] bg-clip-text text-transparent animate-gradient">
            Welcome to JobFinder
        </h1>

        <p class="text-xl md:text-2xl text-gray-700 mb-12 max-w-3xl mx-auto leading-relaxed">
            Connect students with employers for meaningful career opportunities.
            <span class="text-[#96A78D] font-semibold">Your journey starts here.</span>
        </p>

        @guest
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                   class="group px-8 py-4 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2">
                    <span>Get Started</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <a href="{{ route('login') }}"
                   class="px-8 py-4 rounded-xl bg-white text-[#96A78D] font-semibold text-lg border-2 border-[#96A78D] hover:bg-[#D9E9CF]/30 shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Already have an account?
                </a>
            </div>
        @else
            <div class="flex justify-center">
                @if(auth()->user()->isStudent())
                    <a href="{{ route('student.dashboard') }}"
                       class="group px-8 py-4 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2">
                        <span>Go to Dashboard</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('employer.dashboard') }}"
                       class="group px-8 py-4 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 flex items-center space-x-2">
                        <span>Go to Dashboard</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif
            </div>
        @endguest
    </div>

    <!-- Features Section -->
    <div class="grid md:grid-cols-3 gap-8 mt-20 mb-16">
        <!-- Feature 1 -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-[#D9E9CF]">
            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-md">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Find Your Dream Job</h3>
            <p class="text-gray-600 leading-relaxed">Browse through hundreds of opportunities tailored for students and recent graduates.</p>
        </div>

        <!-- Feature 2 -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-[#D9E9CF]">
            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-md">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Connect with Employers</h3>
            <p class="text-gray-600 leading-relaxed">Build meaningful connections with companies looking for talented individuals like you.</p>
        </div>

        <!-- Feature 3 -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 border border-[#D9E9CF]">
            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-md">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Track Applications</h3>
            <p class="text-gray-600 leading-relaxed">Manage all your applications in one place and receive real-time updates on your progress.</p>
        </div>
    </div>
</div>

<style>
@keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.animate-gradient {
    background-size: 200% auto;
    animation: gradient 3s ease infinite;
}

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

.animate-slideIn {
    animation: slideIn 0.3s ease-out;
}
</style>
@endsection
