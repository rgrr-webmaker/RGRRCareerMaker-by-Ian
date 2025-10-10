@extends('layouts.app')

@section('title', 'Post New Job')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Post New Job</h1>
        <p class="text-gray-600">Fill in the details to create a new job posting</p>
    </div>

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
        <form method="POST" action="{{ route('employer.jobs.store') }}" class="space-y-6">
            @csrf

            <!-- Job Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                    Job Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
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
                          placeholder="Describe the role, responsibilities, and what the candidate will do...">{{ old('description') }}</textarea>
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Requirements</label>
                <textarea id="requirements"
                          name="requirements"
                          rows="4"
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="List required skills, qualifications, and experience...">{{ old('requirements') }}</textarea>
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
                               value="{{ old('location') }}"
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
                            <option value="">Select Type</option>
                            <option value="full-time" {{ old('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="part-time" {{ old('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
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
                               value="{{ old('salary_min') }}"
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
                               value="{{ old('salary_max') }}"
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
                       value="{{ old('experience_level') }}"
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
                          placeholder="List benefits and perks offered...">{{ old('benefits') }}</textarea>
            </div>

            <!-- Application Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-semibold text-gray-700 mb-2">Application Deadline</label>
                <input type="date"
                       id="deadline"
                       name="deadline"
                       value="{{ old('deadline') }}"
                       class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none">
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit"
                        class="flex-1 py-3 px-6 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Post Job
                </button>
                <a href="{{ route('employer.jobs.index') }}"
                   class="flex-1 py-3 px-6 rounded-xl bg-white border-2 border-gray-300 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all duration-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
