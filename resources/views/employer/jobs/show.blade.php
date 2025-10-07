@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div style="padding: 20px;">
    <h1>{{ $job->title }}</h1>

    <div style="margin: 20px 0;">
        <p><strong>Location:</strong> {{ $job->location }}</p>
        <p><strong>Type:</strong> {{ ucfirst($job->type) }}</p>
        <p><strong>Status:</strong>
            <span style="padding: 5px; background: {{ $job->is_active ? 'lightgreen' : 'lightcoral' }};">
                {{ $job->is_active ? 'Active' : 'Inactive' }}
            </span>
        </p>
        @if($job->experience_level)
            <p><strong>Experience Level:</strong> {{ $job->experience_level }}</p>
        @endif
        @if($job->salary_min && $job->salary_max)
            <p><strong>Salary Range:</strong> ${{ number_format($job->salary_min, 2) }} - ${{ number_format($job->salary_max, 2) }}</p>
        @endif
        @if($job->deadline)
            <p><strong>Application Deadline:</strong> {{ $job->deadline->format('M d, Y') }}</p>
        @endif
        <p><strong>Total Applications:</strong> {{ $job->applications_count }}</p>
        <p><small>Posted {{ $job->created_at->diffForHumans() }}</small></p>
    </div>

    <div style="margin: 20px 0;">
        <a href="{{ route('employer.jobs.edit', $job) }}" style="padding: 10px 20px; background: lightblue;">Edit Job</a>
        <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" style="display: inline; margin-left: 10px;">
            @csrf
            <button type="submit" style="padding: 10px 20px;">{{ $job->is_active ? 'Deactivate' : 'Activate' }}</button>
        </form>
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

    <div style="margin: 30px 0;">
        <h2>Applications ({{ $job->applications->count() }})</h2>

        @if($job->applications->count() > 0)
            <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr>
                        <th style="padding: 10px;">Student Name</th>
                        <th style="padding: 10px;">University</th>
                        <th style="padding: 10px;">Major</th>
                        <th style="padding: 10px;">GPA</th>
                        <th style="padding: 10px;">Status</th>
                        <th style="padding: 10px;">Applied Date</th>
                        <th style="padding: 10px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($job->applications as $application)
                        <tr>
                            <td style="padding: 10px;">{{ $application->student->user->name }}</td>
                            <td style="padding: 10px;">{{ $application->student->university ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $application->student->major ?? 'N/A' }}</td>
                            <td style="padding: 10px;">{{ $application->student->gpa ?? 'N/A' }}</td>
                            <td style="padding: 10px;">
                                <span style="padding: 5px; background:
                                    @if($application->status == 'accepted') lightgreen
                                    @elseif($application->status == 'rejected') lightcoral
                                    @elseif($application->status == 'reviewed') lightyellow
                                    @else lightgray @endif;">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </td>
                            <td style="padding: 10px;">{{ $application->created_at->format('M d, Y') }}</td>
                            <td style="padding: 10px;">
                                <a href="{{ route('applications.show', $application) }}">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No applications yet.</p>
        @endif
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('employer.jobs.index') }}">Back to My Jobs</a>
    </div>
</div>
@endsection
