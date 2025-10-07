@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div style="padding: 20px;">
    <h1>Welcome, {{ auth()->user()->name }}</h1>

    <div style="margin: 20px 0;">
        <h2>Quick Stats</h2>
        <p>Total Applications: {{ $applications->total() }}</p>
        <p>Pending: {{ $student->applications()->where('status', 'pending')->count() }}</p>
        <p>Reviewed: {{ $student->applications()->where('status', 'reviewed')->count() }}</p>
        <p>Accepted: {{ $student->applications()->where('status', 'accepted')->count() }}</p>
    </div>

    <div style="margin: 20px 0;">
        <h2>Recent Applications</h2>
        @if($applications->count() > 0)
            <table border="1" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 10px;">Job Title</th>
                        <th style="padding: 10px;">Company</th>
                        <th style="padding: 10px;">Status</th>
                        <th style="padding: 10px;">Applied Date</th>
                        <th style="padding: 10px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td style="padding: 10px;">{{ $application->job->title }}</td>
                            <td style="padding: 10px;">{{ $application->job->employer->company_name }}</td>
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
                                <a href="{{ route('applications.show', $application) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 20px;">
                {{ $applications->links() }}
            </div>
        @else
            <p>You haven't applied to any jobs yet. <a href="{{ route('student.jobs.index') }}">Browse available jobs</a></p>
        @endif
    </div>

    <div style="margin: 20px 0;">
        <a href="{{ route('student.jobs.index') }}" style="padding: 10px 20px; background: lightblue;">Browse All Jobs</a>
    </div>
</div>
@endsection
