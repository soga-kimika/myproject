<?php

namespace App\Providers;

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
        'App\Models\User' => 'App\Policies\AdminPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // 管理者であるかをチェック
        Gate::define('admin', function ($user) {
            return $user->isAdmin();
        });
    
        // 管理者でないかをチェック
        Gate::define('not_admin', function ($user) {
            return !$user->isAdmin(); 
        });
    }
    
}
