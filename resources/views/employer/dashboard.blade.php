@extends('layouts.app')

@section('title', 'Employer Dashboard')

@section('content')
<div style="padding: 20px;">
    <h1>Welcome, {{ $employer->company_name }}</h1>

    <div style="margin: 20px 0; display: flex; gap: 20px;">
        <div style="border: 1px solid #ccc; padding: 20px; flex: 1;">
            <h3>Total Jobs</h3>
            <p style="font-size: 2em;">{{ $totalJobs }}</p>
        </div>
        <div style="border: 1px solid #ccc; padding: 20px; flex: 1;">
            <h3>Active Jobs</h3>
            <p style="font-size: 2em;">{{ $activeJobs }}</p>
        </div>
        <div style="border: 1px solid #ccc; padding: 20px; flex: 1;">
            <h3>Total Applications</h3>
            <p style="font-size: 2em;">{{ $totalApplications }}</p>
        </div>
    </div>

    <div style="margin: 30px 0;">
        <h2>Recent Jobs</h2>
        @if($jobs->count() > 0)
            <table border="1" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 10px;">Title</th>
                        <th style="padding: 10px;">Location</th>
                        <th style="padding: 10px;">Type</th>
                        <th style="padding: 10px;">Status</th>
                        <th style="padding: 10px;">Applications</th>
                        <th style="padding: 10px;">Posted</th>
                        <th style="padding: 10px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td style="padding: 10px;">{{ $job->title }}</td>
                            <td style="padding: 10px;">{{ $job->location }}</td>
                            <td style="padding: 10px;">{{ ucfirst($job->type) }}</td>
                            <td style="padding: 10px;">
                                <span style="padding: 5px; background: {{ $job->is_active ? 'lightgreen' : 'lightcoral' }};">
                                    {{ $job->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td style="padding: 10px;">{{ $job->applications_count }}</td>
                            <td style="padding: 10px;">{{ $job->created_at->format('M d, Y') }}</td>
                            <td style="padding: 10px;">
                                <a href="{{ route('employer.jobs.show', $job) }}">View</a>
                                <a href="{{ route('employer.jobs.edit', $job) }}" style="margin-left: 10px;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 20px;">
                {{ $jobs->links() }}
            </div>
        @else
            <p>You haven't posted any jobs yet.</p>
        @endif
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('employer.jobs.create') }}" style="padding: 10px 20px; background: lightgreen;">Post New Job</a>
    </div>
</div>
@endsection
