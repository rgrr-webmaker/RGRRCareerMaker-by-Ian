@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div style="padding: 20px;">
    <h1>{{ $job->title }}</h1>

    <div style="margin: 20px 0;">
        <p><strong>Company:</strong> {{ $job->employer->company_name }}</p>
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Type:</strong> {{ ucfirst($job->type) }}</p>
        @if($job->experience_level)
            <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>
        @endif
        @if($job->salary_min && $job->salary_max)
            <p><strong>Salary Range:</strong> ${{ number_format($job->salary_min, 2) }} - ${{ number_format($job->salary_max, 2) }}</p>
        @endif
        @if($job->deadline)
            <p><strong>Application Deadline:</strong> {{ $job->deadline->format('M d, Y') }}</p>
        @endif
        <p><small>Posted {{ $job->created_at->diffForHumans() }}</small></p>
    </div>

    <div style="margin: 20px 0;">
        <h2>Job Description</h2>
        <p style="white-space: pre-wrap;">{{ $job->description }}</p>
    </div>

    @if($job->requirements)
        <div style="margin: 20px 0;">
            <h2>Requirements</h2>
            <p style="white-space: pre-wrap;">{{ $job->requirements }}</p>
        </div>
    @endif

    @if($job->benefits)
        <div style="margin: 20px 0;">
            <h2>Benefits</h2>
            <p style="white-space: pre-wrap;">{{ $job->benefits }}</p>
        </div>
    @endif

    <div style="margin: 20px 0;">
        <h2>About the Company</h2>
        @if($job->employer->company_description)
            <p>{{ $job->employer->company_description }}</p>
        @endif
        @if($job->employer->company_website)
            <p><strong>Website:</strong> <a href="{{ $job->employer->company_website }}" target="_blank">{{ $job->employer->company_website }}</a></p>
        @endif
        @if($job->employer->industry)
            <p><strong>Industry:</strong> {{ $job->employer->industry }}</p>
        @endif
        @if($job->employer->company_size)
            <p><strong>Company Size:</strong> {{ $job->employer->company_size }} employees</p>
        @endif
    </div>

    <div style="margin: 30px 0;">
        @if($hasApplied)
            <p style="padding: 10px; background: lightgreen;">You have already applied to this job.</p>
            <a href="{{ route('student.applications.index') }}">View My Applications</a>
        @else
            <form method="POST" action="{{ route('student.jobs.apply', $job) }}">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label for="cover_letter">Cover Letter (optional):</label>
                    <textarea id="cover_letter" name="cover_letter" rows="6" style="width: 100%; padding: 5px;" placeholder="Tell the employer why you're a great fit for this position..."></textarea>
                </div>
                <button type="submit" style="padding: 10px 20px; background: lightgreen;">Apply Now</button>
            </form>
        @endif
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('student.jobs.index') }}">Back to Job Listings</a>
    </div>
</div>
@endsection
