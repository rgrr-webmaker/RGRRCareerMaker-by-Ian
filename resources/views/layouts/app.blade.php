<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RGRR CareerMaker')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen bg-gradient-to-br from-slate-50 via-green-50/30 to-emerald-50/40 font-sans antialiased">

    <!-- Diagonal Watermark Background - Repeating Pattern -->
    <div id="watermark-container" class="fixed inset-0 pointer-events-none select-none overflow-hidden z-0" aria-hidden="true"></div>

    <!-- Navigation -->
    <nav class="relative z-50 bg-white/80 backdrop-blur-md shadow-sm border-b border-slate-200/60 sticky top-0">
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
                            <a href="{{ route('employer.applicants.index') }}" class="px-3 py-2 rounded-md text-sm font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors duration-150">Applicants</a>
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
                        <a href="{{ route('employer.applicants.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-slate-700 hover:text-emerald-700 hover:bg-slate-50 transition-colors duration-150">Applicants</a>
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
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg flex items-start space-x-3">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-start space-x-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
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
    <main class="relative z-10 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative z-10 bg-slate-900 text-slate-300 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="py-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('logo.png') }}"
                            alt="RGRR CareerMaker Logo"
                            class="w-8 h-8 object-contain">
                        <span class="text-lg font-bold text-white">
                            RGRR <span class="text-emerald-400">CareerMaker</span>
                        </span>
                    </div>
                    <p class="text-sm text-slate-400 mb-4">
                        Connecting talented students with career opportunities. Your journey to success starts here.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- For Job Seekers -->
                <div>
                    <h3 class="text-white font-semibold mb-4">For Job Seekers</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('student.jobs.index') }}" class="hover:text-emerald-400 transition-colors">Browse Jobs</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-emerald-400 transition-colors">Create Account</a></li>
                        <li><a href="{{ route('student.applications.index') }}" class="hover:text-emerald-400 transition-colors">My Applications</a></li>
                        <li><a href="{{ route('student.profile') }}" class="hover:text-emerald-400 transition-colors">Career Profile</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Career Resources</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Resume Tips</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Interview Guide</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Salary Guide</a></li>
                    </ul>
                </div>

                <!-- For Employers -->
                <div>
                    <h3 class="text-white font-semibold mb-4">For Employers</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('employer.jobs.create') }}" class="hover:text-emerald-400 transition-colors">Post a Job</a></li>
                        <li><a href="{{ route('employer.dashboard') }}" class="hover:text-emerald-400 transition-colors">Employer Dashboard</a></li>
                        <li><a href="{{ route('employer.jobs.index') }}" class="hover:text-emerald-400 transition-colors">Manage Jobs</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Talent Search</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Recruitment Solutions</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Pricing Plans</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Hiring Resources</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Success Stories</a></li>
                    </ul>
                </div>

                <!-- Company & Support -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Company & Support</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">FAQs</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Sitemap</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition-colors">Advertise with Us</a></li>
                    </ul>
                </div>
            </div>

            <!-- Popular Searches / Categories Section -->
            <div class="border-t border-slate-800 py-8">
                <h3 class="text-white font-semibold mb-4">Popular Job Categories</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">IT & Software</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Marketing</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Engineering</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Healthcare</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Finance</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Customer Service</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Sales</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Human Resources</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Design</a>
                    <a href="#" class="px-3 py-1 bg-slate-800 rounded-full text-xs hover:bg-emerald-600 transition-colors">Administrative</a>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-800 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-sm text-slate-400">
                        &copy; {{ date('Y') }}
                        <a href="https://www.facebook.com/webmakerLucena.co"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-emerald-400 font-semibold hover:underline">
                            RGRR CareerMaker
                        </a>
                        . All rights reserved. Connecting Talent with Opportunity.
                    </p>

                    <div class="flex items-center space-x-6 text-sm">
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">Privacy</a>
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">Terms</a>
                        <a href="#" class="text-slate-400 hover:text-emerald-400 transition-colors">Accessibility</a>
                        <div class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <select class="bg-slate-800 text-slate-300 text-xs rounded px-2 py-1 border border-slate-700 focus:outline-none focus:border-emerald-400">
                                <option>English</option>
                                <option>Filipino</option>
                            </select>
                        </div>
                    </div>
                </div>
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

    <!-- Watermark Generator Script -->
    <script>
        // Generate watermark pattern dynamically
        (function() {
            const container = document.getElementById('watermark-container');
            const rows = 20;
            const cols = 12;

            const wrapper = document.createElement('div');
            wrapper.className = '-rotate-45 translate-x-[-10%] translate-y-[-20%] scale-150';

            const grid = document.createElement('div');
            grid.className = 'flex flex-col gap-12';

            for (let i = 0; i < rows; i++) {
                const row = document.createElement('div');
                row.className = 'flex gap-6 whitespace-nowrap';

                for (let j = 0; j < cols; j++) {
                    const span = document.createElement('span');
                    span.className = 'text-xl font-black text-slate-400/[0.03] tracking-wide';
                    span.textContent = 'RGRR CareerMaker';
                    row.appendChild(span);
                }

                grid.appendChild(row);
            }

            wrapper.appendChild(grid);
            container.appendChild(wrapper);
        })();
    </script>
</body>
</html>
