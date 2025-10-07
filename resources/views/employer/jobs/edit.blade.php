@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: 0 auto;">
    <h1>Edit Job</h1>

    <form method="POST" action="{{ route('employer.jobs.update', $job) }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title">Job Title: *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">Job Description: *</label>
            <textarea id="description" name="description" rows="6" required style="width: 100%; padding: 5px;">{{ old('description', $job->description) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="requirements">Requirements:</label>
            <textarea id="requirements" name="requirements" rows="4" style="width: 100%; padding: 5px;">{{ old('requirements', $job->requirements) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="location">Location: *</label>
            <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" required style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="type">Job Type: *</label>
            <select id="type" name="type" required style="width: 100%; padding: 5px;">
                <option value="full-time" {{ old('type', $job->type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="part-time" {{ old('type', $job->type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="contract" {{ old('type', $job->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                <option value="internship" {{ old('type', $job->type) == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="salary_min">Minimum Salary:</label>
            <input type="number" id="salary_min" name="salary_min" value="{{ old('salary_min', $job->salary_min) }}" step="0.01" min="0" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="salary_max">Maximum Salary:</label>
            <input type="number" id="salary_max" name="salary_max" value="{{ old('salary_max', $job->salary_max) }}" step="0.01" min="0" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="experience_level">Experience Level:</label>
            <input type="text" id="experience_level" name="experience_level" value="{{ old('experience_level', $job->experience_level) }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="benefits">Benefits:</label>
            <textarea id="benefits" name="benefits" rows="3" style="width: 100%; padding: 5px;">{{ old('benefits', $job->benefits) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="deadline">Application Deadline:</label>
            <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}" style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}>
                Job is Active
            </label>
        </div>

        <button type="submit" style="padding: 10px 20px;">Update Job</button>
        <a href="{{ route('employer.jobs.show', $job) }}" style="padding: 10px 20px; margin-left: 10px;">Cancel</a>
    </form>

    <form method="POST" action="{{ route('employer.jobs.destroy', $job) }}" style="margin-top: 30px;" onsubmit="return confirm('Are you sure you want to delete this job? This action cannot be undone.')">
        @csrf
        @method('DELETE')
        <button type="submit" style="padding: 10px 20px; background: lightcoral;">Delete Job</button>
    </form>
</div>
@endsection
