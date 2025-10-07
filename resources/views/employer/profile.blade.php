@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: 0 auto;">
    <h1>Company Profile</h1>

    <form method="POST" action="{{ route('employer.profile.update') }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="company_name">Company Name: *</label>
            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $employer->company_name) }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="company_website">Company Website:</label>
            <input type="url" id="company_website" name="company_website" value="{{ old('company_website', $employer->company_website) }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="company_phone">Company Phone:</label>
            <input type="text" id="company_phone" name="company_phone" value="{{ old('company_phone', $employer->company_phone) }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="company_address">Company Address:</label>
            <textarea id="company_address" name="company_address" rows="3" style="width: 100%; padding: 5px;">{{ old('company_address', $employer->company_address) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="industry">Industry:</label>
            <input type="text" id="industry" name="industry" value="{{ old('industry', $employer->industry) }}" placeholder="e.g., Technology, Finance" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="company_size">Company Size (number of employees):</label>
            <input type="number" id="company_size" name="company_size" value="{{ old('company_size', $employer->company_size) }}" min="1" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="company_description">Company Description:</label>
            <textarea id="company_description" name="company_description" rows="5" style="width: 100%; padding: 5px;" placeholder="Tell students about your company...">{{ old('company_description', $employer->company_description) }}</textarea>
        </div>

        <button type="submit" style="padding: 10px 20px;">Update Profile</button>
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('employer.dashboard') }}">Back to Dashboard</a>
    </div>
</div>
@endsection
