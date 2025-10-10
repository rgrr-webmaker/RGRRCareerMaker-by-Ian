<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
     use AuthorizesRequests;
    public function index()
    {
        $employer = Auth::user()->employer;
        $jobs = $employer->jobs()
            ->withCount('applications')
            ->recent()
            ->paginate(15);

        return view('employer.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('employer.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:full-time,part-time,contract,internship'],
            'salary_min' => ['nullable', 'numeric', 'min:0'],
            'salary_max' => ['nullable', 'numeric', 'min:0', 'gte:salary_min'],
            'experience_level' => ['nullable', 'string', 'max:255'],
            'benefits' => ['nullable', 'string'],
            'deadline' => ['nullable', 'date', 'after:today'],
        ]);

        $employer = Auth::user()->employer;
        $job = $employer->jobs()->create($validated);

        return redirect()->route('employer.jobs.show', $job)
            ->with('success', 'Job posted successfully');
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);

        $job->load('employer', 'applications.student.user');
        $job->loadCount('applications');

        return view('employer.jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('employer.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'requirements' => ['nullable', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:full-time,part-time,contract,internship'],
            'salary_min' => ['nullable', 'numeric', 'min:0'],
            'salary_max' => ['nullable', 'numeric', 'min:0', 'gte:salary_min'],
            'experience_level' => ['nullable', 'string', 'max:255'],
            'benefits' => ['nullable', 'string'],
            'is_active' => ['boolean'],
            'deadline' => ['nullable', 'date'],
        ]);

        $job->update($validated);

        return redirect()->route('employer.jobs.show', $job)
            ->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('employer.jobs.index')
            ->with('success', 'Job deleted successfully');
    }

    public function toggleStatus(Job $job)
    {
        $this->authorize('update', $job);

        $job->update([
            'is_active' => !$job->is_active
        ]);

        return back()->with('success', 'Job status updated successfully');
    }
}
