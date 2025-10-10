@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Company Profile</h1>
        <p class="text-gray-600">Manage your company information and details</p>
    </div>

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-[#D9E9CF]">
        <form method="POST" action="{{ route('employer.profile.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Company Name -->
            <div>
                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Company Name <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="company_name"
                       name="company_name"
                       value="{{ old('company_name', $employer->company_name) }}"
                       required
                       class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                       placeholder="Your Company Name">
            </div>

            <!-- Company Website -->
            <div>
                <label for="company_website" class="block text-sm font-semibold text-gray-700 mb-2">Company Website</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <input type="url"
                           id="company_website"
                           name="company_website"
                           value="{{ old('company_website', $employer->company_website) }}"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="https://www.example.com">
                </div>
            </div>

            <!-- Company Phone -->
            <div>
                <label for="company_phone" class="block text-sm font-semibold text-gray-700 mb-2">Company Phone</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <input type="text"
                           id="company_phone"
                           name="company_phone"
                           value="{{ old('company_phone', $employer->company_phone) }}"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="+1 (555) 123-4567">
                </div>
            </div>

            <!-- Company Address -->
            <div>
                <label for="company_address" class="block text-sm font-semibold text-gray-700 mb-2">Company Address</label>
                <textarea id="company_address"
                          name="company_address"
                          rows="3"
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="Street address, city, state, zip code">{{ old('company_address', $employer->company_address) }}</textarea>
            </div>

            <!-- Industry and Company Size (Two Columns) -->
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="industry" class="block text-sm font-semibold text-gray-700 mb-2">Industry</label>
                    <input type="text"
                           id="industry"
                           name="industry"
                           value="{{ old('industry', $employer->industry) }}"
                           class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                           placeholder="e.g., Technology, Finance">
                </div>

                <div>
                    <label for="company_size" class="block text-sm font-semibold text-gray-700 mb-2">Company Size</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <input type="number"
                               id="company_size"
                               name="company_size"
                               value="{{ old('company_size', $employer->company_size) }}"
                               min="1"
                               class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none"
                               placeholder="Number of employees">
                    </div>
                </div>
            </div>

            <!-- Company Description -->
            <div>
                <label for="company_description" class="block text-sm font-semibold text-gray-700 mb-2">Company Description</label>
                <textarea id="company_description"
                          name="company_description"
                          rows="5"
                          class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-[#96A78D] focus:ring-2 focus:ring-[#B6CEB4]/20 transition-all duration-300 outline-none resize-none"
                          placeholder="Tell students about your company, culture, and mission...">{{ old('company_description', $employer->company_description) }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                <button type="submit"
                        class="flex-1 py-3 px-6 rounded-xl bg-gradient-to-r from-[#96A78D] to-[#B6CEB4] text-white font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    Update Profile
                </button>
                <a href="{{ route('employer.dashboard') }}"
                   class="flex-1 py-3 px-6 rounded-xl bg-white border-2 border-gray-300 text-gray-700 font-semibold text-center hover:bg-gray-50 transition-all duration-300">
                    Back to Dashboard
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
