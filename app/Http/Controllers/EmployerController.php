<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function dashboard()
    {
        $employer = Auth::user()->employer;
        $jobs = $employer->jobs()
            ->withCount('applications')
            ->recent()
            ->paginate(10);

        $totalJobs = $employer->jobs()->count();
        $activeJobs = $employer->jobs()->where('is_active', true)->count();
        $totalApplications = $employer->jobs()
            ->withCount('applications')
            ->get()
            ->sum('applications_count');

        return view('employer.dashboard', compact(
            'employer',
            'jobs',
            'totalJobs',
            'activeJobs',
            'totalApplications'
        ));
    }

    public function profile()
    {
        $employer = Auth::user()->employer;
        return view('employer.profile', compact('employer'));
    }

    public function updateProfile(Request $request)
    {
        $employer = Auth::user()->employer;

        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'company_website' => ['nullable', 'url', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:20'],
            'company_address' => ['nullable', 'string'],
            'industry' => ['nullable', 'string', 'max:255'],
            'company_size' => ['nullable', 'integer', 'min:1'],
            'company_description' => ['nullable', 'string'],
        ]);

        $employer->update($validated);

        return redirect()->route('employer.profile')
            ->with('success', 'Profile updated successfully');
    }
}
