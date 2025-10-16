<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RGRR CareerMaker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-green-50/30 to-emerald-50/40 font-sans antialiased">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200/60 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
               <!-- Logo -->
<a href="{{ route('home') }}" class="flex items-center space-x-3 group">
    <img src="{{ asset('logo.png') }}"
         alt="RGRR CareerMaker Logo"
         class="w-10 h-10 object-contain transition-transform duration-200 group-hover:scale-105">

    <span class="text-xl font-bold text-slate-900">
        RGRR <span class="text-emerald-600">CareerMaker</span>
    </span>
</a>


                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1">
                    @auth
                        @if(auth()->user()->isStudent())
                            <a href="{{ route('student.jobs.index') }}" id="browse-jobs-link" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Browse Jobs</a>
                            <a href="{{ route('student.dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Dashboard</a>
                            <a href="{{ route('student.applications.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">My Applications</a>
                            <a href="{{ route('student.profile') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Profile</a>
                        @else
                            <a href="{{ route('employer.jobs.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">My Jobs</a>
                            <a href="{{ route('employer.jobs.create') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Post Job</a>
                            <a href="{{ route('employer.dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Dashboard</a>
                            <a href="{{ route('employer.profile') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Profile</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline-block ml-2">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-md bg-emerald-600 text-white text-sm font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Login</a>
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-emerald-600 text-white text-sm font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                            Register
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md text-slate-700 hover:bg-slate-100 transition-colors duration-150">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200">
            <div class="px-4 py-3 space-y-1 bg-white">
                @auth
                    @if(auth()->user()->isStudent())
                        <a href="{{ route('student.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Dashboard</a>
                        <a href="{{ route('student.jobs.index') }}" id="browse-jobs-link-mobile" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Browse Jobs</a>
                        <a href="{{ route('student.applications.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">My Applications</a>
                        <a href="{{ route('student.profile') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Profile</a>
                    @else
                        <a href="{{ route('employer.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Dashboard</a>
                        <a href="{{ route('employer.jobs.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">My Jobs</a>
                        <a href="{{ route('employer.jobs.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Post Job</a>
                        <a href="{{ route('employer.profile') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Profile</a>
                    @endif
                    <div class="pt-3 border-t border-slate-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full px-3 py-2 rounded-md bg-emerald-600 text-white text-base font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Login</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md bg-emerald-600 text-white text-base font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg flex items-start space-x-3">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-start space-x-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                <div class="flex items-start space-x-3">
                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-semibold mb-1">Please correct the following errors:</p>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
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
    <footer class="bg-white/70 backdrop-blur-sm border-t border-slate-200/60 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-slate-600">
                <p class="text-sm">&copy; {{ date('Y') }} <a href="https://www.facebook.com/webmakerLucena.co"
   target="_blank"
   rel="noopener noreferrer"
   class="text-emerald-600 font-semibold hover:underline">
   RGRR CareerMaker
</a>
 — Connecting Talent with Opportunity.</p>
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

            if (menuButton) {
                menuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    menuIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });

                document.addEventListener('click', function(event) {
                    const isClickInside = menuButton.contains(event.target) || mobileMenu.contains(event.target);
                    if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        menuIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
