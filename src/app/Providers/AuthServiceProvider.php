<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        User::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Definindo permissões
        Gate::define('isAdmin', [RolePolicy::class, 'isAdmin']);
        Gate::define('isProfessor', [RolePolicy::class, 'isProfessor']);
        Gate::define('isAluno', [RolePolicy::class, 'isAluno']);
    }
}
