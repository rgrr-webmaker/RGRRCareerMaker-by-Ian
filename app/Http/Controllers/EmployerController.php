<?php
// app/Http/Controllers/EmployerController.php
namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application; // <<-- Add this
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

    public function applicants(Request $request)
    {
        $employer = auth()->user()->employer;

        // Get all jobs for this employer for the filter dropdown
        $jobs = $employer->jobs()->orderBy('title')->get();

        // Base query - get all applications for employer's jobs
        $query = Application::whereHas('job', function($q) use ($employer) {
            $q->where('employer_id', $employer->id);
        })
        ->with(['student.user', 'job']);

        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('student.user', function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('job')) {
            $query->where('job_id', $request->job);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Apply sorting
        switch ($request->get('sort', 'newest')) {
            case 'oldest':
                $query->oldest();
                break;
            case 'name':
                $query->join('students', 'applications.student_id', '=', 'students.id')
                    ->join('users', 'students.user_id', '=', 'users.id')
                    ->orderBy('users.name')
                    ->select('applications.*');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        $applications = $query->paginate(15)->withQueryString();

        // Calculate stats
        $allApplications = Application::whereHas('job', function($q) use ($employer) {
            $q->where('employer_id', $employer->id);
        });

        $stats = [
            'total' => $allApplications->count(),
            'pending' => $allApplications->clone()->where('status', 'pending')->count(),
            'reviewed' => $allApplications->clone()->where('status', 'reviewed')->count(),
            'accepted' => $allApplications->clone()->where('status', 'accepted')->count(),
        ];

        return view('employer.applicants.index', compact('applications', 'jobs', 'stats'));
    }
}


