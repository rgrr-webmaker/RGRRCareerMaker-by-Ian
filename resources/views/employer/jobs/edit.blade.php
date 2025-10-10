@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Edit Job</h1>
        <p class="text-gray-600">Update your job posting details</p>
    </div>

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
        <form method="POST" action="{{ route('employer.jobs.update', $job) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Job Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $job->title) }}"
                       required
                       class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                       placeholder="e.g., Software Engineer Intern">
            </div>

            <!-- Job Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                    Job Description <span class="text-red-500">*</span>
                </label>
                <textarea id="description"
                          name="description"
                          rows="6"
                          required
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="Describe the role, responsibilities, and what the candidate will do...">{{ old('description', $job->description) }}</textarea>
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Requirements</label>
                <textarea id="requirements"
                          name="requirements"
                          rows="4"
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="List required skills, qualifications, and experience...">{{ old('requirements', $job->requirements) }}</textarea>
            </div>

            <!-- Location and Type (Two Columns) -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                        Location <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <input type="text"
                               id="location"
                               name="location"
                               value="{{ old('location', $job->location) }}"
                               required
                               class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                               placeholder="e.g., San Francisco, CA">
                    </div>
                </div>

                <div>
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Job Type <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="type"
                                name="type"
                                required
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none appearance-none bg-white">
                            <option value="full-time" {{ old('type', $job->type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="part-time" {{ old('type', $job->type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="contract" {{ old('type', $job->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salary Range -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="salary_min" class="block text-sm font-semibold text-gray-700 mb-2">Minimum Salary</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400">₱</span>
                        </div>
                        <input type="number"
                               id="salary_min"
                               name="salary_min"
                               value="{{ old('salary_min', $job->salary_min) }}"
                               step="0.01"
                               min="0"
                               class="w-full pl-8 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                               placeholder="0.00">
                    </div>
                </div>

                <div>
                    <label for="salary_max" class="block text-sm font-semibold text-gray-700 mb-2">Maximum Salary</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-400">₱</span>
                        </div>
                        <input type="number"
                               id="salary_max"
                               name="salary_max"
                               value="{{ old('salary_max', $job->salary_max) }}"
                               step="0.01"
                               min="0"
                               class="w-full pl-8 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                               placeholder="0.00">
                    </div>
                </div>
            </div>

            <!-- Experience Level -->
            <div>
                <label for="experience_level" class="block text-sm font-semibold text-gray-700 mb-2">Experience Level</label>
                <input type="text"
                       id="experience_level"
                       name="experience_level"
                       value="{{ old('experience_level', $job->experience_level) }}"
                       class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                       placeholder="e.g., Entry Level, Mid Level, Senior">
            </div>

            <!-- Benefits -->
            <div>
                <label for="benefits" class="block text-sm font-semibold text-gray-700 mb-2">Benefits</label>
                <textarea id="benefits"
                          name="benefits"
                          rows="3"
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="List benefits and perks offered...">{{ old('benefits', $job->benefits) }}</textarea>
            </div>

            <!-- Application Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-semibold text-gray-700 mb-2">Application Deadline</label>
                <input type="date"
                       id="deadline"
                       name="deadline"
                       value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}"
                       class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none">
            </div>

            <!-- Active Status Toggle -->
            <div class="bg-gradient-to-br from-[#D9E9CF]/30 to-[#B6CEB4]/20 rounded-xl p-5 border border-[#D9E9CF]">
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                               class="sr-only peer">
                        <div class="w-14 h-7 bg-gray-300 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-[#96A78D] peer-checked:to-[#B6CEB4] transition-all duration-300 shadow-inner"></div>
                        <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7 shadow-md"></div>
                    </div>
                    <div class="ml-4">
                        <span class="font-semibold text-gray-800 block">Job is Active</span>
                        <span class="text-sm text-gray-600">When active, this job will be visible to students</span>
                    </div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit"
                        class="flex-1 py-3 px-6 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Update Job
                </button>
                <a href="{{ route('employer.jobs.show', $job) }}"
                   class="flex-1 py-3 px-6 rounded-xl bg-white border-2 border-gray-300 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Delete Job Section -->
    <div class="mt-8 bg-red-50/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border-2 border-red-200">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-bold text-red-900 mb-2">Danger Zone</h3>
                <p class="text-sm text-red-700 mb-4">
                    Deleting this job will permanently remove it along with all associated applications.
                    <strong>This action cannot be undone.</strong>
                </p>
                <form method="POST"
                      action="{{ route('employer.jobs.destroy', $job) }}"
                      onsubmit="return confirm('Are you sure you want to delete this job? This will also delete all applications. This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Job Permanently
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom toggle switch animation */
input[type="checkbox"]:checked + div {
    background: linear-gradient(to right, #96A78D, #B6CEB4);
}
</style>
@endsection
