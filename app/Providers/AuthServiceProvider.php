<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Policies\ComentarioPolicy;
use App\Policies\PublicacionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Publicacion::class => PublicacionPolicy::class,
        Comentario::class => ComentarioPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
