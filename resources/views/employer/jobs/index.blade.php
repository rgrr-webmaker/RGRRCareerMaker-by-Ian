@extends('layouts.app')

@section('title', 'My Jobs')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">My Jobs</h1>
            <p class="text-gray-600">Manage all your job postings</p>
        </div>
        <a href="{{ route('employer.jobs.create') }}"
           class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Post New Job
        </a>
    </div>

    @if($jobs->count() > 0)
        <!-- Desktop Table View -->
        <div class="hidden lg:block bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-[#D9E9CF]">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-[#D9E9CF]/50 to-[#B6CEB4]/30">
                        <tr>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Job Title
                            </th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Location
                            </th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Type
                            </th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Status
                            </th>
                            <th class="text-center py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Applications
                            </th>
                            <th class="text-left py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Posted
                            </th>
                            <th class="text-center py-4 px-6 font-bold text-gray-700 text-sm uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($jobs as $job)
                            <tr class="hover:bg-[#D9E9CF]/20 transition-colors duration-200">
                                <!-- Job Title -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-md flex-shrink-0">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $job->title }}</p>
                                            <p class="text-xs text-gray-500">ID: #{{ $job->id }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Location -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <span class="text-sm">{{ $job->location }}</span>
                                    </div>
                                </td>

                                <!-- Type -->
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-[#D9E9CF] to-[#B6CEB4] text-[#96A78D]">
                                        {{ ucfirst($job->type) }}
                                    </span>
                                </td>

                                <!-- Status -->
                                <td class="py-4 px-6">
                                    @if($job->is_active)
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] text-[#96A78D] shadow-sm">
                                            <span class="w-2 h-2 bg-[#96A78D] rounded-full mr-2 animate-pulse"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-bold bg-gray-200 text-gray-600">
                                            <span class="w-2 h-2 bg-gray-500 rounded-full mr-2"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Applications Count -->
                                <td class="py-4 px-6 text-center">
                                    <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] text-white font-bold shadow-md">
                                        {{ $job->applications_count }}
                                    </div>
                                </td>

                                <!-- Posted Date -->
                                <td class="py-4 px-6">
                                    <div class="text-sm text-gray-600">
                                        <p class="font-medium">{{ $job->created_at->format('M d, Y') }}</p>
                                        <p class="text-xs text-gray-400">{{ $job->created_at->diffForHumans() }}</p>
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="py-4 px-6">
                                    <div class="flex items-center justify-center space-x-2">
                                        <!-- View -->
                                        <a href="{{ route('employer.jobs.show', $job) }}"
                                           class="p-2 rounded-lg bg-[#D9E9CF]/50 text-[#96A78D] hover:bg-[#B6CEB4] hover:text-white transition-all duration-300 group"
                                           title="View Details">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('employer.jobs.edit', $job) }}"
                                           class="p-2 rounded-lg bg-[#D9E9CF]/50 text-[#96A78D] hover:bg-[#B6CEB4] hover:text-white transition-all duration-300 group"
                                           title="Edit Job">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>

                                        <!-- Toggle Status -->
                                        <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" class="inline-block">
                                            @csrf
                                            <button type="submit"
                                                    class="p-2 rounded-lg bg-[#D9E9CF]/50 text-[#96A78D] hover:bg-[#B6CEB4] hover:text-white transition-all duration-300"
                                                    title="{{ $job->is_active ? 'Deactivate' : 'Activate' }}">
                                                @if($job->is_active)
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="lg:hidden space-y-4">
            @foreach($jobs as $job)
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-[#D9E9CF] hover:shadow-xl transition-all duration-300">
                    <!-- Header -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-start space-x-3 flex-1">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#96A78D] to-[#B6CEB4] flex items-center justify-center shadow-md flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-800 text-lg mb-1">{{ $job->title }}</h3>
                                <p class="text-xs text-gray-500">Job ID: #{{ $job->id }}</p>
                            </div>
                        </div>

                        <!-- Status Badge -->
                        @if($job->is_active)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-[#B6CEB4] to-[#D9E9CF] text-[#96A78D]">
                                <span class="w-2 h-2 bg-[#96A78D] rounded-full mr-2 animate-pulse"></span>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gray-200 text-gray-600">
                                Inactive
                            </span>
                        @endif
                    </div>

                    <!-- Job Info -->
                    <div class="space-y-3 mb-4 pb-4 border-b border-gray-200">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            <span>{{ $job->location }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-[#D9E9CF] to-[#B6CEB4] text-[#96A78D]">
                                {{ ucfirst($job->type) }}
                            </span>
                            <span class="text-sm text-gray-600">
                                <span class="font-semibold text-[#96A78D]">{{ $job->applications_count }}</span> Applications
                            </span>
                        </div>

                        <p class="text-xs text-gray-500">
                            Posted {{ $job->created_at->format('M d, Y') }} • {{ $job->created_at->diffForHumans() }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('employer.jobs.show', $job) }}"
                           class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white text-center font-semibold text-sm shadow-md hover:shadow-lg transition-all duration-300">
                            View Details
                        </a>
                        <a href="{{ route('employer.jobs.edit', $job) }}"
                           class="px-4 py-2.5 rounded-xl bg-white border-2 border-[#96A78D] text-[#96A78D] text-center font-semibold text-sm hover:bg-[#D9E9CF]/30 transition-all duration-300">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" class="col-span-2">
                            @csrf
                            <button type="submit"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white border-2 border-gray-300 text-gray-700 font-semibold text-sm hover:bg-gray-50 transition-all duration-300">
                                {{ $job->is_active ? '⏸ Deactivate Job' : '▶ Activate Job' }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>

    @else
        <!-- Empty State -->
        <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-12 text-center border border-[#D9E9CF]">
            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-[#D9E9CF] to-[#B6CEB4] flex items-center justify-center">
                <svg class="w-12 h-12 text-[#96A78D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-3">No Jobs Posted Yet</h2>
            <p class="text-gray-600 mb-8 max-w-md mx-auto">Start attracting talented candidates by posting your first job opportunity.</p>
            <a href="{{ route('employer.jobs.create') }}"
               class="inline-flex items-center px-8 py-3 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Post Your First Job
            </a>
        </div>
    @endif
</div>
@endsection
