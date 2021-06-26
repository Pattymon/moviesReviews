<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Pelicula;
use App\Models\Team;
use App\Policies\PeliculaPolicy;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
        Pelicula::class => PeliculaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-peliculas', function(User $user){
            return $user->tipo == 'Administrador';
        });
    }
}
