<?php
// app/Http/Controllers/ApplicationController.php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;


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
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'], // 5MB max
        ]);

        // Handle resume upload
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        Application::create([
            'job_id' => $job->id,
            'student_id' => $student->id,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        return redirect()->route('student.applications.index')
            ->with('success', 'Application submitted successfully');
    }

    public function downloadResume(Application $application)
    {
        // Check authorization
        if (Auth::user()->isStudent()) {
            $this->authorize('view', $application);
        } else {
            if ($application->job->employer_id !== Auth::user()->employer->id) {
                abort(403);
            }
        }

        if (!$application->resume_path || !Storage::disk('public')->exists($application->resume_path)) {
            abort(404, 'Resume not found');
        }

        $filePath = storage_path('app/public/' . $application->resume_path);
        $fileName = 'resume_' . $application->student->user->name . '_' . $application->id . '.' . pathinfo($application->resume_path, PATHINFO_EXTENSION);

        return response()->download($filePath, $fileName);
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

        // Delete the resume file if it exists
        if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
            Storage::disk('public')->delete($application->resume_path);
        }

        $application->delete();

        return redirect()->route('student.applications.index')
            ->with('success', 'Application withdrawn successfully');
    }
}
