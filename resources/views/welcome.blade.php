<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'RGRR CareerMaker - Launch Your Career Today')

@section('content')
<div class="bg-gradient-to-b from-slate-50 to-white">
    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,white,rgba(255,255,255,0.6))] -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-20 md:py-28" id="hero-section">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Column - Content -->
                    <div class="text-center lg:text-left">
                        <div class="inline-flex items-center px-4 py-2 bg-emerald-50 border border-emerald-200 rounded-full mb-6">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                            <span class="text-sm font-medium text-emerald-700">Now Hiring: 1,200+ Active Positions</span>
                        </div>

                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-slate-900 leading-tight">
                            Launch Your<br/>
                            <span class="text-emerald-600 bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Dream Career</span>
                        </h1>

                        <p class="text-xl md:text-2xl text-slate-600 mb-8 max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                            Connect with top employers, discover exciting opportunities, and build the future you've always imagined. Your next career move starts here.
                        </p>

                        @guest
                            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center mb-8">
                                <a href="{{ route('register') }}"
                                   class="group w-full sm:w-auto px-8 py-4 rounded-xl bg-emerald-600 text-white font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-600/40 transition-all duration-200 flex items-center justify-center space-x-2">
                                    <span>Get Started Free</span>
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>

                                <a href="{{ route('login') }}"
                                   class="w-full sm:w-auto px-8 py-4 rounded-xl bg-white text-slate-700 font-semibold border-2 border-slate-200 hover:border-emerald-600 hover:bg-slate-50 shadow-sm hover:shadow-md transition-all duration-200">
                                    Sign In
                                </a>
                            </div>

                            <div class="flex items-center justify-center lg:justify-start gap-6 text-sm text-slate-600">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Free to join</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>No credit card required</span>
                                </div>
                            </div>
                        @else
                            <div class="flex justify-center lg:justify-start">
                                @if(auth()->user()->isStudent())
                                    <a href="{{ route('student.jobs.index') }}"
                                       class="group px-8 py-4 rounded-xl bg-emerald-600 text-white font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-600/40 transition-all duration-200 flex items-center space-x-2">
                                        <span>Browse Jobs</span>
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('employer.dashboard') }}"
                                       class="group px-8 py-4 rounded-xl bg-emerald-600 text-white font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-700 hover:shadow-xl hover:shadow-emerald-600/40 transition-all duration-200 flex items-center space-x-2">
                                        <span>Go to Dashboard</span>
                                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        @endguest
                    </div>

                    <!-- Right Column - Hero Image/Illustration -->
                    <div class="relative hidden lg:block">
                        <div class="relative">
                            <!-- Main illustration container -->
                            <div class="relative bg-gradient-to-br from-emerald-50 to-teal-50 rounded-3xl p-8 shadow-2xl">
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Student Avatar Cards -->
                                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                                                <img src="{{ asset('storage/images/pablo.jpg') }}" alt="Pablo" class="w-full h-full object-cover">
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-900 text-sm">Pablo Escobar</p>
                                                <p class="text-xs text-slate-500">Software Engineer</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-emerald-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Hired</span>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-rose-600 flex items-center justify-center text-white font-bold text-lg">
                                                MS
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-900 text-sm">Maria Santos</p>
                                                <p class="text-xs text-slate-500">Marketing Specialist</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-emerald-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Hired</span>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-lg">
                                                AR
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-900 text-sm">Alex Rivera</p>
                                                <p class="text-xs text-slate-500">Data Analyst</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-amber-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Interview Scheduled</span>
                                        </div>
                                    </div>

                                    <div class="bg-white rounded-2xl p-4 shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        <div class="flex items-center gap-3 mb-3">
                                            <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                                                <img src="{{ asset('storage/images/chapo.jpg') }}" alt="Pablo" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <p class="font-semibold text-slate-900 text-sm">El Chapo</p>
                                                <p class="text-xs text-slate-500">UX Designer</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs text-emerald-600">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Hired</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Stats -->
                            <div class="absolute -top-4 -right-4 bg-white rounded-2xl shadow-xl p-4 border border-slate-100">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-emerald-600">98%</p>
                                    <p class="text-xs text-slate-600">Success Rate</p>
                                </div>
                            </div>

                            <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl p-4 border border-slate-100">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-emerald-600">5K+</p>
                                    <p class="text-xs text-slate-600">Students Hired</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Job Content Area -->
    <div id="jobs-content-area" class="hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- This will be populated dynamically -->
    </div>

    <!-- Stats Section -->
    <div class="bg-white border-y border-slate-200 py-12 stats-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 counter" data-target="10000" data-suffix="+">0</p>
                    <p class="text-slate-600 font-medium">Opportunities</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 counter" data-target="500" data-suffix="+">0</p>
                    <p class="text-slate-600 font-medium">Employers</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 counter" data-target="5000" data-suffix="+">0</p>
                    <p class="text-slate-600 font-medium">Students Hired</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl md:text-5xl font-bold text-slate-900 mb-2 counter" data-target="98" data-suffix="%">0</p>
                    <p class="text-slate-600 font-medium">Success Rate</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fast counting animation with delay
        const counters = document.querySelectorAll('.counter');

        setTimeout(() => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const suffix = counter.getAttribute('data-suffix') || '';
                    const count = +counter.innerText.replace(/[^0-9]/g, '');

                    // Slower speed
                    const speed = 100; // higher = slower
                    const increment = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment) + suffix;
                        setTimeout(updateCount, 30);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };

                updateCount();
            });
        }, 2500); // 2 second delay before starting
    </script>

    <!-- How It Works Section -->
    <div class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                    How It Works
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Get started in three simple steps and land your dream job
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line -->
                <div class="hidden md:block absolute top-20 left-0 right-0 h-0.5 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200" style="top: 4rem;"></div>

                <!-- Step 1 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-sm border border-slate-200 text-center">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg shadow-emerald-600/30 relative z-10">
                        1
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Create Your Profile</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Sign up and build your professional profile. Highlight your skills, education, and experience.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-sm border border-slate-200 text-center">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg shadow-blue-600/30 relative z-10">
                        2
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Browse & Apply</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Explore thousands of job opportunities and apply to positions that match your interests.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative bg-white rounded-2xl p-8 shadow-sm border border-slate-200 text-center">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6 shadow-lg shadow-purple-600/30 relative z-10">
                        3
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">Get Hired</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Connect with employers, ace your interviews, and start your dream career journey.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Carousel Section -->
    <div id="features-section" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                Everything You Need to Succeed
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Our platform provides all the tools and resources to help you find your perfect career match
            </p>
        </div>

        <!-- Carousel Container -->
        <div class="overflow-hidden relative">
            <div class="flex animate-slide gap-6">
                <!-- Repeat Feature Cards Twice for Infinite Loop -->
                <div class="flex gap-6">
                    <!-- Feature 1 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-emerald-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Smart Job Matching</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Our AI-powered algorithm matches you with opportunities that align with your skills, interests, and career goals.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-blue-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Direct Employer Connection</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Connect directly with hiring managers and recruiters from top companies looking for talented individuals.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-purple-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Application Tracking</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Manage all your applications in one dashboard with real-time status updates and interview scheduling.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-orange-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Career Resources</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Access resume templates, interview tips, and career guides to help you stand out from the competition.
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-pink-400 to-pink-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-pink-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Instant Notifications</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Get real-time alerts for new job postings, application updates, and interview invitations.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="min-w-[300px] md:min-w-[350px] lg:min-w-[300px] group bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-xl hover:border-emerald-300 transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg shadow-teal-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3">Verified Employers</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Apply with confidence knowing all employers are verified and vetted for legitimacy and quality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Infinite slide animation */
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-slide {
            display: flex;
            width: max-content;
            animation: slide 30s linear infinite; /* adjust speed here */
        }
    </style>

    <!-- Success Stories Section -->
    <div class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                    Success Stories
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Hear from students who found their dream jobs through RGRR CareerMaker
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed italic">
                        "RGRR CareerMaker helped me land my dream job at a tech startup. The application process was seamless, and I received an offer within two weeks!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/images/pablo.jpg') }}" alt="Pablo" class="w-full h-full object-cover">
                        </div>

                        <div>
                            <p class="font-semibold text-slate-900">Pablo Escobar</p>
                            <p class="text-sm text-slate-500">Software Engineer at TechCorp</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed italic">
                        "As a fresh graduate, I was nervous about finding work. This platform connected me with amazing employers and I'm now thriving in my marketing role!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-rose-600 flex items-center justify-center text-white font-bold">
                            MS
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">Maria Santos</p>
                            <p class="text-sm text-slate-500">Marketing Specialist at BrandCo</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-200 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <p class="text-slate-600 mb-6 leading-relaxed italic">
                        "The interface is so intuitive and the job matching algorithm really works! I found multiple opportunities that perfectly matched my skills and interests."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/images/chapo.jpg') }}" alt="Pablo" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900">El Chapo</p>
                            <p class="text-sm text-slate-500">UX Designer at DesignHub</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-br from-emerald-600 to-teal-600 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Start Your Career Journey?
            </h2>
            <p class="text-xl text-emerald-50 mb-10 max-w-2xl mx-auto">
                Join thousands of students who have already found their dream jobs. Your future is waiting.
            </p>
            @guest
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}"
                       class="group w-full sm:w-auto px-10 py-4 rounded-xl bg-white text-emerald-600 font-bold shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center space-x-2">
                        <span>Create Free Account</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="{{ route('login') }}"
                       class="w-full sm:w-auto px-10 py-4 rounded-xl bg-transparent text-white font-bold border-2 border-white hover:bg-white hover:text-emerald-600 transition-all duration-200">
                        Sign In
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- Job Details Modal -->
<div id="job-modal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 overflow-y-auto">
    <div class="min-h-screen px-4 flex items-center justify-center p-4">
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="sticky top-0 bg-white border-b border-slate-200 px-8 py-6 flex items-center justify-between z-10">
                <h2 id="modal-job-title" class="text-3xl font-bold text-slate-900"></h2>
                <button onclick="closeJobModal()" class="p-2 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div id="modal-job-content" class="px-8 py-8 overflow-y-auto max-h-[calc(90vh-140px)]">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const browseJobsLink = document.getElementById('browse-jobs-link');
    const browseJobsLinkMobile = document.getElementById('browse-jobs-link-mobile');
    const jobsContentArea = document.getElementById('jobs-content-area');
    const featuresSection = document.getElementById('features-section');
    const heroSection = document.getElementById('hero-section');

    // Handle Browse Jobs click
    function handleBrowseJobs(e) {
        @if(auth()->check() && auth()->user()->isStudent())
            e.preventDefault();
            loadJobs();
        @endif
    }

    if (browseJobsLink) {
        browseJobsLink.addEventListener('click', handleBrowseJobs);
    }

    if (browseJobsLinkMobile) {
        browseJobsLinkMobile.addEventListener('click', handleBrowseJobs);
    }

    function loadJobs() {
        fetch('{{ route("student.jobs.index") }}', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const content = doc.querySelector('main > div');

            if (content) {
                jobsContentArea.innerHTML = content.innerHTML;
                jobsContentArea.classList.remove('hidden');
                featuresSection.classList.add('hidden');
                heroSection.classList.add('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });

                attachJobDetailsListeners();
            }
        })
        .catch(error => console.error('Error loading jobs:', error));
    }

    function attachJobDetailsListeners() {
        const viewDetailsButtons = document.querySelectorAll('[data-job-url]');
        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const jobUrl = this.getAttribute('data-job-url');
                loadJobDetails(jobUrl);
            });
        });
    }

    window.loadJobDetails = function(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const content = doc.querySelector('main > div');

            if (content) {
                document.getElementById('modal-job-title').textContent = doc.querySelector('h1')?.textContent || 'Job Details';
                document.getElementById('modal-job-content').innerHTML = content.innerHTML;
                document.getElementById('job-modal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        })
        .catch(error => console.error('Error loading job details:', error));
    }

    window.closeJobModal = function() {
        document.getElementById('job-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeJobModal();
        }
    });

    // Close modal on backdrop click
    document.getElementById('job-modal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeJobModal();
        }
    });
});
</script>

<style>
.bg-grid-slate-100 {
    background-image:
        linear-gradient(to right, rgb(241 245 249 / 0.5) 1px, transparent 1px),
        linear-gradient(to bottom, rgb(241 245 249 / 0.5) 1px, transparent 1px);
    background-size: 4rem 4rem;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out;
}
</style>

@endsection
