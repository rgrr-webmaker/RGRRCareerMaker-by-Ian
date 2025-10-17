@extends('layouts.app')

@section('title', 'Post New Job')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Post New Job</h1>
        <p class="text-slate-600 mt-1">Fill in the details to create a new job posting</p>
    </div>

    <!-- Job Form -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <form method="POST" action="{{ route('employer.jobs.store') }}" class="p-6 space-y-6">
            @csrf

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">
                    Job Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       required
                       placeholder="e.g., Software Engineer Intern"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Job Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">
                    Job Description <span class="text-red-500">*</span>
                </label>
                <textarea id="description"
                          name="description"
                          rows="6"
                          required
                          placeholder="Describe the role, responsibilities, and what the candidate will do..."
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('description') }}</textarea>
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-medium text-slate-700 mb-2">Requirements</label>
                <textarea id="requirements"
                          name="requirements"
                          rows="4"
                          placeholder="List required skills, qualifications, and experience..."
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('requirements') }}</textarea>
            </div>

            <!-- Location and Type -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="location" class="block text-sm font-medium text-slate-700 mb-2">
                        Location <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           id="location"
                           name="location"
                           value="{{ old('location') }}"
                           required
                           placeholder="e.g., San Francisco, CA"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 mb-2">
                        Job Type <span class="text-red-500">*</span>
                    </label>
                    <select id="type"
                            name="type"
                            required
                            class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                        <option value="">Select Type</option>
                        <option value="full-time" {{ old('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>
            </div>

            <!-- Salary Range -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="salary_min" class="block text-sm font-medium text-slate-700 mb-2">Minimum Salary (₱)</label>
                    <input type="number"
                           id="salary_min"
                           name="salary_min"
                           value="{{ old('salary_min') }}"
                           step="0.01"
                           min="0"
                           placeholder="0.00"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>

                <div>
                    <label for="salary_max" class="block text-sm font-medium text-slate-700 mb-2">Maximum Salary (₱)</label>
                    <input type="number"
                           id="salary_max"
                           name="salary_max"
                           value="{{ old('salary_max') }}"
                           step="0.01"
                           min="0"
                           placeholder="0.00"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>
            </div>

            <!-- Experience Level -->
            <div>
                <label for="experience_level" class="block text-sm font-medium text-slate-700 mb-2">Experience Level</label>
                <input type="text"
                       id="experience_level"
                       name="experience_level"
                       value="{{ old('experience_level') }}"
                       placeholder="e.g., Entry Level, Mid Level, Senior"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Benefits -->
            <div>
                <label for="benefits" class="block text-sm font-medium text-slate-700 mb-2">Benefits</label>
                <textarea id="benefits"
                          name="benefits"
                          rows="3"
                          placeholder="List benefits and perks offered..."
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('benefits') }}</textarea>
            </div>

            <!-- Application Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-medium text-slate-700 mb-2">Application Deadline</label>
                <input type="date"
                       id="deadline"
                       name="deadline"
                       value="{{ old('deadline') }}"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="{{ route('employer.jobs.index') }}" class="px-6 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors duration-150">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 transition-colors duration-150 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Post Job</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Info Card -->
    <div class="mt-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-200">
        <div class="flex items-start">
            <div class="w-10 h-10 rounded-lg bg-blue-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-slate-900 mb-2">Tips for Creating a Great Job Posting</h3>
                <ul class="text-sm text-slate-600 space-y-1">
                    <li>• Be specific about the role and responsibilities</li>
                    <li>• Include clear requirements and qualifications</li>
                    <li>• Mention salary range to attract suitable candidates</li>
                    <li>• Highlight company benefits and culture</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
