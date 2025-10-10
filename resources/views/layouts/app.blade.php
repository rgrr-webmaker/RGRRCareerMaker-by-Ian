<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JobFinder')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-[#F0F0F0] via-[#D9E9CF] to-[#B6CEB4]">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-lg border-b-2 border-[#96A78D]/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-md group-hover:shadow-xl transition-all duration-300 group-hover:scale-110">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] bg-clip-text text-transparent">JobFinder</span>
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1">
                    @auth
                        @if(auth()->user()->isStudent())
                            <a href="{{ route('student.dashboard') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Dashboard</a>
                            <a href="{{ route('student.jobs.index') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Browse Jobs</a>
                            <a href="{{ route('student.applications.index') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">My Applications</a>
                            <a href="{{ route('student.profile') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Profile</a>
                        @else
                            <a href="{{ route('employer.dashboard') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Dashboard</a>
                            <a href="{{ route('employer.jobs.index') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">My Jobs</a>
                            <a href="{{ route('employer.jobs.create') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Post Job</a>
                            <a href="{{ route('employer.profile') }}" class="px-4 py-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">Profile</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline-block ml-2">
                            @csrf
                            <button type="submit" class="px-6 py-2 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-medium shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2 rounded-lg text-[#96A78D] hover:bg-[#D9E9CF]/50 transition-all duration-300 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="px-6 py-2 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-medium shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                            Register
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-[#96A78D]/20">
            <div class="px-4 py-4 space-y-2 bg-white/95 backdrop-blur-md">
                @auth
                    @if(auth()->user()->isStudent())
                        <a href="{{ route('student.dashboard') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                        <a href="{{ route('student.jobs.index') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <span>Browse Jobs</span>
                            </div>
                        </a>
                        <a href="{{ route('student.applications.index') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span>My Applications</span>
                            </div>
                        </a>
                        <a href="{{ route('student.profile') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Profile</span>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('employer.dashboard') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                        <a href="{{ route('employer.jobs.index') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>My Jobs</span>
                            </div>
                        </a>
                        <a href="{{ route('employer.jobs.create') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Post Job</span>
                            </div>
                        </a>
                        <a href="{{ route('employer.profile') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Profile</span>
                            </div>
                        </a>
                    @endif
                    <div class="pt-4 border-t border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-4 py-3 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-medium shadow-md hover:shadow-xl transition-all duration-300">
                                <div class="flex items-center justify-center space-x-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Logout</span>
                                </div>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-[#D9E9CF]/50 hover:text-[#96A78D] transition-all duration-300 font-medium">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span>Login</span>
                        </div>
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-3 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-medium shadow-md hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center justify-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span>Register</span>
                        </div>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] border-l-4 border-[#96A78D] text-gray-800 p-4 rounded-lg shadow-lg flex items-start space-x-3 animate-slideIn">
                <svg class="w-6 h-6 text-[#96A78D] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded-lg shadow-lg flex items-start space-x-3 animate-slideIn">
                <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="bg-red-50 border-l-4 border-red-400 text-red-800 p-4 rounded-lg shadow-lg animate-slideIn">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="font-semibold mb-2">Please correct the following errors:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-md border-t-2 border-[#96A78D]/20 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p class="text-sm">&copy; {{ date('Y') }} JobFinder. Connecting talent with opportunity.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            menuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = menuButton.contains(event.target) || mobileMenu.contains(event.target);
                if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
