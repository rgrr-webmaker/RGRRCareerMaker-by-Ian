@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: 0 auto;">
    <h1>My Profile</h1>

    <form method="POST" action="{{ route('student.profile.update') }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $student->phone) }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" style="width: 100%; padding: 5px;">{{ old('address', $student->address) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="university">University:</label>
            <input type="text" id="university" name="university" value="{{ old('university', $student->university) }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="degree">Degree:</label>
            <input type="text" id="degree" name="degree" value="{{ old('degree', $student->degree) }}" placeholder="e.g., Bachelor of Science" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="major">Major:</label>
            <input type="text" id="major" name="major" value="{{ old('major', $student->major) }}" placeholder="e.g., Computer Science" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="graduation_year">Graduation Year:</label>
            <input type="number" id="graduation_year" name="graduation_year" value="{{ old('graduation_year', $student->graduation_year) }}" min="1900" max="2100" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="gpa">GPA (0.00 - 4.00):</label>
            <input type="number" id="gpa" name="gpa" value="{{ old('gpa', $student->gpa) }}" step="0.01" min="0" max="4" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="skills">Skills:</label>
            <textarea id="skills" name="skills" rows="3" style="width: 100%; padding: 5px;" placeholder="List your skills separated by commas">{{ old('skills', $student->skills) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="5" style="width: 100%; padding: 5px;" placeholder="Tell employers about yourself...">{{ old('bio', $student->bio) }}</textarea>
        </div>

        <button type="submit" style="padding: 10px 20px;">Update Profile</button>
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('student.dashboard') }}">Back to Dashboard</a>
    </div>
</div>
@endsection
