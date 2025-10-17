<!-- resources/views/student/applications/index.blade.php -->
@extends('layouts.app')

@section('title', 'My Applications')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header with Stats -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-slate-900 mb-2">My Applications</h1>
        <p class="text-lg text-slate-600">Track and manage your job applications</p>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
                <p class="text-sm font-medium text-slate-600">Total Applications</p>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ $applications->total() }}</p>
            </div>
            <div class="bg-amber-50 rounded-xl shadow-sm border border-amber-200 p-4">
                <p class="text-sm font-medium text-amber-800">Pending</p>
                <p class="text-2xl font-bold text-amber-900 mt-1">{{ $applications->where('status', 'pending')->count() }}</p>
            </div>
            <div class="bg-indigo-50 rounded-xl shadow-sm border border-indigo-200 p-4">
                <p class="text-sm font-medium text-indigo-800">Reviewed</p>
                <p class="text-2xl font-bold text-indigo-900 mt-1">{{ $applications->where('status', 'reviewed')->count() }}</p>
            </div>
            <div class="bg-emerald-50 rounded-xl shadow-sm border border-emerald-200 p-4">
                <p class="text-sm font-medium text-emerald-800">Accepted</p>
                <p class="text-2xl font-bold text-emerald-900 mt-1">{{ $applications->where('status', 'accepted')->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="mb-6 flex flex-wrap gap-2 bg-white rounded-lg p-2 shadow-sm border border-slate-200">
        <button class="filter-tab active px-5 py-2.5 rounded-md text-sm font-semibold transition-colors duration-150" data-status="all">
            All Applications <span class="ml-2 text-xs bg-slate-100 px-2.5 py-1 rounded-full">{{ $applications->total() }}</span>
        </button>
        <button class="filter-tab px-5 py-2.5 rounded-md text-sm font-semibold transition-colors duration-150" data-status="pending">
            Pending
        </button>
        <button class="filter-tab px-5 py-2.5 rounded-md text-sm font-semibold transition-colors duration-150" data-status="reviewed">
            Reviewed
        </button>
        <button class="filter-tab px-5 py-2.5 rounded-md text-sm font-semibold transition-colors duration-150" data-status="accepted">
            Accepted
        </button>
        <button class="filter-tab px-5 py-2.5 rounded-md text-sm font-semibold transition-colors duration-150" data-status="rejected">
            Rejected
        </button>
    </div>

    <!-- Applications List -->
    @if($applications->count() > 0)
        <div class="space-y-5">
            @foreach($applications as $application)
                <div class="application-card bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg hover:border-emerald-200 transition-all duration-300" data-status="{{ $application->status }}">
                    <div class="p-6">
                        <!-- Top Section: Company Logo & Job Title -->
                        <div class="flex items-start gap-5 mb-5">
                            <!-- Company Logo -->
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-emerald-100 to-emerald-50 flex items-center justify-center flex-shrink-0 border-2 border-emerald-200 shadow-sm">
                                <span class="text-2xl font-bold text-emerald-600">
                                    {{ strtoupper(substr($application->job->employer->company_name, 0, 1)) }}
                                </span>
                            </div>

                            <!-- Job Title & Company -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-bold text-slate-900 mb-1.5 hover:text-emerald-600 transition-colors cursor-pointer leading-tight">
                                    {{ $application->job->title }}
                                </h3>
                                <p class="text-base text-slate-700 font-semibold mb-2">{{ $application->job->employer->company_name }}</p>

                                <!-- Status Badge -->
                                <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-sm font-bold
                                    @if($application->status == 'accepted') bg-emerald-100 text-emerald-700 border-2 border-emerald-300
                                    @elseif($application->status == 'rejected') bg-red-100 text-red-700 border-2 border-red-300
                                    @elseif($application->status == 'reviewed') bg-indigo-100 text-indigo-700 border-2 border-indigo-300
                                    @else bg-amber-100 text-amber-700 border-2 border-amber-300 @endif">
                                    @if($application->status == 'accepted')
                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($application->status == 'rejected')
                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($application->status == 'reviewed')
                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                    {{ ucfirst($application->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Job Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-5 pb-5 border-b border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-slate-500">Location</p>
                                    <p class="text-sm font-semibold text-slate-900">{{ $application->job->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-slate-500">Job Type</p>
                                    <p class="text-sm font-semibold text-slate-900">{{ ucfirst($application->job->type) }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-slate-500">Applied Date</p>
                                    <p class="text-sm font-semibold text-slate-900">{{ $application->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info & Actions Row -->
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <!-- Left Side: Additional Info -->
                            <div class="flex flex-col gap-2">
                                @if($application->job->salary_range)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="text-base font-semibold text-slate-700">{{ $application->job->salary_range }}</span>
                                    </div>
                                @endif

                                <div class="flex items-center gap-2 text-sm text-slate-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Applied {{ $application->created_at->diffForHumans() }}</span>
                                </div>

                                @if($application->cover_letter)
                                    <div class="flex items-center gap-2 text-sm text-emerald-600">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="font-medium">Cover letter included</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Right Side: Action Buttons -->
                            <div class="flex flex-wrap items-center gap-3">
                                <a href="{{ route('applications.show', $application) }}"
                                   class="inline-flex items-center px-5 py-2.5 rounded-lg text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm hover:shadow-md transition-all duration-150">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>

                                @if($application->status == 'pending')
                                    <form method="POST" action="{{ route('student.applications.destroy', $application) }}"
                                          onsubmit="return confirm('Are you sure you want to withdraw this application? This action cannot be undone.')"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-5 py-2.5 rounded-lg text-sm font-bold text-white bg-red-600 hover:bg-red-700 shadow-sm hover:shadow-md transition-all duration-150">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Withdraw
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <!-- Status Message for Accepted/Rejected -->
                        @if($application->status == 'accepted' && $application->employer_notes)
                            <div class="mt-5 pt-5 border-t border-emerald-100 bg-emerald-50 rounded-lg p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-bold text-emerald-900 mb-1">Feedback from Employer:</p>
                                        <p class="text-sm text-emerald-800 leading-relaxed">{{ $application->employer_notes }}</p>
                                    </div>
                                </div>
                            </div>
                        @elseif($application->status == 'rejected' && $application->employer_notes)
                            <div class="mt-5 pt-5 border-t border-red-100 bg-red-50 rounded-lg p-4">
                                <div class="flex items-start gap-3">
                                    <svg class="w-6 h-6 text-red-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-bold text-red-900 mb-1">Feedback from Employer:</p>
                                        <p class="text-sm text-red-800 leading-relaxed">{{ $application->employer_notes }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $applications->links() }}
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-slate-200">
            <div class="text-center py-20 px-6">
                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-emerald-100 to-emerald-50 flex items-center justify-center mx-auto mb-6 border-4 border-emerald-200">
                    <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-3">No Applications Yet</h3>
                <p class="text-lg text-slate-600 mb-10 max-w-md mx-auto">You haven't applied to any jobs yet. Start exploring opportunities and take the first step towards your dream career!</p>
                <a href="{{ route('student.jobs.index') }}"
                   class="inline-flex items-center px-8 py-4 rounded-lg bg-emerald-600 text-white text-base font-bold shadow-lg hover:bg-emerald-700 hover:shadow-xl transition-all duration-150">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Browse Available Jobs
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Filter JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        const applicationCards = document.querySelectorAll('.application-card');

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const status = this.getAttribute('data-status');

                // Update active tab styling
                filterTabs.forEach(t => {
                    t.classList.remove('active', 'bg-emerald-600', 'text-white');
                    t.classList.add('text-slate-600', 'hover:bg-slate-100');
                });
                this.classList.add('active', 'bg-emerald-600', 'text-white');
                this.classList.remove('text-slate-600', 'hover:bg-slate-100');

                // Filter cards
                applicationCards.forEach(card => {
                    if (status === 'all' || card.getAttribute('data-status') === status) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // Set initial active state
        const activeTab = document.querySelector('.filter-tab.active');
        if (activeTab) {
            activeTab.classList.add('bg-emerald-600', 'text-white');
            activeTab.classList.remove('text-slate-600');
        }
    });
</script>

<style>
    .filter-tab {
        @apply text-slate-600 hover:bg-slate-100;
    }
    .filter-tab.active {
        @apply bg-emerald-600 text-white;
    }
</style>
@endsection
