@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900">Company Profile</h1>
        <p class="text-slate-600 mt-1">Manage your company information and details</p>
    </div>

    <!-- Profile Form -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <form method="POST" action="{{ route('employer.profile.update') }}" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Company Name -->
            <div>
                <label for="company_name" class="block text-sm font-medium text-slate-700 mb-2">
                    Company Name <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="company_name"
                       name="company_name"
                       value="{{ old('company_name', $employer->company_name) }}"
                       required
                       placeholder="Your Company Name"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Company Website -->
            <div>
                <label for="company_website" class="block text-sm font-medium text-slate-700 mb-2">Company Website</label>
                <input type="url"
                       id="company_website"
                       name="company_website"
                       value="{{ old('company_website', $employer->company_website) }}"
                       placeholder="https://www.example.com"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Company Phone -->
            <div>
                <label for="company_phone" class="block text-sm font-medium text-slate-700 mb-2">Company Phone</label>
                <input type="text"
                       id="company_phone"
                       name="company_phone"
                       value="{{ old('company_phone', $employer->company_phone) }}"
                       placeholder="+1 (555) 123-4567"
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
            </div>

            <!-- Company Address -->
            <div>
                <label for="company_address" class="block text-sm font-medium text-slate-700 mb-2">Company Address</label>
                <textarea id="company_address"
                          name="company_address"
                          rows="3"
                          placeholder="Street address, city, state, zip code"
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('company_address', $employer->company_address) }}</textarea>
            </div>

            <!-- Industry and Company Size -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="industry" class="block text-sm font-medium text-slate-700 mb-2">Industry</label>
                    <input type="text"
                           id="industry"
                           name="industry"
                           value="{{ old('industry', $employer->industry) }}"
                           placeholder="e.g., Technology, Finance"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>

                <div>
                    <label for="company_size" class="block text-sm font-medium text-slate-700 mb-2">Company Size</label>
                    <input type="number"
                           id="company_size"
                           name="company_size"
                           value="{{ old('company_size', $employer->company_size) }}"
                           min="1"
                           placeholder="Number of employees"
                           class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">
                </div>
            </div>

            <!-- Company Description -->
            <div>
                <label for="company_description" class="block text-sm font-medium text-slate-700 mb-2">Company Description</label>
                <textarea id="company_description"
                          name="company_description"
                          rows="5"
                          placeholder="Tell students about your company, culture, and mission..."
                          class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors duration-150">{{ old('company_description', $employer->company_description) }}</textarea>
                <p class="mt-2 text-sm text-slate-500">This will be displayed to students when they view your job postings</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-slate-200">
                <a href="{{ route('employer.dashboard') }}" class="px-6 py-2 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition-colors duration-150">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 rounded-lg bg-emerald-600 text-white font-medium shadow-sm hover:bg-emerald-700 transition-colors duration-150 flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Update Profile</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Profile Preview Card -->
    <div class="mt-6 bg-gradient-to-br from-emerald-50 to-green-50 rounded-xl p-6 border border-emerald-200">
        <div class="flex items-start">
            <div class="w-10 h-10 rounded-lg bg-emerald-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-sm font-semibold text-slate-900 mb-1">Profile Visibility</h3>
                <p class="text-sm text-slate-600">Your company profile is visible to students when they view your job postings. Keep it updated to attract the best candidates.</p>
            </div>
        </div>
    </div>
</div>
@endsection
