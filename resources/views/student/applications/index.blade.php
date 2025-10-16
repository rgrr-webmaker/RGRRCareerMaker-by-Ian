@extends('layouts.app')

@section('title', 'My Applications')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">My Applications</h1>
        <p class="text-slate-600 mt-1">Track and manage your job applications</p>
    </div>

    <!-- Applications List -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        @if($applications->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Job Title</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Company</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Location</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Type</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Status</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Applied Date</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-slate-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($applications as $application)
                            <tr class="hover:bg-slate-50 transition-colors duration-150">
                                <td class="py-4 px-6">
                                    <p class="font-medium text-slate-900">{{ $application->job->title }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-slate-600">{{ $application->job->employer->company_name }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <p class="text-slate-600">{{ $application->job->location }}</p>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-slate-100 text-slate-800">
                                        {{ ucfirst($application->job->type) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium
                                        @if($application->status == 'accepted') bg-emerald-100 text-emerald-800
                                        @elseif($application->status == 'rejected') bg-red-100 text-red-800
                                        @elseif($application->status == 'reviewed') bg-indigo-100 text-indigo-800
                                        @else bg-amber-100 text-amber-800 @endif">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-slate-600 text-sm">
                                    {{ $application->created_at->format('M d, Y') }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('applications.show', $application) }}"
                                           class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                            View
                                        </a>
                                        @if($application->status == 'pending')
                                            <form method="POST" action="{{ route('student.applications.destroy', $application) }}"
                                                  onsubmit="return confirm('Are you sure you want to withdraw this application?')"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm">
                                                    Withdraw
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $applications->links() }}
            </div>
        @else
            <div class="text-center py-16 px-6">
                <svg class="w-20 h-20 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-xl font-semibold text-slate-900 mb-2">No Applications Yet</h3>
                <p class="text-slate-600 mb-6">You haven't applied to any jobs yet. Start exploring opportunities!</p>
                <a href="{{ route('student.jobs.index') }}"
                   class="inline-flex items-center px-6 py-3 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Browse Jobs
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
