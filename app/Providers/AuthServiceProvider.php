<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('student', function($user){
            if(auth()->user()->role == 'student'){
                return true;
            }
            return false;
        });

        Gate::define('faculty', function($user){
            if(auth()->user()->role == 'faculty'){
                return true;
            }
            return false;
        });

        Gate::define('doctor', function($user){
            if(auth()->user()->role == 'doctor'){
                return true;
            }
            return false;
        });

        Gate::define('dentist', function($user){
            if(auth()->user()->role == 'dentist'){
                return true;
            }
            return false;
        });

        Gate::define('nurse', function($user){
            if(auth()->user()->role == 'nurse'){
                return true;
            }
            return false;
        });

        Gate::define('admin', function($user){
            if(auth()->user()->role == 'admin'){
                return true;
            }
            return false;
        });
    }
}
