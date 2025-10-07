<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;

class ApplicationPolicy
{
    public function view(User $user, Application $application): bool
    {
        if ($user->isStudent()) {
            return $user->student && $user->student->id === $application->student_id;
        }

        if ($user->isEmployer()) {
            return $user->employer && $user->employer->id === $application->job->employer_id;
        }

        return false;
    }

    public function create(User $user): bool
    {
        return $user->isStudent();
    }

    public function delete(User $user, Application $application): bool
    {
        return $user->student && $user->student->id === $application->student_id;
    }
}
