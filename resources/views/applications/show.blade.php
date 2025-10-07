@extends('layouts.app')

@section('title', 'Application Details')

@section('content')
<div style="padding: 20px;">
    <h1>Application Details</h1>

    <div style="margin: 20px 0;">
        <h2>Job Information</h2>
        <p><strong>Title:</strong> {{ $application->job->title }}</p>
        <p><strong>Company:</strong> {{ $application->job->employer->company_name }}</p>
        <p><strong>Location:</strong> {{ $application->job->location }}</p>
        <p><strong>Type:</strong> {{ ucfirst($application->job->type) }}</p>
    </div>

    <div style="margin: 20px 0;">
        <h2>Student Information</h2>
        <p><strong>Name:</strong> {{ $application->student->user->name }}</p>
        <p><strong>Email:</strong> {{ $application->student->user->email }}</p>
        @if($application->student->phone)
            <p><strong>Phone:</strong> {{ $application->student->phone }}</p>
        @endif
        @if($application->student->university)
            <p><strong>University:</strong> {{ $application->student->university }}</p>
        @endif
        @if($application->student->degree && $application->student->major)
            <p><strong>Education:</strong> {{ $application->student->degree }} in {{ $application->student->major }}</p>
        @endif
        @if($application->student->graduation_year)
            <p><strong>Graduation Year:</strong> {{ $application->student->graduation_year }}</p>
        @endif
        @if($application->student->gpa)
            <p><strong>GPA:</strong> {{ $application->student->gpa }}</p>
        @endif
        @if($application->student->skills)
            <p><strong>Skills:</strong> {{ $application->student->skills }}</p>
        @endif
        @if($application->student->bio)
            <div style="margin-top: 10px;">
                <strong>Bio:</strong>
                <p style="white-space: pre-wrap;">{{ $application->student->bio }}</p>
            </div>
        @endif
    </div>

    <div style="margin: 20px 0;">
        <h2>Application Information</h2>
        <p><strong>Status:</strong>
            <span style="padding: 5px; background:
                @if($application->status == 'accepted') lightgreen
                @elseif($application->status == 'rejected') lightcoral
                @elseif($application->status == 'reviewed') lightyellow
                @else lightgray @endif;">
                {{ ucfirst($application->status) }}
            </span>
        </p>
        <p><strong>Applied Date:</strong> {{ $application->created_at->format('F d, Y') }}</p>
        @if($application->reviewed_at)
            <p><strong>Reviewed Date:</strong> {{ $application->reviewed_at->format('F d, Y') }}</p>
        @endif
    </div>

    @if($application->cover_letter)
        <div style="margin: 20px 0;">
            <h2>Cover Letter</h2>
            <p style="white-space: pre-wrap; padding: 15px; background: #f9f9f9; border: 1px solid #ddd;">{{ $application->cover_letter }}</p>
        </div>
    @endif

    @if(auth()->user()->isEmployer())
        <div style="margin: 30px 0; padding: 20px; border: 1px solid #ccc;">
            <h2>Update Application Status</h2>
            <form method="POST" action="{{ route('employer.applications.update-status', $application) }}">
                @csrf
                @method('PUT')

                <div style="margin-bottom: 15px;">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required style="width: 100%; padding: 5px;">
                        <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label for="employer_notes">Notes (optional):</label>
                    <textarea id="employer_notes" name="employer_notes" rows="4" style="width: 100%; padding: 5px;" placeholder="Add notes about this application...">{{ old('employer_notes', $application->employer_notes) }}</textarea>
                </div>

                <button type="submit" style="padding: 10px 20px;">Update Status</button>
            </form>
        </div>

        @if($application->employer_notes)
            <div style="margin: 20px 0;">
                <h3>Employer Notes</h3>
                <p style="white-space: pre-wrap; padding: 15px; background: #f9f9f9; border: 1px solid #ddd;">{{ $application->employer_notes }}</p>
            </div>
        @endif
    @endif

    @if(auth()->user()->isStudent() && $application->employer_notes && in_array($application->status, ['accepted', 'rejected']))
        <div style="margin: 20px 0;">
            <h3>Feedback from Employer</h3>
            <p style="white-space: pre-wrap; padding: 15px; background: #f9f9f9; border: 1px solid #ddd;">{{ $application->employer_notes }}</p>
        </div>
    @endif

    <div style="margin-top: 30px;">
        @if(auth()->user()->isStudent())
            <a href="{{ route('student.applications.index') }}">Back to My Applications</a>
        @else
            <a href="{{ route('employer.jobs.show', $application->job) }}">Back to Job Details</a>
        @endif
    </div>
</div>
@endsection
