@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">My Profile</h1>
        <p class="text-slate-600 mt-1">Update your information to help employers find you</p>
    </div>

    <!-- Profile Form -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <form method="POST" action="{{ route('student.profile.update') }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Contact Information Section -->
            <div>
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Contact Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-slate-700 mb-2">Address</label>
                        <textarea id="address" name="address" rows="3"
                                  class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('address', $student->address) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200"></div>

            <!-- Education Section -->
            <div>
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Education</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="university" class="block text-sm font-medium text-slate-700 mb-2">University</label>
                        <input type="text" id="university" name="university" value="{{ old('university', $student->university) }}"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>

                    <div>
                        <label for="degree" class="block text-sm font-medium text-slate-700 mb-2">Degree</label>
                        <input type="text" id="degree" name="degree" value="{{ old('degree', $student->degree) }}"
                               placeholder="e.g., Bachelor of Science"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>

                    <div>
                        <label for="major" class="block text-sm font-medium text-slate-700 mb-2">Major</label>
                        <input type="text" id="major" name="major" value="{{ old('major', $student->major) }}"
                               placeholder="e.g., Computer Science"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>

                    <div>
                        <label for="graduation_year" class="block text-sm font-medium text-slate-700 mb-2">Graduation Year</label>
                        <input type="number" id="graduation_year" name="graduation_year" value="{{ old('graduation_year', $student->graduation_year) }}"
                               min="1900" max="2100"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>

                    <div>
                        <label for="gpa" class="block text-sm font-medium text-slate-700 mb-2">GPA (0.00 - 4.00)</label>
                        <input type="number" id="gpa" name="gpa" value="{{ old('gpa', $student->gpa) }}"
                               step="0.01" min="0" max="4"
                               class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-200"></div>

            <!-- Skills & Bio Section -->
            <div>
                <h2 class="text-lg font-semibold text-slate-900 mb-4">Professional Information</h2>
                <div class="space-y-6">
                    <div>
                        <label for="skills" class="block text-sm font-medium text-slate-700 mb-2">Skills</label>
                        <textarea id="skills" name="skills" rows="3"
                                  placeholder="List your skills separated by commas (e.g., JavaScript, Python, Project Management)"
                                  class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('skills', $student->skills) }}</textarea>
                        <p class="text-xs text-slate-500 mt-1">Separate multiple skills with commas</p>
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-medium text-slate-700 mb-2">Bio</label>
                        <textarea id="bio" name="bio" rows="5"
                                  placeholder="Tell employers about yourself, your experience, and career goals..."
                                  class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('bio', $student->bio) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="{{ route('student.dashboard') }}" class="text-slate-600 hover:text-slate-900 font-medium">
                    Back to Dashboard
                </a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
