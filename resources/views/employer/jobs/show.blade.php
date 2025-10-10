@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('employer.jobs.index') }}"
           class="inline-flex items-center text-[#96A78D] hover:text-[#7A8C71] transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="font-semibold">Back to My Jobs</span>
        </a>
    </div>

    <!-- Job Header Card -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 mb-6 border border-[#D9E9CF]">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
            <div class="flex-1">
                <div class="flex items-start space-x-4 mb-4">
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-lg flex-shrink-0">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">{{ $job->title }}</h1>
                        <p class="text-sm text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <!-- Job Meta Info -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Location</p>
                            <p class="font-semibold">{{ $job->location }}</p>
                        </div>
                    </div>

                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Type</p>
                            <p class="font-semibold">{{ ucfirst($job->type) }}</p>
                        </div>
                    </div>

                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Applications</p>
                            <p class="font-semibold">{{ $job->applications_count }}</p>
                        </div>
                    </div>

                    @if($job->experience_level)
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Experience</p>
                            <p class="font-semibold">{{ $job->experience_level }}</p>
                        </div>
                    </div>
                    @endif

                    @if($job->salary_min && $job->salary_max)
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Salary Range</p>
                            <p class="font-semibold">₱{{ number_format($job->salary_min, 0) }} - ₱{{ number_format($job->salary_max, 0) }}</p>
                        </div>
                    </div>
                    @endif

                    @if($job->deadline)
                    <div class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wide">Deadline</p>
                            <p class="font-semibold">{{ $job->deadline->format('M d, Y') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Status & Actions -->
            <div class="flex flex-col items-end gap-4">
                @if($job->is_active)
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] text-[#96A78D] shadow-md">
                        <span class="w-2.5 h-2.5 bg-[#96A78D] rounded-full mr-2 animate-pulse"></span>
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-gray-200 text-gray-600">
                        <span class="w-2.5 h-2.5 bg-gray-500 rounded-full mr-2"></span>
                        Inactive
                    </span>
                @endif

                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    <a href="{{ route('employer.jobs.edit', $job) }}"
                       class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 text-center">
                        Edit Job
                    </a>
                    <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit"
                                class="w-full px-6 py-2.5 rounded-xl bg-white border-2 border-[#96A78D] text-[#96A78D] font-semibold hover:bg-[#D9E9CF]/30 transition-all duration-300">
                            {{ $job->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Description -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Job Description
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $job->description }}</p>
                </div>
            </div>

            @if($job->requirements)
            <!-- Requirements -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    Requirements
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $job->requirements }}</p>
                </div>
            </div>
            @endif

            @if($job->benefits)
            <!-- Benefits -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    Benefits
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $job->benefits }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar Stats -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] rounded-2xl shadow-xl p-8 text-white sticky top-6">
                <h3 class="text-xl font-bold mb-6">Quick Stats</h3>
                <div class="space-y-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                        <p class="text-white/80 text-sm mb-1">Total Applications</p>
                        <p class="text-3xl font-bold">{{ $job->applications_count }}</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                        <p class="text-white/80 text-sm mb-1">Posted On</p>
                        <p class="text-lg font-semibold">{{ $job->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4">
                        <p class="text-white/80 text-sm mb-1">Status</p>
                        <p class="text-lg font-semibold">{{ $job->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Applications Section -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Applications ({{ $job->applications->count() }})
            </h2>
        </div>

        @if($job->applications->count() > 0)
            <!-- Desktop Table -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-[#D9E9CF]/50 to-[#B6CEB4]/30">
                        <tr>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Student</th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">University</th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Major</th>
                            <th class="text-center py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">GPA</th>
                            <th class="text-center py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Status</th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Applied</th>
                            <th class="text-center py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($job->applications as $application)
                            <tr class="hover:bg-[#D9E9CF]/20 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center text-white font-bold shadow-md">
                                            {{ strtoupper(substr($application->student->user->name, 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-gray-800">{{ $application->student->user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-gray-600">{{ $application->student->university ?? 'N/A' }}</td>
                                <td class="py-4 px-6 text-gray-600">{{ $application->student->major ?? 'N/A' }}</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="font-semibold text-gray-800">{{ $application->student->gpa ?? 'N/A' }}</span>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                        @if($application->status == 'accepted') bg-green-100 text-green-700
                                        @elseif($application->status == 'rejected') bg-red-100 text-red-700
                                        @elseif($application->status == 'reviewed') bg-yellow-100 text-yellow-700
                                        @else bg-gray-100 text-gray-700 @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-gray-600 text-sm">{{ $application->created_at->format('M d, Y') }}</td>
                                <td class="py-4 px-6 text-center">
                                    <a href="{{ route('applications.show', $application) }}"
                                       class="inline-flex items-center px-4 py-2 rounded-lg bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white text-sm font-semibold shadow-md hover:shadow-lg transition-all duration-300">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="lg:hidden space-y-4">
                @foreach($job->applications as $application)
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-200 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center text-white font-bold shadow-md">
                                    {{ strtoupper(substr($application->student->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800">{{ $application->student->user->name }}</p>
                                    <p class="text-xs text-gray-500">Applied {{ $application->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold
                                @if($application->status == 'accepted') bg-green-100 text-green-700
                                @elseif($application->status == 'rejected') bg-red-100 text-red-700
                                @elseif($application->status == 'reviewed') bg-yellow-100 text-yellow-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($application->status) }}
                            </span>
                        </div>
                        <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
                            <div>
                                <p class="text-gray-500">University</p>
                                <p class="font-semibold text-gray-800">{{ $application->student->university ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Major</p>
                                <p class="font-semibold text-gray-800">{{ $application->student->major ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">GPA</p>
                                <p class="font-semibold text-gray-800">{{ $application->student->gpa ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <a href="{{ route('applications.show', $application) }}"
                           class="block w-full px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white text-center font-semibold shadow-md hover:shadow-lg transition-all duration-300">
                            View Application
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="w-20 h-20 mx-auto mb-4 rounded-full bg-gradient-to-br from-[#D9E9CF] to-[#B6CEB4] flex items-center justify-center">
                    <svg class="w-10 h-10 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No Applications Yet</h3>
                <p class="text-gray-600">Applications will appear here once candidates start applying.</p>
            </div>
        @endif
    </div>
</div>
@endsection
