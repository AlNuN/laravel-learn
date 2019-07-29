<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        $gate->before(function($user){
            if ($user->id == 2) return true;
        });  // Permite ao usuário cujo id é igual a 2 acesso a tudo, pois ele não vai passar pelos middlewares

        //
    }
}
