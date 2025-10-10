@extends('layouts.app')

@section('title', 'Employer Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Welcome back, <span class="bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] bg-clip-text text-transparent">{{ $employer->company_name }}</span></h1>
        <p class="text-gray-600">Here's an overview of your recruitment activity</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-12">
        <!-- Total Jobs -->
        <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-t-4 border-[#96A78D]">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-bold text-[#96A78D]">{{ $totalJobs }}</p>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Total Jobs</h3>
            <p class="text-sm text-gray-500">All job postings</p>
        </div>

        <!-- Active Jobs -->
        <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-t-4 border-[#B6CEB4]">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#B6CEB4] to-[#D9E9CF] flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-bold text-[#B6CEB4]">{{ $activeJobs }}</p>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Active Jobs</h3>
            <p class="text-sm text-gray-500">Currently accepting applications</p>
        </div>

        <!-- Total Applications -->
        <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 border-t-4 border-[#D9E9CF]">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#D9E9CF] to-[#B6CEB4] flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-3xl font-bold text-[#D9E9CF]">{{ $totalApplications }}</p>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Total Applications</h3>
            <p class="text-sm text-gray-500">Received from candidates</p>
        </div>
    </div>

    <!-- Recent Jobs Section -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-6 md:p-8 border border-[#D9E9CF]/50">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 sm:mb-0">Recent Jobs</h2>
            <a href="{{ route('employer.jobs.create') }}"
               class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Post New Job
            </a>
        </div>

        @if($jobs->count() > 0)
            <!-- Desktop Table View -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-[#D9E9CF]">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Title</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Location</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Type</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Applications</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Posted</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                            <tr class="border-b border-gray-100 hover:bg-[#D9E9CF]/20 transition-colors duration-200">
                                <td class="py-4 px-4">
                                    <span class="font-medium text-gray-800">{{ $job->title }}</span>
                                </td>
                                <td class="py-4 px-4 text-gray-600">{{ $job->location }}</td>
                                <td class="py-4 px-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-[#D9E9CF] text-[#96A78D]">
                                        {{ ucfirst($job->type) }}
                                    </span>
                                </td>
                                <td class="py-4 px-4">
                                    @if($job->is_active)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] text-[#96A78D]">
                                            <span class="w-2 h-2 bg-[#96A78D] rounded-full mr-2 animate-pulse"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-200 text-gray-600">
                                            <span class="w-2 h-2 bg-gray-500 rounded-full mr-2"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-[#96A78D] text-white text-sm font-semibold">
                                        {{ $job->applications_count }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-gray-600 text-sm">{{ $job->created_at->format('M d, Y') }}</td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('employer.jobs.show', $job) }}"
                                           class="p-2 rounded-lg bg-[#D9E9CF]/50 text-[#96A78D] hover:bg-[#B6CEB4] hover:text-white transition-all duration-300"
                                           title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('employer.jobs.edit', $job) }}"
                                           class="p-2 rounded-lg bg-[#D9E9CF]/50 text-[#96A78D] hover:bg-[#B6CEB4] hover:text-white transition-all duration-300"
                                           title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card View -->
            <div class="lg:hidden space-y-4">
                @foreach($jobs as $job)
                    <div class="bg-gradient-to-br from-white to-[#D9E9CF]/10 rounded-xl p-5 shadow-md border border-[#D9E9CF]/30">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="font-bold text-gray-800 text-lg">{{ $job->title }}</h3>
                            @if($job->is_active)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] text-[#96A78D]">
                                    <span class="w-2 h-2 bg-[#96A78D] rounded-full mr-2 animate-pulse"></span>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-200 text-gray-600">
                                    Inactive
                                </span>
                            @endif
                        </div>

                        <div class="space-y-2 mb-4 text-sm">
                            <p class="text-gray-600"><span class="font-medium">Location:</span> {{ $job->location }}</p>
                            <p class="text-gray-600"><span class="font-medium">Type:</span> {{ ucfirst($job->type) }}</p>
                            <p class="text-gray-600"><span class="font-medium">Applications:</span> {{ $job->applications_count }}</p>
                            <p class="text-gray-600"><span class="font-medium">Posted:</span> {{ $job->created_at->format('M d, Y') }}</p>
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('employer.jobs.show', $job) }}"
                               class="flex-1 px-4 py-2 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white text-center font-medium shadow-md hover:shadow-lg transition-all duration-300">
                                View
                            </a>
                            <a href="{{ route('employer.jobs.edit', $job) }}"
                               class="flex-1 px-4 py-2 rounded-lg bg-white border-2 border-[#96A78D] text-[#96A78D] text-center font-medium hover:bg-[#D9E9CF]/30 transition-all duration-300">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-[#D9E9CF] to-[#B6CEB4] flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-gray-600 text-lg mb-6">You haven't posted any jobs yet.</p>
                <a href="{{ route('employer.jobs.create') }}"
                   class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-md hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Post Your First Job
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
