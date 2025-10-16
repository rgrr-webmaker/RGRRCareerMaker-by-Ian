@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Welcome, {{ auth()->user()->name }}</h1>
        <p class="text-slate-600 mt-1">Here's an overview of your job search activity</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Applications</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $applications->total() }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Pending</p>
                    <p class="text-3xl font-bold text-amber-600 mt-1">{{ $student->applications()->where('status', 'pending')->count() }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-amber-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Reviewed</p>
                    <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $student->applications()->where('status', 'reviewed')->count() }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Accepted</p>
                    <p class="text-3xl font-bold text-emerald-600 mt-1">{{ $student->applications()->where('status', 'accepted')->count() }}</p>
                </div>
                <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Applications -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="px-6 py-4 border-b border-slate-200">
            <h2 class="text-xl font-semibold text-slate-900">Recent Applications</h2>
        </div>

        <div class="p-6">
            @if($applications->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Job Title</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Company</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Status</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Applied Date</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-slate-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($applications as $application)
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="py-4 px-4">
                                        <p class="font-medium text-slate-900">{{ $application->job->title }}</p>
                                    </td>
                                    <td class="py-4 px-4">
                                        <p class="text-slate-600">{{ $application->job->employer->company_name }}</p>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium
                                            @if($application->status == 'accepted') bg-emerald-100 text-emerald-800
                                            @elseif($application->status == 'rejected') bg-red-100 text-red-800
                                            @elseif($application->status == 'reviewed') bg-indigo-100 text-indigo-800
                                            @else bg-slate-100 text-slate-800 @endif">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-slate-600 text-sm">
                                        {{ $application->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-4">
                                        <a href="{{ route('applications.show', $application) }}" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $applications->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-slate-600 mb-4">You haven't applied to any jobs yet.</p>
                    <a href="{{ route('student.jobs.index') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition-colors duration-150">
                        Browse Available Jobs
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
