<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\Application;
use App\Policies\JobPolicy;
use App\Policies\ApplicationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Job::class => JobPolicy::class,
        Application::class => ApplicationPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
