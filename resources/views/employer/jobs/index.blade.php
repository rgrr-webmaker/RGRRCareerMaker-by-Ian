@extends('layouts.app')

@section('title', 'My Jobs')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">My Jobs</h1>
            <p class="text-slate-600 mt-1">Manage all your job postings</p>
        </div>
        <a href="{{ route('employer.jobs.create') }}" class="px-6 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 transition-colors duration-150 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Post New Job</span>
        </a>
    </div>

    @if($jobs->count() > 0)
        <!-- Results Count -->
        <div class="mb-4">
            <p class="text-slate-600">Showing <span class="font-semibold text-slate-900">{{ $jobs->count() }}</span> of <span class="font-semibold text-slate-900">{{ $jobs->total() }}</span> jobs</p>
        </div>

        <!-- Job Listings -->
        <div class="space-y-4">
            @foreach($jobs as $job)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md hover:border-emerald-200 transition-all duration-200">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-3">
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-900 mb-2">{{ $job->title }}</h3>
                                    <div class="flex flex-wrap items-center gap-3 text-sm text-slate-600">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>{{ $job->location }}</span>
                                        </div>

                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ ucfirst($job->type) }}
                                        </span>

                                        @if($job->is_active)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-emerald-100 text-emerald-800">
                                                Active
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-slate-100 text-slate-800">
                                                Inactive
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm line-clamp-2 mb-3">{{ Str::limit($job->description, 150) }}</p>

                            <div class="flex flex-wrap items-center gap-4 text-sm">
                                <div class="flex items-center text-slate-600">
                                    <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span><span class="font-semibold text-slate-900">{{ $job->applications_count }}</span> applications</span>
                                </div>

                                <div class="flex items-center text-slate-500 text-xs">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 lg:mt-0 lg:ml-6 flex flex-col sm:flex-row lg:flex-col gap-2">
                            <button onclick="loadJobDetails('{{ route('employer.jobs.show', $job) }}')"
                                    data-job-url="{{ route('employer.jobs.show', $job) }}"
                                    class="px-6 py-2 rounded-lg bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition-colors duration-150 text-center">
                                View Details
                            </button>
                            <a href="{{ route('employer.jobs.edit', $job) }}" class="px-6 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors duration-150 text-center">
                                Edit Job
                            </a>
                            <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}">
                                @csrf
                                <button type="submit" class="w-full px-6 py-2 rounded-lg border border-slate-300 text-slate-700 font-medium hover:bg-slate-50 transition-colors duration-150">
                                    {{ $job->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-12 text-center">
            <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <p class="text-slate-600 text-lg mb-4">No jobs posted yet</p>
            <a href="{{ route('employer.jobs.create') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Post Your First Job
            </a>
        </div>
    @endif
</div>

<!-- Job Details Modal -->
<div id="job-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 overflow-y-auto">
    <div class="min-h-screen px-4 flex items-center justify-center p-4">
        <div class="relative bg-white rounded-2xl shadow-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
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
// Load job details into modal
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
