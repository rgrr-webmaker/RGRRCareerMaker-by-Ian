<!-- resources/views/student/jobs/show.blade.php -->
@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('student.jobs.index') }}" class="inline-flex items-center text-slate-600 hover:text-slate-900 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Job Listings
        </a>
    </div>

    <!-- Job Details Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <!-- Job Header -->
        <div class="p-6 border-b border-slate-200">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">{{ $job->title }}</h1>

            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-600 mb-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="font-medium">{{ $job->employer->company_name }}</span>
                </div>

                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $job->location }}</span>
                </div>

                <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-emerald-100 text-emerald-800">
                    {{ ucfirst($job->type) }}
                </span>

                @if($job->experience_level)
                    <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium bg-blue-100 text-blue-800">
                        {{ $job->experience_level }}
                    </span>
                @endif
            </div>

            @if($job->salary_min && $job->salary_max)
                <p class="text-lg font-semibold text-emerald-600 mb-2">
                    ₱{{ number_format($job->salary_min, 2) }} - ₱{{ number_format($job->salary_max, 2) }}
                </p>
            @endif

            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
                @if($job->deadline)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Deadline: {{ $job->deadline->format('M d, Y') }}</span>
                    </div>
                @endif
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                </div>
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

            <!-- Company Information -->
            <div class="border-t border-slate-200 pt-6">
                <h2 class="text-xl font-semibold text-slate-900 mb-3">About the Company</h2>
                <div class="space-y-3">
                    @if($job->employer->company_description)
                        <p class="text-slate-600">{{ $job->employer->company_description }}</p>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        @if($job->employer->company_website)
                            <div class="flex items-center text-sm">
                                <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                                <a href="{{ $job->employer->company_website }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-medium">
                                    Visit Website
                                </a>
                            </div>
                        @endif

                        @if($job->employer->industry)
                            <div class="flex items-center text-sm text-slate-600">
                                <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span><span class="font-medium">Industry:</span> {{ $job->employer->industry }}</span>
                            </div>
                        @endif

                        @if($job->employer->company_size)
                            <div class="flex items-center text-sm text-slate-600">
                                <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span><span class="font-medium">Company Size:</span> {{ $job->employer->company_size }} employees</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Section -->
        <div class="p-6 bg-slate-50 border-t border-slate-200 rounded-b-xl">
            @if($hasApplied)
                <div class="bg-emerald-50 border border-emerald-200 rounded-lg p-4 mb-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-emerald-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-emerald-800 font-medium">You have already applied to this job</span>
                    </div>
                </div>
                <a href="{{ route('student.applications.index') }}" class="inline-flex items-center px-6 py-2 rounded-lg bg-slate-200 text-slate-700 font-medium hover:bg-slate-300 transition-colors duration-150">
                    View My Applications
                </a>
            @else
                <form method="POST" action="{{ route('student.jobs.apply', $job) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="cover_letter" class="block text-sm font-medium text-slate-700 mb-2">Cover Letter (Optional)</label>
                        <textarea id="cover_letter" name="cover_letter" rows="6"
                                  placeholder="Tell the employer why you're a great fit for this position..."
                                  class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150"></textarea>
                    </div>
                    <button type="submit" class="w-full md:w-auto px-8 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                        Apply Now
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
