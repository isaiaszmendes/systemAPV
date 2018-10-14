<?php

namespace systemAPV\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use systemAPV\Models\Chamado;
use systemAPV\Models\User;
use systemAPV\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'systemAPV\Model' => 'systemAPV\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        // $permissions = Permission::with('roles')->get();

        // foreach ($permissions as $permission) 
        // {
        //     Gate::define($permission->name, function(User $user) use ($permission){
        //         return $user->hasPermission($permission);
        //     });
        // }

        # habilita todos as permissions 
        // Gate::before(function(User $user, $ability){
        //     if ($user->hasAnyRoles('Administrador'))
        //     return true;
        // });
    }
}
