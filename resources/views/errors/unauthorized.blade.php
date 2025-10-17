<!-- resources/views/errors/unauthorized.blade.php -->
@extends('layouts.app')

@section('title', 'Access Denied')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="text-center">
            <!-- Error Icon -->
            <div class="mb-8">
                <svg class="mx-auto h-32 w-32 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <!-- Error Message -->
            <h1 class="text-4xl font-bold text-slate-900 mb-4">Access Denied</h1>

            @if(auth()->user()->isStudent())
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
                    You're currently logged in as a <span class="font-semibold text-emerald-600">Student</span>.
                    The page you're trying to access is only available for <span class="font-semibold">Employers</span>.
                </p>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8 max-w-2xl mx-auto">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <div class="text-left">
                            <h3 class="text-sm font-semibold text-blue-900 mb-2">Want to post jobs?</h3>
                            <p class="text-sm text-blue-800">
                                If you're an employer looking to hire talent, you'll need to create a separate employer account.
                                Each account type has different features and access levels.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('student.dashboard') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors duration-150 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Go to My Dashboard
                    </a>
                    <a href="{{ route('student.jobs.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 transition-colors duration-150 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Browse Jobs
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="mt-12 pt-8 border-t border-slate-200">
                    <p class="text-sm text-slate-500 mb-4">Need an employer account?</p>
                    <a href="{{ route('register') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium hover:underline">
                        Register as an Employer →
                    </a>
                </div>

            @else
                <p class="text-lg text-slate-600 mb-8 max-w-2xl mx-auto">
                    You're currently logged in as an <span class="font-semibold text-emerald-600">Employer</span>.
                    The page you're trying to access is only available for <span class="font-semibold">Students/Job Seekers</span>.
                </p>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8 max-w-2xl mx-auto">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <div class="text-left">
                            <h3 class="text-sm font-semibold text-blue-900 mb-2">Looking for job opportunities?</h3>
                            <p class="text-sm text-blue-800">
                                If you're looking to apply for jobs, you'll need to create a student account.
                                Employer accounts are designed for posting jobs and managing applications.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('employer.dashboard') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 transition-colors duration-150 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Go to My Dashboard
                    </a>
                    <a href="{{ route('employer.jobs.index') }}"
                       class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50 transition-colors duration-150 shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        View My Jobs
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="mt-12 pt-8 border-t border-slate-200">
                    <p class="text-sm text-slate-500 mb-4">Need a student account?</p>
                    <a href="{{ route('register') }}" class="text-sm text-emerald-600 hover:text-emerald-700 font-medium hover:underline">
                        Register as a Student/Job Seeker →
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
