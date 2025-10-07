@extends('layouts.app')

@section('title', 'Browse Jobs')

@section('content')
<div style="padding: 20px;">
    <h1>Browse Jobs</h1>

    <form method="GET" action="{{ route('student.jobs.index') }}" style="margin: 20px 0; padding: 20px; border: 1px solid #ccc;">
        <div style="margin-bottom: 10px;">
            <label for="search">Search:</label>
            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Job title, description..." style="width: 100%; padding: 5px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="type">Job Type:</label>
            <select id="type" name="type" style="width: 100%; padding: 5px;">
                <option value="">All Types</option>
                <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="{{ request('location') }}" placeholder="City, State" style="width: 100%; padding: 5px;">
        </div>

        <button type="submit" style="padding: 10px 20px;">Search</button>
        <a href="{{ route('student.jobs.index') }}" style="padding: 10px 20px; margin-left: 10px;">Clear</a>
    </form>

    @if($jobs->count() > 0)
        <div style="margin-top: 20px;">
            <p>Found {{ $jobs->total() }} jobs</p>
        </div>

        @foreach($jobs as $job)
            <div style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                <h2>{{ $job->title }}</h2>
                <p><strong>Company:</strong> {{ $job->employer->company_name }}</p>
                <p><strong>Location:</strong> {{ $job->location }}</p>
                <p><strong>Type:</strong> {{ ucfirst($job->type) }}</p>
                @if($job->salary_min && $job->salary_max)
                    <p><strong>Salary:</strong> ${{ number_format($job->salary_min, 2) }} - ${{ number_format($job->salary_max, 2) }}</p>
                @endif
                <p>{{ Str::limit($job->description, 200) }}</p>
                <p><small>Posted {{ $job->created_at->diffForHumans() }}</small></p>
                <a href="{{ route('student.jobs.show', $job) }}" style="padding: 10px 20px; background: lightblue;">View Details</a>
            </div>
        @endforeach

        <div style="margin-top: 20px;">
            {{ $jobs->links() }}
        </div>
    @else
        <p>No jobs found matching your criteria.</p>
    @endif
</div>
@endsection
