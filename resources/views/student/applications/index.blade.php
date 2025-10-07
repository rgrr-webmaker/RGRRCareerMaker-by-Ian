@extends('layouts.app')

@section('title', 'My Applications')

@section('content')
<div style="padding: 20px;">
    <h1>My Applications</h1>

    @if($applications->count() > 0)
        <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="padding: 10px;">Job Title</th>
                    <th style="padding: 10px;">Company</th>
                    <th style="padding: 10px;">Location</th>
                    <th style="padding: 10px;">Type</th>
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
                        <td style="padding: 10px;">{{ $application->job->location }}</td>
                        <td style="padding: 10px;">{{ ucfirst($application->job->type) }}</td>
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
                            @if($application->status == 'pending')
                                <form method="POST" action="{{ route('student.applications.destroy', $application) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="margin-left: 10px;">Withdraw</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            {{ $applications->links() }}
        </div>
    @else
        <p>You haven't applied to any jobs yet.</p>
        <a href="{{ route('student.jobs.index') }}" style="padding: 10px 20px; background: lightblue;">Browse Jobs</a>
    @endif
</div>
@endsection
