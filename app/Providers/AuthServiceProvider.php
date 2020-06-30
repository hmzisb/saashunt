<?php

namespace App\Providers;

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

        Gate::define('delete-saas', function($user, $sas){
    
            //Gates always receive current authenticated user as their first arguemnt.
            //..You dont need to provide it.
            if($sas != ''){
                return $user->id === $sas->user_id;
            } else {
                echo $sas;
            }
            

        });
    }
}
