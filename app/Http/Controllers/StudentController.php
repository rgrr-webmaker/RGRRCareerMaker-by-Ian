<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user()->student;
        $applications = $student->applications()
            ->with('job.employer')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('student.dashboard', compact('student', 'applications'));
    }

    public function profile()
    {
        $student = Auth::user()->student;
        return view('student.profile', compact('student'));
    }

    public function updateProfile(Request $request)
    {
        $student = Auth::user()->student;

        $validated = $request->validate([
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
            'university' => ['nullable', 'string', 'max:255'],
            'degree' => ['nullable', 'string', 'max:255'],
            'major' => ['nullable', 'string', 'max:255'],
            'graduation_year' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'gpa' => ['nullable', 'numeric', 'min:0', 'max:4'],
            'skills' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
        ]);

        $student->update($validated);

        return redirect()->route('student.profile')
            ->with('success', 'Profile updated successfully');
    }

    public function jobs(Request $request)
    {
        $query = Job::with('employer')->active();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        $jobs = $query->recent()->paginate(15);

        return view('student.jobs.index', compact('jobs'));
    }

    public function showJob(Job $job)
    {
        $job->load('employer', 'applications');
        $student = Auth::user()->student;
        $hasApplied = $job->applications()
            ->where('student_id', $student->id)
            ->exists();

        return view('student.jobs.show', compact('job', 'hasApplied'));
    }

    public function applications()
    {
        $student = Auth::user()->student;
        $applications = $student->applications()
            ->with('job.employer')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('student.applications.index', compact('applications'));
    }
}
