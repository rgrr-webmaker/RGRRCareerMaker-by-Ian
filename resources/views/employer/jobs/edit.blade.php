<!-- resources/views/employer/jobs/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Edit Job</h1>
        <p class="text-slate-600 mt-1">Update your job posting details</p>
    </div>

    <!-- Edit Form -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <form method="POST" action="{{ route('employer.jobs.update', $job) }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">
                    Job Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $job->title) }}"
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
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('description', $job->description) }}</textarea>
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-medium text-slate-700 mb-2">Requirements</label>
                <textarea id="requirements"
                          name="requirements"
                          rows="4"
                          placeholder="List required skills, qualifications, and experience..."
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('requirements', $job->requirements) }}</textarea>
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
                           value="{{ old('location', $job->location) }}"
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
                        <option value="full-time" {{ old('type', $job->type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="part-time" {{ old('type', $job->type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="contract" {{ old('type', $job->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
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
                           value="{{ old('salary_min', $job->salary_min) }}"
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
                           value="{{ old('salary_max', $job->salary_max) }}"
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
                       value="{{ old('experience_level', $job->experience_level) }}"
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
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('benefits', $job->benefits) }}</textarea>
            </div>

            <!-- Application Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-medium text-slate-700 mb-2">Application Deadline</label>
                <input type="date"
                       id="deadline"
                       name="deadline"
                       value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Active Status -->
            <div class="flex items-center space-x-3 p-4 bg-slate-50 rounded-lg border border-slate-200">
                <input type="checkbox"
                       id="is_active"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 text-emerald-600 border-slate-300 rounded focus:ring-2 focus:ring-emerald-500">
                <label for="is_active" class="text-sm font-medium text-slate-700 cursor-pointer">
                    Job is Active (visible to students)
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="{{ route('employer.jobs.show', $job) }}" class="px-6 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors duration-150">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 rounded-lg bg-emerald-600 text-white font-semibold shadow-sm hover:bg-emerald-700 transition-colors duration-150 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Update Job</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Danger Zone -->
    <div class="mt-8 bg-white rounded-xl shadow-sm border border-red-200">
        <div class="p-6">
            <div class="flex items-start">
                <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-semibold text-red-900 mb-2">Danger Zone</h3>
                    <p class="text-sm text-slate-600 mb-4">Deleting this job will permanently remove it along with all associated applications. This action cannot be undone.</p>
                    <form method="POST"
                          action="{{ route('employer.jobs.destroy', $job) }}"
                          onsubmit="return confirm('Are you sure you want to delete this job? This will also delete all applications. This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-2 rounded-lg bg-red-600 text-white font-medium shadow-sm hover:bg-red-700 transition-colors duration-150 flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <span>Delete Job Permanently</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
