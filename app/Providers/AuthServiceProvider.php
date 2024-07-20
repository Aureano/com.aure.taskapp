<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user)
        {
              return $user->isAdmin();
        });

        Gate::define('createEmployeeList', function(User $user)
        {
            return $user->isCreate();
        });

        Gate::define('canCreateTask', function(User $user)
        {
              return $user->manyRoles(['admin','create']);
        });

        Gate::define('canReceiveTasks', function(User $user)
        {
              return $user->manyRoles(['create','users']);
        });

        Gate::define('candReadNews', function(User $user)
        {
            return $user->manyRoles(['create','users','admin']);
        });


    }
}
