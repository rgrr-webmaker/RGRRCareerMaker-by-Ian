<!-- resources/views/applications/show.blade.php -->
@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <div class="mb-6">
        @if(auth()->user()->isStudent())
            <a href="{{ route('student.applications.index') }}" class="inline-flex items-center space-x-2 text-slate-600 hover:text-emerald-600 transition-colors duration-150">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Back to My Applications</span>
            </a>
        @else
            <a href="{{ route('employer.jobs.show', $application->job) }}" class="inline-flex items-center space-x-2 text-slate-600 hover:text-emerald-600 transition-colors duration-150">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Back to Job Details</span>
            </a>
        @endif
    </div>

    <!-- Header -->
    <div class="mb-8 bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900">Application Details</h1>
                <p class="text-slate-600 mt-1">Submitted {{ $application->created_at->format('F d, Y') }}</p>
            </div>
            <div>
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                    @if($application->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($application->status === 'reviewed') bg-blue-100 text-blue-800
                    @elseif($application->status === 'accepted') bg-green-100 text-green-800
                    @elseif($application->status === 'rejected') bg-red-100 text-red-800
                    @endif">
                    {{ ucfirst($application->status) }}
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Job Information -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Job Information
                </h2>
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                        <span class="text-sm font-medium text-slate-500 sm:w-32">Title:</span>
                        <span class="text-slate-900 font-medium">{{ $application->job->title }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                        <span class="text-sm font-medium text-slate-500 sm:w-32">Company:</span>
                        <span class="text-slate-900">{{ $application->job->employer->company_name }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                        <span class="text-sm font-medium text-slate-500 sm:w-32">Location:</span>
                        <span class="text-slate-900">{{ $application->job->location }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="text-sm font-medium text-slate-500 sm:w-32">Type:</span>
                        <span class="text-slate-900">{{ ucfirst($application->job->type) }}</span>
                    </div>
                </div>
            </div>

            <!-- Student Information -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                    <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Student Information
                </h2>
                <div class="space-y-4">
                    <div class="bg-slate-50 rounded-lg p-4">
                        <p class="text-lg font-semibold text-slate-900">{{ $application->student->user->name }}</p>
                        <p class="text-slate-600 mt-1">{{ $application->student->user->email }}</p>
                    </div>

                    @if($application->student->phone)
                        <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 sm:w-40">Phone:</span>
                            <span class="text-slate-900">{{ $application->student->phone }}</span>
                        </div>
                    @endif

                    @if($application->student->university)
                        <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 sm:w-40">University:</span>
                            <span class="text-slate-900">{{ $application->student->university }}</span>
                        </div>
                    @endif

                    @if($application->student->degree && $application->student->major)
                        <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 sm:w-40">Education:</span>
                            <span class="text-slate-900">{{ $application->student->degree }} in {{ $application->student->major }}</span>
                        </div>
                    @endif

                    @if($application->student->graduation_year)
                        <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 sm:w-40">Graduation Year:</span>
                            <span class="text-slate-900">{{ $application->student->graduation_year }}</span>
                        </div>
                    @endif

                    @if($application->student->gpa)
                        <div class="flex flex-col sm:flex-row sm:items-center border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 sm:w-40">GPA:</span>
                            <span class="text-slate-900">{{ $application->student->gpa }}</span>
                        </div>
                    @endif

                    @if($application->student->skills)
                        <div class="flex flex-col border-b border-slate-100 pb-3">
                            <span class="text-sm font-medium text-slate-500 mb-2">Skills:</span>
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $application->student->skills) as $skill)
                                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-sm font-medium rounded-full">
                                        {{ trim($skill) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($application->student->bio)
                        <div>
                            <p class="text-sm font-medium text-slate-500 mb-2">Bio:</p>
                            <p class="text-slate-700 leading-relaxed">{{ $application->student->bio }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Resume Section -->
            @if($application->resume_path)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Resume
                    </h2>
                    <div class="flex items-center justify-between bg-slate-50 rounded-lg p-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ basename($application->resume_path) }}</p>
                                <p class="text-xs text-slate-500 mt-1">{{ strtoupper(pathinfo($application->resume_path, PATHINFO_EXTENSION)) }} Document</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" class="inline-flex items-center px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                View
                            </a>
                            <a href="{{ route('applications.resume', $application) }}" download class="inline-flex items-center px-4 py-2 rounded-lg bg-slate-200 text-slate-700 text-sm font-medium hover:bg-slate-300 transition-colors duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Cover Letter -->
            @if($application->cover_letter)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Cover Letter
                    </h2>
                    <p class="text-slate-700 leading-relaxed whitespace-pre-wrap">{{ $application->cover_letter }}</p>
                </div>
            @endif

            <!-- Employer Notes -->
            @if(auth()->user()->isStudent() && $application->employer_notes && in_array($application->status, ['accepted', 'rejected']))
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-blue-200 p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        Feedback from Employer
                    </h2>
                    <p class="text-slate-700 leading-relaxed">{{ $application->employer_notes }}</p>
                </div>
            @endif

            <!-- Update Status Form (Employer Only) -->
            @if(auth()->user()->isEmployer())
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
                    <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Update Application Status
                    </h2>
                    <form method="POST" action="{{ route('employer.applications.update-status', $application) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="status" class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                            <select id="status"
                                    name="status"
                                    required
                                    class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>

                        <div>
                            <label for="employer_notes" class="block text-sm font-medium text-slate-700 mb-2">Notes (optional)</label>
                            <textarea id="employer_notes"
                                      name="employer_notes"
                                      rows="4"
                                      placeholder="Add notes or feedback for the applicant..."
                                      class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('employer_notes', $application->employer_notes) }}</textarea>
                        </div>

                        <button type="submit" class="w-full px-6 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 transition-colors duration-150 flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Update Status</span>
                        </button>
                    </form>

                    @if($application->employer_notes)
                        <div class="mt-6 pt-6 border-t border-slate-200">
                            <h3 class="text-sm font-semibold text-slate-900 mb-2">Current Notes</h3>
                            <p class="text-slate-700 text-sm leading-relaxed bg-slate-50 rounded-lg p-3">{{ $application->employer_notes }}</p>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sticky top-24">
                <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-emerald-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Application Timeline
                </h3>
                <div class="space-y-4">
                    <!-- Applied -->
                    <div class="relative pl-6 pb-4 border-l-2 border-emerald-200">
                        <div class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-emerald-500"></div>
                        <p class="text-sm font-semibold text-slate-900">Applied</p>
                        <p class="text-xs text-slate-600 mt-1">{{ $application->created_at->format('M d, Y h:i A') }}</p>
                    </div>

                    <!-- Reviewed -->
                    @if($application->reviewed_at)
                        <div class="relative pl-6 pb-4 border-l-2 border-blue-200">
                            <div class="absolute -left-2 top-0 w-4 h-4 rounded-full bg-blue-500"></div>
                            <p class="text-sm font-semibold text-slate-900">Reviewed</p>
                            <p class="text-xs text-slate-600 mt-1">{{ $application->reviewed_at->format('M d, Y h:i A') }}</p>
                        </div>
                    @endif

                    <!-- Current Status -->
                    <div class="relative pl-6">
                        <div class="absolute -left-2 top-0 w-4 h-4 rounded-full
                            @if($application->status === 'pending') bg-yellow-500
                            @elseif($application->status === 'reviewed') bg-blue-500
                            @elseif($application->status === 'accepted') bg-green-500
                            @elseif($application->status === 'rejected') bg-red-500
                            @endif">
                        </div>
                        <p class="text-sm font-semibold text-slate-900">Current Status</p>
                        <p class="text-xs text-slate-600 mt-1">{{ ucfirst($application->status) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Resume Viewer Modal -->
@if($application->resume_path)
<div id="resumeModal" class="fixed inset-0 bg-black bg-opacity-75 hidden z-50 p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full h-full flex flex-col">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-4 border-b border-slate-200 flex-shrink-0">
            <h3 class="text-lg font-bold text-slate-900">Resume Preview</h3>
            <div class="flex items-center space-x-2">
                <a href="{{ route('applications.resume', $application) }}" download class="inline-flex items-center px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm font-medium hover:bg-emerald-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Download
                </a>
                <button onclick="closeResumeModal()" class="text-slate-400 hover:text-slate-600 transition-colors p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="flex-1 overflow-hidden" style="height: calc(100% - 73px);">
            @php
                $fileExtension = strtolower(pathinfo($application->resume_path, PATHINFO_EXTENSION));
                $resumeUrl = asset('storage/' . $application->resume_path);
            @endphp

            @if($fileExtension === 'pdf')
                <iframe id="resumeFrame" src="{{ $resumeUrl }}" class="w-full h-full" frameborder="0"></iframe>
            @else
                <div class="flex items-center justify-center h-full p-8">
                    <div class="text-center">
                        <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-slate-600 mb-4">Preview not available for {{ strtoupper($fileExtension) }} files</p>
                        <a href="{{ route('student.applications.resume', $application) }}" download class="inline-flex items-center px-6 py-3 rounded-lg bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download to View
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function viewResume() {
        document.getElementById('resumeModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeResumeModal() {
        document.getElementById('resumeModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('resumeModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeResumeModal();
        }
    });

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeResumeModal();
        }
    });
</script>
@endif
@endsection
