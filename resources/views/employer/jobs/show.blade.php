@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('employer.jobs.index') }}" class="inline-flex items-center text-slate-600 hover:text-slate-900 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to My Jobs
        </a>
    </div>

    <!-- Job Header Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 mb-6">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-slate-900 mb-2">{{ $job->title }}</h1>
                    <p class="text-sm text-slate-500">Posted {{ $job->created_at->diffForHumans() }}</p>
                </div>

                <!-- Status Badge -->
                <div>
                    @if($job->is_active)
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-emerald-100 text-emerald-800">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-slate-100 text-slate-800">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            Inactive
                        </span>
                    @endif
                </div>
            </div>

            <!-- Job Meta Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">
                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Location</p>
                    <p class="text-sm font-semibold text-slate-900">{{ $job->location }}</p>
                </div>

                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Type</p>
                    <p class="text-sm font-semibold text-slate-900">{{ ucfirst($job->type) }}</p>
                </div>

                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Applications</p>
                    <p class="text-sm font-semibold text-emerald-600">{{ $job->applications_count }}</p>
                </div>

                @if($job->experience_level)
                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Experience</p>
                    <p class="text-sm font-semibold text-slate-900">{{ $job->experience_level }}</p>
                </div>
                @endif

                @if($job->salary_min && $job->salary_max)
                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Salary Range</p>
                    <p class="text-sm font-semibold text-slate-900">₱{{ number_format($job->salary_min, 0) }} - ₱{{ number_format($job->salary_max, 0) }}</p>
                </div>
                @endif

                @if($job->deadline)
                <div class="bg-slate-50 rounded-lg p-3">
                    <p class="text-xs font-medium text-slate-500 mb-1">Deadline</p>
                    <p class="text-sm font-semibold text-slate-900">{{ $job->deadline->format('M d, Y') }}</p>
                </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('employer.jobs.edit', $job) }}" class="px-6 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition-colors duration-150 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Edit Job</span>
                </a>
                <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" class="inline-block">
                    @csrf
                    <button type="submit" class="px-6 py-2 rounded-lg border-2 {{ $job->is_active ? 'border-slate-300 text-slate-700 hover:bg-slate-50' : 'border-emerald-600 text-emerald-600 hover:bg-emerald-50' }} font-medium transition-colors duration-150 flex items-center space-x-2">
                        @if($job->is_active)
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Deactivate</span>
                        @else
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Activate</span>
                        @endif
                    </button>
                </form>
            </div>
        </div>

        <!-- Job Content -->
        <div class="p-6 space-y-6">
            <!-- Description -->
            <div>
                <h2 class="text-xl font-semibold text-slate-900 mb-3">Job Description</h2>
                <p class="text-slate-600 whitespace-pre-wrap leading-relaxed">{{ $job->description }}</p>
            </div>

            <!-- Requirements -->
            @if($job->requirements)
            <div class="border-t border-slate-200 pt-6">
                <h2 class="text-xl font-semibold text-slate-900 mb-3">Requirements</h2>
                <p class="text-slate-600 whitespace-pre-wrap leading-relaxed">{{ $job->requirements }}</p>
            </div>
            @endif

            <!-- Benefits -->
            @if($job->benefits)
            <div class="border-t border-slate-200 pt-6">
                <h2 class="text-xl font-semibold text-slate-900 mb-3">Benefits</h2>
                <p class="text-slate-600 whitespace-pre-wrap leading-relaxed">{{ $job->benefits }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Applications Section -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-2xl font-semibold text-slate-900">Applications ({{ $job->applications->count() }})</h2>
            <p class="text-sm text-slate-600 mt-1">Review and manage candidate applications</p>
        </div>

        @if($job->applications->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">Student</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">University</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">Major</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">GPA</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">Applied</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($job->applications as $application)
                            <tr class="hover:bg-slate-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center mr-3">
                                            <span class="text-emerald-700 font-semibold text-sm">{{ substr($application->student->user->name, 0, 2) }}</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">{{ $application->student->user->name }}</div>
                                            <div class="text-xs text-slate-500">{{ $application->student->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $application->student->university ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $application->student->major ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-semibold text-slate-900">{{ $application->student->gpa ?? 'N/A' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-amber-100 text-amber-800',
                                            'reviewed' => 'bg-blue-100 text-blue-800',
                                            'accepted' => 'bg-emerald-100 text-emerald-800',
                                            'rejected' => 'bg-red-100 text-red-800',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium {{ $statusColors[$application->status] ?? 'bg-slate-100 text-slate-800' }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-slate-600">{{ $application->created_at->format('M d, Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('applications.show', $application) }}" class="text-emerald-600 hover:text-emerald-700 font-medium">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <p class="text-slate-600 text-lg">No applications yet</p>
                <p class="text-slate-500 text-sm mt-2">Applications will appear here once students apply to this job</p>
            </div>
        @endif
    </div>
</div>
@endsection
