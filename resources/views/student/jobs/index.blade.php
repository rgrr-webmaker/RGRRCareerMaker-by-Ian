<!-- resources/views/student/jobs/index.blade.php -->
@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Browse Jobs</h1>
        <p class="text-slate-600 mt-1">Find your perfect opportunity</p>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6">
        <form method="GET" action="{{ route('student.jobs.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}"
                           placeholder="Job title, keywords..."
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 mb-2">Job Type</label>
                    <select id="type" name="type"
                            class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                        <option value="">All Types</option>
                        <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                    <input type="text" id="location" name="location" value="{{ request('location') }}"
                           placeholder="City, State"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit" class="px-6 py-2 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                    Search
                </button>
                <a href="{{ route('student.jobs.index') }}" class="px-6 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors duration-150">
                    Clear
                </a>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    @if($jobs->count() > 0)
        <div class="mb-4">
            <p class="text-slate-600">Found <span class="font-semibold text-slate-900">{{ $jobs->total() }}</span> jobs</p>
        </div>
    @endif

    <!-- Main Content Grid: Job Listings (70%) + Sidebar (30%) -->
    <div class="grid grid-cols-1 lg:grid-cols-20 gap-6">
        <!-- Job Listings Section (70%) -->
        <div class="lg:col-span-13 space-y-4">
            @if($jobs->count() > 0)
                @foreach($jobs as $job)
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md hover:border-emerald-200 transition-all duration-200">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-semibold text-slate-900 mb-2">{{ $job->title }}</h3>

                                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-600 mb-3">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <span>{{ $job->employer->company_name }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ $job->location }}</span>
                                    </div>

                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-emerald-100 text-emerald-800">
                                        {{ ucfirst($job->type) }}
                                    </span>
                                </div>

                                @if($job->salary_min && $job->salary_max)
                                    <p class="text-sm font-semibold text-emerald-600 mb-3">
                                        ₱{{ number_format($job->salary_min, 2) }} - ₱{{ number_format($job->salary_max, 2) }}
                                    </p>
                                @endif

                                <p class="text-slate-600 text-sm line-clamp-2 mb-3">{{ Str::limit($job->description, 200) }}</p>

                                <p class="text-xs text-slate-500">Posted {{ $job->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="mt-4 md:mt-0 md:ml-6">
                                <button onclick="loadJobDetails('{{ route('student.jobs.show', $job) }}')"
                                        data-job-url="{{ route('student.jobs.show', $job) }}"
                                        class="w-full md:w-auto px-6 py-2 rounded-lg bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition-colors duration-150">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $jobs->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-12 text-center">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <p class="text-slate-600 text-lg">No jobs found matching your criteria.</p>
                    <p class="text-slate-500 mt-2">Try adjusting your search filters</p>
                </div>
            @endif
        </div>

        <!-- Sidebar Section (30%) -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Job Type Statistics -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Available by Type</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-emerald-500 mr-2"></div>
                            <span class="text-sm text-slate-700">Full-time</span>
                        </div>
                        <span class="text-sm font-semibold text-slate-900">{{ \App\Models\Job::where('type', 'full-time')->active()->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-sm text-slate-700">Part-time</span>
                        </div>
                        <span class="text-sm font-semibold text-slate-900">{{ \App\Models\Job::where('type', 'part-time')->active()->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-amber-500 mr-2"></div>
                            <span class="text-sm text-slate-700">Contract</span>
                        </div>
                        <span class="text-sm font-semibold text-slate-900">{{ \App\Models\Job::where('type', 'contract')->active()->count() }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-purple-500 mr-2"></div>
                            <span class="text-sm text-slate-700">Internship</span>
                        </div>
                        <span class="text-sm font-semibold text-slate-900">{{ \App\Models\Job::where('type', 'internship')->active()->count() }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Tips Card -->
            <div class="bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border border-emerald-200 sticky top-24">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="ml-3 text-lg font-semibold text-slate-900">Job Search Tips</h3>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-slate-700">
                            <span class="font-semibold">Tailor your application</span> - Customize your cover letter for each job
                        </p>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-slate-700">
                            <span class="font-semibold">Update your profile</span> - Keep your skills and experience current
                        </p>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-slate-700">
                            <span class="font-semibold">Apply early</span> - Submit applications soon after jobs are posted
                        </p>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-3 text-sm text-slate-700">
                            <span class="font-semibold">Research companies</span> - Learn about the employer before applying
                        </p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-emerald-200">
                    <a href="{{ route('student.profile') }}" class="flex items-center justify-center w-full px-4 py-2 rounded-lg bg-white text-emerald-700 font-medium border border-emerald-300 hover:bg-emerald-50 transition-colors duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Update Profile
                    </a>
                </div>
            </div>
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
// Define the functions globally so they work on this page
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
</script>
@endsection
