@extends('layouts.app')

@section('title', 'My Jobs')

@section('content')
<div style="padding: 20px;">
    <h1>My Jobs</h1>

    <div style="margin: 20px 0;">
        <a href="{{ route('employer.jobs.create') }}" style="padding: 10px 20px; background: lightgreen;">Post New Job</a>
    </div>

    @if($jobs->count() > 0)
        <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
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
                            <form method="POST" action="{{ route('employer.jobs.toggle-status', $job) }}" style="display: inline; margin-left: 10px;">
                                @csrf
                                <button type="submit">{{ $job->is_active ? 'Deactivate' : 'Activate' }}</button>
                            </form>
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
@endsection
