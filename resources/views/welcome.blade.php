<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('title', 'RGRR CareerMaker')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center py-16 px-4" id="hero-section">


        <h1 class="text-5xl md:text-6xl font-bold mb-4 text-slate-900">
            Discover Opportunities with<br/> RGRR CareerMaker
        </h1>

        <p class="text-xl md:text-2xl text-slate-600 mb-10 max-w-3xl mx-auto">
            Connecting students and employers to create meaningful career opportunities.
            <span class="text-emerald-600 font-semibold">Build your future with us.</span>
        </p>

        @guest
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                   class="group px-8 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 hover:shadow-md transition-all duration-150 flex items-center space-x-2">
                    <span>Get Started</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <a href="{{ route('login') }}"
                   class="px-8 py-3 rounded-lg bg-white text-slate-700 font-semibold border border-slate-300 hover:bg-slate-50 shadow-sm hover:shadow-md transition-all duration-150">
                    Already have an account?
                </a>
            </div>
        @else
            <div class="flex justify-center">
                @if(auth()->user()->isStudent())
                    <a href="{{ route('student.dashboard') }}"
                       class="group px-8 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 hover:shadow-md transition-all duration-150 flex items-center space-x-2">
                        <span>Go to Dashboard</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('employer.dashboard') }}"
                       class="group px-8 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 hover:shadow-md transition-all duration-150 flex items-center space-x-2">
                        <span>Go to Dashboard</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif
            </div>
        @endguest
    </div>

    <!-- Dynamic Job Content Area (Hidden by default, shown when Browse Jobs is clicked) -->
    <div id="jobs-content-area" class="hidden">
        <!-- This will be populated dynamically -->
    </div>

    <!-- Features Section (Hidden when jobs are displayed) -->
    <div id="features-section" class="grid md:grid-cols-3 gap-6 mt-16 mb-16">
        <!-- Feature 1 -->
        <div class="group bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-emerald-200 transition-all duration-200">
            <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center mb-4 group-hover:bg-emerald-200 transition-colors duration-200">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Find Your Dream Job</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Browse through hundreds of opportunities tailored for students and recent graduates.</p>
        </div>

        <!-- Feature 2 -->
        <div class="group bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-emerald-200 transition-all duration-200">
            <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center mb-4 group-hover:bg-emerald-200 transition-colors duration-200">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Connect with Employers</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Build meaningful connections with companies looking for talented individuals like you.</p>
        </div>

        <!-- Feature 3 -->
        <div class="group bg-white rounded-xl p-6 shadow-sm border border-slate-200 hover:shadow-md hover:border-emerald-200 transition-all duration-200">
            <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center mb-4 group-hover:bg-emerald-200 transition-colors duration-200">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-slate-900 mb-2">Track Applications</h3>
            <p class="text-slate-600 text-sm leading-relaxed">Manage all your applications in one place and receive real-time updates on your progress.</p>
        </div>
    </div>
</div>

<!-- Job Details Modal -->
<div id="job-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 overflow-y-auto">
    <div class="min-h-screen px-4 flex items-center justify-center p-4">
        <div class="relative bg-white rounded-2xl shadow-xl max-w-3xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="sticky top-0 bg-white border-b border-slate-200 px-6 py-4 flex items-center justify-between z-10">
                <h2 id="modal-job-title" class="text-2xl font-bold text-slate-900"></h2>
                <button onclick="closeJobModal()" class="p-2 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors duration-150">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div id="modal-job-content" class="px-6 py-6 overflow-y-auto max-h-[calc(90vh-140px)]">
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
            }
        })
        .catch(error => console.error('Error loading job details:', error));
    }

    window.closeJobModal = function() {
        document.getElementById('job-modal').classList.add('hidden');
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
@endsection
