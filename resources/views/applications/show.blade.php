@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        @if(auth()->user()->isStudent())
            <a href="{{ route('student.applications.index') }}"
               class="inline-flex items-center text-[#96A78D] hover:text-[#7A8C71] transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="font-semibold">Back to My Applications</span>
            </a>
        @else
            <a href="{{ route('employer.jobs.show', $application->job) }}"
               class="inline-flex items-center text-[#96A78D] hover:text-[#7A8C71] transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="font-semibold">Back to Job Details</span>
            </a>
        @endif
    </div>

    <!-- Header Card -->
    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 mb-6 border border-[#D9E9CF]">
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
            <div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">Application Details</h1>
                <p class="text-gray-600">Submitted {{ $application->created_at->format('F d, Y') }}</p>
            </div>

            <!-- Status Badge -->
            <div>
                <span class="inline-flex items-center px-6 py-3 rounded-xl text-sm font-bold shadow-md
                    @if($application->status == 'accepted') bg-gradient-to-r from-green-400 to-green-500 text-white
                    @elseif($application->status == 'rejected') bg-gradient-to-r from-red-400 to-red-500 text-white
                    @elseif($application->status == 'reviewed') bg-gradient-to-r from-yellow-400 to-yellow-500 text-white
                    @else bg-gradient-to-r from-gray-300 to-gray-400 text-gray-700 @endif">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($application->status == 'accepted')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        @elseif($application->status == 'rejected')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        @elseif($application->status == 'reviewed')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        @endif
                    </svg>
                    {{ ucfirst($application->status) }}
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Job Information -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Job Information
                </h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-32 flex-shrink-0">Title:</span>
                        <span class="text-gray-800 font-semibold">{{ $application->job->title }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-32 flex-shrink-0">Company:</span>
                        <span class="text-gray-800 font-semibold">{{ $application->job->employer->company_name }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-32 flex-shrink-0">Location:</span>
                        <span class="text-gray-800">{{ $application->job->location }}</span>
                    </div>
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-32 flex-shrink-0">Type:</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-[#D9E9CF] to-[#B6CEB4] text-[#96A78D]">
                            {{ ucfirst($application->job->type) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Student Information -->
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Student Information
                </h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-200">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                            {{ strtoupper(substr($application->student->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xl font-bold text-gray-800">{{ $application->student->user->name }}</p>
                            <p class="text-gray-600">{{ $application->student->user->email }}</p>
                        </div>
                    </div>

                    @if($application->student->phone)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">Phone:</span>
                        <span class="text-gray-800">{{ $application->student->phone }}</span>
                    </div>
                    @endif

                    @if($application->student->university)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">University:</span>
                        <span class="text-gray-800 font-semibold">{{ $application->student->university }}</span>
                    </div>
                    @endif

                    @if($application->student->degree && $application->student->major)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">Education:</span>
                        <span class="text-gray-800">{{ $application->student->degree }} in {{ $application->student->major }}</span>
                    </div>
                    @endif

                    @if($application->student->graduation_year)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">Graduation Year:</span>
                        <span class="text-gray-800">{{ $application->student->graduation_year }}</span>
                    </div>
                    @endif

                    @if($application->student->gpa)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">GPA:</span>
                        <span class="text-gray-800 font-semibold">{{ $application->student->gpa }}</span>
                    </div>
                    @endif

                    @if($application->student->skills)
                    <div class="flex items-start">
                        <span class="text-gray-500 font-medium w-40 flex-shrink-0">Skills:</span>
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $application->student->skills) as $skill)
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#D9E9CF] text-[#96A78D]">
                                    {{ trim($skill) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($application->student->bio)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-gray-500 font-medium mb-3">Bio:</p>
                        <p class="text-gray-700 whitespace-pre-wrap leading-relaxed bg-gray-50 p-4 rounded-xl">{{ $application->student->bio }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Cover Letter -->
            @if($application->cover_letter)
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Cover Letter
                </h2>
                <div class="prose prose-gray max-w-none">
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed bg-gradient-to-br from-gray-50 to-[#D9E9CF]/10 p-6 rounded-xl border border-gray-200">{{ $application->cover_letter }}</p>
                </div>
            </div>
            @endif

            <!-- Employer Notes (visible to students for accepted/rejected) -->
            @if(auth()->user()->isStudent() && $application->employer_notes && in_array($application->status, ['accepted', 'rejected']))
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                    </svg>
                    Feedback from Employer
                </h2>
                <div class="bg-gradient-to-br from-[#D9E9CF]/20 to-[#B6CEB4]/10 p-6 rounded-xl border border-[#B6CEB4]">
                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $application->employer_notes }}</p>
                </div>
            </div>
            @endif

            <!-- Update Status Form (Employer Only) -->
            @if(auth()->user()->isEmployer())
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Update Application Status
                </h2>
                <form method="POST" action="{{ route('employer.applications.update-status', $application) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#96A78D]/20 transition-all duration-200 bg-white">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <div>
                        <label for="employer_notes" class="block text-sm font-semibold text-gray-700 mb-2">Notes (optional)</label>
                        <textarea id="employer_notes" name="employer_notes" rows="4"
                                  placeholder="Add notes about this application..."
                                  class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#96A78D]/20 transition-all duration-200 resize-none">{{ old('employer_notes', $application->employer_notes) }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full px-6 py-3 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                        Update Status
                    </button>
                </form>

                @if($application->employer_notes)
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Current Notes</h3>
                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $application->employer_notes }}</p>
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] rounded-2xl shadow-xl p-8 text-white sticky top-6">
                <h3 class="text-xl font-bold mb-6">Application Timeline</h3>
                <div class="space-y-6">
                    <!-- Applied -->
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Applied</p>
                            <p class="text-sm text-white/80">{{ $application->created_at->format('M d, Y') }}</p>
                            <p class="text-xs text-white/60">{{ $application->created_at->format('h:i A') }}</p>
                        </div>
                    </div>

                    <!-- Reviewed -->
                    @if($application->reviewed_at)
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Reviewed</p>
                            <p class="text-sm text-white/80">{{ $application->reviewed_at->format('M d, Y') }}</p>
                            <p class="text-xs text-white/60">{{ $application->reviewed_at->format('h:i A') }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Current Status -->
                    <div class="pt-6 border-t border-white/20">
                        <p class="text-sm text-white/80 mb-2">Current Status</p>
                        <p class="text-2xl font-bold">{{ ucfirst($application->status) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
