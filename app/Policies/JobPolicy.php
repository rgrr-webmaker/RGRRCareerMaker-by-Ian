<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function view(User $user, Job $job): bool
    {
        if ($user->isStudent()) {
            return true;
        }

        return $user->employer && $user->employer->id === $job->employer_id;
    }

    public function create(User $user): bool
    {
        return $user->isEmployer();
    }

    public function update(User $user, Job $job): bool
    {
        return $user->employer && $user->employer->id === $job->employer_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->employer && $user->employer->id === $job->employer_id;
    }
}
