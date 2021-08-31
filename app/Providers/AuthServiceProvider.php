<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super Admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {
            return $user->hasRole('website-admin') ? true : null;
        });

        Gate::define('edit profile', function ($authUser, $editUser) {
            return $authUser->id == $editUser->id || $authUser->can('edit all profiles');
        });

        Gate::define('upload images', function (User $user) {
            return Gate::forUser($user)->any([
                'create department',
                'edit department',
                'edit pages',
                'create cars',
                'edit cars',
                'create press posts',
                'edit press posts'
            ]);
        });
    }
}
