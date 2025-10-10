<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ApplicationController extends Controller
{
     use AuthorizesRequests;
    public function store(Request $request, Job $job)
    {
        $student = Auth::user()->student;

        $existingApplication = Application::where('job_id', $job->id)
            ->where('student_id', $student->id)
            ->first();

        if ($existingApplication) {
            return back()->with('error', 'You have already applied to this job');
        }

        $validated = $request->validate([
            'cover_letter' => ['nullable', 'string', 'max:2000'],
        ]);

        Application::create([
            'job_id' => $job->id,
            'student_id' => $student->id,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('student.applications.index')
            ->with('success', 'Application submitted successfully');
    }

    public function show(Application $application)
    {
        if (Auth::user()->isStudent()) {
            $this->authorize('view', $application);
        } else {
            $application->load('student.user', 'job');
            if ($application->job->employer_id !== Auth::user()->employer->id) {
                abort(403);
            }
        }

        return view('applications.show', compact('application'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $job = $application->job;

        if ($job->employer_id !== Auth::user()->employer->id) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => ['required', 'in:pending,reviewed,accepted,rejected'],
            'employer_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $application->update([
            'status' => $validated['status'],
            'employer_notes' => $validated['employer_notes'] ?? $application->employer_notes,
            'reviewed_at' => now(),
        ]);

        return back()->with('success', 'Application status updated successfully');
    }

    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();

        return redirect()->route('student.applications.index')
            ->with('success', 'Application withdrawn successfully');
    }
}
