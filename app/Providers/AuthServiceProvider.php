<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de políticas da aplicação.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Exemplo de mapeamento de policy:
        // Post::class => PostPolicy::class,
    ];

    /**
     * Registrar quaisquer serviços de autenticação/autorização.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate para administrador
        Gate::define('admin', function (User $user) {
            return $user->access_level === 'admin';
        });

        // Gate para usuário padrão
        Gate::define('user', function (User $user) {
            return $user->access_level === 'user';
        });
    }
}
